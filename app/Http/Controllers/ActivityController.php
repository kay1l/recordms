<?php

namespace App\Http\Controllers;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Activity;
use App\Models\User;
use App\Models\College;
use App\Models\Program;
use App\Models\Report;
use Illuminate\Support\Facades\Storage;
use setasign\Fpdi\Tcpdf\Fpdi;
use Carbon\Carbon;
class ActivityController extends Controller
{
    public function ActivityMatrix(){
        $college = College::get();
        $programs = program::get();
        $clerkData = Auth::user();

        return view('clerk.activities', compact('college', 'clerkData','programs' ));
    }
    public function ActivitiesMatrix(){
        $college = College::all();
        $programs = Program::where('status', 'Active')  ->get();
        $adminData = Auth::user();
        return view('admin.activities', compact('college', 'adminData','programs'));
    }
    public function activitiesMatrx(){

        $userCollege = auth()->user()->collegeCode;
        $college = College::where('collegeCode', $userCollege)->get();
        $programs = program:: where('collegeCode', $userCollege)->get();
        $unitHeadData = Auth::user();
        $id = Auth::user()->id;
        $unitData = User::find($id);

        return view('unithead.activities', compact('college','userCollege','programs', 'unitHeadData','unitData'));
    }
    public function ActivityManage(Request $request){

        $activities = Activity::all();
        $clerkData = Auth::user();
        $college = College::where('status', 'Active')->get();
        $programs = Program::where('status', 'Active')->get();


        $completeAct = Activity::where('status', 'Accomplished')->count();
        $totalAct = Activity::all()->count();

        $activity = Activity::with(['college','program'])
          ->join('reports', 'reports.activity_code','=','activities.activity_code')
          ->get();

        return view('clerk.create' , compact('activities',
        'college',
         'programs',
         'clerkData',
         'completeAct',
         'totalAct',
         'activity',
        ));
    }

    public function AdminActivityManage(Request $request){

        $activities = Activity::all();
        $adminData = Auth::user();
        $college = College::where('status', 'Active')->get();
        $programs = Program::where('status', 'Active')->get();


        $completeAct = Activity::where('status', 'Accomplished')->count();
        $totalAct = Activity::all()->count();

        $activity = Activity::with(['college','program'])
          ->join('reports', 'reports.activity_code','=','activities.activity_code')
          ->get();

        return view('admin.create' , compact('activities',
        'college',
         'programs',
         'adminData',
         'completeAct',
         'totalAct',
         'activity',
        ));
    }

    public function ActivityStore(Request $request)
    {

        $request->validate([
            'activity_name' => 'required|string|max:255|unique:activities',
            'collegeCode' => 'required|exists:colleges,collegeCode',
            'proponentId' => 'required|exists:programs,programId',
            'proponent' => 'required|array|max:100',
            'proponents' => 'required|array|max:200',
            'year' => 'required|integer',
            'start' => 'required|date_format:Y-m-d',
            'end' => 'required|date_format:Y-m-d',
            'budget' => 'required|string',
        ]);

        $existingActivity = Activity::where('activity_name', $request->input('activity_name'))->first();

        if ($existingActivity) {
            return redirect()->back()->with('warning', 'An Activity with the same name already exists!');
        }

        $proponentsArray = implode(',', $request->input('proponent'));
        $proponentsArr = implode(',', $request->input('proponents'));
        $collegeCode = $request->input('collegeCode');
        $year = $request->input('year');
        $activityCode = $collegeCode . '-' . $year . '-' . Str::random(4);

        $startDate = new \DateTime($request->input('start'));
        $endDate = new \DateTime($request->input('end'));

        $startQuarter = ceil($startDate->format('n') / 3);
        $endQuarter = ceil($endDate->format('n') / 3);

        $quarterToStore = (string)$startQuarter;


        $newActivity = new Activity();
        $newActivity->activity_code = $activityCode;
        $newActivity->activity_name = $request->input('activity_name');
        $newActivity->collegeCode = $request->input('collegeCode');
        $newActivity->proponentId = $request->input('proponentId');
        $newActivity->proponent = $proponentsArray;
        $newActivity->proponents = $proponentsArr;
        $newActivity->year = $year;
        $newActivity->start = $request->input('start');
        $newActivity->end = $request->input('end');
        $newActivity->budget = $request->input('budget');


        $newActivity->quarter = $quarterToStore;
        $newActivity->save();


        Report::create([
            'activity_code' => $newActivity->activity_code,
            'collegeCode' => $newActivity->collegeCode,
            'programId' => $newActivity->proponentId,
            'trainees_target' => $request->input('trainees_target'),
            'trainees_accomp' => 0,
            'partnership_target' => $request->input('partnership_target'),
            'partnership_accomp' => 0,
            'partnership_name' => null,
            'percentage_accomp' => 100,
            'percentage_target' => 97,
        ]);

        $college = College::where('collegeCode', $newActivity->collegeCode)->first();
        $collegeName = $college ? $college->collegeName : 'Unknown College';

        $department = Program::where('programId', $newActivity->proponentId)->first();
        $departmentName = $department ? $department->programName : 'Unknown Department';

        $activityData = [
            'activity_code' => $newActivity->activity_code,
            'activity_name' => $newActivity->activity_name,
            'start' => $newActivity->start->format('M Y'),
            'end' => $newActivity->end->format('M Y'),
            'quarter' => $newActivity->quarter,
            'collegeCode' => $collegeName,
            'programId' => $departmentName,
            'proponents' => $newActivity->proponents,
            'proponent' => $newActivity->proponent,
            'year' => $newActivity->year,
            'budget' => $newActivity->budget,
            'status' => $newActivity->status,

        ];
        return response()->json([
            'success' => true,
            'message' => 'Activity saved successfully.',
            'activity' => $activityData
        ]);
    }

    public function AdminActivityStore(Request $request)
    {

        $request->validate([
            'activity_name' => 'required|string|max:255|unique:activities',
            'collegeCode' => 'required|exists:colleges,collegeCode',
            'proponentId' => 'required|exists:programs,programId',
            'proponent' => 'required|array|max:100',
            'proponents' => 'required|array|max:200',
            'year' => 'required|integer',
            'start' => 'required|date_format:Y-m-d',
            'end' => 'required|date_format:Y-m-d',
            'budget' => 'required|string',
        ]);

        $existingActivity = Activity::where('activity_name', $request->input('activity_name'))->first();

        if ($existingActivity) {
            return redirect()->back()->with('warning', 'An Activity with the same name already exists!');
        }

        $proponentsArray = implode(',', $request->input('proponent'));
        $proponentsArr = implode(',', $request->input('proponents'));
        $collegeCode = $request->input('collegeCode');
        $year = $request->input('year');
        $activityCode = $collegeCode . '-' . $year . '-' . Str::random(4);

        $startDate = new \DateTime($request->input('start'));
        $endDate = new \DateTime($request->input('end'));

        $startQuarter = ceil($startDate->format('n') / 3);
        $endQuarter = ceil($endDate->format('n') / 3);

        $quarterToStore = (string)$startQuarter;


        $newActivity = new Activity();
        $newActivity->activity_code = $activityCode;
        $newActivity->activity_name = $request->input('activity_name');
        $newActivity->collegeCode = $request->input('collegeCode');
        $newActivity->proponentId = $request->input('proponentId');
        $newActivity->proponent = $proponentsArray;
        $newActivity->proponents = $proponentsArr;
        $newActivity->year = $year;
        $newActivity->start = $request->input('start');
        $newActivity->end = $request->input('end');
        $newActivity->budget = $request->input('budget');


        $newActivity->quarter = $quarterToStore;
        $newActivity->save();


        Report::create([
            'activity_code' => $newActivity->activity_code,
            'collegeCode' => $newActivity->collegeCode,
            'programId' => $newActivity->proponentId,
            'trainees_target' => $request->input('trainees_target'),
            'trainees_accomp' => 0,
            'partnership_target' => $request->input('partnership_target'),
            'partnership_accomp' => 0,
            'partnership_name' => null,
            'percentage_accomp' => 100,
            'percentage_target' => 97,
        ]);

        $college = College::where('collegeCode', $newActivity->collegeCode)->first();
        $collegeName = $college ? $college->collegeName : 'Unknown College';

        $department = Program::where('programId', $newActivity->proponentId)->first();
        $departmentName = $department ? $department->programName : 'Unknown Department';

        $activityData = [
            'activity_code' => $newActivity->activity_code,
            'activity_name' => $newActivity->activity_name,
            'start' => $newActivity->start->format('M Y'),
            'end' => $newActivity->end->format('M Y'),
            'quarter' => $newActivity->quarter,
            'collegeCode' => $collegeName,
            'programId' => $departmentName,
            'proponents' => $newActivity->proponents,
            'proponent' => $newActivity->proponent,
            'year' => $newActivity->year,
            'budget' => $newActivity->budget,
            'status' => $newActivity->status,

        ];
        return response()->json([
            'success' => true,
            'message' => 'Activity saved successfully.',
            'activity' => $activityData
        ]);
    }

    public function getProponent($collegeCode){
        $proponents = Program::where('collegeCode', $collegeCode)->get();
         return response()->json($proponents);
    }
    public function getProponentdirector($collegeCode){
        $proponents = Program::where('collegeCode', $collegeCode)->get();
         return response()->json($proponents);
    }
    public function getProponentunithead(){
        $proponents = Program::where('collegeCode', $collegeCode)
        ->get();
        return response()->json($proponents);
    }
    public function UnitheadactivityManage(Request $request ){
        $userCollege = auth()->user()->collegeCode;
        $unitHeadData = Auth::user();
        $reports = Report::where('collegeCode', $userCollege)->with('activity')->get();

        $activity = Activity::with(['college','program'])->get();
        return view('unithead.act-manage' , compact( 'unitHeadData','activity','reports',));
    }

    public function completed(){
        $clerkData = Auth::user();
        $completeActs = Activity::join('reports','activities.activity_code', '=', 'reports.activity_code')
        ->where('status', 'Accomplished')
        ->with('college')->get();

        return view ('clerk.complete', compact('clerkData', 'completeActs', ));
    }

    public function submitAccomplished(Request $request, $activityCode){

        $request->validate([
            'partnership_accomplished' => 'required|numeric',
            'partnership_name_accomplished' => 'required|array',
            'trainees_accomplished' => 'required|numeric',

        ]);

        $accomplished = Report::where('activity_code', $activityCode)->firstOrNew();
        if (!$accomplished) {
            return redirect()->back()->with('warning', 'Report not found.');
        } else if ($accomplished->is_updated) {
            return redirect()->back()->with('warning', 'This activity has already been finalized and cannot be updated.');
        }

        $partershipArray = implode(',', $request->input('partnership_name_accomplished'));
        $accomplished->partnership_accomp = $request->input('partnership_accomplished');
        $accomplished->partnership_name = $partershipArray;
        $accomplished->trainees_accomp = $request->input('trainees_accomplished');
        $accomplished->is_updated = true;
        $accomplished->save();

       return redirect()->back()->with('success', 'Updated Successfully!');
    }
    public function update(Request $request, $activityCode)
    {
        $activity = Activity::findOrFail($activityCode);

        $startDate = new \DateTime($request->input('start_update'));
        $endDate = new \DateTime($request->input('end_update'));


        $startQuarter = ceil($startDate->format('n') / 3);
        $endQuarter = ceil($endDate->format('n') / 3);

        $quarterToStore = (string)$startQuarter;

        $activity->activity_name = $request->input('activity_name');
        $activity->collegeCode = $request->input('collegeCode1');
        $activity->proponentId = $request->input('proponentId1');
        $activity->start = $request->input('start_update');
        $activity->end = $request->input('end_update');
        $activity->year = $request->input('year_update');
        $activity->budget = $request->input('budget');
        $activity->quarter = $quarterToStore;

        if ($request->has('proponent_update')) {
            $activity->proponent = implode(',', $request->input('proponent_update'));
        }

        if ($request->has('proponents_update')) {
            $activity->proponents = implode(',', $request->input('proponents_update'));
        }


        $activity->save();


        $report = Report::where('activity_code', $activityCode)->first();
        if ($report) {
            $report->trainees_target = $request->input('trainees_target');
            $report->partnership_target = $request->input('partnership_target');
            $report->save();
        }

        return redirect()->back()->with('success', 'Activity updated successfully!');
    }
}





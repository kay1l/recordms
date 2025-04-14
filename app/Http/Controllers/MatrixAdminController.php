<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use App\Models\Activity;
use App\Models\College;
use App\Models\Program;
use Illuminate\Http\Request;

class MatrixAdminController extends Controller
{
    public function Matrix(){
        $activities = Activity::all();
        $college = College::all();
        return view ('admin.matrix', compact('activities', 'college'));
    }
    public function MatrixResult(Request $request)
    {
        $adminData = Auth::user();
        $year = $request->input('year');
        $collegeCode = $request->input('collegeCode');
        $programId = $request->input('programId');


        $activities = Activity::where('year', $year)
        ->where('collegeCode', $collegeCode)
         ->where('proponentId', $programId)
        ->get();

        if ($activities->isEmpty()) {
            return redirect()->back()->with('warning', 'No activities were found for the selected criteria. Please check your selections and try again.');
        }
        $selectedCollege = College::where('collegeCode', $collegeCode)->first();

        if (!$selectedCollege) {
            return redirect()->back()->with('warning', 'College not found, Please select a college.');
        }
         $selectedProgram = Program::where('programId', $programId)->first();

        return view('admin.matrix', compact('adminData'), [
            'selectedYear' => $year,
            'selectedCollegeName' => $selectedCollege->collegeName,
            'selectedProgramName' => $selectedProgram->programName,
            'activities' => $activities
        ]);
    }
    public function admindownloadFile(Request $request, $filePath)
{
    // Decode the base64 encoded file path
    $decodedFilePath = base64_decode($filePath);

    if (Storage::exists($decodedFilePath)) {
       return response()->file(Storage::path($decodedFilePath));
        // dd($decodedFilePath);
    } else {
        return redirect()->back()->with('warning', 'The file you are trying to access could not be found. Please check the file details and try again.');
    }
}
    public function getActivityProgress(Request $request,$activityCode)
    {

        $activity = Activity::where('activity_code', $activityCode)->first();

        if (!$activity) {
            return response()->json(['error' => 'Activity not found.'], 404);
        }

        $progress = $activity->getProgress();

        return response()->json(['progress' => $progress]);
    }

}

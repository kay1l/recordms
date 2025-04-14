<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;
use App\Models\College;
use App\Models\Activity;
use App\Models\Program;
use Illuminate\Support\Facades\Storage;
use Illuminate\Http\Request;


class MatrixController extends Controller
{
    public function Matrix(){

        $activity = Activity::all();
        $fileType = ['moa', 'proposal', 'attendance', 'evaluation', 'terminal'];
        return view('clerk.matrix', compact('activity', 'fileType'));
    }

    public function matrixResult(Request $request)
{
    $clerkData = Auth::user();
    $year = $request->input('year');
    $collegeCode = $request->input('collegeCode');
     $programId = $request->input('programId'); //ibalik rani para k maam orioque

    $activities = Activity::where('year', $year)
                           ->where('collegeCode', $collegeCode)
                          ->where('proponentId', $programId)  // ibalik rani ka maam oriuque
                           ->get();

      if ($activities->isEmpty()) {
        return redirect()->back()->with('warning', 'No activities were found for the selected criteria. Please check and try again.');

        }
    $selectedCollege = College::where('collegeCode', $collegeCode)->first();
    if (!$selectedCollege) {
        return redirect()->back()->with('warning', 'College not found, Please select a college.');
    }
    $selectedProgram = Program::where('programId', $programId)->first();
    if (!$selectedProgram) {
        return redirect()->back()->with('warning', 'Program not found, Please select a program.');
    }
    //  ibalik rani para ka maam orioque


    $fileTypes = ['moa', 'proposal', 'attendance', 'evaluation', 'terminal'];
    $activitiess = Activity::where('activity_code', $collegeCode)->first();
    return view('clerk.matrix', [
        'clerkData' => $clerkData,
        'fileTypes' => $fileTypes,
        'activitiess' => $activitiess,
        'selectedYear' => $year,
        'selectedCollegeName' => $selectedCollege->collegeName,
         'selectedProgramName' => $selectedProgram->programName, //ibalik rani ka maam oriuque
        'activities' => $activities
    ]);
}
public function downloadFile(Request $request, $filePath)
{

    $decodedFilePath = base64_decode($filePath);

    if (Storage::exists($decodedFilePath)) {

      return response()->file(Storage::path($decodedFilePath));
    } else {

        return redirect()->back()->with('warning', 'The file you are trying to access could not be found. Please check the file details and try again.');

    }
}


public function uploadFileMatrix(Request $request, $activityCode)
{
    $request->validate([
        'activityCode' => 'required|string',
        'file' => 'required|file|mimes:pdf|max:50000',
        'fileType' => 'required|string',
    ]);


    $activity = Activity::where('activity_code', $activityCode)->first();

    if (!$activity) {
        return response()->json(['error' => 'Activity not found.'], 404);
    }

    // Get the uploaded file
    $file = $request->file('file');
    $fileType = $request->input('fileType');
    $fileName = $file->getClientOriginalName();

    $activityName = $activity->activity_name ?? 'unknown_activity';
    $activityName = preg_replace('/[^A-Za-z0-9_\-]/', '_', $activityName);

    $filePath = 'public/uploads/' . $activityName . '/' . $fileName;

    $file->storeAs('public/uploads/' . $activityName, $fileName);

    switch ($fileType) {
        case 'moa':
            $activity->moa_uploaded = $filePath;
            $activity->moa_uploaded_at = now();
            break;
        case 'proposal':
            $activity->proposal_uploaded = $filePath;
            $activity->proposal_uploaded_at = now();
            break;
        case 'terminal':
            $activity->terminal_uploaded = $filePath;
            $activity->terminal_uploaded_at = now();
            break;
        case 'attendance':
            $activity->attendance_uploaded = $filePath;
            $activity->attendance_uploaded_at = now();
            break;
        case 'evaluation':
            $activity->evaluation_uploaded = $filePath;
            $activity->evaluation_uploaded_at = now();
            break;
        default:
            return response()->json(['error' => 'Invalid file type.'], 400);
    }

    // Determine activity progress and update status
    $progress = $activity->getProgress();

    if ($progress == 0) {
        $activity->status = 'For Implementation';
    } elseif ($progress > 0 && $progress < 100) {
        $activity->status = 'Ongoing';
    } elseif ($progress == 100) {
        $activity->status = 'Accomplished';
    }

    // Save the activity with the updated data
    $activity->save();

    // Return the response with file details and activity status
    return response()->json([
        'fileName' => $fileName,
        'progress' => round($progress),
        'status' => $activity->status,
        'filePath' => Storage::url($filePath),
        'updatedAt' => $activity->updated_at->format('Y-m-d'),
        'message' => 'File uploaded successfully!',
    ]);
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

 public function clearFile(Request $request){
    $activityCode = $request->input('activityCode');
    $fileType = $request->input('fileType');

    $activity = Activity::where('activity_code', $activityCode)->first();
    if ($activity) {
        $activity->{$fileType . '_uploaded'} = null;
        $activity->save();

        return response()->json(['success' => true]);
    }
    return response()->json(['success' => false]);
 }
    }





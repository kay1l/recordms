<?php

namespace App\Http\Controllers;
use App\Models\Activity;
use App\Models\College;
use App\Models\Program;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Http\Request;

class UnitHeadMatrixController extends Controller
{
    public function matrix(){
        $activities = Activity::all();
        $college = College::all();
       
        return view ('unithead.matrix', compact('activities', 'college'));
    }
    public function UheadMatrixResult(Request $request, $collegeCode){


        $unitData = Auth::user();
        if ($unitData->collegeCode != $collegeCode) {
            abort(401, 'Unauthorized action.');
        }

        $collegeLogin = Auth::user()->collegeCode;
        $collegeUrl = $request->query('collegeCode');
        if ($collegeUrl != $collegeLogin) {
            abort(401, 'Unauthorized action.');
        }
        
        $year = $request->input('year');
        $collegeCode = $request->input('collegeCode');
        $programId = $request->input('programId');
       

        $activities = Activity::where('year', $year)->where('collegeCode', $collegeCode)
        ->where('proponentId', $programId)
        ->get();
        if ($activities->isEmpty()) {
            return redirect()->back()->with('warning', 'No activities were found for the selected criteria. Please check your selections and try again.');
        }
        $selectedCollege = College::where('collegeCode', $collegeCode)->first();
    
        if (!$selectedCollege ) {
            return redirect()->back()->with('error', 'College not found.');
        }
        $selectedProgram = Program::where('programId', $programId)->first();
        if (!$selectedProgram ) {
            return redirect()->back()->with('error', 'College not found.');
        }
        return view('unithead.matrix', compact('unitData' ), [
            'selectedYear' => $year,
            'selectedCollegeName' => $selectedCollege->collegeName,
            'selectedProgramName' => $selectedProgram->programName,
            'activities' => $activities
        ]);
    }
    public function ActivityProgress(Request $request, $activityCode){
        $activity = Activity::where('activity_code', $activityCode)->first();
    
        if (!$activity) {
            return response()->json(['error' => 'Activity not found.'], 404);
        }
    
        $progress = $activity->getProgress();
    
        return response()->json(['progress' => $progress]);
    }
    public function uheaddownloadFile(Request $request, $filePath)
        {
            // Decode the base64 encoded file path
            $decodedFilePath = base64_decode($filePath);
            
            // Check if the file exists in the storage
            if (Storage::exists($decodedFilePath)) {
                // Return the file as a response for download
                return response()->file(Storage::path($decodedFilePath));
            } else {
                // Handle file not found case
                return redirect()->back()->with('error', 'File not found.');
            }
        }
        public function upload(Request $request, $activityCode)
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
     
            $file = $request->file('file');
            $fileType = $request->input('fileType');
            $fileName = $file->getClientOriginalName();
            $filePath = 'public/uploads/' . $activityCode . '/' . $fileName;
            $file->storeAs('public/uploads/' . $activityCode, $fileName);
    
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
    
            $progress = $activity->getProgress();
    
         if ($progress == 0) {
            $activity->status = 'For Implementation';
        } elseif ($progress >= 0 && $progress < 100) {
            $activity->status = 'Ongoing';
        } elseif ($progress == 100) {
            $activity->status = 'Accomplished';
        }
    
        $activity->save();
    
    
        return response()->json([
            'fileName' => $fileName,
            'progress' => round($progress), 
            'status' => $activity->status,
            'filePath' => Storage::url($filePath),
            'updatedAt' => $activity->updated_at->format('Y-m-d'),
            'success' => 'File Uploaded Successful',
        ]);
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

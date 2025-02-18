<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Storage;
use App\Models\Activity;
use setasign\Fpdi\Tcpdf\Fpdi;
use Illuminate\Http\Request;

class DownloadUheadController extends Controller
{
    public function downloadPdf($activityCode,  ){
        $activity = Activity::where('activity_code', $activityCode)->firstOrFail();
        //  $actName = Activity::where('activity_name',$activityName)->firstOrNew();
    //    dd($actName);
        $files = [
            'moa'        => $activity->moa_uploaded ? Storage::path($activity->moa_uploaded) : null,
            'proposal'   => $activity->proposal_uploaded ? Storage::path($activity->proposal_uploaded) : null,
            'terminal'   => $activity->terminal_uploaded ? Storage::path($activity->terminal_uploaded) : null,
            'attendance' => $activity->attendance_uploaded ? Storage::path($activity->attendance_uploaded) : null,
            'evaluation' => $activity->evaluation_uploaded ? Storage::path($activity->evaluation_uploaded) : null,
        ];

       $allFilesAreNull = true;
       foreach($files as $file){
           if($file !== null && file_exists($file)){
            $allFilesAreNull = false;
            break;
           }
       }
       if ($allFilesAreNull) {
        return redirect()->back()->with('warning', 'The file you are trying to access could not be found. Please check the file details and try again.');
    }

        $pdf = new Fpdi();
        $pdf->SetAutoPageBreak(true, 0);

        foreach($files as $file){
            if($file && file_exists($file)){
                $pageCount = $pdf->setSourceFile($file);
                for($pageNo = 1; $pageNo <= $pageCount; $pageNo++){
                    $tplId = $pdf->importPage($pageNo);
                    $pdf->addPage('P', 'LEGAL');
                    $pdf->useTemplate($tplId);
                }
            }
        }
        // $fileName = $actName. '-activity-files.pdf';
        return response($pdf->Output($activityCode. '-activity-files.pdf', 'I'), 200)
        ->header('Content-Type', 'application/pdf');
    }
}

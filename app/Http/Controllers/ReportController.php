<?php

namespace App\Http\Controllers;
use App\Models\Activity;
use App\Models\College;
use Illuminate\Support\Facades\Auth;
use App\Models\Report;
use Illuminate\Http\Request;
use Carbon\Carbon;
use Barryvdh\DomPDF\Facade\Pdf;
class ReportController extends Controller
{
    public function generateReport(Request $request, $year, ){
      
    

    $collegeCode = auth()->user()->collegeCode;
    $userCollege = College::where('collegeCode', $collegeCode)->first();
    
    $activityDates = Activity::
    where('year', $year)
    ->firstOrNew();

    $Colleges = College::where('collegeCode', $collegeCode)->get();
    
    $userName = Auth::user();

    $targetPartnership = Report::join('activities', 'reports.activity_code', '=', 'activities.activity_code')
    ->join('colleges', 'reports.collegeCode', '=', 'colleges.collegeCode')
    ->where('activities.year', $year)
    ->where('colleges.collegeCode', $collegeCode)
    ->sum('partnership_target');

    $targetTrainess = Report::join('activities', 'reports.activity_code','=','activities.activity_code')
    ->join('colleges', 'reports.collegeCode', '=', 'colleges.collegeCode')
    ->where('activities.year', $year)
    ->where('colleges.collegeCode', $collegeCode)
    ->sum('trainees_target');

    $activities = Activity::where('year', $year)
    ->where('collegeCode', $collegeCode)
    ->get();

    $accomplishedTrainess = Report::whereIn('activity_code', $activities->pluck('activity_code'))
    ->join('colleges', 'reports.collegeCode', '=', 'colleges.collegeCode')
    ->where('is_updated', true)
    ->where('colleges.collegeCode', $collegeCode)
    ->sum('trainees_accomp');

    $accomplishedPartnership = Report::whereIn('activity_code', $activities->pluck('activity_code'))
    ->join('colleges', 'reports.collegeCode', '=', 'colleges.collegeCode')
                                 ->where('is_updated', true)
                                 ->where('colleges.collegeCode', $collegeCode)
                                 ->sum('partnership_accomp');

    $count = Activity::where('year', $year)
    ->where('collegeCode', $collegeCode)
    ->count(); 

    $accomplishedActivities = Activity::join('colleges', 'activities.collegeCode', '=', 'colleges.collegeCode')
    ->where('activities.status', 'Accomplished')
                                  ->where('year', $year)
                                  ->where('colleges.collegeCode', $collegeCode)
                                  ->count();  

                                  $partnershipNames = Report::join('activities', 'reports.activity_code', '=', 'activities.activity_code')
                                  ->join('colleges', 'reports.collegeCode', '=', 'colleges.collegeCode')
                                  ->where('is_updated', true)
                                  ->where('activities.year', $year)
                                  ->where('colleges.collegeCode', $collegeCode)
                                  ->pluck('partnership_name')
                                  ->map(function ($name) {
                                      // Replace commas with line breaks for display
                                      return str_replace(',', '<br>', $name);
                                  })
                                  ->implode('<br>'); 
                              
                              

    $dates = Activity::where('year', $year)->first();
    $college = College::all();
   
   $accomplishedPercentage = Report::join('activities', 'reports.activity_code', '=', 'activities.activity_code')
   ->join('colleges', 'reports.collegeCode', '=', 'colleges.collegeCode')
   ->where('is_updated', true)
   ->where('year', $year)
   ->where('colleges.collegeCode', $collegeCode)
   ->pluck('percentage_accomp')
   ->first();
   


    $pdf = Pdf::loadView('unithead.accomplishment-report',compact(
        'userCollege',
        'userName',
        'activities',
        'targetPartnership',
        'targetTrainess',
        'count',
        'dates',
        'accomplishedTrainess',
        'accomplishedPartnership',
        'accomplishedActivities',
        'partnershipNames',
        // 'partnershipNamesArray',
        'Colleges',
        'college',
        'accomplishedPercentage',
       'activityDates',
       
        ) , [

        'selectedCollegeName' => $userCollege->collegeCode,
        'selectedUserName' => $userName->name,
        
        
    ]);
   
    return $pdf->stream('accomplishment-report.pdf');
    }
}

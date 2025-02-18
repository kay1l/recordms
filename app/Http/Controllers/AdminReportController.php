<?php

namespace App\Http\Controllers;

use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Http\Request;
use App\Models\College;
use App\Models\Activity;
use App\Models\Report;
use App\Models\Program;
use Illuminate\Support\Facades\Auth;

class AdminReportController extends Controller
{
    public function generate(Request $request,$year)
    {
       
        $userName = Auth::user();
        $colleges = College::withCount('activity')->get();
        $activities = Activity::select('activity_code', 'quarter', 'activity_name', 'collegeCode', 'year', 'status','proponent','proponentId')->get();

        $conductedCount = Activity::select('collegeCode', 'status')
        ->where('status', 'Accomplished')
        ->where('year' , $year)
        ->get();

        $activity_names = Activity::join('colleges', 'activities.collegeCode', '=', 'colleges.collegeCode')
            ->select('activities.activity_name', 'activities.collegeCode')
            ->get();

       
        $activity_department = Activity::
            select('activities.collegeCode', 'proponentId')
            ->get();

      
        $activity_quarters = Activity::select('collegeCode', 'quarter')->get();
        $activity_proponents = Activity::select('collegeCode','proponent')->get();

    
        $pdf = Pdf::loadView('admin.summary_report', compact('colleges', 'conductedCount', 'activity_names', 'activity_department', 'activities', 'activity_quarters','year'),[
            'selectedUserName' => $userName->name,
            'selectedYear' => $year,
            
        ])->setPaper('legal', 'landscape');   
        return $pdf->stream('summary_report.pdf');
    }
}

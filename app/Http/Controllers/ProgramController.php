<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Models\College;
use App\Models\Program;

class ProgramController extends Controller
{
    public function ProgramManage()
    {
        $colleges = College::where('status', 'Active')->get();
        $programs = Program::all();
        $adminData = Auth::user();
        return view('admin.program', compact('colleges', 'programs', 'adminData'));
    }

    public function ProgramStore(Request $request)
    {
        if (!$request->filled('programName') ) {
            return redirect()->back()->with('danger', ' The Department Name field is required!');
            
        }else if ( !$request->filled('programName')) {
            return redirect()->back()->with('danger', ' The College Name field is required!');
        }
        $request->validate([
            'programName' => 'required|string|max:255',
            'collegeCode' => 'required|exists:colleges,collegeCode',
        ], [
            'programName.required' => 'The Program Name field is required!',
            'collegeCode.required' => 'The college Code field is required!',
        ]);
        $existingProgram = Program::where('programName', $request->input('programName'))->first();

            if ($existingProgram) {
                return redirect()->back()->with('warning', ' A Department with the same name already exists!'); 
            }

        $program = new Program();
        $program->programName = $request->input('programName');
        $program->collegeCode = $request->input('collegeCode');
        $program->status = 'Active'; 
       if ( $program->save()) {
         
           return redirect()->back()->with('success', 'Program Successfully Added');
       }else{
        return redirect()->back()->with('warning', 'Something is wrong.Please check!');
       }

   
    }
public function update(Request $request, $programId){
    $program = Program::findOrNew($programId);
    $program->status = ($program->status == 'Active') ? 'Inactive' : 'Active';
    $program->save();
    
    return response()->json([
        'success' => true,
        'new_status' => $program->status,
        ]);
}
}

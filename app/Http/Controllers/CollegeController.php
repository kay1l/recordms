<?php

namespace App\Http\Controllers;
use App\Models\College;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class CollegeController extends Controller
{
    public function CollegeManange(Request $request){
        $colleges = College::all(); 
        $adminData = Auth::user();
        $activeCollege = College::where('status', 'Active')->count();
        $inactiveCollege = College::where('status', 'Inactive')->count();
        return view('admin.college_manage', compact('colleges','adminData','activeCollege','inactiveCollege'));
    }
    public function CollegeStore(Request $request)
    {
        if (!$request->filled('collegeCode') ) {
            return redirect()->back()->with('danger', ' The College Code field is required!');
            
        }else if ( !$request->filled('collegeName')) {
            return redirect()->back()->with('danger', ' The College Name field is required!');
          
        }
        
        $request->validate([
            'collegeCode' => 'required|string',
            'collegeName' => 'required|string|min:5',
        ], [
            'collegeCode.required' => 'The College Code field is required!',
            'collegeName.required' => 'The College Name field is required!',
            'collegeName.min' => 'The College Name must be at least 5 characters long!',
        ]);

        $existingCollege = College::where('collegeCode', $request->input('collegeCode'))
            ->orWhere('collegeName', $request->input('collegeName'))
            ->first();
           
        if ($existingCollege) {
            return redirect()->back()->with('danger', ' A College with the same code or name already exists!');
            return redirect()->back();
        }

        $newCollege = new College();
        $newCollege->collegeCode = $request->input('collegeCode');
        $newCollege->collegeName = $request->input('collegeName');
        $newCollege->save();

        return redirect()->back()->with('success', 'New College Added Successfully');
    }
    public function update(Request $request, $collegeCode)
    {
        $college = College::where('collegeCode', $collegeCode)->firstOrFail();
        $college->status = ($college->status == 'Active') ? 'Inactive' : 'Active';
        $college->save();
    
        return response()->json([
            'success' => true,
            'new_status' => $college->status,
        ]);
    }
}

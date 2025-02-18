<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;

class UnitHeadController extends Controller
{
    public function unitheadDashboard(){
        $id = Auth::user()->id;
        $unitData = User::find($id);
        return view ('unithead.unithead_dashboard', compact('unitData'));
    }
    public function UnitheadProfile(){
        
        $id = Auth::user()->id;
        $unitData = User::find($id);
        
        return view ('unithead.unithead_profile', compact('unitData'));
    }
    public function UnitheadProfileUpdate(Request $request){
        $id = Auth::user()->id;
        $unitData = User::find($id);

        if (!$request->filled('name') ) {
            toastr()->error('The name field is required!', 'Error');
            return redirect()->back();
        }else if ( !$request->filled('email')) {
            toastr()->error('The email field is required!', 'Error');
        }

        $request->validate([
            'name' => 'required|string',
            'email' => 'required|email',
        ]);
            $unitData->name = $request->name;
            $unitData->email = $request->email;
            
        if ($request->hasFile('photo')) {
            $file = $request->file('photo');
            $filename = date('YmdHi').$file->getClientOriginalName();
            $file->move(public_path('upload/admin_images'),$filename);
            $unitData->photo = $filename;
        }

        $unitData->save();
        return redirect()->back()->with('success', 'Information Updated Successfully!');
    }
    public function UnitheadPasswordUpdate(Request $request){
        $id = Auth::user()->id;
        $data = User::find($id);
    
        // Check if the old password matches
        if (!Hash::check($request->oldpassword, auth::user()->password)) {
            return redirect()->back()->with('danger', 'The old password is incorrect!');
        }
        // Validate the request
        $request->validate([
            'oldpassword' => 'required',
            'newpassword' => 'required'
        ]);
        // Check if the new password is different from the old password
        if ($request->oldpassword === $request->newpassword) {
            return redirect()->back()->with('danger', 'New password must be different from the old password!');
        }
    
        // Update the password
        Auth::user()->update([
            'password' => bcrypt($request->newpassword)
        ]);
    
        // Display success message
        return redirect()->back()->with('success', 'Password Changed Successfully!');
    }
}

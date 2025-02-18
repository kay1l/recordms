<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use App\Models\Activity;
use Carbon\Carbon;
use DB;
use App\Models\Timeline;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;


class ClerkController extends Controller
{
    public function ClerkLogin(Request $request){
        $request->validate([
            'email'=>'required|email',
            'password' => 'required',
        ]);
        if(Auth::attempt(['email' => $request->email,'password' => $request->password])){
            return redirect('/clerk/dashboard');
        }else{
             return redirect('/login-page');
        }
    }
    public function ClerkDashboard(){
        $id = Auth::user()->id;
        $clerkData = User::find($id);
        $activities = Activity::select('activity_code', 'activity_name', 'moa_uploaded_at', 'proposal_uploaded_at', 'attendance_uploaded_at', 'evaluation_uploaded_at', 'terminal_uploaded_at')
        ->orderBy('created_at', 'desc')
        ->get()
        ->map(function ($activity) {
            // Convert timestamps to Carbon instances
            $activity->moa_uploaded_at = $activity->moa_uploaded_at ? Carbon::parse($activity->moa_uploaded_at) : null;
            $activity->proposal_uploaded_at = $activity->proposal_uploaded_at ? Carbon::parse($activity->proposal_uploaded_at) : null;
            $activity->attendance_uploaded_at = $activity->attendance_uploaded_at ? Carbon::parse($activity->attendance_uploaded_at) : null;
            $activity->evaluation_uploaded_at = $activity->evaluation_uploaded_at ? Carbon::parse($activity->evaluation_uploaded_at) : null;
            $activity->terminal_uploaded_at = $activity->terminal_uploaded_at ? Carbon::parse($activity->terminal_uploaded_at) : null;
            return $activity;
        });
        return view('clerk.clerk_dashboard', compact('clerkData','activities'));
    }
    public function ClerkLogout(Request $request){
        Auth::guard('web')->logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect('clerk.login_clerk');
    }
    public function ClerkProfile(){

        $id = Auth::user()->id;
        $clerkData = User::find($id);
        return view ('clerk.clerk_profile', compact('clerkData'));
    }
    public function ClerkProfileUpdate(Request $request){
        $id = Auth::user()->id;
        $clerkData = User::find($id);

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
            $clerkData->name = $request->name;
            $clerkData->email = $request->email;

        if ($request->hasFile('photo')) {
            $file = $request->file('photo');
            $filename = date('YmdHi').$file->getClientOriginalName();
            $file->move(public_path('upload/admin_images'),$filename);
            $clerkData->photo = $filename;
        }

        $clerkData->save();
        return redirect()->back()->with('success', 'Information Updated Successfully!');
    }
    public function ClerkPasswordUpdate(Request $request    ){
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




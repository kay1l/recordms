<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;
use App\Models\College;
use App\Models\Activity;
use DB;
use App\Mail\RoleChanged;
use Illuminate\Support\Facades\Mail;

class AdminController extends Controller
{
    public function AdminDashboard(){
        $adminData = Auth::user();
        $activityLabels = Activity::select(DB::raw("DATE_FORMAT(created_at, '%Y-%m') as month"))
        ->groupBy('month')
        ->pluck('month');

    $activityData = Activity::select(DB::raw("COUNT(*) as count"))
        ->groupBy(DB::raw("DATE_FORMAT(created_at, '%Y-%m')"))
        ->pluck('count');
        return view ('admin.admin_dashboard', compact('adminData', 'activityLabels','activityData'));
    }
    public function AdminProfileView(){

        $id = Auth::user()->id;
        $admindata = User::find($id);  
        $adminData = Auth::user();
        $college = College::all();
        return view('admin.admin_profile', compact('admindata', 'adminData', 'college'));

    }
    public function AdminProfileUpdate(Request $request){
        $id = Auth::user()->id;
        $data = User::find($id);

        if (!$request->filled('name') ) {
            toastr()->warning('The name field is required!', 'warning');
            return redirect()->back();
        }else if ( !$request->filled('email')) {
            toastr()->warning('The email field is required!', 'warning');
        }

        $request->validate([
            'name' => 'required|string',
            'email' => 'required|email',
        ]);
            $data->name = $request->name;
            $data->email = $request->email;
           
    

        if ($request->hasFile('photo')) {
            $file = $request->file('photo');
            $filename = date('YmdHi').$file->getClientOriginalName();
            $file->move(public_path('upload/admin_images'),$filename);
            $data->photo = $filename;
        }

        $data->save();
        return redirect()->back()->with('success','Data updated successfully!');
    }
    
    public function AdminPasswordUpdate(Request $request){
        $id = Auth::user()->id;
        $data = User::find($id);
    
        // Check if the old password matches
        if (!Hash::check($request->oldpassword, auth::user()->password)) {
            toastr()->error('The old password is incorrect', 'Error');
            return back();
        }
        // Validate the request
        $request->validate([
            'oldpassword' => 'required',
            'newpassword' => 'required'
        ]);
        // Check if the new password is different from the old password
        if ($request->oldpassword === $request->newpassword) {
            return redirect()->back()->with('warning', 'New password must be different from the old password');
           
        }
    
        // Update the password
        Auth::user()->update([
            'password' => bcrypt($request->newpassword)
        ]);
    
        // Display success message
        // toastr()->success('Password updated successfully!', 'Success!');
        return redirect()->back()->with('success', 'Password updated successfully!');
    }
   
   
    
    public function UserManagement(){
        $adminData = Auth::user();
        $college = College::all();
        $users = User::where('role', '!=', 'Admin')->get();
        $uheadRole = User::where('role', 'UnitHead')->count();
        $clerkRole = User::where('role', 'Clerk')->count();
        $userRole = User::where('role', 'User')->count();
        return view('admin.user_management', compact('users', 'adminData', 'college','uheadRole','clerkRole','userRole'));
    }
    public function UserView(Request $request, $id, $user){
        $user = User::findorFail($id);
        $user->save();
        return view('admin.user_management', compact('user'));
    }
    public function ChangeUserRole(Request $request){

        $newRole = $request->input('role');
        $userId = $request->input('id');
        $user = User::findOrFail($userId);

        $user->role = $newRole;
        $user->save();

        Mail::to($user->email)->send(new RoleChanged($user));
       
        return redirect()->back()->with('success', 'The role has been successfully updated. A confirmation email has been sent.');

    }
   
  public function change_permission(){
    $id = Auth::user()->id;
    $adminData = User::find($id); 
    $adminData = Auth::user();
      return view ('admin.message', compact('adminData'));
  }
}

<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;
use App\Models\College;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;


class IndexController extends Controller
{
    public function IndexLogout(Request $request){
        
        Auth::guard('web')->logout();  
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect('/login')->with('success','Logout Success!');
    
    }
    public function Login(){
        $userData = User::all();
        return view ('/auth/login', compact('userData'));
    }
    public function IndexLogin(Request $request){
        
        $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);
    
        if (Auth::attempt(['email' => $request->email, 'password' => $request->password])) {
            $user = Auth::user();

            if ($user->role == 'Admin') {
                return redirect('/admin/dashboard')->with('success',  $user->role . ' Login Success!');
            } elseif ($user->role == 'Clerk') {
                return redirect('/clerk/dashboard')->with('success', $user->role . ' Login Success!');
            } elseif ($user->role == 'UnitHead') {
                return redirect('/unithead/dashboard')->with('success',  $user->role . ' Login Success!');
            } elseif($user->role == 'User'){
                return redirect()->back()
                ->with('info', 'Please wait for the Director to update your access privileges.You will receive an email verification once the update is done.')
                ->with('warning', 'Login unsuccessful. You dont have access previlige!');
               
            }else {
                
                return redirect('/login/page')->with('danger' , ' Login Fail');
            }
        } else {
            return redirect()->back()->with('warning', 'The provided credentials do not match our records.' );
          
        }
    }
   public function Register() {
       $colleges = College::where('status','Active')->get();
       $userData = User::all();
    return view ('/auth/register', compact('colleges','userData'));
    }


    public function RegisterUser(Request $request){
       
        $request->validate([
            'name' => 'required|string|min:3|max:255',
            'email' => 'required|string|email|max:255|unique:users,email',
            'password' => 'required|string|min:6|confirmed|',
            'college' => 'nullable|string|exists:colleges,collegeCode',
            // 'password.regex' => 'The password must contain at least one lowercase letter, one uppercase letter, one digit, and one special character.',
        ]);
        // regex:/[a-z]/|regex:/[A-Z]/|regex:/[0-9]/|regex:/[@$!%*?&#]/

        $newAcc = new User();
        $newAcc->name = $request->input('name');
        $newAcc->email = $request->input('email');
        $newAcc->password = Hash::make($request->input('password'));
        $newAcc->collegeCode = $request->input('college');

        $newAcc->save();


        return redirect()->route('login')->with('success', 'Registration successful. Your account is pending verification by the director. You will receive an email notification once the verification process is complete.');

    }
    public function IndexDashboard(){
        $userData = User::all();
        return view('user.index', compact('userData'));
    }
    public function ForgotPassword(){
        return view ('auth.forgot-password');
    }

    
    }


<?php

namespace App\Http\Controllers;
use App\Mail\RoleChanged;
use Illuminate\Support\Facades\Mail;
use Illuminate\Http\Request;

class updateRole extends Controller
{
    public function rolechange(Request $request, $id){
        $user =  User::findOrNew($id);
        $user->role = $request->input('role');
    $user->save();
    }
}

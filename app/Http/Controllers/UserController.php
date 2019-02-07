<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\User;

class UserController extends Controller
{
    public function postSignUp(Request $request)
    {
        $name = $request['name'];
        $email = $request['email'];
        $password = bcrypt($request['password']);
        
        $user = new User();
        $user->setAttribute('name', $name);
        $user->setAttribute('email',$email);
        $user->setAttribute('password', $password);
        
        $user->save();
        
        return redirect()->back();
    }
    
    public function postSignIn(Request $request)
    {
        
    }
}

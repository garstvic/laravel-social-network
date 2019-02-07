<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

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
        
        Auth::login($user);
        
        return redirect()->route('dashboard');
    }
    
    public function postSignIn(Request $request)
    {
        if (Auth::attempt(['email' => $request->input('email'), 'password' => $request->input('password')]))
        {
            return redirect()->route('dashboard');
        }
        
        return redirect()->back();
    }
    
    public function getDashboard()
    {
        return view('dashboard');
    }
}

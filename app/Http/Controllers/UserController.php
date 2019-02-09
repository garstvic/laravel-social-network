<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;
use Illuminate\Http\Response;

use App\Http\Requests;
use App\User;

class UserController extends Controller
{
    public function postSignUp(Request $request)
    {
        $this->validate($request, [
            'email' => 'required|email|unique:users',
            'name' => 'required|max:120',
            'password' => 'required|min:8'
        ]);
        
        $name = $request->input('name');
        $email = $request->input('email');
        $password = bcrypt($request->input('password'));
        
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
        $this->validate($request, [
            'email' => 'required|email',
            'password' => 'required|min:8'
        ]);
        
        if (Auth::attempt(['email' => $request->input('email'), 'password' => $request->input('password')]))
        {
            return redirect()->route('dashboard');
        }
        
        return redirect()->back();
    }
    
    public function getLogout()
    {
        Auth::logout();
        
        return redirect()->route('home');
    }
    
    public function getAccount()
    {
        return view('account', ['user' => Auth::user()]);
    }
    
    public function postUpdateAccount(Request $request)
    {
        $this->validate($request, [
            'name' => 'required|min:4|max:120' 
        ]);
        
        $user = Auth::user();
        
        $user->setAttribute('name', $request->input('name'));
        $user->update();
        
        $file = $request->file('image');
        
        if ($file) 
        {
            $filename = $request->input('name').'-'.$user->getAttribute('id').'.jpg';            
            
            Storage::disk('local')->put($filename, File::get($file));
        }
        
        return redirect()->route('user.account');
    }
    
    public function getUserImage($filename)
    {
        $file = Storage::disk('local')->get($filename);
        
        return new Response($file, 200);
    }
}

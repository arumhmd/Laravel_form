<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Contracts\Session\Session;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;


class AuthManager extends Controller
{
    function login() {
        return view('login');
    }

    function register() {
        return view('register');
    }

    
    function loginpost(Request $request) {
       $request->validate([
        'email'=>'required',
        'password'=>'required'
       ]);

       $credentials=$request->only(['email','password']);
       if(Auth::attempt($credentials)){

            return redirect()->route('home'); 
        } 

        else {
            
            return redirect(route(name:'login'))->with("errors" , "Invalid credentials");
       }

    }

    function registerpost(Request $request) {
        $request->validate([
        'name'=>'required',
        'email'=>'required',
        'password'=>'required'
        ]);
 
        $data['name'] = $request->name;
        $data['email'] = $request->email;
        $data['password'] = Hash::make($request->password);
        $user = User::create($data);
        if(!$user){
            return redirect(route(name:'register'))->with("errors" , "Invalid credentials");
        }
        return redirect(route(name:'login'))->with("Success" , "Registration Success, Login to Access");
    }

    function logout(){
        \Illuminate\Support\Facades\Session::flush();
        Auth::logout();
        return redirect(route(name:'login'));
    }
     }


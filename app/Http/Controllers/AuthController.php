<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


class AuthController extends Controller
{
    public function register(){
        return view('auth.register');
    }
    public function login(){
        return view('auth.login');
    }
    
 
    public function handleregister(Request $request){
        $request->validate([
            'name'=>'required|min:2|max:30',
            'password'=>'required|min:8|max:30|unique:users',
            'email'=>'email'
        ]);
        $data=User::create([
            'name'=>$request->name,
            'password'=>$request->password,
            'email'=>$request->email
        ]);
        Auth::login($data);
        return redirect()->route('home');
    }


    public function handlelogin(Request $request){
       
        $is_login=Auth::attempt(['email'=>$request->email,'password'=>$request->password]);
        

        if(! $is_login){
            return back();
        }
        
        // if(Auth::user()->is_admin==0){
        //     return redirect()->route('index');
        // }

        // if(Auth::user()->is_admin==1){
        //     return redirect()->route('employees.index');
        // }
    }

    public function logout(){
        Auth::logout();
        return redirect()->route('login');
    }
}

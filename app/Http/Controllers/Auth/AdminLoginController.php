<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminLoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    public function __construct()
    {
        $this->middleware('guest:admin');// for people who loging not as admin ->redirect them to guest login or logincontroller.php
    }
    public function showLoginForm() 
    {
        return view('auth.admin-login');// redirect admin user to auth\admin-login.blade.php
    }

    public function login(Request $request) 
    {
        //Validate the form data
        $this->validate($request, [
            'email' => 'required|email',
            'password'=>'required|min:6'
        ]);

        //Attempt to log the user in
        if (Auth::guard('admin')->attempt(['email'=>$request->email, 'password'=>$request->password], $request->remember)) 
            // if not specify guard('admin'), laravel will using the default ones and load the web->user normal function rather than web->admin.
            //attempt function of Laravel 5.4 or above -> automatically hashing the password into the database so we dont need to manually hashing the password again, if we do, it means that we double hashing them => getting the result of unmatching password with database and never authenticating.
        {

            //If successful -> redirect to location
            return redirect()->intended(route('admin.dashboard'));// 'intended' is when people already login before and at certain page, when they were kicked out and need to relogin again , laravel will load the previous location for user.


        }
        
        

        //If unsuccessful -> redirect to login form
            return redirect()->back()->withInput($request->only('email', 'remember'));
        
    }
    
}

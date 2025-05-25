<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Session;

class AuthController extends Controller
{
    public function login(){
        return view('Auth.login');
    }

    public function register(){
        return view('Auth.register');
    }

    public function twoFactor(){
        return view('Auth.twoFactor');
    }

    public function enter2fa(){
        return view('Auth.enterTwoFactor');
    }

    public function verify2fa(){
        return view('Auth.verify2fa');
    }

    // public function confirm2fa(){
    //     return view('auth.confirmTwoFactor');
    // }

    public function otp(){
        return view('Auth.otp');
    }

    public function forgotPassword(){
        return view('Auth.forgotPass');
    }

    public function resetPassword(){
        return view('Auth.resetPass');
    }

    public function adminIndex($id)
    {
        $user = Session::get('user');
        return view('Admin.index', ['account' => $user]);
    }

    public function studentIndex($id)
    {
        $user = Session::get('user');
        return view('students.index', ['account' => $user]);
    }
}
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

    public function authenticate(Request $request)
    {
        $login = $request->input('login');
        $password = $request->input('password');
        
        $response = Http::get(env('API_URL') . '/login', [
            'login' => $login,
            'password' => $password
        ]);

        if ($response->successful()) {
            $user = $response->json();
            Session::put('user', $user);
            
            if ($user['user_type'] === 'admin') {
                return redirect()->route('admin.index', ['id' => $user['id']]);
            } elseif (in_array($user['user_type'], ['free', 'subscriber'])) {
                return redirect()->route('students.index', ['id' => $user['id']]);
            }
        }

        return back()->withErrors([
            'login' => 'Invalid credentials or server error.',
        ]);
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

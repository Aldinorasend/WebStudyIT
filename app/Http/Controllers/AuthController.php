<?php

namespace App\Http\Controllers;

use App\Models\Account;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\ValidationException;
use Illuminate\Http\Request;

class AuthController extends Controller{

public function login(Request $request)
{
    $credentials = $request->validate([
        'email' => 'required|email',
        'password' => 'required',
    ]);

    if (Auth::attempt($credentials, $request->remember)) {
        return redirect()->intended('dashboard');
    }

    throw ValidationException::withMessages([
        'email' => 'The provided credentials do not match our records.',
    ]);
}

public function register(Request $request)
{
    $validated = $request->validate([
        'email' => 'required|string|email|max:255|unique:accounts',
        'password' => 'required|string|confirmed|min:8',
    ]);

    $account = Account::create([
        'email' => $validated['email'],
        'password' => $validated['password'],
    ]);

    Auth::login($account);

    return redirect('dashboard');
}}

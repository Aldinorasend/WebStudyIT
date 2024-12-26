@extends('layouts.auth')

@section('content')
<div class="login-container">
    <h1>Login to StudyIT</h1>
    <h5>Please Enter Your Information Below</h5>
    
    @if (session('error'))
        <div class="alert alert-danger">
            {{ session('error') }}
        </div>
    @endif

    <form method="POST" action="{{ route('login') }}">
        @csrf
        <div class="forms">
            <div>
                <label for="email">Email</label>
                <input type="email" id="email" name="email" value="{{ old('email') }}" required>
            </div>
            <div class="password-container">
                <label for="password">Password</label>
                <input type="password" id="password" name="password" required>
            </div>
        </div>
        <div class="options">
            <input type="checkbox" id="remember" name="remember">
            <label for="remember">Remember Me</label>
            <a href="{{ route('password.request') }}">Forgot Password?</a>
        </div>
        <div class="button-container">
            <button type="submit" class="login-button">Login</button>
        </div>
    </form>
</div>
@endsection

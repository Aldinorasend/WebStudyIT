@extends('layouts.auth')

@section('content')
<div class="register-container">
    <h1>Create Your StudyIT Account</h1>
    <div class="signin-prompt">
        <h3>Already have a StudyIT Account?</h3>
        <a href="{{ route('login') }}">Sign in</a>
    </div>
    
    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form method="POST" action="{{ route('register') }}">
        @csrf
        <div class="register-forms">
            <div>
                <label for="name">Name</label>
                <input type="text" id="name" name="name" value="{{ old('name') }}" required>
            </div>
            <div>
                <label for="email">Email</label>
                <input type="email" id="email" name="email" value="{{ old('email') }}" required>
            </div>
            <div>
                <label for="password">Password</label>
                <input type="password" id="password" name="password" minlength="8" maxlength="20" required>
            </div>
            <div>
                <label for="password_confirmation">Confirm Password</label>
                <input type="password" id="password_confirmation" name="password_confirmation" minlength="8" maxlength="20" required>
                <h5>Password Must At Least Contain 8 Characters</h5>
            </div>
            <div class="button-container">
                <button type="submit" class="register-button">Sign Up</button>
            </div>
        </div>
    </form>
</div>
@endsection

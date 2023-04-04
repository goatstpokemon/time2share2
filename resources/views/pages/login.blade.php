@extends('layout')
@section('assests')
<link rel="stylesheet" href="{{ asset('css/login-page.css') }}">
@endsection

<div class="container">

    <div class="card">

        <div class="title">
            Log In
        </div>
       
        <form method="POST" action='/login'>
            @csrf

            <div class="form-group">
                <label for="email">Email</label>
                <input id="email" type="email" name="email" value="{{ old('email') }}" required autofocus>
            </div>

            <div class="form-group">
                <label for="password">Password</label>
                <input id="password" type="password" name="password" required>
            </div>

            <button type="submit">Log In</button>

        </form>

        

        <div class="register-link">
            Don't have an account? <a href="/register">Sign up</a>
        </div>

    </div>

</div>
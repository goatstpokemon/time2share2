@extends('layout')
@section('assets')
<link rel="stylesheet" href="{{ asset('css/login-page.css') }}">
@endsection

@section('content')
<div class="container">

    <div class="card">

        <div class="title">
            Account aanmaken
        </div>
       
        <form method="POST" action='/register'>
            @csrf

            <div class="form-group">
                <label for="name">Naam</label>
                <input id="name" type="text" name="name"  required>
            </div>
            <div class="form-group">
                <label for="email">Email</label>
                <input id="email" type="email" name="email" value="{{ old('email') }}" required autofocus>
            </div>
            <button type="submit">Maak account aan</button>

        </form>

        

        <div class="register-link">
            Al een account? Log <a href="/login">hier</a> in
        </div>

    </div>

</div>
@endsection
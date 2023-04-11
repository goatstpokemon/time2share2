@extends('layout')
@section('assets')
<link rel="stylesheet" href="{{ asset('css/create-product-page.css') }}">
<link rel="stylesheet" href="{{ asset('css/login-page.css') }}">
@endsection

@section('content')
<div class="container">

    <div class="card">

        <div class="title">
            Account Bijwerken
        </div>
       
        <form action='/users/{{$user->id}}' method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')

            <div class="form-group">
                <label for="name">Naam</label>
                <input id="name" type="text" name="name" value={{$user->name}}  required>
            </div>
            <div class="form-group">
                <label for="email">Email</label>
                <input id="email" type="email" name="email" value="{{$user->email }}" required autofocus>
            </div>
             <label for="photo"><h3>Foto uploaden</h3></label>
                <img src="{{$user->profile_image}}" alt="{{ $user->name }}" width="200px" height="200px" class="sm-product-img">
                <label class="custom-file-upload">    
                <input type="file" class="form-control-file" id="photos" name="photo"  accept="image/*"/>
                Een ander photo toevoegen
                </label>
            <button type="submit">Save</button>

        </form>

        

        

    </div>

</div>
@endsection
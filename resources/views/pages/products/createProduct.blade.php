@extends('layout')
@section('assets')
<link rel="stylesheet" href="{{ asset('css/create-product-page.css') }}">
@endsection

@section('content')
<section class="m-10per">
<form action="/products/create" method="POST" enctype="multipart/form-data">
    @csrf
    <h1 class="text-center">Product aanmaken</h1>
    <label for="name"><h3>Product naam</h3></label>
    <input type="text" name="name" id="name">
    <label for="description"><h3>Product beschrijving</h3></label>
    <textarea name="description" id="description"></textarea>   
    <label for="photo"><h3>Foto uploaden</h3></label>
    <label class="custom-file-upload">
    <input type="file" class="form-control-file" id="photos" name="photo" accept="image/*"/>
    Voeg een foto toe
    </label>

    <button type="submit">Save</button>
</form>
</section>

@endsection


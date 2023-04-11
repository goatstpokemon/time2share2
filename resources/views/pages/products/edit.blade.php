@extends('layout')
@section('assets')
<link rel="stylesheet" href="{{ asset('css/create-product-page.css') }}">
@endsection

@section('content')
<section class="m-10per">
<form action="/products/{{$product->id}}" method="POST" enctype="multipart/form-data">
    @csrf
    @method('PUT')
    <h1 class="text-center">Product Aanpassen</h1>
    <label for="name"><h3>Product naam</h3></label>
    <input type="text" name="name" id="name" value="{{$product->name}}">
    <label for="category"><h3>Product categorie</h3></label>
    <input type="text" name="category" id="category" value="{{$product->category}}">
    <label for="description"><h3>Product beschrijving</h3></label>
    <textarea name="description" id="description">{{$product->description}}</textarea>   
    <label for="photo"><h3>Foto uploaden</h3></label>
    <img src="{{$product->product_image}}" alt="{{ $product->name }}" width="200px" height="200px" class="sm-product-img">
    <label class="custom-file-upload">    
    <input type="file" class="form-control-file" id="photos" name="photo"  accept="image/*"/>
    Een ander photo toevoegen
    </label>

    <button type="submit">Save</button>
</form>
</section>

@endsection

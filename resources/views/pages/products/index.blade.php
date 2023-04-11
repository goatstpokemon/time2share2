@extends('layout')
@section('assets')
<link rel="stylesheet" href="{{ asset('css/home-page.css') }}">
@endsection
@section('content')
<div class="container">   
<section>
    
    <h2>Alle producten</h2>
    
        <div class="search-container">
    <form method="GET" action="/products/search" class="search">
        <input type="text" name="q" placeholder="Zoek naar product">
        <button type="submit">Search</button>
    </form>
</div>
    <section class="grid animate">
    @foreach ($products as $product)
    
    <x-product  :name="$product->name" :img="$product->product_image" :return="$product->return_date" :rented="$product->rented_by" :rental="$product->rental_started" :id="$product->id" />
   
    
    @endforeach
</section>
</section>
</div>
@endsection

@section('scripts')
<script src="{{asset('js/animations.js')}}"></script>
@endsection
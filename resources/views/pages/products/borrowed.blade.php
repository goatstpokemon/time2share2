@extends('layout')
@section('assets')
<link rel="stylesheet" href="{{ asset('css/home-page.css') }}">
@endsection
@section('content')
<div class="container fix-mob">   
<section class="flex-col">
    <h2>Uitgeleende producten</h2>
    <section class="flex-row">
    @foreach ($products as $product)
    
    <x-product :name="$product->name" :img="$product->product_image" :return="$product->return_date" :rented="$product->rented_by" :rental="$product->rental_started" :id="$product->id" />
   
    
    @endforeach</section>
</section>
</div>
@endsection
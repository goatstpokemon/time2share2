@extends('layout')
@section('assets')
<link rel="stylesheet" href="{{ asset('css/home-page.css') }}">
@endsection
@php
$counter = 0;
@endphp


@section('content')
<div class="container">    
    <h1>Welkom {{$user->name}}</h1>
    <section class="buttons">
        <a class="create" href="/products/create">Product aanmaken</a>
    </section>
       <section class="flex-col">
   <h2>Aan het lenen</h2> 
   <section class="flex-row">
    @foreach ($rentedProducts as $rentedProduct)
    
     @if ($counter < 3)
     @php
    
    @endphp
    <x-product :name="$rentedProduct->name" :img="$rentedProduct->product_image" :return="$rentedProduct->return_date" :rented="$rentedProduct->rented_by" :rental="$rentedProduct->rental_started" :id="$rentedProduct->id" />
        @php
    $counter++;
    @endphp
    
    @endif
    
    @endforeach</section>
</section>
   <section class="flex-col">
   <h2>Niet uitgeleende producten</h2> 
   <section class="flex-row">
    @foreach ($products as $product)
    @if($product->rentable != false )
     @if ($counter < 3)
     @php
    
    @endphp
    <x-product :name="$product->name" :img="$product->product_image" :return="$product->return_date" :rented="$product->rented_by" :rental="$product->rental_started" :id="$product->id" />
        @php
    $counter++;
    @endphp
    @endif
    @endif
    
    @endforeach</section>
</section>
<section class="flex-col">
    <h2>Uitgeleende producten</h2>
    <section class="flex-row">
    @foreach ($products as $product)
    @if($product->rentable != true )
    <x-product :name="$product->name" :img="$product->product_image" :return="$product->return_date" :rented="$product->rented_by" :rental="$product->rental_started" :id="$product->id" />
    @endif
    
    @endforeach</section>
</section>
</div>
@endsection
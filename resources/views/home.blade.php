@extends('layout')
@section('assets')
<link rel="stylesheet" href="{{ asset('css/home-page.css') }}">
@endsection

@section('content')
<div class="container">    
   <section class="flex-row">
    @foreach ($products as $product)
    
    <x-product :name="$product->name" :img="$product->image" :return="$product->return_date" :rented="$product->rented_by" :rental="$product->rental_started" :id="$product->id" />
    
    
    @endforeach
</section>
</div>
@endsection
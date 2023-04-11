@extends('layout')
@section('assets')
<link rel="stylesheet" href="{{ asset('css/product.css') }}">
<link rel="stylesheet" href="{{ asset('css/home-page.css') }}">
@endsection

@section('content')
<section class="container-show">
    <img src="{{$user->profile_image}}" alt="{{$user->name}}"  width="200px" height="200px">
<h1>{{$user->name}}</h1>
<span><strong>Al lid sinds: </strong> {{date('d M Y', strtotime($user->created_at))}}</span>
<h2 class="mt-5">Alle producten van {{$user->name}}</h2>
<section class="grid ">
    
    @foreach ($products as $product)
    
    <x-product :name="$product->name" :img="$product->product_image" :return="$product->return_date" :rented="$product->rented_by" :rental="$product->rental_started" :id="$product->id" />
   
    
    @endforeach
</section>

<h2>Alle reviews van {{$user->name}}</h2>
<section>
    
    {{-- @foreach ($reviews as $review)
    
    
   
    
    @endforeach --}}
</section>
</section>

@endsection
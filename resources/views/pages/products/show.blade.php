@extends('layout')
@section('assets')
<link rel="stylesheet" href="{{ asset('css/product.css') }}">
@endsection
@section('content')
<section class="container-show">
<img src="{{ $product->product_image }}" alt="{{ $product->name }}" width="200px" height="200px" class="sm-product-img">
    <h1>{{$product->name}}</h1>
    <span><h2>Eigenaar:</h2><a href="/users/{{$eigenaar->id}}"> {{$eigenaar->name}}</a></span>
    <section class="flex-row space-between">    
    @if($product->rentable !== 1)
    <span><strong>Uitgeleend aan: </strong><p>{{$lener->rented_by}}</p></span>
    <span><strong>Start: </strong><p>{{date('d M', strtotime($product->rental));}}</p></span>    
    <span><strong>Eind: </strong><p>{{date('d M', strtotime($product->return));}}</p></span>
    @endif
    @if($product->rentable !== 0)
    <a class="btn-beschikbaar" href="">Nu lenen</a> @endif
    </section>

    <section class="beschrijving">
        <h2>Beschrijving</h2>
        <p>{{$product->description}}</p>
    </section>
   
</section>
@endsection
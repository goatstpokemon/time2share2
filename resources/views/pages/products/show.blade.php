@extends('layout')
@section('assets')
<link rel="stylesheet" href="{{ asset('css/product.css') }}">
<link rel="stylesheet" href="{{ asset('css/overlay.css') }}">

@endsection
@section('content')
<section class="container-show">
    
<section>
<img src="{{ $product->product_image }}" alt="{{ $product->name }}" width="200px" height="200px" class="sm-product-img">
    <h1>{{$product->name}}</h1>
    <span><h2>Eigenaar:</h2><a href="/users/{{$owner->id}}"> {{$owner->name}}</a></span>
    @if($rentee)
    <span><strong>Uitgeleend aan: </strong><p>{{$rentee->name}}</p></span>
    @endif
    <section class="flex-row space-between">    
    @if($product->rentable !== 1)
    
    <span><strong>Start: </strong><p>{{date('d M', strtotime($product->rental_started));}}</p></span>    
    <span><strong>Eind: </strong><p>{{date('d M', strtotime($product->return_date));}}</p></span>
    </section>
    <section>
    @if($rentee && $rentee->id === $currentUser->id)  
     <a href="/products/{{$product->id}}/return" class="btn" >Nu retourneren</a>
    
    @endif
    @endif
   </section>
    
    @if($product->rentable !== 0 && $product->user_id  !== $currentUser->id)
    <button class="btn-beschikbaar" id="open-overlay-borrow">Nu lenen</button> 
    @endif
    @if($product->user_id  === $currentUser->id)
    <a class="btn"  href="/products/{{$product->id}}/edit">Bijwerken</a> 
    @endif
     <section class="beschrijving">
        <h2>Beschrijving</h2>
        <p>{{$product->description}}</p>
    </section>

  </section> 
   
    <section class="overlay" id="overlay-borrow">        
        <div class="overlay-content" id="overlay-content-borrow">
        <h2>Product lenen</h2>
        <form class="flex flex-col " action="/products/{{$product->id}}/borrow" method="POST">
        @csrf
        <label for="begin">Begin datum</label>
        <input type="date" id="begin" name="begin" class="datepicker">
        <label for="end">Eind datum</label>
        <input type="date" id="end" name="end" class="datepicker">
        <button type="submit" id="close-overlay-borrow">Submit</button>
        </form>
        
        </div>
    </section>

    
</section>
@endsection
@section('scripts')
@if($product->rentable !== 0)

<script  src="{{ asset('js/overlay.js') }}"></script>
@endif
@if($product->rentable !== 1)
<script  src="{{ asset('js/ratings.js') }}"></script>
@endif
@endsection
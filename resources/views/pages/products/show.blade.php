@extends('layout')
@section('assets')
<link rel="stylesheet" href="{{ asset('css/product.css') }}">
<link rel="stylesheet" href="{{ asset('css/overlay.css') }}">

@endsection
@section('content')
<section class="container-show">
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
     <button type="submit" class="btn-return" id="open-overlay-return">Nu retourneren</button>
    
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

    <section class="overlay" id="overlay-return">
    <div class="overlay-content" id="overlay-content-return">
        <h2>Product retourneren</h2>
        <form class="flex flex-col " action="/products/{{$product->id}}/return" method="POST">
        @csrf
        <div class="form-group">
                        <label for="rating"><h1>Hoeveel sterren geef je de eigenaar?</h1></label>
                        <div class="rating">
                            <input type="radio" name="rating" id="rating-1" value="1">
                            <label for="rating-1"><i class="fa fa-star"></i></label>

                            <input type="radio" name="rating" id="rating-2" value="2">
                            <label for="rating-2"><i class="fa fa-star"></i></label>

                            <input type="radio" name="rating" id="rating-3" value="3">
                            <label for="rating-3"><i class="fa fa-star"></i></label>

                            <input type="radio" name="rating" id="rating-4" value="4">
                            <label for="rating-4"><i class="fa fa-star"></i></label>

                            <input type="radio" name="rating" id="rating-5" value="5">
                            <label for="rating-5"><i class="fa fa-star"></i></label>

                        </div>
                    </div>
        <div class="form-group">
            <label for="review"><h1>Vertel ons meer</h1></label>
            <textarea class="form-control" name="review" id="review" rows="10"></textarea>
        </div>
        <button type="submit" id="close-overlay-return">Submit</button>
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
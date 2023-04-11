@extends('layout') 
@section('assets')
<link rel="stylesheet" href="{{ asset('css/home-page.css') }}" />
@endsection 
@section('content')
<div class="container">
  <section class="fix-mob">
    <h2>Alle producten</h2>

    <section class="search-container">
      <form method="GET" action="/products/search" class="search">
        <input type="text" name="q" placeholder="Zoek naar product" />
        <button type="submit"><i class="fa fa-search" aria-hidden="true"></i></button>
      </form>
    </section>
<section>
    <h3>Categories</h3>    
    <section class="overflow-x">
       @foreach ($products as $product)      
        
        <a class="category" href="/products/filter/{{$product->category}}">
          {{$product->category}}
        </a>
        @endforeach  
      </section>
    </section>      
    
    
      
    

    <section class="grid animate overflow-y">
      @foreach ($products as $product)

      <x-product
        :name="$product->name"
        :img="$product->product_image"
        :return="$product->return_date"
        :rented="$product->rented_by"
        :rental="$product->rental_started"
        :id="$product->id"
      />

      @endforeach
    </section>
  </section>
</div>
@endsection @section('scripts')
<script src="{{asset('js/animations.js')}}"></script>
@endsection

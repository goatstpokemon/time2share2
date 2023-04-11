@extends('layout')
@section('assets')
<link rel="stylesheet" href="{{ asset('css/home-page.css') }}">
@endsection
@section('content')

<div class="container fix-mob">   
<section>
    <h1>Zoek resultaten</h1>
@if(count($results) > 0)
  <ul>
  @foreach($results as $result)
    
    <section class="grid">
    <x-product :name="$result->name" :img="$result->product_image" :return="$result->return_date" :rented="$result->rented_by" :rental="$result->rental_started" :id="$result->id" />
   
    
    </section>
    @endforeach
 
  </ul>
@else
  <p>geen resultaten</p>
@endif
</section>
</div>
@endsection
@extends('layout')


@section('content')
<div class="container">    
   @foreach ($products as $product)
    <a href="/products/{{$product['id']}}">{{$product['name']}}</a>
    <p>{{$product['date']}} </p>
@endforeach
    

</div>
@endsection
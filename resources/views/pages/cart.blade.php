@extends('layouts.form_template')

@section('content_form')
  @foreach ($carts as $cart)
    <div>
      <h5 class="card-title">Stationary Name : {{ $cart->products->name }}</h5>
      <p class="card-text">
        <li>Stationary Price : {{ $cart->products->price }}</li>
        <li>Quantity : {{ $cart->qty }}</li>
      </p>
      <div>
        <p>Total : Rp.{{ $cart->products->price * $cart->qty }}</p>
      </div>
      <div class="float-right">
        {{-- TODO : JALANIN EDIT CART --}}
        <a href="#" class="btn btn-primary my-2 my-sm-0 mr-sm-1">Edit Item</a>
        <a href="#" class="btn btn-danger my-2 my-sm-0 mr-sm-1">Delete Item</a>
      </div>
    </div>
  @endforeach
@endsection
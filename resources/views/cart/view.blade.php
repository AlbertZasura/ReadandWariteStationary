@extends('layouts.app')
@section('title', 'Cart')
@section('content')
    <div class="container">
        @if (count($carts) == 0)
            <p>Do Some Transaction to see your products in cart</p>
        @else
            @foreach ($carts as $cart)
                <div class="card">

                    <div class="card-body">

                        <div>
                            <h5 class="card-title my-2">Stationary Name : {{ $cart->products->name }}</h5>
                            <p class="card-text">
                                <li>Stationary Price : {{ $cart->products->price }}</li>
                                <li>Quantity : {{ $cart->qty }}</li>
                                <hr>
                            <p class="my-2">Total : Rp.{{ $cart->products->price * $cart->qty }}</p>
                            <div class="float-right form-inline">
                                <form action="/cart/{{ $cart->id }}/update" method="post">
                                    @csrf
                                    @method('patch')
                                    <button class="btn btn-primary my-2 my-sm-0 mr-sm-1">Edit Item</button>
                                </form>
                                <form action="/cart/{{ $cart->id }}/delete" method="post">
                                    @csrf
                                    @method('delete')
                                    <button class="btn btn-danger my-2 my-sm-0 mr-sm-1">Delete Item</button>
                                </form>
                            </div>
                            </p>
                            <br>
                        </div>
                    </div>
                </div>
            @endforeach
            <form action="/cart/checkout" method="post">
                @csrf
                <button class="btn btn-danger my-2">Check Out</button>
            </form>
        @endif
    </div>
@endsection

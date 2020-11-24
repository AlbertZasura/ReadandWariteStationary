@extends('layouts.master')
@section('title', 'Add Product')

@section('container__content')
    <div class="card mb-3">
        <div class="row no-gutters align-items-center">
            <div class="col-md-4">
                <img src="{{ asset($carts->products->image) }}" class="card-img" alt="{{ $carts->products->name }}">
            </div>
            <div class="col-md-8 ">
                <div class="card-body">
                    <h5 class="card-title">Stationary Name: {{ $carts->products->name }}</h5>
                    <p class="card-text">Stationary Price: {{ $carts->products->price }}<br />
                        Stationary Stock: {{ $carts->qty }}<br />
                        Stationary Type: {{ $carts->products->productTypes->name }}<br />
                        Stationary Description: {{ $carts->products->description }}</p>

                    <div class="text-right float-right">
                        @if (Session::get('users')->role == 'member')
                            <div class="form-inline my-2">
                                <form action="/cart/update/{{ $carts->id }}" method="POST">
                                    @method('patch')
                                    @csrf
                                    <input type="number" class="form-control mr-sm-2" placeholder="Input Quantity"
                                        aria-label="qty" aria-describedby="basic-addon1" id="qty" name="qty">
                                    <button type="submit" class="btn btn-dark my-2 my-sm-0 mr-sm-2">Update Cart</button>
                                </form>
                            </div>
                            @include('layouts.errors')
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

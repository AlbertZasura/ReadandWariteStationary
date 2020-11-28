@extends('layouts.app')
@section('title', 'View Product')

@section('content')
    <div class="container">
        <div class="card mb-3">
            <div class="row no-gutters align-items-center">
                <div class="col-md-4">
                    <img src="{{ asset('/storage/images/products/'.$product->image) }}" class="card-img" alt="{{ $product->name }}">
                </div>
                <div class="col-md-8 ">
                    <div class="card-body">
                        <h5 class="card-title">Stationary Name: {{ $product->name }}</h5>
                        <p class="card-text">Stationary Price: {{ $product->price }}<br />
                            Stationary Stock: {{ $product->stock }}<br />
                            Stationary Type: {{ $product->productTypes->name }}<br />
                            Stationary Description: {{ $product->description }}</p>
    
                        <div class="text-right float-right">
                            @can('isMember')
                                <div class="form-inline my-2">
                                    <form action="/cart/add/{{ $product->id }}" method="POST">
                                        @method('post')
                                        @csrf
                                        <input type="number" class="form-control mr-sm-2" placeholder="Input Quantity"
                                            aria-label="qty" aria-describedby="basic-addon1" id="qty" name="qty">
                                        <button type="submit" class="btn btn-dark my-2 my-sm-0 mr-sm-2">Add to Cart</button>
                                    </form>
                                    @include('layouts.errors')
                                </div>
                            @endcan
                            @can('isAdmin')
                                <div class="form-inline my-2">
                                    <form action="/product/{{ $product->id }}/delete" method="post">
                                        @method('delete')
                                        @csrf
                                        <button type="submit" class="btn btn-danger my-2 my-sm-0 mr-sm-1">Delete</button>
                                    </form>
                                    <a href="/product/{{ $product->id }}/edit" class="btn btn-primary my-2 my-sm-0">Edit</a>
                                </div>
                            @endcan
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

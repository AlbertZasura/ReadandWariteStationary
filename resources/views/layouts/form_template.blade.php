@extends('layouts.master')

@section('asset__css')
    @yield('asset')
@endsection

@section('nav_right_content')
    <p><a href="/login">Login</a></p>
    <p><a href="/register">Register</a></p>
@endsection

@section('container__content')
    <div class="container mt-4">
        @if (\Request::is('cart*'))
            @if (count($carts) == 0)
                <p>Do Some Transaction to see your products in cart</p>
            @else
                <div class="row justify-content-center">
                    <div class="col-md-8">
                        <div class="card">
                            <div class="card-header">@yield('title')</div>
                            <div class="card-body">
                                @yield('content_form')
                            </div>
                        </div>
                        <form action="/cart/checkout" method="post">
                            @csrf
                            <button class="btn btn-danger my-2">Check Out</button>
                        </form>
                    </div>
                </div>
            @endif
        @else
            <div class="row justify-content-center">
                <div class="col-md-8">
                    <div class="card">
                        <div class="card-header">@yield('title')</div>
                        <div class="card-body">
                            @yield('content_form')
                        </div>
                    </div>

                </div>
            </div>
        @endif
    </div>
@endsection

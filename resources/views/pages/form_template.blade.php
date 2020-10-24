@extends('pages.template')

@section('asset__css')
  <link rel="stylesheet" href="/css/form.css">
  @yield('asset')
@endsection

@section('nav_right_content')
    <p><a href="/login">Login</a></p>
    <p><a href="/register">Register</a></p>
@endsection

@section('container__content')
    <div class="container__login">
      <p class="title__login">@yield('title')</p>
      <div class="form__content">
        @yield('content_form')
      </div>
    </div>
@endsection
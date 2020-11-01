@extends('pages.form_template')
@section('title', 'Login')

@section('content_form')
    <form action="/" method="POST">
        {{ csrf_field() }}
        <div class="form-group row">
            <label for="email" class="col-md-4 col-form-label text-md-right">E-Mail Address</label>
            <div class="col-md-6">
                <input type="email" class="form-control" id="email" name="email" required>
            </div>
        </div>
        <div class="form-group row">
            <label for="password" class="col-md-4 col-form-label text-md-right">Password</label>
            <div class="col-md-6">
                <input type="password" class="form-control" id="password" name="password" required>
            </div>
        </div>
        <div class="form-group col-md-6 offset-md-4">
            <input type="checkbox" name="RememberMe">
            <label for="RememberMe">Remember Me</label>
        </div>
        <div class="col-md-6 offset-md-4">
            <button type="submit" class="btn btn-primary">Login</button>
        </div>
        @include('layouts.errors')
    </form>
@endsection

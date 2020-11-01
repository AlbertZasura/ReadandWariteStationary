@extends('pages.form_template')
@section('title', 'Register')

@section('content_form')
    <form action="/register" method="POST">
        {{ csrf_field() }}
        <div class="form-group row">
            <label for="name" class="col-md-4 col-form-label text-md-right">Name</label>
            <div class="col-md-6">
                <input type="text" class="form-control" id="name" name="name" required>
            </div>
        </div>

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

        <div class="form-group row">
            <label for="password_confirmation" class="col-md-4 col-form-label text-md-right">Confirm Password</label>
            <div class="col-md-6">
                <input type="password" class="form-control" id="password_confirmation" name="password_confirmation" required>
            </div>
        </div>

        <div class="col-md-6 offset-md-4">
            <button type="submit" class="btn btn-primary">Register</button>
        </div>
        @include('layouts.errors')
    </form>
@endsection

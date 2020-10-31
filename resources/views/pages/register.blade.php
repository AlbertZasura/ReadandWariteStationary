@extends('pages.form_template')

@section('asset')
    <link rel="stylesheet" href="/css/register.css">
@endsection

@section('title', 'Register')

@section('content_form')
    <form action="/" method="POST">
        {{ csrf_field() }}
        <div class="form__line">
            <label for="name">Name</label>
            <input type="text" class="form-control" id="name" name="name">
        </div>

        <div class="form__line">
            <label for="email">E-Mail Address</label>
            <input type="email" class="form-control" id="email" name="email">
        </div>

        <div class="form__line">
            <label for="password">Password</label>
            <input type="password" class="form-control" id="password" name="password">
        </div>

        <div class="form__line">
            <label for="confirmPassword">Confirm Password</label>
            <input type="password" class="form-control" id="confirmPassword" name="confirmPassword">
        </div>

        <div class="btn__login">
            <button type="submit" class="btn btn-primary">Register</button>
        </div>
    </form>
@endsection

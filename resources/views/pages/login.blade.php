@extends('pages.form_template')

@section('title', 'Login')

@section('asset')
    <link rel="stylesheet" href="/css/login.css">
@endsection

@section('content_form')
    <form action="" method="POST">
        <div class="form__line">
            <p>E-Mail Address</p>
            <input type="text">
        </div>
        <div class="form__line">
            <p>Password</p>
            <input type="password">
        </div>
        <div class="remember__me">
            <input type="checkbox" name="RememberMe">
            <label for="RememberMe">Remember Me</label>
        </div>
        <div class="btn__login">
            <button>Login</button>
        </div>
    </form>
@endsection

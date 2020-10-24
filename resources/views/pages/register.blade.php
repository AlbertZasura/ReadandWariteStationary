@extends('pages.form_template')

@section('asset')
  <link rel="stylesheet" href="/css/register.css">  
@endsection

@section('title', 'Register')

@section('content_form')
  <form action="" method="POST">
    <div class="form__line">
      <p>Name</p>
      <input type="text">
    </div>
    <div class="form__line">
      <p>E-Mail Address</p>
      <input type="password">
    </div>
    <div class="form__line">
      <p>Password</p>
      <input type="text">
    </div>
    <div class="form__line">
      <p>Confirm Password</p>
      <input type="password">
    </div>
    <div class="btn__login">
      <button>Register</button>
    </div>
  </form> 
@endsection
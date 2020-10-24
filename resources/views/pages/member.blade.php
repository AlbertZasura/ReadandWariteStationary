@extends('pages.template')

@section('asset__css')
    <link rel="stylesheet" href="/css/product.css">
@endsection

@section('nav_right_content')
  <p>Member<span>&#9660;</span></p>
  <button>Cart</button>
  <button>History</button>    
@endsection


@section('container__content')
  <div class="product__container">
    <div class="box__container">

      {{-- Todo Product List - Can be removed--}}
      <div class="box">
        <div class="product_img">
          <img src="{{ asset('img/pink_popping_book.jpg') }}" alt="">
        </div>
          <div class="product_idn">
            <h3 class="product_name">
              nahkoda173
            </h3>
            <p class="product_desc">
              Notebook to write down your journal or not
            </p>
          </div>
      </div>

      <div class="box">
        <div class="product_img">
          <img src="{{ asset('img/wooden_book.jpg') }}" alt="">
        </div>
          <div class="product_idn">
            <h3 class="product_name">
              bobobo157
            </h3>
            <p class="product_desc">
              Great notebook for new student
            </p>
          </div>
      </div>

      
    </div>
  </div>
@endsection
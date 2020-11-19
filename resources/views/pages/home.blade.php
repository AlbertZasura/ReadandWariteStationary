@extends('pages.template')

@section('title', 'home')

@section('container__content')
    <a href="{{ url('/product/add') }}" class="btn btn-primary" role="button">Add New Stationary</a>
    <a href="{{ url('/productType/add') }}" class="btn btn-primary" role="button">Add New Stationary Type</a>
    <a href="#" class="btn btn-primary" role="button">Edit Stationary Type</a>

    <div class="card-deck mt-4">
        <div class="card">
            <a href="#"><img class="card-img-top" src="..." alt="Card image cap"></a>
            <div class="card-body">
                <h5 class="card-title text-primary">Card title</h5>
                <p class="card-text">This is a longer card with supporting text below as a natural lead-in to additional
                    content. This content is a little bit longer.</p>
            </div>
        </div>
        <div class="card">
            <a href="#"><img class="card-img-top" src="..." alt="Card image cap"></a>
            <div class="card-body">
                <h5 class="card-title text-primary">Card title</h5>
                <p class="card-text">This is a longer card with supporting text below as a natural lead-in to additional
                    content. This content is a little bit longer.</p>
            </div>
        </div>
        <div class="card">
            <a href="#"><img class="card-img-top" src="..." alt="Card image cap"></a>
            <div class="card-body">
                <h5 class="card-title text-primary">Card title</h5>
                <p class="card-text">This is a longer card with supporting text below as a natural lead-in to additional
                    content. This content is a little bit longer.</p>
            </div>
        </div>
    </div>
@endsection

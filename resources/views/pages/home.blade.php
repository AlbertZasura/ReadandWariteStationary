@extends('pages.template')

@section('title', 'home')

@section('container__content')
    <a href="{{ url('/product/add') }}" class="btn btn-primary" role="button">Add New Stationary</a>
    <a href="{{ url('/productType/add') }}" class="btn btn-primary" role="button">Add New Stationary Type</a>
    <a href="{{ url('/productType/update') }}" class="btn btn-primary" role="button">Edit Stationary Type</a>

    <div class="card-deck mt-4 row">

        @for ($i = 0; $i < 3; $i++)
            @if (count($products) > $i)
                <div class="card col-sm-4 p-0">
                    <a href="#"><img class="card-img-top" src="{{ asset($products[$i]->image) }}"
                            alt="{{ $products[$i]->name }}"></a>
                    <div class="card-body">
                        <h5 class="card-title text-primary">{{ $products[$i]->name }}</h5>
                        <p class="card-text">{{ $products[$i]->description }}</p>
                    </div>
                </div>
            @endif
        @endfor
    </div>

    <div class="card-deck mt-4 row">
        @for ($i = 3; $i < 6; $i++)
            @if (count($products) > $i)
                <div class="card col-sm-4 p-0">
                    <a href="#"><img class="card-img-top" src="{{ asset($products[$i]->image) }}"
                            alt="{{ $products[$i]->name }}"></a>
                    <div class="card-body">
                        <h5 class="card-title text-primary">{{ $products[$i]->name }}</h5>
                        <p class="card-text">{{ $products[$i]->description }}</p>
                    </div>
                </div>
            @endif
        @endfor
    </div>
    <div class="mt-3">
        {{ $products->links() }}
    </div>
@endsection

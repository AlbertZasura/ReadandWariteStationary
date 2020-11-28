@extends('layouts.app')
@section('title', 'home')

@section('content')
    <div class="container">
        @can('isAdmin')
            <a href="{{ url('/product/add') }}" class="btn btn-primary mb-1" role="button">Add New Stationary</a>
            <a href="{{ url('/productType/add') }}" class="btn btn-primary mb-1" role="button">Add New Stationary Type</a>
            <a href="{{ url('/productType/edit') }}" class="btn btn-primary mb-1" role="button">Edit Stationary Type</a>
        @endcan

        @if (is_null($products[0]))
            <p>There is no product match with the keyword</p>
        @else
            <div class="card-deck mt-4 row">
                @for ($i = 0; $i < 3; $i++)
                    @if (count($products) > $i)
                        <div class="card col-sm-4 p-0">
                            <a href="/product/{{ $products[$i]->id }}"><img class="card-img-top"
                                    src="{{ asset('/storage/images/products/' . $products[$i]->image) }}"
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
                            <a href="/product/{{ $products[$i]->id }}"><img class="card-img-top"
                                    src="{{ asset('/storage/images/products/' . $products[$i]->image) }}"
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
                {{ $products->withQueryString()->links() }}
            </div>
        @endif

    </div>
@endsection

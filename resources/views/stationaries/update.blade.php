@extends('pages.template')

@section('container__content')
    <div class="container mt-4 ">
        @include('layouts.errors')
        <form action="/product/update" method="POST" enctype="multipart/form-data">
            {{ csrf_field() }}

            <div class="input-group mb-3">
                <input type="text" class="form-control" placeholder="Name" aria-label="Name" aria-describedby="basic-addon1"
                    id="name" name="name" required>
            </div>

            <div class="input-group mb-3">
                <input type="text" class="form-control" placeholder="Description" aria-label="Description"
                    aria-describedby="basic-addon1" id="description" name="description" required>
            </div>

            <div class="input-group mb-3">
                <input type="text" class="form-control" placeholder="Stock" aria-label="Stock"
                    aria-describedby="basic-addon1" id="stock" name="stock" required>
            </div>

            <div class="input-group mb-3">
                <input type="text" class="form-control" placeholder="Price" aria-label="Price"
                    aria-describedby="basic-addon1" id="price" name="price" required>
            </div>

            <button type="submit" class="btn btn-primary">Update Stationary Data</button>

        </form>
    </div>
@endsection

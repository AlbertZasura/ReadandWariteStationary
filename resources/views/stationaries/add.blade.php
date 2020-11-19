@extends('pages.template')
@section('title', 'Add Product')

@section('container__content')
    @include('layouts.errors')
    <form action="/product/add" method="POST" enctype="multipart/form-data">
        {{ csrf_field() }}

        <div class="file-field">
            <div class="mb-3">
                <img id="imgProduct" src="">
            </div>
            <div class="justify-content-left">
                <div class="btn btn-mdb-color btn-rounded float-left">
                    <span>Browse photos</span>
                    <input type="file" name="image" id="image" onchange="loadPreview(this);">
                </div>
            </div>
        </div>

        <div class="input-group mb-3">
            <input type="text" class="form-control" placeholder="Name" aria-label="Name" aria-describedby="basic-addon1"
                id="name" name="name" required>
        </div>

        <div class="input-group mb-3">
            <input type="text" class="form-control" placeholder="Description" aria-label="Description"
                aria-describedby="basic-addon1" id="description" name="description" required>
        </div>

        <div class="input-group mb-3">
            <div class="input-group-prepend">
                <label class="input-group-text" for="type">Type</label>
            </div>
            <select class="custom-select" id="type" name="type" required>
                <option selected>Choose...</option>
                <option value="1">One</option>
                <option value="2">Two</option>
                <option value="3">Three</option>
            </select>
        </div>

        <div class="input-group mb-3">
            <input type="text" class="form-control" placeholder="Stock" aria-label="Stock" aria-describedby="basic-addon1"
                id="stock" name="stock" required>
        </div>

        <div class="input-group mb-3">
            <input type="text" class="form-control" placeholder="Price" aria-label="Price" aria-describedby="basic-addon1"
                id="price" name="price" required>
        </div>

        <button type="submit" class="btn btn-primary">Add New Stationary</button>

    </form>
@endsection
<script src="{{ URL::asset('script/add.js') }}"></script>

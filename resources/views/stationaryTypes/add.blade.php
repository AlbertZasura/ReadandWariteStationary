@extends('pages.template')
@section('title', 'Add Stationary Type')

@section('container__content')

    <div class="row">
        <div class="col-md-4">
            <table class="table table-bordered text-center ">
                <thead>
                    <tr>
                        <th class="border border-primary" scope="col">Number</th>
                        <th class="border border-primary" scope="col">Stationary Type Name</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td class="border border-primary">1</td>
                        <td class="border border-primary">pen</td>
                    </tr>
                    <tr>
                        <td>2</td>
                        <td>smart reader</td>
                    </tr>
                    <tr>
                        <td>3</td>
                        <td>dictionary</td>
                    </tr>
                </tbody>
            </table>
        </div>
        <div class="col-md-8">
            @include('layouts.errors')
            <form action="/productType/add" method="POST" enctype="multipart/form-data">
                {{ csrf_field() }}

                <div class="file-field">
                    <div class="mb-3">
                        <img id="imgProduct" src="">
                    </div>
                    <div class="justify-content-left mb-3">
                        <span><strong>Browse photos</strong></span>
                        <input type="file" name="image" id="image" onchange="loadPreview(this);">
                    </div>
                </div>

                <div class="input-group mb-3">
                    <input type="text" class="form-control" placeholder="Stationary Type" aria-label="Name"
                        aria-describedby="basic-addon1" id="name" name="name" required>
                </div>

                <button type="submit" class="btn btn-primary">Add New Stationary Type</button>

            </form>
        </div>
    </div>
@endsection
<script src="{{ URL::asset('script/add.js') }}"></script>

@extends('layouts.master')
@section('title', 'Update Product Type')

@section('container__content')
    <div class="row">
        <div class="col-md-8">
            <table class="table table-bordered text-center ">
                <thead>
                    <tr>
                        <th class="border border-primary" scope="col">Number</th>
                        <th class="border border-primary" scope="col">Stationary Type Name</th>
                        <th class="border border-primary" scope="col">Action</th>
                    </tr>
                </thead>
                <tbody>
                    @for ($i = 0; $i < count($productTypes); $i++)
                        <tr>
                            <td class="border border-primary">{{ $i + 1 }}</td>
                            <td class="border border-primary">{{ $productTypes[$i]->name }}</td>
                            <td class="border border-primary">
                                <div class="form-inline my-2">
                                    <form action="/productType/{{ $productTypes[$i]->id }}/update" method="POST">
                                        @method('patch')
                                        @csrf
                                        <input type="text" class="form-control mr-sm-2" placeholder="Type Name"
                                            aria-label="Name" aria-describedby="basic-addon1" id="name" name="name">
                                        
                                            <button type="submit" class="btn btn-primary my-2 my-sm-0 mr-sm-2">Update</button>
                                    </form>
                                    @include('layouts.errors')
                                    <form action="/productType/{{ $productTypes[$i]->id }}/delete" method="post">
                                        @method('delete')
                                        @csrf
                                        <button type="submit" class="btn btn-danger my-2 my-sm-0">Delete</button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                    @endfor

                </tbody>
            </table>
        </div>
    </div>
@endsection

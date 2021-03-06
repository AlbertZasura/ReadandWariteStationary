<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Welcome Pages</title>
    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">

    <link rel="stylesheet" href="{{ asset('css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">

</head>

<body>
    <nav class="navbar navbar-expand-lg navbar-light">
        <ul class="navbar-nav ml-auto">
            <li class="nav-item">
                <a class="nav-link text-uppercase font-weight-bold mr-sm-4" href="/login">Login</a>
            </li>
            <li class="nav-item">
                <a class="nav-link text-uppercase font-weight-bold" href="/register">Register</a>
            </li>
        </ul>
    </nav>

    <div class="flex-center position-ref full-height">
        <div class="container">
            <div class="content">
                <div class="title m-b-md">
                    ReadAndWArite
                </div>
                <form action="/home" method="get" class="form-inline w-100 justify-content-center">
                    <div class="input">
                        <input type="search" aria-label="Search" name="search" placeholder="Search for stationary">
                    </div>
                    <button class="search btn btn-primary my-2 my-sm-0" type="submit">Search</button>
                </form>
            </div>
            <div class="break pic__container row">
                @foreach ($productTypes as $productType)
                    <div class="col-md-3 pic">
                        <a href="/home?category={{ $productType->type_id }}">
                            <img src="{{ asset('/storage/images/productTypes/' . $productType->image) }}"
                                class="img-fluid" alt="{{ $productType->name }}">
                            <p>{{ $productType->name }}</p>
                        </a>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
</body>

</html>

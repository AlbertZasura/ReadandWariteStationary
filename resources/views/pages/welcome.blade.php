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
    <link rel="stylesheet" href="/css/style.css">

</head>

<body>
    <nav class="navbar navbar-expand-lg navbar-light">
        <ul class="navbar-nav ml-auto">
            <li class="nav-item">
                <a class="nav-link text-uppercase" href="/login">Login</a>
            </li>
            <li class="nav-item">
                <a class="nav-link text-uppercase" href="/register">Register</a>
            </li>
        </ul>
    </nav>
    <div class="flex-center position-ref full-height">
        <div class="content">
            <div class="title m-b-md">
                ReadAndWArite
            </div>
            <form action="/home" method="get" class="form-inline w-100">
                <div class="input">
                    <input type="search" aria-label="Search" name="search" placeholder="Search for stationary">
                </div>
                <button class="search btn btn-primary my-2 my-sm-0" type="submit">Search</button>
            </form>
        </div>
    </div>
  </div>
  
  <div class="welcome__pic">
    <div class="pic__container">
      <div class="pic">
        <img src="{{ asset('img/dictionary/dictionary.jpg') }}" alt="dictionary">
        <p>dictionary</p>
      </div>
      <div class="pic">
        <img src="{{ asset('img/dictionary/dictionary2.jpg') }}" alt="dictionary">
        <p>dictionary</p>
      </div>
      <div class="pic">
        <img src="{{ asset('img/dictionary/dictionary2.jpg') }}" alt="dictionary">
        <p>dictionary</p>
      </div>
      <div class="pic">
        <img src="{{ asset('img/dictionary/dictionaryp.jpg') }}" alt="dictionary">
        <p>dictionary</p>
      </div>
    </div>
</body>

</html>

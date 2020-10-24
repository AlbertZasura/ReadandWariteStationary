<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <link rel="stylesheet" href="/css/template.css">
  
  @yield('asset__css')

</head>
<body>
  <div class="nav__bar">
    <div class="nav">
      <div class="nav__left">
        <div class="nav__logo">
          <p>ReadAndWArite</p>
        </div>
        <div class="nav__search">
          <input type="text" placeholder="Search">
          <button>Search</button>
        </div>
      </div>
      <div class="nav__right">
        @yield('nav_right_content')
      </div>
    </div>
  </div>

  @yield('container__content')

</body>
</html>
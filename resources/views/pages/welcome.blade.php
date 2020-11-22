<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Welcome Pages</title>

  <link rel="stylesheet" href="/css/style.css">
  
</head>
<body>
  <div class="nav__bar">
    <ul>
      <li><a href="/login">LOGIN</a></li>
      <li><a href="/register">REGISTER</a></li>
    </ul>
  </div>

  <div class="welcome__container">
    <div class="welcome__content">
      <div class="welcome__title">
        <p>ReadAndWArite</p>
      </div>
      <div class="welcome__search">
        <div class="input">
          <input type="text" placeholder="Search for stationary">
        </div>
        <div class="search">
          <button>Search</button>
        </div>
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
  </div>
</body>
</html>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <link rel="stylesheet" href="{{ URL::asset('bootstrap/css/bootstrap.min.css') }}">
  <link rel="stylesheet" href="{{ URL::asset('my_css/style.css') }}">
  <title>Document</title>
</head>
<body>
  <nav class="navbar navbar-expand-lg bg-dark-subtle  ">
    <div class="container-fluid">
      <a class="navbar-brand" href="#">Navbar</a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav me-auto mb-2 mb-lg-0">
          
          
            <li class="nav-item">
                <a class="nav-link active" aria-current="page" href="{{ route('home') }}">Home</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="#">about</a>
              </li>
            
              
              @auth
              <li class="nav-item">
                <a class="nav-link " href="{{ route('logout') }}">logout</a>
              </li>
              @endauth
              
              @guest
              <li class="nav-item">
                <a class="nav-link" href="{{ route('register') }}">register</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="{{ route('login') }}">login</a>
              </li> 
              @endguest

                          
             
          </li>
        </ul>
        <form class="d-flex" role="search">
          <span style="padding: 8px;background-color:red;margin-right:20px;border-radius:5px">reyad</span>
          <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
          <button class="btn btn-outline-success" type="submit">Search</button>
        </form>
      </div>
    </div>
  </nav>
  @yield('content')

  <script src="{{ URL::asset('bootstrap/js/bootstrap.bundle.min.js') }}"></script>
</body>
</html>
<!DOCTYPE html>
<html>

<head>
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <!-- CSS -->
  <link rel="stylesheet" href="{{ asset('css/style.css') }}">
  <link rel="stylesheet" href="{{ asset('css/navigation.css') }}">
  <link rel="stylesheet" href="{{ asset('css/search.css') }}">
  <link rel="stylesheet" href="{{ asset('css/welcome.css') }}">

  <!-- Scripts -->
  <script src="https://cdnjs.cloudflare.com/ajax/libs/bootbox.js/5.5.2/bootbox.min.js" integrity="sha512-RdSPYh1WA6BF0RhpisYJVYkOyTzK4HwofJ3Q7ivt/jkpW6Vc8AurL1R+4AUcvn9IwEKAPm/fk7qFZW3OuiUDeg==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>

  <!-- Jquery -->
  <script src="https://code.jquery.com/jquery-3.7.1.js" integrity="sha256-eKhayi8LEQwp4NKxN+CfCh+3qOVUtJn3QNZ0TciWLP4=" crossorigin="anonymous"></script>
  <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
  <script src="https://code.jquery.com/ui/1.13.3/jquery-ui.js"></script>

  <!-- Fonts -->
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Anton&family=Bowlby+One+SC&family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&family=Red+Hat+Display:ital,wght@0,300..900;1,300..900&family=Staatliches&display=swap" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css2?family=Encode+Sans+Semi+Condensed:wght@100;200;300;400;500;600;700;800;900&family=Oswald:wght@200..700&family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css2?family=Bebas+Neue&family=Bungee+Outline&family=Tilt+Warp&display=swap" rel="stylesheet">

  <title>{{ config('app.name', 'Laravel') }}</title>

  @vite(['resources/sass/app.scss', 'resources/js/app.js'])

</head>

<body style="overflow-x:hidden">
  <div id="navigation">
    <nav id="navbar" class="custom-nav base-scrolled">
      <div class="navigation-line" style="width:33%;">
        <a href="/programs" class="nav-item">TRAINING</a>
        <a href="" class="nav-item">ABOUT FITZONE</a>
        <a href="" class="nav-item">GYM EXCLUSIVES</a>
        @if (Auth::check())
        @else
        <a href="" class="nav-item">JOIN US</a>
        @endif

      </div>
      <div class="nav-title" style="width:33%;">
        <a href="/" class="nav-title">GREYFELL GYM</a>
      </div>
      <div class="oth-nav" style="width:33%;">
        <span id="expander"><svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-search" viewBox="0 0 16 16">
            <path d="M11.742 10.344a6.5 6.5 0 1 0-1.397 1.398h-.001q.044.06.098.115l3.85 3.85a1 1 0 0 0 1.415-1.414l-3.85-3.85a1 1 0 0 0-.115-.1zM12 6.5a5.5 5.5 0 1 1-11 0 5.5 5.5 0 0 1 11 0" />
          </svg></span>
        <input type="text" id="inputField" class=" search-input hidden " placeholder="Search" style="margin-top:10px">
        <span class="dropdown-toggle border-0" id="dropdownMenuButton" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-person-circle" viewBox="0 0 16 16">
            <path d="M11 6a3 3 0 1 1-6 0 3 3 0 0 1 6 0" />
            <path fill-rule="evenodd" d="M0 8a8 8 0 1 1 16 0A8 8 0 0 1 0 8m8-7a7 7 0 0 0-5.468 11.37C3.242 11.226 4.805 10 8 10s4.757 1.225 5.468 2.37A7 7 0 0 0 8 1" />
          </svg></span>
        <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
          @guest
          <a class="dropdown-item" href="/login">Login</a>
          <a class="dropdown-item" href="/register">Register</a>
          @else
          @if(Auth::user()->role == 1)
          <a class="dropdown-item" href="/home">Go to Admin Page</a>
          @else
          <a class="dropdown-item" href="/profile/{{Auth::user()->id}}">Profile</a>
          @endif
          <hr>
          <form action="{{ route('logout') }}" method="POST">
            @csrf
            <button type="submit" class="dropdown-item" type="submit">Logout</button>
          </form>
          @endguest
        </div>
      </div>
    </nav>
    

    @yield('content')

    
  </div>

  

</body>
  <script src="{{ asset('js/transaction.js') }}"></script>
  <script src="{{ asset('js/search.js') }}"></script>
  <script src="{{ asset('js/navigation.js') }}"></script>
</html>
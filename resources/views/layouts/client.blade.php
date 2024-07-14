<!DOCTYPE html>
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1">
<script src="https://code.jquery.com/jquery-3.7.1.js" integrity="sha256-eKhayi8LEQwp4NKxN+CfCh+3qOVUtJn3QNZ0TciWLP4=" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootbox.js/5.5.2/bootbox.min.js" integrity="sha512-RdSPYh1WA6BF0RhpisYJVYkOyTzK4HwofJ3Q7ivt/jkpW6Vc8AurL1R+4AUcvn9IwEKAPm/fk7qFZW3OuiUDeg==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<script src="{{ asset('js/transaction.js') }}"></script>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
<link rel="stylesheet" href="{{ asset('css/style.css') }}">

<style>

#container {
    display: flex;
    align-items: center;
    justify-content: flex-end; /* Align contents to the right */
    margin-right: 20px; /* Adjust as necessary */
}

#expander {
    padding: 20px;
    border: 1px solid red;
    cursor: pointer;
}

#inputField {
    width: 0; /* Start with zero width */
    transition: width 0.3s ease; /* Add a smooth transition */
    outline: 0;
    border-width: 0 0 2px;
    border-color: blue;
    height:100%;
    font-family: 'Poppins', sans-serif;
    font-size: 22px;
    background-color: rgba(200, 200, 200, 0.3);
    padding:10px;
    border-radius: 20px;
}

.hidden {
    display: none; /* Initially hide the input field */
    transition: width 0.3s ease;
}

body {
  font-family: "Lato", sans-serif;
  transition: background-color .5s;
}

.sidenav {
  height: 100%;
  width: 0;
  position: fixed;
  z-index: 1;
  top: 0;
  left: 0;
  background-color: #111;
  overflow-x: hidden;
  transition: 0.5s;
  padding-top: 60px;
}

.sidenav a {
  padding: 8px 8px 8px 32px;
  text-decoration: none;
  font-size: 25px;
  color: #818181;
  display: block;
  transition: 0.3s;
}

.sidenav a:hover {
  color: #f1f1f1;
}

.sidenav .closebtn {
  position: absolute;
  top: 0;
  right: 25px;
  font-size: 36px;
  margin-left: 50px;
}

#main {
  transition: margin-left .5s;
}

#main {
  
}

nav .custom-glow {
    background:transparent;
    color: rgb(79, 70, 229);
}

nav .custom-glow:hover {
    background-color: rgb(79, 70, 229);
    color:white;
}

@media screen and (max-height: 450px) {
  .sidenav {padding-top: 15px;}
  .sidenav a {font-size: 18px;}
}

#navbar {
  width:100%;
  height:100px;
  position:fixed;
  z-index:10;

  padding:20px;
}

.base-scrolled {
  bakground:transparent;
  transition:.5s;
}

.scrolled {
  background-color: white;
  border-bottom: 2px solid black;
  width: 100%;
  background: white;
  transition:.5s;
}

.nav-text {
  font-size: 42px;
  font-weight: 600;
  text-decoration: none;
  color:red;
}

.base-scrolled .nav-text{
  color:white;
  text-decoration: none;
}

.scrolled .nav-text{
  color:black;
  text-decoration: none;
}

.overlay {
            display: none;
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background-color: rgba(0, 0, 0, 0.4);
            z-index: 3; /* Ensure overlay is above everything else */
            transition:.5s;
        }
      
</style>

<title>{{ config('app.name', 'Laravel') }}</title>

<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Encode+Sans+Semi+Condensed:wght@100;200;300;400;500;600;700;800;900&family=Oswald:wght@200..700&family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=Nunito" rel="stylesheet">
    <link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Bebas+Neue&family=Bungee+Outline&family=Tilt+Warp&display=swap" rel="stylesheet">

    <!-- Scripts -->
    @vite(['resources/sass/app.scss', 'resources/js/app.js'])
</head>
<body style="overflow-x:hidden">
<div id="overlay" class="overlay"></div>
<div id="mySidenav" class="sidenav" style="z-index:11;">
  <a href="javascript:void(0)" class="closebtn" onclick="closeNav()">&times;</a>
  <a href="#">About</a>
  <a href="#">Services</a>
  <a href="#">Clients</a>
  <a href="#">Contact</a>
</div>

<div id="main">
    <nav id="navbar" class="custom-nav base-scrolled">
      <div style="font-size:42;">
      <span style="z-index:-1;cursor: pointer;"class="nav-text" id="nav-text" onclick="openNav()">&#9776;</span>
      &nbsp; &nbsp; &nbsp; &nbsp;
      <a style="text-decoration:none"href="/"><span class="nav-text" id="nav-text">FITZONE</span></a>
      </div>
      <div>
        <div style="display:flex; flex-direction:row;border:0px solid blue; justify-content:center;align-items:center">
          <div style="display:flex; flex-direction:row;">
            <div id="expander" style="padding:20px;border:0px solid red;">
              <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor" class="bi bi-search" viewBox="0 0 16 16">
                <path d="M11.742 10.344a6.5 6.5 0 1 0-1.397 1.398h-.001q.044.06.098.115l3.85 3.85a1 1 0 0 0 1.415-1.414l-3.85-3.85a1 1 0 0 0-.115-.1zM12 6.5a5.5 5.5 0 1 1-11 0 5.5 5.5 0 0 1 11 0"/>
              </svg>
              <div>
              
              </div>
              
            </div>
            <div style="display:flex; align-items:center;">
            <input type="text" id="inputField" class=" search-input hidden " placeholder="Search">
            </div>
            <div style="width:10px;"></div>
      </div>
          @guest
          <div class="d-flex flex-row">
          <a class="nav-link" href="/login">Login</a> &nbsp; &nbsp;
          <a class="nav-link" href="/register">Register</a>
          </div>
          
          @else
          <div class="dropdown">
          <button class="dropdown-toggle account-btn" type="button" id="dropdownMenuButton" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          <svg style="border:1px solid white; border-radius:100%; height:30px; width:30px;padding:5px;" xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-person-fill" viewBox="0 0 16 16">
            <path d="M3 14s-1 0-1-1 1-4 6-4 6 3 6 4-1 1-1 1zm5-6a3 3 0 1 0 0-6 3 3 0 0 0 0 6"/>
          </svg> &nbsp;
          {{ Auth::user()->name }}
          </button>
          <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
            @if(Auth::user()->role == 1)
            <a class="dropdown-item" href="/home">Go to Admin Page</a>
            @else
            <a class="dropdown-item" href="/profile/{{Auth::user()->id}}">Profile</a>
            @endif
            <form action="{{ route('logout') }}" method="POST">
              @csrf
              <button type="submit" class="dropdown-item" type="submit">Logout</button>
          </form>
          </div>
          @endguest
        </div>
      </div>
    </nav>
    
    
    @yield('content')
</div>
<script src="https://code.jquery.com/jquery-3.7.1.js"></script>
  <script src="https://code.jquery.com/ui/1.13.3/jquery-ui.js"></script>
  <script>
  $( function() {
    var availableTags = [
      "ActionScript",
      "AppleScript",
      "Asp",
      "BASIC",
      "C",
      "C++",
      "Clojure",
      "COBOL",
      "ColdFusion",
      "Erlang",
      "Fortran",
      "Groovy",
      "Haskell",
      "Java",
      "JavaScript",
      "Lisp",
      "Perl",
      "PHP",
      "Python",
      "Ruby",
      "Scala",
      "Scheme"
    ];
    $('#inputField').autocomplete({
        source: function(request, response) {
            // Ajax request to fetch data based on user input
            $.ajax({
                url: 'api/search/' + encodeURIComponent(request.term), // Using encodeURIComponent to handle special characters
                type: 'GET',
                dataType: 'json',
                success: function(data) {
                    // Map the 'title' field from each object in 'data' array
                    var titles = data.map(function(item) {
                        return item.title;
                    });

                    if (titles.length === 0) {
                        titles = ['No results found'];
                    }

                    response(titles);
                },
                error: function(xhr, status, error) {
                    console.error('Error:', status, error);
                }
            });
        },
        minLength: 1, // Minimum characters before triggering autocomplete
        delay: 300 // Delay in milliseconds before sending the Ajax request
    });
  } );
  </script>

<script>
     $(document).ready(function(){
        $('.dropdown-toggle').dropdown()
    });
</script>

<style>
  .ui-autocomplete {
    max-height: 300px;
    overflow-y: auto;
    border: 1px solid #ccc;
    background-color: #fff;
    box-shadow: 0 2px 4px rgba(0,0,0,0.1);
    width:200px;
    position:fixed;
}

.ui-autocomplete .ui-menu-item {
    padding: 8px 12px;
    cursor: pointer;

    font-family:'Poppins', sans-serif;
    font-size: 22px;
}

.ui-autocomplete .ui-menu-item:hover {
    background-color: #f0f0f0;
}
</style>

<script>
  document.addEventListener('DOMContentLoaded', function() {
    const expander = document.getElementById('expander');
    const inputField = document.getElementById('inputField');

    expander.addEventListener('click', function() {
        inputField.classList.toggle('hidden'); // Toggle visibility
        if (!inputField.classList.contains('hidden')) {
            // Calculate the width of the container minus padding
            const containerWidth = expander.offsetWidth - parseInt(getComputedStyle(expander).paddingRight);
            inputField.style.width = 500 + 'px';
            expander.style.color = 'white';
        } else {
            inputField.style.width = '0';
            expander.style.color = 'black';
        }
    });
});

function openNav() {
  document.getElementById("mySidenav").style.width = "250px";
  document.getElementById("overlay").style.display = "block"; // Show overlay
    }

    function closeNav() {
        document.getElementById("mySidenav").style.width = "0";
        document.getElementById("overlay").style.display = "none"; // Hide overlay
}
</script>

<script>
// Listen for scroll events
window.addEventListener('scroll', function() {

    if (window.scrollY === 0) {
        navbar.classList.remove('scrolled');
        navbar.classList.add('.base-scrolled'); // Remove the 'scrolled' class
    } else {
        navbar.classList.add('scrolled');
        navbar.classList.remove('.base-scrolled'); // Add the 'scrolled' class

    }
});
function expandCircleToSquare() {
    // Create a new div element for the animation
    var animationDiv = document.createElement('div');
    animationDiv.classList.add('animation-div');
    document.body.appendChild(animationDiv);

    // Initial position and size (circle)
    var size = 0;
    var maxRadius = Math.sqrt(Math.pow(window.innerWidth / 2, 2) + Math.pow(window.innerHeight / 2, 2));

    // Animation loop
    var animationInterval = setInterval(function() {
        size += 10; // Increase size by 10 pixels in each iteration
        var borderRadius = size / 2; // Calculate border radius for rounded corners

        // Set styles dynamically
        animationDiv.style.width = size + 'px';
        animationDiv.style.height = size + 'px';
        animationDiv.style.borderRadius = borderRadius + 'px';
        animationDiv.style.top = 'calc(50% - ' + (size / 2) + 'px)';
        animationDiv.style.left = 'calc(50% - ' + (size / 2) + 'px)';

        // Exit animation loop when size reaches maximum
        if (size >= maxRadius * 2) {
            clearInterval(animationInterval);
            animationDiv.style.borderRadius = '20px'; // Final border radius for square
        }
    }, 50); // Adjust speed of animation here (milliseconds)
}


</script> 
</body>
</html> 

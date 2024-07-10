<!DOCTYPE html>
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1">
<script src="https://code.jquery.com/jquery-3.7.1.js" integrity="sha256-eKhayi8LEQwp4NKxN+CfCh+3qOVUtJn3QNZ0TciWLP4=" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootbox.js/5.5.2/bootbox.min.js" integrity="sha512-RdSPYh1WA6BF0RhpisYJVYkOyTzK4HwofJ3Q7ivt/jkpW6Vc8AurL1R+4AUcvn9IwEKAPm/fk7qFZW3OuiUDeg==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<script src="{{ asset('js/transaction.js') }}"></script>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>

<style>

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
  height:75px;
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
  font-size: 28px;
  font-weight: 600;
}

.base-scrolled .nav-text{
  color:white;
}

.scrolled .nav-text{
  color:black;
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

<div id="mySidenav" class="sidenav" style="z-index:11;">
  <a href="javascript:void(0)" class="closebtn" onclick="closeNav()">&times;</a>
  <a href="#">About</a>
  <a href="#">Services</a>
  <a href="#">Clients</a>
  <a href="#">Contact</a>
</div>

<div id="main">
<div id="overlay" class="overlay"></div>
    <nav id="navbar" class="base-scrolled">
      <span class="nav-text" id="nav-text" onclick="openNav()">&#9776;</span>
      &nbsp; &nbsp; &nbsp; &nbsp;
      <span class="nav-text" id="nav-text">FITZONE</span>
      <div class="dropdown">
      <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
        Dropdown button
      </button>
      <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
        <a class="dropdown-item" href="/profile/{{Auth::user()->id}}">Profile</a>
        <a class="dropdown-item" href="#">Another action</a>
        <a class="dropdown-item" href="#">Something else here</a>
      </div>
</div>
    </nav>
    
    @yield('content')
</div>


<script>
     $(document).ready(function(){
        $('.dropdown-toggle').dropdown()
    });
</script>

<script>
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

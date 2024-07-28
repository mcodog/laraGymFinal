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

    <div class="nav-title" style="width:33%;">
      <a href="/" class="nav-title">GREYFELL GYM</a>
    </div>

  </nav>
    
    @yield('content')
</div>

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

<script>
   document.addEventListener('DOMContentLoaded', () => {
    const navbar = document.getElementById('navbar');

    function updateScrollClass() {
        if (window.scrollY > 0) {
            navbar.classList.add('scrolled');
        } else {
            navbar.classList.remove('scrolled');
        }
    }

    // Check the initial scroll position on page load
    updateScrollClass();

    // Update the scroll class on scroll events
    window.addEventListener('scroll', updateScrollClass);

    navbar.addEventListener('mouseenter', () => {
        navbar.classList.add('scrolled');
    });

    navbar.addEventListener('mouseleave', () => {
        if (window.scrollY === 0) {
            navbar.classList.remove('scrolled');
        }
    });
});

</script>

</body>
</html> 

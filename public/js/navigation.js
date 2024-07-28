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
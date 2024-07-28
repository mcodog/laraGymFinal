$(function() {
    $('#inputField').autocomplete({
      source: function(request, response) {
        // Ajax request to fetch data based on user input
        $.ajax({
          url: 'api/search/' + encodeURIComponent(request.term), // Using encodeURIComponent to handle special characters
          type: 'GET',
          dataType: 'json',
          success: function(data) {
            // Map the 'title' field from each object in 'data' array
            console.log(data);
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
  });

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

  document.getElementById('inputField').addEventListener('keydown', function(event) {
    if (event.key === 'Enter') {
        var query = $('#inputField').val();
        window.location.href = `/search-algolia/${query}`;
        event.preventDefault();
    }
});
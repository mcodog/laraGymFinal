$(document).ready(function () {
    $('#getMembershipModal').on('show.bs.modal', function () {
        const today = new Date().toISOString().split('T')[0];
        $('#startDateInp').val(today);

    });

    var count = 0;
    var upperLimit = 20;
    var working = false;
    var skipCount = 20;
    $.ajax({
        type: "GET",
        url: "/api/program",
        dataType: 'json',
        success: function (data) {
            console.log(data);
            for (var i = count; i < upperLimit; i++) {
            var div = $("<div>");

            div.append($('<a href="/programs/'+data[i].id+'"><div class="program-card"><div class="program-img-container"><img class="program-img" src="storage/images/'+data[i].image+'" alt=""></div><div class="program-body"><div class="program-title">'+data[i].title+'</div></div></div></a>'));


            $("#programDeck").append(div.hide().fadeIn(1000));
            if (count >= upperLimit) {
                upperLimit = upperLimit + 21;
                return false; 
            }
            };
        },
        error: function () {
            console.log('AJAX load did not work');
            alert("error");
        }
    });



    $('#programDeck').on('scroll', function() {
        var $this = $(this);

        if (!$this.data('scrolling')) {
            var scrollTop = $this.scrollTop();
            var innerHeight = $this.innerHeight();
            var scrollHeight = $this[0].scrollHeight;

            if (scrollTop + innerHeight >= scrollHeight - 10) { // Adjust the threshold if needed
                $this.data('scrolling', true);
                if (!working) {
                    working = true;
                    $.ajax({
                        type: "GET",
                        url: "/api/program",
                        data: '', // Adjust data if needed
                        success: function(data) {
                            console.log(data[1]);
                            // Iterate through the data and skip the first 22 entries
                            for (var i = count; i < Math.min(data.length, upperLimit + skipCount); i++) {
                                if (i >= skipCount) {
                                    console.log(data[i]); // Adjust this as needed
                                    var div = $("<div>");
                                    div.append($('<a href="/programs/'+data[i].id+'"><div class="program-card"><div class="program-img-container"><img class="program-img" src="storage/images/'+data[i].image+'" alt=""></div><div class="program-body"><div class="program-title">'+data[i].title+'</div></div></div></a>'));
                                    $("#programDeck").append(div.hide().fadeIn(1000));
                                }
                                count++;
                            }
                            if (count >= upperLimit) {
                                upperLimit += 21;
                            }
                        },
                        error: function() {
                            console.log("Something went wrong!");
                        },
                        complete: function() {
                            working = false;
                            $('#programDeck').data('scrolling', false);
                        }
                    });
                }
            }
        }
    });

      // Populate duration options
      const durationSelect = $('#durationInp');
      for (let i = 1; i <= 24; i++) {
          durationSelect.append(`<option value="${i}">${i} month${i > 1 ? 's' : ''}</option>`);
      }

      // Set start date when modal opens
      $('#exampleModalToggle3').on('show.bs.modal', function () {
          const today = new Date().toISOString().split('T')[0];
          $('#startDateInp').val(today);
          $('#endDateInp').val(''); // Reset end date
          $('#costInp').val(''); // Reset total cost
          $('#cost').val(''); // Reset cost input
      });

      // Function to update end date and total cost
      function updateEndDateAndCost() {
          const startDate = new Date($('#startDateInp').val());
          const duration = parseInt($('#durationInp').val(), 10);
          const costPerMonth = parseFloat($('#cost').val()) || 0;

          // Calculate end date
          const endDate = new Date(startDate.setMonth(startDate.getMonth() + duration));
          const formattedEndDate = endDate.toISOString().split('T')[0];
          $('#endDateInp').val(formattedEndDate);

          // Calculate total cost
          const totalCost = duration * costPerMonth;
          $('#costInp').val(totalCost.toFixed(2));
      }

      // Update end date and cost when duration changes
      $('#durationInp').change(updateEndDateAndCost);

      // Update cost when cost per month changes
      $('#cost').on('input', updateEndDateAndCost);

})
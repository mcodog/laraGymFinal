$(document).ready(function () {


    $.ajax({
        type: "GET",
        url: "/api/membership",
        dataType: 'json',
        success: function (data) {
            console.log(data);
            var selectBox = $('#membershipTypes');
            selectBox.empty();
            $.each(data, function (key, value) {
                var option = $('<option>').text(value.title).attr('value', value.id);
                option.data('cost', value.cost);
                selectBox.append(option);
            });
            selectBox.trigger('change');

        },
        error: function () {
            console.log('AJAX load did not work');
            alert("error");
        }
    });
    

    $('#transactionForm #setToday').click(function (e) {
        e.preventDefault();
        var today = new Date();
        var dateString = today.toISOString().split('T')[0]; // Format as YYYY-MM-DD
        $('#startDate').val(dateString);
    });

    $('#membershipMonths').change(function() {
        updateEndDate();
        updateTotalCost();
    });

    $('#membershipTypes').change(function() {
        var selectedOption = $(this).find('option:selected');
        var membershipCost = selectedOption.data('cost');
        console.log(membershipCost);
        $('#membershipCost').val(membershipCost);
    });

    function updateTotalCost() {
        var duration = $('#membershipMonths').val();
        var cost = $('#membershipCost').val();
        var totalCost = duration * cost;
        console.log("Total Cost: " + cost);
        $('#totalCost').val(totalCost);
    }

    // Update end date function
    function updateEndDate() {
        var startDate = new Date($('#startDate').val()); // Get start date
        var monthsToAdd = parseInt($('#membershipMonths').val()); // Get selected months as integer
        if (!isNaN(startDate.getTime()) && monthsToAdd > 0) { // Check if start date is valid and monthsToAdd is valid
            var endDate = new Date(startDate); // Create a new date object as a copy of start date
            endDate.setMonth(endDate.getMonth() + monthsToAdd); // Add selected months to end date

            var endDateString = endDate.toISOString().split('T')[0]; // Format as YYYY-MM-DD
            $('#endDate').val(endDateString); // Set the end date input value
            $('#endDateInp').val(endDateString); // Set the end date input value
        } else {
            $('#endDate').val(''); // Clear end date if start date or monthsToAdd is invalid
        }
    }

    $("#submitMember").on('click', function (e) {
        e.preventDefault();
        var data = $('#transactionForm')[0];
        console.log(data);
        let formData = new FormData(data);
        console.log(formData);
        for (var pair of formData.entries()) {
            console.log(pair[0] + ', ' + pair[1]);
        }
        $.ajax({
            type: "POST",
            url: "/api/account",
            data: formData,
            contentType: false,
            processData: false,
            headers: { 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content') },
            dataType: "json",
            success: function (data) {
                
            },
            error: function (error) {
                console.log(error);
            }
        });
    });

    $("#submitMembership").on('click', function (e) {
        e.preventDefault();
        var data = $('#membershipDetails')[0];
        console.log(data);
        let formData = new FormData(data);
        console.log(formData);
        for (var pair of formData.entries()) {
            console.log(pair[0] + ', ' + pair[1]);
        }
        $.ajax({
            type: "POST",
            url: "/api/transact",
            data: formData,
            contentType: false,
            processData: false,
            headers: { 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content') },
            dataType: "json",
            success: function (data) {
                console.log(data);
            },
            error: function (error) {
                console.log(error);
            }
        });
    });

    $("#membershipCard").on('click', function (e) {
        
    });

    $('#getMembershipModal').on('show.bs.modal', function(e) {
        $("#programDeck").empty();
        $.ajax({
            type: "GET",
            url: `/api/program`,
            dataType: 'json',
            success: function(data){
                var today = new Date();
                var dateString = today.toISOString().split('T')[0]; // Format as YYYY-MM-DD
                $('#startDate').val(dateString);

                console.log(data);
                $.each(data, function (key, value) {
                id = value.id;
                var div = $("<div>");
                var button = $('<button>Select</button>').attr('data-id', id);
    
                div.append($('<div data-id=' + id + ' id="membershipCard" class="card" data-bs-target="#exampleModalToggle2" data-bs-toggle="modal" data-bs-dismiss="modal" style="height:100px;"><div>'+value.title+'</div>').append(button));
                $("#programDeck").append(div.hide().fadeIn(1000));
                });
            },
                     error: function(){
                      console.log('AJAX load did not work');
                      alert("error");
                      }
                  });           
    });

    $('#exampleModalToggle3').on('show.bs.modal', function() {
        var startDate = $('#startDate').val();
        var endDate = $('#endDate').val();
        var durationVal = $('#durationMem').val();
        var costVal = $('#costMem').val();

        $("#startDateInp").val(startDate);
        $("#endDateInp").val(endDate);
        $("#durationInp").val(durationVal);
        $("#costInp").val(costVal);

        $("#accountInfoForm").trigger("reset");
        var id = document.getElementById('client_id'); 
        console.log("User is: "+id.value);
        $.ajax({
            type: "GET",
            url: `/api/clients/${id.value}`,
            success: function(data){
                console.log("Data received:", data);
                   $("#lname2").val(data.lname);
                   $("#fname2").val(data.fname);
                   $("#addressline2").val(data.addressline);
                   $("#zipcode2").val(data.zipcode);
                   $("#phone2").val(data.phone); 
                   $("#age2").val(data.age);
                   $("#gender2").val(data.gender);
              },
             error: function(){
              console.log('AJAX load did not work');
              alert("error");
              }
          });
    });

    $('#exampleModalToggle2').on('show.bs.modal', function(e) {
        console.log(e.relatedTarget)
        var id = $(e.relatedTarget).attr('data-id');
        console.log("2: "+id);
        $('<input>').attr({type: 'hidden', id:'clientId',name: 'id',value: id}).appendTo('#account_programInfo');
        $("#membershipIdInp").val(id);
        $('#selectedProgram').val(id);
        $.ajax({
            type: "GET",
            url: `/api/program/${id}`,
            success: function(data){
                   console.log(data);

              },
             error: function(){
              console.log('AJAX load did not work');
              alert("error");
              }
          });
    });

    $('#programDeck #membershipCard').on('click', 'button', function() {
        // Get the session_id from data-session-id attribute of the clicked button
        var session_id = $(this).attr('data-session-id');
        console.log(session_id);
        // Set the session_id value to the input named session_id
        $('input[name="session_id"]').val(session_id);
    });


})


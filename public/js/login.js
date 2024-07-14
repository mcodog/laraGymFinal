$(document).ready(function () {
    $("#loginButton").on('click', function (e) {
    if($('#email').val() == "")
        {
            $('#email').addClass('has-error');
            return false;
        } 
    else if($('#password').val() == "") 
        {
            $('#password').addClass('has-error');
            return false;
        }
    else    
        {
            e.preventDefault();
            var data = $('#form_login')[0];
            console.log(data);
            let formData = new FormData(data);
            console.log(formData);
            for (var pair of formData.entries()) {
                console.log(pair[0] + ', ' + pair[1]);
            }
            $.ajax({
                type: "POST",
                url: "/api/check",
                data: formData,
                contentType: false,
                processData: false,
                headers: { 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content') },
                dataType: "json",
                success: function (response) {
                    localStorage.setItem('token', response.access_token);

                    // Now make an authenticated request
                    $.ajax({
                        type: "GET",
                        url: "/api/home",
                        headers: {
                            'Authorization': 'Bearer ' + localStorage.getItem('token')
                        },
                        success: function(data) {
                            
                            window.location.href = '/';
                        },
                        error: function(xhr, status, error) {
                            console.log("Error: " + error);
                            console.log(xhr.responseText); // Log the response text for more details
                        }
                    });
                },
                error: function (error) {
                    console.log(error);
                }
            });
        }
    });

    $("#logoutButton").on('click', function (e) {
        e.preventDefault();

        $.ajax({
            type: "POST",
            url: "/api/logout",
            contentType: false,
            processData: false,
            
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            dataType: "json",
            success: function(response) {
                console.log(response);
                window.location.href = '/login'; // Redirect to login page after successful logout
            },
            error: function(xhr, status, error) {
                console.error(xhr.responseText);
            }
        });
    });
})



$(document).ready(function () {
    function login(formSelector) {
        if ($(formSelector).find('#email').val() == "") {
            $(formSelector).find('#email').addClass('has-error');
            return false;
        } else if ($(formSelector).find('#password').val() == "") {
            $(formSelector).find('#password').addClass('has-error');
            return false;
        } else {
            var data = $(formSelector)[0];
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
                    window.location.href = '/';
                },
                error: function (xhr) {
                    // Check if the status code is 403
                    if (xhr.status === 403) {
                        // Show an alert with the error message
                        alert(xhr.responseJSON.message || 'Your account is inactive.');
                    } else {
                        // Handle other errors
                        console.log(xhr.responseJSON.message || 'An error occurred.');
                    }
                }
            });
        }
    }

    $("#loginButton").on('click', function (e) {
        e.preventDefault();
        login('#form_login');
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

    $("#clientSubmit").on('click', function (e) {
        e.preventDefault();
        var data = $('#newClientForm')[0];
        console.log(data);
        let formData = new FormData(data);
        console.log(formData);
        for (var pair of formData.entries()) {
            console.log(pair[0] + ', ' + pair[1]);
        }
        $.ajax({
            type: "POST",
            url: "/api/clients",
            data: formData,
            contentType: false,
            processData: false,
            headers: { 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content') },
            dataType: "json",
            success: function (data) {
                login('#newClientForm');
            },
            error: function (error) {
                console.log(error);
            }
        });
    });
})


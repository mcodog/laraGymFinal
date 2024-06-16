$(document).ready(function () {
    $.ajax({
        type: "GET",
        url: "/api/coach",
        dataType: 'json',
        success: function (data) {
            console.log(data);
            $.each(data, function (key, value) {
            id = value.id;
            });

        },
        error: function () {
            console.log('AJAX load did not work');
            alert("error");
        }
    });

})
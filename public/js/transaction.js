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
                selectBox.append($('<option>').text(value.title).attr('value', value.id));
            });

        },
        error: function () {
            console.log('AJAX load did not work');
            alert("error");
        }
    });
})
$(document).ready(function () {
    $.ajax({
        type: "GET",
        url: "/api/client",
        dataType: 'json',
        success: function (data) {
            console.log(data);
            $.each(data, function (key, value) {
            id = value.id;
            var div = $("<div>");

            div.append($('<div class="h-100 flex flex-column "><div class="h-75" style=" border: none; padding: 0; margin-top:0px; height:80%; width:200px;" data-bs-toggle="modal" data-bs-target="#productModal"> <div class="card border-secondary mb-3" style="min-width: 10rem; height:100%; background-color: rgb(79, 70, 229)"> <div class="card-body border-secondary d-flex justify-content-center align-items-center flex-column" style="color: rgb(212, 212, 212)"> <div class="imgContainer" style="width:75px; height:75px; border-radius: 100%; border:3px solid gray"> <img src="' + value.image_path + '"  }}" alt="" style=" border-radius: 100%; width: 100%;height: 100%;object-fit: cover;overflow: hidden;"> </div> <br> <div class="container-fluid border border-secondary text-center">' + value.fname + ' ' + value.lname + ' </div> <div class="container-fluid border border-secondary text-center" style="font-size:9px;"> Joined at: ' + value.created_at + ' </div>  </div> </div> </div> <div class="my-2"><button class="delete-btn" style="width:100%; border: 1px solid #5F2E2E;border-radius:6px;">Delete</button> </div></div>'));


            $("#profileCards").append(div);
            });

            var button = $("<div>");
            button.append($('</button><button style="background: none; border: none; padding: 0; margin-top:0px; height:93%; width:200px;" data-bs-toggle="modal" data-bs-target="#productModal"> <div class="card border-secondary mb-3" style="min-width: 10rem; height:100%; background-color:rgb(12, 12, 12)"> <div class="card-body border-secondary d-flex justify-content-center align-items-center" style="color: rgb(212, 212, 212)"> <svg xmlns="http://www.w3.org/2000/svg" width="32" height="32" fill="currentColor" class="bi bi-plus" viewBox="0 0 16 16"> <path d="M8 4a.5.5 0 0 1 .5.5v3h3a.5.5 0 0 1 0 1h-3v3a.5.5 0 0 1-1 0v-3h-3a.5.5 0 0 1 0-1h3v-3A.5.5 0 0 1 8 4"/> </svg> </div> </div> </button>'));
            $("#profileCards").append(button);
        },
        error: function () {
            console.log('AJAX load did not work');
            alert("error");
        }
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
            url: "/api/client",
            data: formData,
            contentType: false,
            processData: false,
            headers: { 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content') },
            dataType: "json",
            success: function (data) {
                console.log(data);
                var div = $("<div>");
                $("#productModal").modal("hide");
                div.append($('<div style=" border: none; padding: 0; margin-top:0px; height:93%; width:200px;" data-bs-toggle="modal" data-bs-target="#productModal"> <div class="card border-secondary mb-3" style="min-width: 10rem; height:100%; background-color: rgb(79, 70, 229)"> <div class="card-body border-secondary d-flex justify-content-center align-items-center flex-column" style="color: rgb(212, 212, 212)"> <div class="imgContainer" style="width:75px; height:75px; border-radius: 100%; border:3px solid gray"> <img src="' + data.client.image_path + '"  }}" alt="" style=" border-radius: 100%; width: 100%;height: 100%;object-fit: cover;overflow: hidden;"> </div> <br> <div class="container-fluid border border-secondary text-center">' + data.client.fname + ' ' + data.client.lname + ' </div> <div class="container-fluid border border-secondary text-center" style="font-size:9px;"> Joined at: ' + data.client.created_at + ' </div> </div> </div> </div>'));
                $("#profileCards").prepend(div);

            },
            error: function (error) {
                console.log(error);
            }
        });
    });
})
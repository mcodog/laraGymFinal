$(document).ready(function () {
    $.ajax({
        type: "GET",
        url: "/api/profile",
        dataType: 'json',
        success: function (data) {
            console.log(data);
            $.each(data, function (key, value) {
            id = value.id;
            var div = $("<div>");

            div.append($('<div id="card'+ id +'" class="h-100 flex flex-column " data-id=' + id + '><div data-id=' + id + ' class="" style=" border: none; padding: 0; margin-top:0px; height:auto; width:200px;" data-bs-toggle="modal" data-bs-target="#editClientMod"> <div class="card borde-5 border-secondary mb-3" style="min-width: 10rem; height:90%; background-color: rgb(79, 70, 229)"> <div class="card-body border-secondary d-flex justify-content-center align-items-center flex-column" style="color: rgb(212, 212, 212)"> <div class="imgContainer" style="width:75px; height:75px; border-radius: 100%; border:3px solid gray"> <img src="storage/' + value.image_path + '" alt="" style=" border-radius: 100%; width: 100%;height: 100%;object-fit: cover;overflow: hidden;"> </div>  </div> <div class="card-footer text-light border border-secondary text-center" style="background-color: rgba(59, 55, 163)"><span>' + value.fname + ' ' + value.lname + '<span> </div>   </div>  </div> <button data-id=' + id + ' class="delete-btn" style="margin:0;width:100%; border: 1px solid #D5B946;border-radius:6px;"><svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" fill="currentColor" class="bi bi-trash-fill" viewBox="0 0 16 16"><path d="M2.5 1a1 1 0 0 0-1 1v1a1 1 0 0 0 1 1H3v9a2 2 0 0 0 2 2h6a2 2 0 0 0 2-2V4h.5a1 1 0 0 0 1-1V2a1 1 0 0 0-1-1H10a1 1 0 0 0-1-1H7a1 1 0 0 0-1 1zm3 4a.5.5 0 0 1 .5.5v7a.5.5 0 0 1-1 0v-7a.5.5 0 0 1 .5-.5M8 5a.5.5 0 0 1 .5.5v7a.5.5 0 0 1-1 0v-7A.5.5 0 0 1 8 5m3 .5v7a.5 5 0 0 1-1 0v-7a.5.5 0 0 1 1 0"/></svg> Delete</button> <div class="my-2"> </div></div>'));


            $("#profileCards").append(div.hide().fadeIn(1000));
            });

            var button = $("<div>");
            button.append($('</button><button style="background: none; border: none; padding: 0; margin-top:0px; height:98%; width:200px;" data-bs-toggle="modal" data-bs-target="#newClientModal"> <div class="card mb-3" style="border:1px solid #D5B946;min-width: 10rem; height:100%; background-color:rgb(12, 12, 12)"> <div class="card-body border-secondary d-flex justify-content-center align-items-center" style="color: rgb(212, 212, 212)"> <svg xmlns="http://www.w3.org/2000/svg" width="32" height="32" fill="#D5B946" class="bi bi-plus" viewBox="0 0 16 16"> <path d="M8 4a.5.5 0 0 1 .5.5v3h3a.5.5 0 0 1 0 1h-3v3a.5.5 0 0 1-1 0v-3h-3a.5.5 0 0 1 0-1h3v-3A.5.5 0 0 1 8 4"/> </svg> </div> </div> </button>'));
            $("#profileCards").append(button);
        },
        error: function () {
            console.log('AJAX load did not work');
            alert("error");
        }
    });

    
})
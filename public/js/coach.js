$(document).ready(function () {
    $.ajax({
        type: "GET",
        url: "/api/coach",
        dataType: 'json',
        success: function (data) {
            console.log(data);
            $.each(data, function (key, value) {
                console.log(value);
                id = value.id;
                var img = "<img src='storage/" + value.image_path + "' width='50px', height='50px'/>";
                var tr = $("<tr>");
                tr.append($("<td>").html(value.id).addClass("striped"));
                tr.append($("<td align='center'>").html(img).addClass("striped"));
                tr.append($("<td>").html(value.lname).addClass("striped"));
                tr.append($("<td>").html(value.fname).addClass("striped"));
                tr.append($("<td>").html(value.addressline).addClass("striped"));
                tr.append("<td align='center'><button class='btn' style='background-color:#D5B946' data-bs-toggle='modal' data-bs-target='#editCoachProfile' id='editbtn' data-id=" + id + "><svg xmlns='http://www.w3.org/2000/svg' width='22' height='22' fill='currentColor' class='bi bi-pencil-square' viewBox='0 0 16 16'><path d='M15.502 1.94a.5.5 0 0 1 0 .706L14.459 3.69l-2-2L13.502.646a.5.5 0 0 1 .707 0l1.293 1.293zm-1.75 2.456-2-2L4.939 9.21a.5.5 0 0 0-.121.196l-.805 2.414a.25.25 0 0 0 .316.316l2.414-.805a.5.5 0 0 0 .196-.12l6.813-6.814z'/><path fill-rule='evenodd' d='M1 13.5A1.5 1.5 0 0 0 2.5 15h11a1.5 1.5 0 0 0 1.5-1.5v-6a.5.5 0 0 0-1 0v6a.5.5 0 0 1-.5.5h-11a.5.5 0 0 1-.5-.5v-11a.5.5 0 0 1 .5-.5H9a.5.5 0 0 0 0-1H2.5A1.5 1.5 0 0 0 1 2.5z'/></svg></button></td>");
                tr.append("<td align='center'><button class='btn btn-danger'  class='deletebtn' data-id=" + id + "><svg xmlns='http://www.w3.org/2000/svg' width='22' height='22' fill='black' class='bi bi-trash3' viewBox='0 0 16 16'><path d='M6.5 1h3a.5.5 0 0 1 .5.5v1H6v-1a.5.5 0 0 1 .5-.5M11 2.5v-1A1.5 1.5 0 0 0 9.5 0h-3A1.5 1.5 0 0 0 5 1.5v1H1.5a.5.5 0 0 0 0 1h.538l.853 10.66A2 2 0 0 0 4.885 16h6.23a2 2 0 0 0 1.994-1.84l.853-10.66h.538a.5.5 0 0 0 0-1zm1.958 1-.846 10.58a1 1 0 0 1-.997.92h-6.23a1 1 0 0 1-.997-.92L3.042 3.5zm-7.487 1a.5.5 0 0 1 .528.47l.5 8.5a.5.5 0 0 1-.998.06L5 5.03a.5.5 0 0 1 .47-.53Zm5.058 0a.5.5 0 0 1 .47.53l-.5 8.5a.5.5 0 1 1-.998-.06l.5-8.5a.5.5 0 0 1 .528-.47M8 4.5a.5.5 0 0 1 .5.5v8.5a.5.5 0 0 1-1 0V5a.5.5 0 0 1 .5-.5'/></svg></button></td>");
                $("#coachBody").append(tr);
            });

        },
        error: function () {
            console.log('AJAX load did not work');
            alert("error");
        }
    });

    $("#coachSubmit").on('click', function (e) {
        e.preventDefault();
        var data = $('#newCoachForm')[0];
        console.log(data);
        let formData = new FormData(data);
        console.log(formData);
        for (var pair of formData.entries()) {
            console.log(pair[0] + ', ' + pair[1]);
        }
        $.ajax({
            type: "POST",
            url: "/api/coach",
            data: formData,
            contentType: false,
            processData: false,
            headers: { 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content') },
            dataType: "json",
            success: function (data) {
                console.log(data);
                var div = $("<div>");
                $("#newCoachProfile").modal("hide");
    
                // Clear form fields if needed
                $('#newCoachForm')[0].reset(); // Reset form fields

                var img = "<img src='storage/" + data.coach.image_path + "' width='50px', height='50px'/>";
                var tr = $("<tr>");
                tr.append($("<td>").html(data.coach.id));
                tr.append($("<td>").html(img));
                tr.append($("<td>").html(data.coach.lname));
                tr.append($("<td>").html(data.coach.fname));
                tr.append($("<td>").html(data.coach.addressline));
                tr.append("<td class='text-center' align='center'><a href='#' data-bs-toggle='modal' data-bs-target='#editCoachProfile' id='editbtn' data-id=" + data.coach.id + "><svg xmlns='http://www.w3.org/2000/svg' width='22' height='22' fill='currentColor' class='bi bi-pencil-square' viewBox='0 0 16 16'><path d='M15.502 1.94a.5.5 0 0 1 0 .706L14.459 3.69l-2-2L13.502.646a.5.5 0 0 1 .707 0l1.293 1.293zm-1.75 2.456-2-2L4.939 9.21a.5.5 0 0 0-.121.196l-.805 2.414a.25.25 0 0 0 .316.316l2.414-.805a.5.5 0 0 0 .196-.12l6.813-6.814z'/><path fill-rule='evenodd' d='M1 13.5A1.5 1.5 0 0 0 2.5 15h11a1.5 1.5 0 0 0 1.5-1.5v-6a.5.5 0 0 0-1 0v6a.5.5 0 0 1-.5.5h-11a.5.5 0 0 1-.5-.5v-11a.5.5 0 0 1 .5-.5H9a.5.5 0 0 0 0-1H2.5A1.5 1.5 0 0 0 1 2.5z'/></svg></a></td>");
                tr.append("<td class='text-center' align='center'><a href='#'  class='deletebtn' data-id=" + data.coach.id + "><svg xmlns='http://www.w3.org/2000/svg' width='22' height='22' fill='red' class='bi bi-trash3' viewBox='0 0 16 16'><path d='M6.5 1h3a.5.5 0 0 1 .5.5v1H6v-1a.5.5 0 0 1 .5-.5M11 2.5v-1A1.5 1.5 0 0 0 9.5 0h-3A1.5 1.5 0 0 0 5 1.5v1H1.5a.5.5 0 0 0 0 1h.538l.853 10.66A2 2 0 0 0 4.885 16h6.23a2 2 0 0 0 1.994-1.84l.853-10.66h.538a.5.5 0 0 0 0-1zm1.958 1-.846 10.58a1 1 0 0 1-.997.92h-6.23a1 1 0 0 1-.997-.92L3.042 3.5zm-7.487 1a.5.5 0 0 1 .528.47l.5 8.5a.5.5 0 0 1-.998.06L5 5.03a.5.5 0 0 1 .47-.53Zm5.058 0a.5.5 0 0 1 .47.53l-.5 8.5a.5.5 0 1 1-.998-.06l.5-8.5a.5.5 0 0 1 .528-.47M8 4.5a.5.5 0 0 1 .5.5v8.5a.5.5 0 0 1-1 0V5a.5.5 0 0 1 .5-.5'/></svg></a></td>");
                $("#coachBody").prepend(tr.hide().fadeIn(1000));
                

            },
            error: function (error) {
                console.log(error);
            }
        });
    });

    $('#editCoachProfile').on('show.bs.modal', function(e) {
        $("#editCoachForm").trigger("reset");
        $('#coachId').remove()
        
        console.log(e.relatedTarget)
        var id = $(e.relatedTarget).attr('data-id');
        console.log(id);
       
        $('<input>').attr({type: 'text', id:'coachId',name: 'coachId',value: id}).appendTo('#editCoachForm');
        $.ajax({
            type: "GET",
            url: `/api/coach/${id}`,
            success: function(data){
                   // console.log(data);
                   $("#coachId").val(data.id);
                   $("#coachLname2").val(data.lname);
                   $("#coachFname2").val(data.fname);
                   $("#coachAddressline2").val(data.addressline);
                   $("#coachZipcode2").val(data.zipcode);
                   $("#coachPhone2").val(data.phone); 
                   $("#coachAge2").val(data.age);
                   $("#coachGender2").val(data.gender);
                   $('#image').remove()
                   $("#editCoachForm").prepend(`<img src=" ${data.image_path}" width='200px', height='200px' id="image"   />`)
              },
             error: function(){
              console.log('AJAX load did not work');
              alert("error");
              }
          });
    });

    $("#coachUpdate").on('click', function (e) {
        e.preventDefault();
        var $id = $('#coachId').val();
        var $row = $('tr td > a[data-id="' + $id + '"]').closest('tr');
        console.log($id);
        // var data = $('#cform')[0];
        let formData = new FormData($('#editCoachForm')[0]);
        formData.append('_method', 'PUT')
        $.ajax({
            type: "POST",
            url: `/api/coach/${id}`,
            data: formData,
            contentType: false,
            processData: false,
            headers: { 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content') },
            dataType: "json",
            success: function (data) {
                console.log(data);
                $('#editCoachProfile').modal('hide')
                $row.remove()
                var img = "<img src='storage/" + data.coach.image_path + "' width='50px', height='50px'/>";
                var tr = $("<tr>");
                tr.append($("<td>").html(data.coach.id));
                tr.append($("<td>").html(img));
                tr.append($("<td>").html(data.coach.lname));
                tr.append($("<td>").html(data.coach.fname));
                tr.append($("<td>").html(data.coach.addressline));
                tr.append("<td class='text-center' align='center'><a href='#' data-bs-toggle='modal' data-bs-target='#editCoachProfile' id='editbtn' data-id=" + data.coach.id + "><svg xmlns='http://www.w3.org/2000/svg' width='22' height='22' fill='currentColor' class='bi bi-pencil-square' viewBox='0 0 16 16'><path d='M15.502 1.94a.5.5 0 0 1 0 .706L14.459 3.69l-2-2L13.502.646a.5.5 0 0 1 .707 0l1.293 1.293zm-1.75 2.456-2-2L4.939 9.21a.5.5 0 0 0-.121.196l-.805 2.414a.25.25 0 0 0 .316.316l2.414-.805a.5.5 0 0 0 .196-.12l6.813-6.814z'/><path fill-rule='evenodd' d='M1 13.5A1.5 1.5 0 0 0 2.5 15h11a1.5 1.5 0 0 0 1.5-1.5v-6a.5.5 0 0 0-1 0v6a.5.5 0 0 1-.5.5h-11a.5.5 0 0 1-.5-.5v-11a.5.5 0 0 1 .5-.5H9a.5.5 0 0 0 0-1H2.5A1.5 1.5 0 0 0 1 2.5z'/></svg></a></td>");
                tr.append("<td class='text-center' align='center'><a href='#'  class='deletebtn' data-id=" + data.coach.id + "><svg xmlns='http://www.w3.org/2000/svg' width='22' height='22' fill='red' class='bi bi-trash3' viewBox='0 0 16 16'><path d='M6.5 1h3a.5.5 0 0 1 .5.5v1H6v-1a.5.5 0 0 1 .5-.5M11 2.5v-1A1.5 1.5 0 0 0 9.5 0h-3A1.5 1.5 0 0 0 5 1.5v1H1.5a.5.5 0 0 0 0 1h.538l.853 10.66A2 2 0 0 0 4.885 16h6.23a2 2 0 0 0 1.994-1.84l.853-10.66h.538a.5.5 0 0 0 0-1zm1.958 1-.846 10.58a1 1 0 0 1-.997.92h-6.23a1 1 0 0 1-.997-.92L3.042 3.5zm-7.487 1a.5.5 0 0 1 .528.47l.5 8.5a.5.5 0 0 1-.998.06L5 5.03a.5.5 0 0 1 .47-.53Zm5.058 0a.5.5 0 0 1 .47.53l-.5 8.5a.5.5 0 1 1-.998-.06l.5-8.5a.5.5 0 0 1 .528-.47M8 4.5a.5.5 0 0 1 .5.5v8.5a.5.5 0 0 1-1 0V5a.5.5 0 0 1 .5-.5'/></svg></a></td>");
                $('#coachTable').prepend(tr.hide().fadeIn(1000));

            },
            error: function (error) {
                console.log(error);
            }
        });
    });

    $('#coachTable tbody').on('click', 'a.deletebtn', function (e) {

        var id = $(this).data('id');
        var $row = $(this).closest('tr');
        console.log(id);
        // console.log(table);
        e.preventDefault();
        bootbox.confirm({
            message: "do you want to delete this coach",
            buttons: {
                confirm: {
                    label: 'yes',
                    className: 'btn-success'
                },
                cancel: {
                    label: 'no',
                    className: 'btn-danger'
                }
            },
            callback: function (result) {
                console.log(result);
                if (result)
                    $.ajax({
                        type: "DELETE",
                        url: `/api/coach/${id}`,
                        headers: { 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content') },
                        dataType: "json",
                        success: function (data) {
                            console.log(data);
                            $row.fadeOut(1000, function () {
                                $row.remove()
                            });

                            bootbox.alert(data.message);
                        },
                        error: function (error) {
                            console.log(error);
                        }
                    });
            }
        });
    });
})
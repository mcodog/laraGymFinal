$(document).ready(function () {
    $("form[name='newCoachForm']").validate({

        rules: {
            coachImage_upload: "required",
          coachFname: "required",
          coachLname: "required",
          coachPhone: "required",
          coachAddressline: "required",
          coachZipcode: "required",
          coachAge: "required",
          coachGender: "required",
    
          coachImage_upload: {
            required: true,
          },
          coachFname: {
            required: true,
          },
          coachLname: {
            required: true,
          },
          coachPhone: {
            required: true,
          },
          coachAddressline: {
            required: true,
          },
          coachZipcode: {
            required: true,
          },
          coachZipcode: {
            required: true,
          },
          coachAge: {
            required: true,
          },
          coachGender: {
            required: true,
          },
    
        },
    
        messages: {
    
        coachImage_upload: "Upload Image",
        coachFname: "First Name Empty",
          coachLname: "Last Name Empty",
          coachPhone: "Phone Empty",
          coachAddressline: "Address Empty",
          coachZipcode: "Zipcode Empty",
          coachAge: "Age Empty",
          coachGender: "Gender Empty",
        },
        // Make sure the form is submitted to the destination defined
        // in the "action" attribute of the form when valid
        submitHandler: function(form) {
          form.submit();
        }
      });

    var coachTable = $('#coachTable').DataTable({
        ajax: {
            url: '/api/coach',
            dataType: 'json',
            dataSrc: ''
        },
        columns: [
            { data: 'id' },
            { data: 'fname' },
            { data: 'lname' },
            { data: 'addressline' },
            { data: 'phone' },
            { data: 'zipcode' },
            { data: 'age' },
            { data: 'gender' },
            {
                data: null,
                render: function(data, type, row) {
                    return '<button class="btn edit-btn" data-bs-toggle="modal" data-bs-target="#editCoachProfile" id="editbtn" edit-btn" data-id="' + row.id + '" data-type="coach">Edit</button>' +
                           '<button class="btn delete-btn deletebtn" data-id="' + row.id + '" data-type="coach">Delete</button>';
                }
            }
        ],
        columnDefs: [
            {
                targets: [6, 7, 8],
                orderable: false
            }
        ]
    });

    $("#coachSubmit").on('click', function (e) {
        e.preventDefault(); // Prevent default form submission
    
        var $form = $("form[name='newCoachForm']");
        if ($form.validate().form()) { // Validate form and check if it's valid
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
                    $('.modal-backdrop').remove();
                    $("#newCoachProfile").modal("hide"); // Hide the modal
    
                    // Clear form fields if needed
                    $('#newCoachForm')[0].reset(); // Reset form fields
    
                    var img = "<img src='storage/" + data.coach.image_path + "' width='50px' height='50px'/>";
                    var tr = $("<tr>").attr('data-id', data.coach.id);
                    tr.append($("<td>").html(data.coach.id));
                    tr.append($("<td>").html(img));
                    tr.append($("<td>").html(data.coach.lname));
                    tr.append($("<td>").html(data.coach.fname));
                    tr.append($("<td>").html(data.coach.addressline));
                    tr.append("<td align='center'><button class='btn' style='background-color:#D5B946' data-bs-toggle='modal' data-bs-target='#editCoachProfile' id='editbtn' data-id='" + data.coach.id + "'><svg xmlns='http://www.w3.org/2000/svg' width='22' height='22' fill='currentColor' class='bi bi-pencil-square' viewBox='0 0 16 16'><path d='M15.502 1.94a.5.5 0 0 1 0 .706L14.459 3.69l-2-2L13.502.646a.5.5 0 0 1 .707 0l1.293 1.293zm-1.75 2.456-2-2L4.939 9.21a.5.5 0 0 0-.121.196l-.805 2.414a.25.25 0 0 0 .316.316l2.414-.805a.5.5 0 0 0 .196-.12l6.813-6.814z'/><path fill-rule='evenodd' d='M1 13.5A1.5 1.5 0 0 0 2.5 15h11a1.5 1.5 0 0 0 1.5-1.5v-6a.5.5 0 0 0-1 0v6a.5.5 0 0 1-.5.5h-11a.5.5 0 0 1-.5-.5v-11a.5.5 0 0 1 .5-.5H9a.5.5 0 0 0 0-1H2.5A1.5 1.5 0 0 0 1 2.5z'/></svg></button></td>");
                    tr.append("<td align='center'><button class='btn btn-danger deletebtn' data-id='" + data.coach.id + "'><svg xmlns='http://www.w3.org/2000/svg' width='22' height='22' fill='black' class='bi bi-trash3' viewBox='0 0 16 16'><path d='M6.5 1h3a.5.5 0 0 1 .5.5v1H6v-1a.5.5 0 0 1 .5-.5M11 2.5v-1A1.5 1.5 0 0 0 9.5 0h-3A1.5 1.5 0 0 0 5 1.5v1H1.5a.5.5 0 0 0 0 1h.538l.853 10.66A2 2 0 0 0 4.885 16h6.23a2 2 0 0 0 1.994-1.84l.853-10.66h.538a.5.5 0 0 0 0-1zm1.958 1-.846 10.58a1 1 0 0 1-.997.92h-6.23a1 1 0 0 1-.997-.92L3.042 3.5zm-7.487 1a.5.5 0 0 1 .528.47l.5 8.5a.5.5 0 0 1-.998.06L5 5.03a.5.5 0 0 1 .47-.53Zm5.058 0a.5.5 0 0 1 .47.53l-.5 8.5a.5.5 0 1 1-.998-.06l.5-8.5a.5.5 0 0 1 .528-.47M8 4.5a.5.5 0 0 1 .5.5v8.5a.5.5 0 0 1-1 0V5a.5.5 0 0 1 .5-.5'/></svg></button></td>");
                    $("#coachBody").prepend(tr.hide().fadeIn(1000));
                },
                error: function (error) {
                    console.log(error);
                }
            });
        } else {
            e.stopPropagation(); // Prevent modal from closing if validation fails
        }
    });
    

    $('#editCoachProfile').on('show.bs.modal', function(e) {
        $("#editCoachForm").trigger("reset");
        $('#coachId').remove()
        
        console.log(e.relatedTarget)
        var id = $(e.relatedTarget).attr('data-id');
        console.log(id);
       
        $('<input hidden>').attr({type: 'text', id:'coachId',name: 'coachId',value: id,}).appendTo('#editCoachForm');
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
                   $("#editCoachForm").prepend(`<img src='storage/${data.image_path}' width='200px', height='200px' id="image"   />`)
              },
             error: function(){
              console.log('AJAX load did not work');
              alert("error");
              }
          });
    });

    $("#coachUpdate").on('click', function (e) {
        e.preventDefault();
        var id = $('#coachId').val();
        var $row =  $('#tr' + id);
        console.log(id);
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
                var tr = $("<tr id='tr"+ id +"'>");
                tr.append($("<td>").html(data.coach.id));
                tr.append($("<td>").html(img));
                tr.append($("<td>").html(data.coach.lname));
                tr.append($("<td>").html(data.coach.fname));
                tr.append($("<td>").html(data.coach.addressline));
                tr.append("<td align='center'><button class='btn' style='background-color:#D5B946' data-bs-toggle='modal' data-bs-target='#editCoachProfile' id='editbtn' data-id=" + data.coach.id + "><svg xmlns='http://www.w3.org/2000/svg' width='22' height='22' fill='currentColor' class='bi bi-pencil-square' viewBox='0 0 16 16'><path d='M15.502 1.94a.5.5 0 0 1 0 .706L14.459 3.69l-2-2L13.502.646a.5.5 0 0 1 .707 0l1.293 1.293zm-1.75 2.456-2-2L4.939 9.21a.5.5 0 0 0-.121.196l-.805 2.414a.25.25 0 0 0 .316.316l2.414-.805a.5.5 0 0 0 .196-.12l6.813-6.814z'/><path fill-rule='evenodd' d='M1 13.5A1.5 1.5 0 0 0 2.5 15h11a1.5 1.5 0 0 0 1.5-1.5v-6a.5.5 0 0 0-1 0v6a.5.5 0 0 1-.5.5h-11a.5.5 0 0 1-.5-.5v-11a.5.5 0 0 1 .5-.5H9a.5.5 0 0 0 0-1H2.5A1.5 1.5 0 0 0 1 2.5z'/></svg></button></td>");
                tr.append("<td align='center'><button class='btn btn-danger'  class='deletebtn' data-id=" + data.coach.id + "><svg xmlns='http://www.w3.org/2000/svg' width='22' height='22' fill='black' class='bi bi-trash3' viewBox='0 0 16 16'><path d='M6.5 1h3a.5.5 0 0 1 .5.5v1H6v-1a.5.5 0 0 1 .5-.5M11 2.5v-1A1.5 1.5 0 0 0 9.5 0h-3A1.5 1.5 0 0 0 5 1.5v1H1.5a.5.5 0 0 0 0 1h.538l.853 10.66A2 2 0 0 0 4.885 16h6.23a2 2 0 0 0 1.994-1.84l.853-10.66h.538a.5.5 0 0 0 0-1zm1.958 1-.846 10.58a1 1 0 0 1-.997.92h-6.23a1 1 0 0 1-.997-.92L3.042 3.5zm-7.487 1a.5.5 0 0 1 .528.47l.5 8.5a.5.5 0 0 1-.998.06L5 5.03a.5.5 0 0 1 .47-.53Zm5.058 0a.5.5 0 0 1 .47.53l-.5 8.5a.5.5 0 1 1-.998-.06l.5-8.5a.5.5 0 0 1 .528-.47M8 4.5a.5.5 0 0 1 .5.5v8.5a.5.5 0 0 1-1 0V5a.5.5 0 0 1 .5-.5'/></svg></button></td>");
                $('#coachTable').prepend(tr.hide().fadeIn(1000));

            },
            error: function (error) {
                console.log(error);
            }
        });
    });

    $('#coachTable #coachBody').on('click', 'button.deletebtn', function (e) {
        // alert('dsad');
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
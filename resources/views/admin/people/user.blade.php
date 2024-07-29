@extends('layouts.admin')

@section('content')


<style>
    .delete-btn {
        background-color: transparent;
        transition:.5s;
        color:#D5B946;
    }
    .delete-btn:hover {
                        transition: .5s;
                        background-color: #D5B946;
                        color: black;
                    }
    .edit-btn {
        background-color: transparent;
        transition:.5s;
        color:#D5B946;
    }
    .edit-btn:hover {
                        transition: .5s;
                        background-color: #D5B946;
                        color: black;
                    }
    form .error {
  color: #ff0000;
}
</style>

<div class="container-fluid d-flex flex-column justify-content-center p-3 overflow-hidden" style="height:92vh">
<div class="table-responsive" style="color:white">
                <table id="usersTb" class="datatable">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>name</th>
                            <th>email</th>
                            <th>role</th>
                            <th>Status</th>

                            <th>Controls</th>
                        </tr>
                    </thead>
                    <tbody id="usersBody"></tbody>
                </table>
            </div>
</div>

<script src="https://code.jquery.com/jquery-3.7.1.js" integrity="sha256-eKhayi8LEQwp4NKxN+CfCh+3qOVUtJn3QNZ0TciWLP4=" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.3/js/bootstrap.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/jquery-validation@1.19.5/dist/jquery.validate.min.js"></script>
<script src="https://cdn.datatables.net/2.1.2/js/dataTables.js"></script>

<link rel="stylesheet" href="https://cdn.datatables.net/2.1.2/css/dataTables.dataTables.css" />

<!-- <script src="{{ asset('js/client.js') }}"></script> -->



<script>
    var programTable = $('#usersTb').DataTable({
        ajax: {
            url: '/api/user',
            dataType: 'json',
            dataSrc: ''
        },
        columns: [{
                data: 'id'
            },
            {
                data: 'name'
            },
            {
                data: 'email'
            },
            {
                data: 'role'
            },
            {
                data: 'status'
            },

            {
                data: 'status', // Assuming 'status' is the key in the data object
                render: function(data, type, row) {
                    if (data === 1) {
                        return '<button class="btn btn-sm edit-btn enable-btn"   data-id="' + row.id + '">Disable</button>';
                    } else if (data === 0) {
                        return '<button class="btn btn-sm edit-btn disable-btn" data-id="' + row.id + '">Enable</button>';
                    } else {
                        // Optional: Handle unexpected statuses
                        return '<button class="btn btn-sm edit-btn" disabled>Unknown</button>';
                    }
                }
            },

            {
                data: 'role', // Assuming 'status' is the key in the data object
                render: function(data, type, row) {
                    if (data === 1) {
                        return '<button class="btn btn-sm edit-btn enable-btn"   data-id="' + row.id + '">Set to Admin</button>';
                    } else if (data === 0) {
                        return '<button class="btn btn-sm edit-btn disable-btn" data-id="' + row.id + '">Set to Client</button>';
                    } else {
                        // Optional: Handle unexpected statuses
                        return '<button class="btn btn-sm edit-btn" disabled>Unknown</button>';
                    }
                }
            }
        ],
        columnDefs: [{
            targets: [4],
            orderable: false
        }]
    });

    
</script>

<script>

$(document).ready(function () {
    $(document).on('click', '.disable-btn', function () {    
        var id = $(this).data('id');
        var $row = $('tr td > button[data-id="' + id + '"]').closest('tr');
        $.ajax({
            type: "GET",
            url: `/api/disable/${id}`,
            contentType: false,
            processData: false,
            headers: { 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content') },
            dataType: "json",
            success: function (data) {
                console.log(data);
    
                    $($row).fadeOut(500, function() {
                        $row.remove();
                    });
    
                    var tr = $("<tr style='text-align:right'>").attr('data-id', data.user.id);
                    tr.append($("<tdstyle='text-align:right'>").html(data.user.id));
                    // Add other table cells with data from the response
                    tr.append($("<td style='text-align:right'>").html(data.user.email));
                    tr.append($("<td >"));
                    tr.append($("<td style='text-align:right'>").html(data.user.role));
                    

                    tr.append($("<td>").html(data.user.status));
                    if (data.user.status === 1) {
                        tr.append($('<button class="btn btn-sm edit-btn enable-btn"   data-id="' + data.user.id + '">Disable</button>'));
                    } else if (data.user.status === 0) {
                        tr.append($('<button class="btn btn-sm edit-btn disable-btn" data-id="' + data.user.id + '">Enable</button>'));
                    } else {
                        // Optional: Handle unexpected statuses
                        return '<button class="btn btn-sm edit-btn" disabled>Unknown</button>';
                    }

                    $("#usersBody").prepend(tr.hide().fadeIn(1000));
                console.log(data);
                

            },
            error: function (error) {
                console.log(error);
            }
        });
    });

    $(document).on('click', '.enable-btn', function () {    
        var id = $(this).data('id');
        var $row = $('tr td > button[data-id="' + id + '"]').closest('tr');
        $.ajax({
            type: "GET",
            url: `/api/enable/${id}`,
            contentType: false,
            processData: false,
            headers: { 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content') },
            dataType: "json",
            success: function (data) {
                console.log(data);
                
                $($row).fadeOut(500, function() {
                        $row.remove();
                    });
    
                    var tr = $("<tr style='text-align:right'>").attr('data-id', data.user.id);
                    tr.append($("<tdstyle='text-align:right'>").html(data.user.id));
                    // Add other table cells with data from the response
                    tr.append($("<td style='text-align:right'>").html(data.user.email));
                    tr.append($("<td >"));
                    tr.append($("<td style='text-align:right'>").html(data.user.role));
                    

                    tr.append($("<td>").html(data.user.status));
                    if (data.user.status === 1) {
                        tr.append($('<button class="btn btn-sm edit-btn enable-btn"   data-id="' + data.user.id + '">Disable</button>'));
                    } else if (data.user.status === 0) {
                        tr.append($('<button class="btn btn-sm edit-btn disable-btn" data-id="' + data.user.id + '">Enable</button>'));
                    } else {
                        // Optional: Handle unexpected statuses
                        return '<button class="btn btn-sm edit-btn" disabled>Unknown</button>';
                    }

                    $("#usersBody").prepend(tr.hide().fadeIn(1000));
                console.log(data);
                
            },
            error: function (error) {
                console.log(error);
            }
        });
    });
});

</script>
@endsection
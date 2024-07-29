@extends('layouts.admin')

@section('content')
<link rel="stylesheet" href="https://cdn.datatables.net/2.1.2/css/dataTables.dataTables.css" />



<style>
    .delete-btn {
        background-color: transparent;
        transition: .5s;
        color: #D5B946;
    }

    .delete-btn:hover {
        transition: .5s;
        background-color: #D5B946;
        color: black;
    }

    .edit-btn {
        background-color: transparent;
        transition: .5s;
        color: #D5B946;
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

<div class="container-fluid  d-flex flex-column" style="height:92vh; overflow:hidden">

    <div class="card w-100 bg-dark text-light" style="max-height:40%;">

        <div class="card-header text-light d-flex justify-content-between" style="background-color:rgb(18, 18, 18)">
            <h4>Programs</h4><button type="button" class="btn text-white py-2" style="background-color:rgb(79, 70, 229)" data-bs-toggle="modal" data-bs-target="#newSessionModal">
                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-plus-lg" viewBox="0 0 16 16">
                    <path fill-rule="evenodd" d="M8 2a.5.5 0 0 1 .5.5v5h5a.5.5 0 0 1 0 1h-5v5a.5.5 0 0 1-1 0v-5h-5a.5.5 0 0 1 0-1h5v-5A.5.5 0 0 1 8 2" />
                </svg>
            </button>
        </div>
        <div class="card-body bg-dark text-light overflow-auto" style="max-height:85%;">
            <div class="table-responsive">
                <table id="programTable" class="datatable">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Coach</th>
                            <th>Title</th>
                            <th>Description</th>

                            <th>Duration</th>
                            <th>Cost</th>
                            <th>Difficulty</th>
                            <th>Schedule</th>
                            <th>Controls</th>
                        </tr>
                    </thead>
                    <tbody id="programBody"></tbody>
                </table>
            </div>
        </div>
    </div>

    <br><br>

    <div class="card w-100 bg-dark text-light" style="max-height:50%;">
        <div class="card-header text-light d-flex justify-content-between" style="background-color:rgb(18, 18, 18)">
            <h4>Membership Deal</h4><button type="button" class="btn text-white py-2" style="background-color:rgb(79, 70, 229)" data-bs-toggle="modal" data-bs-target="#newMemModal">
                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-plus-lg" viewBox="0 0 16 16">
                    <path fill-rule="evenodd" d="M8 2a.5.5 0 0 1 .5.5v5h5a.5.5 0 0 1 0 1h-5v5a.5.5 0 0 1-1 0v-5h-5a.5.5 0 0 1 0-1h5v-5A.5.5 0 0 1 8 2" />
                </svg>
            </button>
        </div>
        <div class="card-body bg-dark text-light overflow-auto">
            <div class="">
                <table id="mTable" class="datatable">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Title</th>
                            <th>Description</th>

                            <th>Duration</th>
                            <th>Allow Visitors</th>
                            <th>Cost</th>
                            <th>Perks</th>
                            <th>Controls</th>
                        </tr>
                    </thead>
                    <tbody id="mBody"></tbody>
                </table>
            </div>
        </div>
    </div>
</div>


<div class="modal fade text-dark bd-example-modal-lg" id="newSessionModal" role="dialog" style="display:none">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="exampleModalLabel">New Session Info</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body text-dark">
                <form id="newSessionForm" name="newSessionForm" enctype="multipart/form-data" action="#" method="#">
                    <!-- Category Name Input -->
                    <div class="mb-3">
                        <div class="form-group">
                            <label for="image" class="control-label">Image</label>
                            <input type="file" class="form-control" id="image_upload" name="image_upload" />
                        </div>
                    </div>

                    <h6>General Information</h6>
                    <hr class="bg-danger border-2 border-top border-secondary" />
                    <div class="container-fluid">
                        <div class="row">
                            <div class="col">
                                <label for="productDesc" class="form-label">Title</label>
                                <input type="text" class="form-control" id="title" name="title">
                            </div>

                            <div class="col">
                                <label for="productCategory" class="form-label">Description</label>
                                <input type="text" class="form-control" id="description" name="description">
                            </div>
                        </div>
                    </div>

                    <div class="container-fluid">
                        <div class="mb-3">
                            <label for="productManu" class="form-label">Coach</label>
                            <select class="form-control" id="coach" name="coach">

                            </select>
                        </div>
                    </div>

                    <div class="container-fluid">
                        <div class="mb-3">
                            <label for="productManu" class="form-label">Difficulty</label>
                            <select class="form-control" id="difficulty" name="difficulty">
                                <option value="Easy">Easy</option>
                                <option value="Medium">Medium</option>
                                <option value="Hard">Hard</option>
                            </select>
                        </div>
                    </div>

                    <div class="container-fluid">
                        <div class="row">
                            <div class="col">
                                <label for="productPrice" class="form-label">Cost</label>
                                <input type="text" class="form-control" id="cost" name="cost">
                            </div>

                            <div class="col">
                                <label for="productCost" class="form-label">Duration</label>
                                <input type="text" class="form-control" id="duration" name="duration">
                            </div>
                        </div>
                    </div>

                    <div class="container-fluid">
                        <div class="row">
                            <div class="col">
                                <label for="schedule" class="form-label">Schedule</label>

                                <div class="d-flex justify-content-around">
                                    <input type="checkbox" id="monday2" name="days[]" value="Monday">
                                    <label for="monday">Monday</label>
                                    <input type="checkbox" id="tuesday2" name="days[]" value="Tuesday">
                                    <label for="tuesday">Tuesday</label>
                                    <input type="checkbox" id="wednesday2" name="days[]" value="Wednesday">
                                    <label for="wednesday">Wednesday</label>
                                    <input type="checkbox" id="thursday2" name="days[]" value="Thursday">
                                    <label for="thursday">Thursday</label>
                                    <input type="checkbox" id="friday2" name="days[]" value="Friday">
                                    <label for="friday">Friday</label>
                                    <input type="checkbox" id="saturday2" name="days[]" value="Saturday">
                                    <label for="saturday">Saturday</label>
                                    <input type="checkbox" id="sunday2" name="days[]" value="Sunday">
                                    <label for="sunday">Sunday</label>
                                </div>


                            </div>
                        </div>

                        <!-- Optional Description Input -->

                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                            <button id="sessionSubmit" type="submit" class="btn btn-primary">Save changes</button>
                        </div>
                </form>
            </div>

        </div>
    </div>
</div>
</div>

<div class="modal fade text-dark bd-example-modal-lg" id="editProgramModal" role="dialog" style="display:none">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="exampleModalLabel">Edit Session Info</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body text-dark">
                <form id="editModalForm" enctype="multipart/form-data" action="#" method="#">
                    <!-- Category Name Input -->
                    <div class="mb-3">
                        <div class="form-group">
                            <label for="image" class="control-label">Image2</label>
                            <input type="file" class="form-control" id="image_upload" name="image_upload" />
                        </div>
                    </div>

                    <h6>General Information</h6>
                    <hr class="bg-danger border-2 border-top border-secondary" />
                    <div class="container-fluid">
                        <div class="row">
                            <div class="col">
                                <label for="productDesc" class="form-label">Title</label>
                                <input type="text" class="form-control" id="title2" name="title2" required>
                            </div>

                            <div class="col">
                                <label for="productCategory" class="form-label">Description</label>
                                <input type="text" class="form-control" id="description2" name="description2" required>
                            </div>
                        </div>
                    </div>

                    <div class="container-fluid">
                        <div class="mb-3">
                            <label for="productManu" class="form-label">Coach</label>
                            <select class="form-control" id="coach2" name="coach2" required>

                            </select>
                        </div>
                    </div>

                    <div class="container-fluid">
                        <div class="mb-3">
                            <label for="productManu" class="form-label">Difficulty</label>
                            <select class="form-control" id="difficulty2" name="difficulty2" required>
                                <option value="Easy">Easy</option>
                                <option value="Medium">Medium</option>
                                <option value="Hard">Hard</option>
                            </select>
                        </div>
                    </div>

                    <div class="container-fluid">
                        <div class="row">
                            <div class="col">
                                <label for="productPrice" class="form-label">Cost</label>
                                <input type="text" class="form-control" id="cost2" name="cost2" required>
                            </div>

                            <div class="col">
                                <label for="productCost" class="form-label">Duration</label>
                                <input type="text" class="form-control" id="duration2" name="duration2" required>
                            </div>
                        </div>
                    </div>

                    <div class="container-fluid">
                        <div class="row">
                            <div class="col">
                                <label for="schedule" class="form-label">Schedule</label>

                                <div class="d-flex justify-content-around">
                                    <input type="checkbox" id="monday" name="days[]" value="Monday">
                                    <label for="monday">Monday</label>
                                    <input type="checkbox" id="tuesday" name="days[]" value="Tuesday">
                                    <label for="tuesday">Tuesday</label>
                                    <input type="checkbox" id="wednesday" name="days[]" value="Wednesday">
                                    <label for="wednesday">Wednesday</label>
                                    <input type="checkbox" id="thursday" name="days[]" value="Thursday">
                                    <label for="thursday">Thursday</label>
                                    <input type="checkbox" id="friday" name="days[]" value="Friday">
                                    <label for="friday">Friday</label>
                                    <input type="checkbox" id="saturday" name="days[]" value="Saturday">
                                    <label for="saturday">Saturday</label>
                                    <input type="checkbox" id="sunday" name="days[]" value="Sunday">
                                    <label for="sunday">Sunday</label>
                                </div>


                            </div>
                        </div>

                        <!-- Optional Description Input -->

                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                            <button id="sessionUpdate" type="submit" class="btn btn-primary" data-bs-dismiss="modal">Save changes</button>
                        </div>
                </form>
            </div>

        </div>
    </div>
</div>
</div>


<div class="modal fade text-dark bd-example-modal-lg" id="newMemModal" role="dialog" style="display:none">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="exampleModalLabel">New Membership Deal Info</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body text-dark">
                <form id="newMemForm" name="newMemForm" enctype="multipart/form-data" action="#" method="#">
                    <!-- Category Name Input -->
                    <div class="mb-3">
                        <div class="form-group">
                            <label for="image" class="control-label">Image</label>
                            <input type="file" class="form-control" id="image_upload" name="image_upload" />
                        </div>
                    </div>

                    <h6>General Information</h6>
                    <hr class="bg-danger border-2 border-top border-secondary" />
                    <div class="container-fluid">
                        <div class="row">
                            <div class="col">
                                <label for="productDesc" class="form-label">Title</label>
                                <input type="text" class="form-control" id="memTitle" name="memTitle" >
                            </div>

                            <div class="col">
                                <label for="productCategory" class="form-label">Description</label>
                                <input type="text" class="form-control" id="memDescription" name="memDescription" >
                            </div>
                        </div>
                    </div>

                    <div class="container-fluid">
                        <div class="mb-3">
                            <label for="productManu" class="form-label">Duration</label>
                            <select class="form-control" id="memDuration" name="memDuration" >
                                <option value="1">1 Month</option>
                                <option value="3">3 Months</option>
                                <option value="6">6 Months</option>
                                <option value="12">Annual</option>
                            </select>
                        </div>
                    </div>

                    <div class="container-fluid">
                        <div class="row">
                            <div class="col">
                                <label for="productPrice" class="form-label">Cost</label>
                                <input type="text" class="form-control" id="cost" name="cost" >
                            </div>

                            <div class="col">
                                <label for="visitor" class="form-label">Allow Visitors</label> <br>
                                <input type="text" class="form-control" id="visitor" name="visitor"  readonly> <br>
                                <input type="radio" id="yes" name="visitors" value="1">
                                <label for="yes">Yes</label><br>
                                <input type="radio" id="no" name="visitors" value="0">
                                <label for="no">No</label><br>
                            </div>
                        </div>
                    </div>

                    <div class="container-fluid">
                        <div class="row">
                            <div class="col">
                                <label for="schedule" class="form-label">Perks</label>

                                <div class="d-flex flex-column justify-content-around">
                                    <div>
                                        <input type="checkbox" id="wifi" name="perks[]" value="Monday">
                                        <label for="wifi">FREE WiFi</label>
                                    </div>
                                    <div>
                                        <input type="checkbox" id="location" name="perks[]" value="Monday">
                                        <label for="location">Access to ALL location</label>
                                    </div>
                                    <div>
                                        <input type="checkbox" id="tanning" name="perks[]" value="Monday">
                                        <label for="tanning">FREE tanning</label>
                                    </div>
                                    <div>
                                        <input type="checkbox" id="hydro" name="perks[]" value="Monday">
                                        <label for="hydro">FREE hydro massage bed use</label>
                                    </div>
                                    <div>
                                        <input type="checkbox" id="exclusiveArea" name="perks[]" value="Monday">
                                        <label for="exclusiveArea">Access to Exclusive Workout Area</label>
                                    </div>

                                </div>


                            </div>
                        </div>

                        <!-- Optional Description Input -->

                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                            <button id="membershipSubmit" type="submit" class="btn btn-primary">Save changes</button>
                        </div>
                </form>
            </div>

        </div>
    </div>
</div>
</div>

<div class="modal fade text-dark bd-example-modal-lg" id="editMemModal" role="dialog" style="display:none">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="exampleModalLabel">Edit Membership Info</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body text-dark">
                <form id="editMemForm" enctype="multipart/form-data" action="#" method="#">
                    <!-- Category Name Input -->
                    <!-- Category Name Input -->
                    <div class="mb-3">
                        <div class="form-group">
                            <label for="image" class="control-label">Image</label>
                            <input type="file" class="form-control" id="image_upload" name="image_upload" />
                        </div>
                    </div>

                    <h6>General Information</h6>
                    <hr class="bg-danger border-2 border-top border-secondary" />
                    <div class="container-fluid">
                        <div class="row">
                            <div class="col">
                                <label for="productDesc" class="form-label">Title</label>
                                <input type="text" class="form-control" id="memTitle2" name="memTitle2" required>
                            </div>

                            <div class="col">
                                <label for="productCategory" class="form-label">Description</label>
                                <input type="text" class="form-control" id="memDescription2" name="memDescription2" required>
                            </div>
                        </div>
                    </div>

                    <div class="container-fluid">
                        <div class="mb-3">
                            <label for="productManu" class="form-label">Duration</label>
                            <select class="form-control" id="memDuration2" name="memDuration2" required>
                                <option value="1">1 Month</option>
                                <option value="3">3 Months</option>
                                <option value="6">6 Months</option>
                                <option value="12">Annual</option>
                            </select>
                        </div>
                    </div>

                    <div class="container-fluid">
                        <div class="row">
                            <div class="col">
                                <label for="productPrice" class="form-label">Cost</label>
                                <input type="text" class="form-control" id="cost3" name="cost3" required>
                            </div>

                            <div class="col">
                                <label for="visitor" class="form-label">Allow Visitors</label> <br>
                                <input type="text" class="form-control" id="visitor3" name="visitor3" required readonly> <br>
                                <input type="radio" id="yes" name="visitors2" value="1">
                                <label for="yes">Yes</label><br>
                                <input type="radio" id="no" name="visitors2" value="0">
                                <label for="no">No</label><br>
                            </div>
                        </div>
                    </div>

                    <div class="container-fluid">
                        <div class="row">
                            <div class="col">
                                <label for="schedule" class="form-label">Perks</label>

                                <div class="d-flex flex-column justify-content-around">
                                    <div>
                                        <input type="checkbox" id="wifi" name="perks[]" value="Monday">
                                        <label for="wifi">FREE WiFi</label>
                                    </div>
                                    <div>
                                        <input type="checkbox" id="location" name="perks[]" value="Monday">
                                        <label for="location">Access to ALL location</label>
                                    </div>
                                    <div>
                                        <input type="checkbox" id="tanning" name="perks[]" value="Monday">
                                        <label for="tanning">FREE tanning</label>
                                    </div>
                                    <div>
                                        <input type="checkbox" id="hydro" name="perks[]" value="Monday">
                                        <label for="hydro">FREE hydro massage bed use</label>
                                    </div>
                                    <div>
                                        <input type="checkbox" id="exclusiveArea" name="perks[]" value="Monday">
                                        <label for="exclusiveArea">Access to Exclusive Workout Area</label>
                                    </div>

                                </div>


                            </div>
                        </div>

                        <!-- Optional Description Input -->

                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                            <button id="membershipUpdate" type="submit" class="btn btn-primary" data-bs-dismiss="modal">Save changes</button>
                        </div>
                </form>
            </div>

        </div>
    </div>
</div>
</div>
<script src="https://code.jquery.com/jquery-3.7.1.js" integrity="sha256-eKhayi8LEQwp4NKxN+CfCh+3qOVUtJn3QNZ0TciWLP4=" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.3/js/bootstrap.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/jquery-validation@1.19.5/dist/jquery.validate.min.js"></script>
<script src="https://cdn.datatables.net/2.1.2/js/dataTables.js"></script>

<script src="{{ asset('js/program.js') }}"></script>
<script src="{{ asset('js/membership.js') }}"></script>

<!-- jQuery -->

<!-- DataTables JavaScript -->

<!-- Bootstrap JS -->




<script>
    var programTable = $('#programTable').DataTable({
        ajax: {
            url: '/api/program',
            dataType: 'json',
            dataSrc: ''
        },
        columns: [{
                data: 'id'
            },
            {
                data: 'coach.lname'
            },
            {
                data: 'title'
            },
            {
                data: 'description'
            },
            {
                data: 'duration'
            },
            {
                data: 'cost'
            },
            {
                data: 'difficulty'
            },
            {
                data: 'schedule'
            },
            {
                data: null,
                render: function(data, type, row) {
                    return '<button class="btn btn-sm edit-btn" data-bs-toggle="modal" data-bs-target="#editProgramModal" id="editbtn" data-id="' + row.id + '">Edit</button>' +
                        '<button class="btn btn-sm delete-btn deletebtn" data-id="' + row.id + '" data-type="program">Delete</button>';
                }
            }
        ],
        columnDefs: [{
            targets: [6, 7, 8],
            orderable: false
        }]
    });

    var membershipTable = $('#mTable').DataTable({
        ajax: {
            url: '/api/membership',
            dataType: 'json',
            dataSrc: ''
        },
        columns: [{
                data: 'id'
            },
            {
                data: 'title'
            },
            {
                data: 'description'
            },
            {
                data: 'duration'
            },
            {
                data: 'allow_visitors'
            },
            {
                data: 'cost'
            },
            {
                data: 'perks'
            },
            {
                data: null,
                render: function(data, type, row) {
                    return '<button class="btn edit-btn" data-bs-toggle="modal" data-bs-target="#editMemModal" id="editbtn" data-id=' + row.id + '>Edit</button>' +
                        '<button class="btn btn-sm delete-btn deletebtn" data-id="' + row.id + '" data-type="membership">Delete</button>';
                }
            }
        ],
        columnDefs: [{
            targets: [6, 7],
            orderable: false
        }]
    });
</script>

@endsection
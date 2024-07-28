@extends('layouts.client')

@section('content')

<style>
    .main-container {
        width: 100%;
        display: flex;
        justify-content: center;

        padding:50px;

        flex-direction: column;
        gap:20px;
    }

    .main-title {
        height: 120px;
        /* border:1px solid red; */
        font-family: 'Poppins', sans-serif; 

        font-weight: 600;
        font-size: 55px;
        padding-left: 40px;
        padding-bottom: 0px;
    }

    .main-details {
        flex-grow: 2;
        /* border:1px solid red; */

        display: flex;
        gap:20px;
    }

    .nav-item {
        color:black;
    }
</style>
<br><br><br>
<div class="main-container">
    <div class="main-title">
        {{ $program->title }}
    </div>
    <hr>
    <div class="main-details">
        <div class="main-img">
            <img src="{{ asset('storage/images/' . $program->image) }}" alt="Program Flyer">
        </div>
        <div class="details">
        <div>
            <h4 style="font-size:22px;font-family:'Poppins', sans-serif;">Address</h4>
        </div>
        <div>
            <input type="text" class="form-control" readonly value="{{ $program->description }}">
        </div>
        <br>
        <div style="display:flex;flex-direction:row;">
            <div style="flex-grow:1">
            <div>
                <h4 style="font-size:22px;font-family:'Poppins', sans-serif;">Phone</h4>
            </div>
            <input type="text" class="form-control" readonly value="{{ $program->description }}">
            </div>
            <div style="width:5%;"></div>
            <div style="flex-grow:1">
                <div>
                    <h4 style="font-size:22px;font-family:'Poppins', sans-serif;">Zipcode</h4>
                </div>
                <input type="text" class="form-control" readonly value="{{ $program->duration }}">
            </div>
        </div>
        <br>
        <button class="btn btn-primary" data-toggle="modal" data-target="#getMembershipModal">Apply</button>

        <form id="membershipDetails" enctype="multipart/form-data" action="#" method="#">
        @csrf
        <input type="text" id="accountIdInp" name="accountIdInp" value="{{ $account->id }}" hidden>
        <input type="text" id="membershipIdInp" name="membershipIdInp" value="{{ $program->id }}" hidden>
        <input type="text"  hidden>
        <input type="text" id="schedule" name="schedule" value="{{ $program->schedule }}" hidden>


        <form>
        <input id="account_id" type="text" class="form-control" value="{{ $account->id }}" readonly hidden>
        <input id="client_id" type="text" class="form-control" value="{{ $account->client_id }}" readonly hidden>
        <input id="membership_id" type="text" class="form-control" value="{{ $account->membership_id }}" readonly hidden>
    </div>
</div>

<div class="modal fade" id="getMembershipModal" aria-hidden="true" aria-labelledby="getMembershipModal" tabindex="-1">
  <div class="modal-dialog modal-lg modal-dialog-centered">
    <div class="modal-content">
      <div class="modal-header">
        <h3 class="modal-title" id="exampleModalToggleLabel2">Program Info</h3>
        <button type="button" class="btn-close" data-bs-dismiss="getMembershipModal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <h5>Program Details</h5>
        <hr>
        <div class="container-fluid">
            <div class="mb-3">
                <label for="productManu" class="form-label">Description</label>
                <input class="form-control" id="description" name="description" value="{{ $program->description }}"readonly>
            </div>
        </div>

        <div class="container-fluid">
            <div class="row">
                <div class="col">
                    <label for="productDesc" class="form-label">Duration</label>
                    <input type="text" class="form-control" id="duration" name="duration" value="{{ $program->duration }}" readonly>
                </div>

                <div class="col">
                    <label for="productCategory" class="form-label">Cost</label>
                    <input type="text" class="form-control" id="cost" name="cost" value="{{ $program->cost }}" readonly>
                </div>

                <div class="col">
                    <label for="productCategory" class="form-label">Difficulty</label>
                    <input type="text" class="form-control" id="difficulty" name="difficulty" value="{{ $program->difficulty }}" readonly>
                </div>
            </div>
        </div>

        <div class="container-fluid">
            <div class="mb-3">
                <label for="productManu" class="form-label">Schedule</label>
                <input class="form-control" id="schedule2" name="schedule2" value="{{ $program->schedule }}"readonly>
            </div>
        </div>

        <h5>Application Form</h5>
        <hr>
        <form id="account_programInfo" enctype="multipart/form-data" action="#" method="#">
            <div class="container-fluid">
                <div class="mb-3">
                    <input class="form-control" id="selectedProgram" name="selectedProgram" value="{{ $program->id }}" hidden required readonly>

                </div>
            </div>
            <div class="container-fluid">
                <div class="row">
                    <div class="col">
                        <label for="productDesc" class="form-label">Start Date</label>
                        <input type="date" class="form-control" id="startDateInp" name="startDateInp" required readonly>
                    </div>

                    <div class="col">
                        <label for="productCategory" class="form-label">End Date</label>
                        <input type="date" class="form-control" id="endDateInp" name="endDateInp" required readonly>
                    </div>
                </div>
            </div>

            <br>

            <div class="container-fluid">
                <div class="mb-3">
                    <label for="productManu" class="form-label">Duration</label>
                    <select class="form-control" id="durationInp" name="durationInp" required readonly>

                    </select>
                </div>
            </div>

            <div class="container-fluid">
                <div class="mb-3">
                    <label for="productManu" class="form-label">Cost</label>
                    <input class="form-control" id="costInp" name="costInp" required  readonly>
                </div>
            </div>
                    
        </form>
      </div>
      <div class="modal-footer">
      <a class="btn btn-primary" id="submitMembership" data-bs-toggle="modal" href="#exampleModalToggle" role="button">Submit</a>
      </div>
    </div>
  </div>
</div>
<script src="{{ asset('js/browse_programs.js') }}"></script>

<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.3/umd/popper.min.js" integrity="sha384-vFJXuSJphROIrBnz7yo7oB41mKfc8JzQZiCq4NCceLEaO4IHwicKwpJf9c9IpFgh" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/js/bootstrap.min.js" integrity="sha384-alpBpkh1PFOepccYVYDB4do5UnbKysX5WZXm3XxPqe5iKTfUKjNkCk9SaVuEZflJ" crossorigin="anonymous"></script>


@endsection
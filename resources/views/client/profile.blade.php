@extends('layouts.client')

@section('content')
<div style="position:absolute; top:0; left:0; width:100%; height:100vh; background-color: rgb(79, 70, 229);">
      
</div>
<br><br><br>
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card mb-4">
                <div class="card-header">Account Profile</div>

                <div class="card-body">
                <div class="form-group row">
                        <label for="client_id" class="col-md-4 col-form-label text-md-right">Account ID</label>
                        <div class="col-md-6">
                            <input id="account_id" type="text" class="form-control" value="{{ $account->id }}" readonly>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="client_id" class="col-md-4 col-form-label text-md-right">Client ID</label>
                        <div class="col-md-6">
                            <input id="client_id" type="text" class="form-control" value="{{ $account->client_id }}" readonly>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="membership_id" class="col-md-4 col-form-label text-md-right">Membership ID</label>
                        <div class="col-md-6">
                            <input id="membership_id" type="text" class="form-control" value="{{ $account->membership_id }}" readonly>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="total_cost" class="col-md-4 col-form-label text-md-right">Total Cost</label>
                        <div class="col-md-6">
                            <input id="total_cost" type="text" class="form-control" value="{{ $account->total_cost }}" readonly>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="duration" class="col-md-4 col-form-label text-md-right">Duration</label>
                        <div class="col-md-6">
                            <input id="duration" type="text" class="form-control" value="{{ $account->duration }}" readonly>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="start_date" class="col-md-4 col-form-label text-md-right">Start Date</label>
                        <div class="col-md-6">
                            <input id="start_date" type="text" class="form-control" value="{{ $account->start_date }}" readonly>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="end_date" class="col-md-4 col-form-label text-md-right">End Date</label>
                        <div class="col-md-6">
                            <input id="end_date" type="text" class="form-control" value="{{ $account->end_date }}" readonly>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="free_session" class="col-md-4 col-form-label text-md-right">Free Session</label>
                        <div class="col-md-6">
                            <input id="free_session" type="text" class="form-control" value="{{ $account->free_session }}" readonly>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label class="col-md-4 col-form-label text-md-right">Apply to Programs</label>
                        <div class="col-md-6">
                        @foreach ($matchedPrograms as $programs) 

                            <span data-bs-toggle="modal" data-bs-target="#getMembershipModal" class="plus-box d-flex justify-content-center align-items-center">
                                {{ $programs->title }}
                            </span>

                        @endforeach
                        
                            <span data-bs-toggle="modal" data-bs-target="#getMembershipModal" class="plus-box d-flex justify-content-center align-items-center"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-plus-lg" viewBox="0 0 16 16">
                                <path fill-rule="evenodd" d="M8 2a.5.5 0 0 1 .5.5v5h5a.5.5 0 0 1 0 1h-5v5a.5.5 0 0 1-1 0v-5h-5a.5.5 0 0 1 0-1h5v-5A.5.5 0 0 1 8 2"/>
                                </svg>
                            </span>
                        </div>
                    </div>

                    <div class="form-group row mb-0">
                        <div class="col-md-6 offset-md-4">
                            <a href="/" class="btn btn-primary">Back to Home</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="modal fade bd-example-modal-lg" id="getMembershipModal" aria-hidden="true" aria-labelledby="getMembershipModal" tabindex="-1">
  <div class="modal-dialog modal-dialog-scrollable modal-dialog-centered modal-md">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalToggleLabel">Select Training Program</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <div class="d-flex flex-column gap-1" style="border:1px solid red; height:500px; width:100%; padding:20px;" id="programDeck">
        </div>
      </div>
    </div>
  </div>
</div>

<div class="modal fade" id="exampleModalToggle2" aria-hidden="true" aria-labelledby="exampleModalToggleLabel2" tabindex="-1">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalToggleLabel2">Program Info</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <form id="account_programInfo" enctype="multipart/form-data" action="#" method="#">
            <div class="container-fluid">
                            <div class="mb-3">
                                <label for="productManu" class="form-label">Selected Program</label>
                                <input class="form-control" id="selectedProgram" name="selectedProgram" required readonly>

                            </div>
                        </div>
            <div class="container-fluid">
                            <div class="row">
                                <div class="col">
                                    <label for="productDesc" class="form-label">Start Date</label>
                                    <input type="date" class="form-control" id="startDate" name="startDate" required>
                                </div>

                                <div class="col">
                                    <label for="productCategory" class="form-label">End Date</label>
                                    <input type="date" class="form-control" id="endDate" name="endDate" required>
                                </div>
                            </div>
                        </div>

                        <div class="container-fluid">
                            <div class="mb-3">
                                <label for="productManu" class="form-label">Duration</label>
                                <input class="form-control" id="durationMem" name="durationMem" required >
                            </div>
                        </div>

                        <div class="container-fluid">
                            <div class="mb-3">
                                <label for="productManu" class="form-label">Cost</label>
                                <input class="form-control" id="costMem" name="costMem" required >
                            </div>
                        </div>
                    
        </form>
      </div>
      <div class="modal-footer">
        <button class="btn btn-secondary" data-bs-target="#getMembershipModal" data-bs-toggle="modal" data-bs-dismiss="modal">Back</button>
        <button class="btn btn-primary" data-bs-target="#exampleModalToggle3" data-bs-toggle="modal" data-bs-dismiss="modal">Next</button>
      </div>
    </div>
  </div>
</div>

<div class="modal fade" id="exampleModalToggle3" aria-hidden="true" aria-labelledby="exampleModalToggleLabel3" tabindex="-1">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalToggleLabel2">Account Info</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
      <form id="accountInfoForm" enctype="multipart/form-data" action="#" method="#">
                <h6>General Information</h6>
                <hr class="bg-danger border-2 border-top border-secondary" />
            <div class="container-fluid">
                <div class="row">
                    <div class="col">
                        <label for="productDesc" class="form-label">First Name</label>
                        <input type="text" class="form-control" id="fname2" name="fname2" required>
                    </div>

                    <div class="col">
                        <label for="productCategory" class="form-label">Last Name</label>
                        <input type="text" class="form-control" id="lname2" name="lname2" required>
                    </div>
                </div>
            </div>
            
            <div class="container-fluid">
                <div class="mb-3">
                    <label for="productManu" class="form-label">Address Line</label>
                    <input type="text" class="form-control" id="addressline2" name="addressline2" required>
                </div>
            </div>
            
            <div class="container-fluid">
                <div class="row">
                    <div class="col">
                        <label for="productPrice" class="form-label">Phone</label>
                        <input type="text" class="form-control" id="phone2" name="phone2" required>
                    </div>

                    <div class="col">
                        <label for="productCost" class="form-label">Zipcode</label>
                        <input type="text" class="form-control" id="zipcode2" name="zipcode2" required>
                    </div>
                </div>
            </div>

            <div class="container-fluid">
                <div class="row">
                    <div class="col">
                        <label for="productPrice" class="form-label">Age</label>
                        <input type="text" class="form-control" id="age2" name="age2" required>
                    </div>

                    <div class="col">
                        <label for="productCost" class="form-label">Gender</label>
                        <input type="text" class="form-control" id="gender2" name="gender2" required>
                    </div>
                </div>
            </div>
        
        </form>
      </div>
      <div class="modal-footer">
        <a class="btn btn-secondary" data-bs-toggle="modal" href="#exampleModalToggle2" role="button">Back</a>
        <a class="btn btn-primary" id="submitMembership" data-bs-toggle="modal" href="#exampleModalToggle" role="button">Submit</a>
      </div>
    </div>
  </div>
</div>

<form id="membershipDetails" enctype="multipart/form-data" action="#" method="#">
    @csrf
    <input type="text" id="accountIdInp" name="accountIdInp" value="{{ $account->id }}">
    <input type="text" id="membershipIdInp" name="membershipIdInp">
    <input type="text" id="startDateInp" name="startDateInp">
    <input type="text" id="endDateInp" name="endDateInp">
    <input type="text" id="durationInp" name="durationInp">
    <input type="text" id="costInp" name="costInp">

<form>


<style>
    .plus-box {
        display: inline-block;
        width: 200px;
        height: 200px;
        border: 1px solid #ccc;
        border-radius: 5px;
        text-align: center;
        line-height: 40px;
        margin-right: 10px;
    }

    .plus-box i {
        color: green;
        font-size: 24px;
    }
</style>
@endsection
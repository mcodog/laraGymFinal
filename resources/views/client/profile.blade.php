@extends('layouts.client')

@section('content')
<div style="z-index:-10;position:absolute; top:0; left:0; width:100%; height:55vh; background-color: rgb(79, 70, 229);">
</div>
<br><br><br><br><br><br><br><br><br><br><br><br>
<div style="display:flex; justify-content:center;width:100vw;">
    <div style="height:150vh;width:60vw; border:1px solid black; border-radius:20px;background-color:white;display:flex; justify-content:space-between;flex-direction:column;align-items:center;">
        <div style="background-image: url('{{ asset('storage/' . $client->image_path) }}');background-size: cover;overflow:hidden;margin-top:-120px;border-radius:100%; height:320px;width:320px;border:5px solid white;background-color:white; display:flex; justify-content:center;align-items:center">
        </div>
        <div style="height:80%;border:1px solid white; width:90%; display:flex; justify-content:flex-start;flex-direction:column;padding:10px; ">
            <div style="border: 1px solid white; height:160px; width:100%;display:flex; flex-direction:column; font-family: 'Poppins', sans-serif; font-weight: 600; color:black; font-size: 55px;">
                <span style="text-align:center">
                {{ $client->fname }} {{ $client->lname }}
                </span>
                <span style="text-align:center; font-size: 22px; color: #7068FF;text-transform:uppercase;letter-spacing:3px">
                {{ $membership->title }}
                </span>
            </div>
            <hr>
            <div style="border:1px solid white; height:fit-content;width:100%;border-radius:10px;background-color:white;display:flex;flex-direction:row;justify-content:space-between;gap:10px">
              <div style=" height:100%; width:30%;border-radius:10px; background-color:white;display:flex;flex-direction:column;justify-content:flex-start;gap:5px;align-content:center">
                <div class="left-bar"style="font-family: 'Poppins', sans-serif; font-weight: 600; color:black; font-size: 28px;text-align:center;width:100%;padding:10%;">
                <span style="font-family: 'Poppins', sans-serif;font-weight: 600;">
                  @php
                      $startDate = \Carbon\Carbon::parse($account->start_date);
                      $today = \Carbon\Carbon::now();
                      $daysElapsed = $startDate->diffInDays($today);
                  @endphp
                  {{ $daysElapsed }}
                  day(s)</span>
                  <span class="left-bar-text" style="font-weight: 300;text-align:center; font-size: 15px; text-transform:uppercase;letter-spacing:1px">
                    <br>You've been in the gym for
                  </span>
                </div>
                <div class="left-bar" style="font-family: 'Poppins', sans-serif; font-weight: 600; font-size: 28px;text-align:center;width:100%;padding:10%;">
                  <span style="font-family: 'Poppins', sans-serif">{{ $account->start_date }}</span>
                  <span class="left-bar-text" style="text-align:center; font-size: 15px; text-transform:uppercase;letter-spacing:1px;font-weight: 300;">
                    <br>You started on
                  </span>
                </div>
                <div class="left-bar" style="font-family: 'Poppins', sans-serif; font-weight: 600; color:black; font-size: 28px;text-align:center;width:100%;padding:10%;">
                <span style="font-family: 'Poppins', sans-serif;font-weight: 600;">{{ $account->end_date }}</span>
                  <span class="left-bar-text" style="font-weight: 300;text-align:center; font-size: 15px; text-transform:uppercase;letter-spacing:1px">
                    <br>Your membership expires on
                  </span>
                </div>
              </div>
              <div style="border:2px solid white; height:100%; width:70%;border-radius:10px; background-color:white;padding:20px;">
                <div>
                  <h4 style="font-family:'Poppins', sans-serif;">Address</h4>
                </div>
                <div>
                  <input type="text" class="form-control" readonly value="{{ $client->addressline }}">
                </div>
                <br>
                <div style="display:flex;flex-direction:row;">
                  <div style="flex-grow:1">
                    <div>
                      <h4 style="font-family:'Poppins', sans-serif;">Phone</h4>
                    </div>
                    <input type="text" class="form-control" readonly value="{{ $client->phone }}">
                  </div>
                  <div style="width:5%;"></div>
                  <div style="flex-grow:1">
                    <div>
                      <h4 style="font-family:'Poppins', sans-serif;">Zipcode</h4>
                    </div>
                    <input type="text" class="form-control" readonly value="{{ $client->zipcode }}">
                  </div>
                </div>
                <br>
                <div style="display:flex;flex-direction:row;">
                  <div style="flex-grow:1">
                    <div>
                      <h4 style="font-family:'Poppins', sans-serif;">Age</h4>
                    </div>
                    <input type="text" class="form-control" readonly value="{{ $client->age }}">
                  </div>
                  <div style="width:5%;"></div>
                  <div style="flex-grow:1">
                    <div>
                      <h4 style="font-family:'Poppins', sans-serif;">Gender</h4>
                    </div>
                    <input type="text" class="form-control" readonly value="{{ $client->gender }}">
                  </div>
                </div>
              </div>  
            </div>
            <br>
            <hr>
            <br>
            <div style="height:fit-content;width:100%;border:1px solid white;">
              <h2 style="font-family:'Poppins', sans-serif;">
                Training Programs
              </h2>
              <br>
              <div style="height:400px;min-width:100%;border-left:5px solid rgb(79, 70, 229); display:flex; flex-direction:row;overflow-y:hidden;overflow-x:scroll; padding:10px;">
                @foreach ($matchedPrograms as $programs) 

                  <div data-bs-toggle="modal" data-bs-target="#getMembershipModal" class="plus-box d-flex justify-content-center align-items-center" style="height:100%;min-width:500px">
                      {{ $programs->title }}
                  </div>

                @endforeach
                <div data-bs-toggle="modal" data-bs-target="#getMembershipModal" class="plus-box d-flex justify-content-center align-items-center" style="height:100%;min-width:500px"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-plus-lg" viewBox="0 0 16 16">
                                <path fill-rule="evenodd" d="M8 2a.5.5 0 0 1 .5.5v5h5a.5.5 0 0 1 0 1h-5v5a.5.5 0 0 1-1 0v-5h-5a.5.5 0 0 1 0-1h5v-5A.5.5 0 0 1 8 2"/>
                                </svg>
                </div>
              </div>
            </div>
        </div>
        <div style="height:10px;">

        </div>

        <div style="cursor:pointer;position:absolute;height:70px;border:1px solid white; width:230px; left:25%; top:32vh">
          <svg class="expansion" xmlns="http://www.w3.org/2000/svg" width="52" height="52" fill="currentColor" class="bi bi-pencil-square" viewBox="0 0 16 16">
            <path d="M15.502 1.94a.5.5 0 0 1 0 .706L14.459 3.69l-2-2L13.502.646a.5.5 0 0 1 .707 0l1.293 1.293zm-1.75 2.456-2-2L4.939 9.21a.5.5 0 0 0-.121.196l-.805 2.414a.25.25 0 0 0 .316.316l2.414-.805a.5.5 0 0 0 .196-.12l6.813-6.814z"/>
            <path fill-rule="evenodd" d="M1 13.5A1.5 1.5 0 0 0 2.5 15h11a1.5 1.5 0 0 0 1.5-1.5v-6a.5.5 0 0 0-1 0v6a.5.5 0 0 1-.5.5h-11a.5.5 0 0 1-.5-.5v-11a.5.5 0 0 1 .5-.5H9a.5.5 0 0 0 0-1H2.5A1.5 1.5 0 0 0 1 2.5z"/>
          </svg>
        </div>
        <div  style="cursor:pointer;position:absolute;height:70px;border:1px solid white; width:230px; right:25%; top:32vh;text-align:right">
          <svg class="expansion" xmlns="http://www.w3.org/2000/svg" width="52" height="52" fill="currentColor" class="bi bi-person-vcard" viewBox="0 0 16 16">
            <path d="M5 8a2 2 0 1 0 0-4 2 2 0 0 0 0 4m4-2.5a.5.5 0 0 1 .5-.5h4a.5.5 0 0 1 0 1h-4a.5.5 0 0 1-.5-.5M9 8a.5.5 0 0 1 .5-.5h4a.5.5 0 0 1 0 1h-4A.5.5 0 0 1 9 8m1 2.5a.5.5 0 0 1 .5-.5h3a.5.5 0 0 1 0 1h-3a.5.5 0 0 1-.5-.5"/>
            <path d="M2 2a2 2 0 0 0-2 2v8a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V4a2 2 0 0 0-2-2zM1 4a1 1 0 0 1 1-1h12a1 1 0 0 1 1 1v8a1 1 0 0 1-1 1H8.96q.04-.245.04-.5C9 10.567 7.21 9 5 9c-2.086 0-3.8 1.398-3.984 3.181A1 1 0 0 1 1 12z"/>
          </svg>
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

<div style="height:30px;">

</div>
<form id="membershipDetails" enctype="multipart/form-data" action="#" method="#">
    @csrf
    <input type="text" id="accountIdInp" name="accountIdInp" value="{{ $account->id }}" hidden>
    <input type="text" id="membershipIdInp" name="membershipIdInp" hidden>
    <input type="text" id="startDateInp" name="startDateInp" hidden>
    <input type="text" id="endDateInp" name="endDateInp" hidden>
    <input type="text" id="durationInp" name="durationInp" hidden>
    <input type="text" id="costInp" name="costInp" hidden>

<form>
<input id="account_id" type="text" class="form-control" value="{{ $account->id }}" readonly hidden>
<input id="client_id" type="text" class="form-control" value="{{ $account->client_id }}" readonly hidden>
<input id="membership_id" type="text" class="form-control" value="{{ $account->membership_id }}" readonly hidden>

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
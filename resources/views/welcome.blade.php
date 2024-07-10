@extends('layouts.client')

@section('content')


<div style="position:absolute; top:0; left:0; width:65%; height:90vh; background-color: rgb(79, 70, 229);">
      <div style="position:absolute;top:27vh;left:15vw;" class="d-flex flex-column">
          <span  style="font-family: 'Poppins', sans-serif; font-weight: 200; color:white; font-size: 30px;">
              ENHANCED IN BOTH
          </span>
          <span  style="font-family: 'Poppins', sans-serif; font-weight: 600; color:white; font-size: 55px;">
              BODY AND MIND
          </span>
          <span  style="font-family: 'Poppins', sans-serif; font-weight: 200; color:white; font-size: 18px;">
              Get personalized training sessions to find out the best workout routine, 
              <br>
              and build the body you aspire to have.
          </span>
          
          <span>
              <br>
              <button data-bs-toggle="modal" data-bs-target="#getMembershipModal" class="btn btn-light" style="padding-top:2%;color:black;height:50px; width:150px;font-weight:bold; border:0px solid  rgb(79, 70, 229);">Join Us</button>
          </span>
        </div>
    </div>

  <div style="position:absolute; top:90vh; left:65%; width:65%; height:90vh; background-color: #D2CFFF; z-index:-5">
  </div>

  <div style="position:absolute; top:20vh; left:55%; width:20vw; height:40vh; background-color: rgb(79, 70, 229); z-index:1; border-radius:50%; z-index:-5">
  </div>

  <div style="position: absolute; top:12vh; left:32vw;">
      <img src="storage/man.png" alt="dsads" style="height:95vh;">
  </div>
  
  <div class="modal fade text-dark bd-example-modal-lg" id="getMembershipModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="exampleModalLabel">Membership Application</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body text-dark">
                    <form id="transactionForm" enctype="multipart/form-data" action="#" method="#">
                    @csrf    
                    <!-- Category Name Input -->
                        <div class="mb-3">
                            <div class="form-group">
                                <label for="membershipTypes" class="form-label">Select Membersip Type</label>
                                <select class="form-select" id="membershipTypes" name="membershipTypes">
                                </select>
                            </div>
                        </div>

                        <div class="container-fluid">
                            <div class="row">
                                <div class="col">
                                <label for="membershipTypes" class="form-label">Select Number of Months</label>
                                <select class="form-select" id="membershipMonths" name="membershipMonths">
                                    <option value="1">1 Month</option>
                                    <option value="2">2 Months</option>
                                    <option value="3">3 Months</option>
                                    <option value="4">4 Months</option>
                                    <option value="5">5 Months</option>
                                    <option value="6">6 Months</option>
                                    <option value="7">7 Months</option>
                                    <option value="8">8 Months</option>
                                    <option value="9">9 Months</option>
                                    <option value="10">10 Months</option>
                                    <option value="11">11 Months</option>
                                    <option value="12">12 Months</option>
                                </select>
                                </div>

                                <div class="col">
                                    <label for="membershipCost" class="form-label">Cost</label>
                                    <input type="text" id="membershipCost" name="membershipCost" class="form-control" readonly>
                                </div>
                            </div>
                        </div>

                            <h6>General Information</h6>
                            <hr class="bg-danger border-2 border-top border-secondary" />
                        <div class="container-fluid">
                            <div class="row">
                                <div class="col">
                                    <label for="setToday" class="form-label">Start Date</label>
                                    <input type="text" id="startDate" class="form-control" readonly> 
                                    <button id="setToday" name="setToday">Set Date Today</button>
                                </div>

                                <div class="col">
                                    <label for="endDate" class="form-label">End Date</label>
                                    <input type="text" id="endDate" name="endDate" class="form-control">
                                </div>
                            </div>
                        </div>
                        
                        <div class="container-fluid">
                            <div class="mb-3">
                                <label for="totalCost" class="form-label">Total Cost</label>
                                <input type="text" id="totalCost" name="totalCost" class="form-control" readonly>
                            </div>
                        </div>

                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                            <button id="submitMembership" class="btn btn-primary" data-bs-dismiss="modal">Save changes</button>
                        </div>
                    </form>
                </div>
                
            </div>
        </div>
    </div>

</div>
</div>
<a class="btn btn-primary" data-bs-toggle="modal" href="#exampleModalToggle" role="button">Open first modal</a>
@endsection
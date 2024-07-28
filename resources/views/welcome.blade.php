@extends('layouts.client')

@section('content')

<style>
      .nav-item {
        color:white;
    }
</style>

<meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">

<link rel="stylesheet" type="text/css" href="{{ asset('owlcarousel/css/owl.carousel.min.css') }}">
<link rel="stylesheet" type="text/css" href="{{ asset('owlcarousel/css/styles.css') }}">

<div class="styled-circle" style="top: 75vh;left: 90vw; height:80px;width:80px;background: radial-gradient(circle, rgb(79, 70, 229), transparent);"></div>

<div style="position:relative; top:0; left:0; width:65%; height:90vh; background-color: rgb(79, 70, 229);">
    <div class="styled-circle" style="top: 20vh;left: 30vw;background: radial-gradient(circle, rgb(218, 218, 218), transparent);"></div>
    <div class="styled-circle" style="top: 75vh;left: 4vw; height:70px;width:70px;background: radial-gradient(circle, rgb(218, 218, 218), transparent);"></div>
    <div style="position:absolute;top:35vh;left:5vw;" class="d-flex flex-column">

        <span style="font-family: 'Poppins', sans-serif; font-weight: 200; color:white; font-size: 50px;">
            ENHANCED IN BOTH
        </span>
        <span style="font-family: 'Poppins', sans-serif; font-weight: 600; color:white; font-size: 85px;">
            BODY AND MIND
        </span>
        <span style="font-family: 'Poppins', sans-serif; font-weight: 200; color:white; font-size: 18px;">
            Get personalized training sessions to find out the best workout routine,
            <br>
            and build the body you aspire to have.
        </span>
        <span>
            <br>
            @guest
            <a href="/register" class="btn btn-light" style="padding-top:2%;color:black;height:50px; width:150px;font-weight:bold; border:0px solid  rgb(79, 70, 229);">Join Us</a>
            @else


            @if ($accountExists)
            <span style="font-family: 'Poppins', sans-serif; font-weight: 200; color:white; font-size: 18px;">
                Welcome back, <span style="font-weight:600">{{ Auth::user()->name }}</span>!
            </span>
            @else
            <button data-bs-toggle="modal" data-bs-target="#getMembershipModal" class="btn btn-light" style="padding-top:2%;color:black;height:50px; width:250px;font-weight:bold; border:0px solid  rgb(79, 70, 229);">Apply for a Membership</button>
            @endif
            @endguest
        </span>
    </div>
</div>


<div style="position:absolute; top:90vh; left:65%; width:65%; height:95vh; background-color: #D2CFFF; z-index:-5">
</div>

<div style="position:absolute; top:20vh; left:55%; width:20vw; height:55vh; background-color: rgb(79, 70, 229); z-index:1; border-radius:50%; z-index:-5">
</div>

<div style="position: absolute; top:12vh; left:32vw;">
    <img src="storage/bg4.png" alt="dsads" style="height:95vh;">
</div>

<div class="new-section">
    <div class="slider">
        <div class="owl-carousel" id="sliderPrograms">
            @foreach($programs as $program)
            <div class="slider-card">
                <div class="d-flex justify-content-center align-items-center mb-4">
                    <img src="storage/images/{{ $program->image }}" alt="Program Flyer">
                </div>
                <h2 class="mb-0 text-center"><b>{{ $program->title }}</b></h2>
                <p class="text-center p-4">{{ $program->description }}</p>
                
                <div style="widtH:100%;display:flex;justify-content:center"><a href="/programs/{{ $program->id }}" class="join-btn">APPLY</a></div>
            </div>
            @endforeach
        </div>
    </div>
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
                    </div>

                    <div class="container-fluid">
                        <div class="row">
                            <div class="col">
                                <label for="membershipTypes" class="form-label">Select Membersip Type</label>
                                <select class="form-select" id="membershipTypes" name="membershipTypes">
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
                                <button hidden id="setToday" name="setToday">Set Date Today</button>
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
                        <button id="submitMember" class="btn btn-primary" data-bs-dismiss="modal">Save changes</button>
                    </div>
                </form>
            </div>

        </div>
    </div>
</div>

</div>
</div>


<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" ></script> 

<script src="{{ asset('owlcarousel/js/owl.carousel.min.js') }}"></script>
<script src="{{ asset('owlcarousel/js/script.js') }}"></script>
@endsection
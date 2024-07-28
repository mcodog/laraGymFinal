@extends('layouts.client-reg')

@section('content')
<style>
    body { 
        background-color: rgb(79, 70, 229);
    }

    nav{
        color:white;
    }
</style>
<script src="https://code.jquery.com/jquery-3.7.1.js" integrity="sha256-eKhayi8LEQwp4NKxN+CfCh+3qOVUtJn3QNZ0TciWLP4=" crossorigin="anonymous"></script>
<script src="{{ asset('js/login.js') }}"></script>
<br><br><br><br><br>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ __('Register') }}</div>

                    <div class="card-body">
                        <form id="newClientForm" enctype="multipart/form-data" action="#" method="#">
                            <!-- Category Name Input -->
                             @csrf
                            <div class="mb-3">
                                <div class="form-group">
                                    <label for="image" class="control-label">Image</label>
                                    <input type="file" class="form-control" id="image_upload" name="image_upload"/>
                                </div>
                            </div>

                                <h6>General Information</h6>
                                <hr class="bg-danger border-2 border-top border-secondary" />
                            <div class="container-fluid">
                                <div class="row">
                                    <div class="col">
                                        <label for="productDesc" class="form-label">First Name</label>
                                        <input type="text" class="form-control" id="fname" name="fname" required>
                                    </div>

                                    <div class="col">
                                        <label for="productCategory" class="form-label">Last Name</label>
                                        <input type="text" class="form-control" id="lname" name="lname" required>
                                    </div>
                                </div>
                            </div>
                            
                            <div class="container-fluid">
                                <div class="mb-3">
                                    <label for="productManu" class="form-label">Address Line</label>
                                    <input type="text" class="form-control" id="addressline" name="addressline" required>
                                </div>
                            </div>
                            
                            <div class="container-fluid">
                                <div class="row">
                                    <div class="col">
                                        <label for="productPrice" class="form-label">Phone</label>
                                        <input type="text" class="form-control" id="phone" name="phone" required>
                                    </div>

                                    <div class="col">
                                        <label for="productCost" class="form-label">Zipcode</label>
                                        <input type="text" class="form-control" id="zipcode" name="zipcode" required>
                                    </div>
                                </div>
                            </div>

                            <div class="container-fluid">
                                <div class="row">
                                    <div class="col">
                                        <label for="productPrice" class="form-label">Age</label>
                                        <input type="text" class="form-control" id="age" name="age" required>
                                    </div>

                                    <div class="col">
                                        <label for="productCost" class="form-label">Gender</label>
                                        <input type="text" class="form-control" id="gender" name="gender" required>
                                    </div>
                                </div>
                            </div>
                            <br>

                            <h6>Log In Information</h6>
                            <hr class="bg-danger border-2 border-top border-secondary" />

                            <div class="container-fluid">
                                <div class="mb-3">
                                    <label for="productManu" class="form-label">Email Address</label>
                                    <input type="email" class="form-control" id="email" name="email" required>
                                </div>
                            </div>

                            <div class="container-fluid">
                                <div class="row">
                                    <div class="col">
                                        <label for="productPrice" class="form-label">Password</label>
                                        <input type="password" class="form-control" id="password" name="password" required>
                                    </div>
                                </div>
                            </div>
                            

                            <!-- Optional Description Input -->
                            
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                <button id="clientSubmit" type="submit" class="btn btn-primary" data-bs-dismiss="modal">Save changes</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection

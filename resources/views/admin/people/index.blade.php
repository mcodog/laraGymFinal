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
    <div class="row justify-content-center " style="height:50%;margin-bottom:2vh">
        <div class="col-lg">
            <div class="card text-white border-secondary"  style="height:100%; background-color:rgb(12, 12, 12)">
                <div class="card-header " style="background-color:rgb(18, 18, 18)"><h6>{{ __('Clients Info') }}</h6></div>

                <div class="mt-3 card-body d-flex flex-row gap-2" id="profileCards" style="max-width:1100px;overflow-x:auto">
                </div> 
                <div class="card-footer" style="background-color:rgb(18, 18, 18)">
                    <!-- <div class="col">
                        <form action="{{ url('products/search') }}" enctype="multipart/form-data" method="POST">
                        @csrf 
                        <label for="searchCategory">Search: </label> &nbsp

                        <input name="search" type="text" style="width:30%;margin-right:10px;">
                        <button type="submit" class="btn btn-primary">Search</button>

                        &nbsp

                        <a href="{{ url('products/') }}" class="btn btn-secondary">Reset</a>

                        &nbsp <span style="color:gray">Category</span> &nbsp

                        <select name="searchCategory" id="searchCategory">
                            <option value="none">Select a Category</option>

                        </select>

                        &nbsp <span style="color:gray">Manufactiurer</span> &nbsp

                        <select name="searchManufacturer" id="searchManufacturer">
                            <option value="none">Select a Manufacturer</option>

                        </select>
                        </form>
                    </div> -->
                </div>
            </div>
        </div>

        <div class="col-sm-2">
        <div class="row mb-2">
                <div class="card border-secondary" style="background-color:rgb(12, 12, 12)">
                    <div class="card-body d-flex justify-content-center">
                        <div class="row justify-content-center gap-2 p-3">
                            <button type="button" class="btn text-white py-2" style="background-color:rgb(79, 70, 229)" data-bs-toggle="modal" data-bs-target="#newClientModal">
                                New Client
                            </button>
                            <button type="button" class="btn text-white py-2" style="background-color:rgb(79, 70, 229)" data-bs-toggle="modal" data-bs-target="#newCoachProfile">
                                New Coach
                            </button>
                            <a href="{{ url('/users') }}" class="btn text-white" style="background-color:rgb(79, 70, 229)">
                                See Users Datatables
</a>
                        </div>
                        

                        <div class="modal fade" id="categoryModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h1 class="modal-title fs-5" id="exampleModalLabel">Create New Category</h1>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body">
                                        <form id="newCategoryForm" enctype="multipart/form-data" action="{{ url('products/category/store') }}">
                                            @csrf
                                            <!-- Category Name Input -->
                                            <div class="mb-3">
                                                <label for="categoryName" class="form-label">Category Name</label>
                                                <input type="text" class="form-control" id="categoryName" name="categoryName" placeholder="Enter category name" required>
                                            </div>

                                            <!-- Optional Description Input -->
                                            <div class="mb-3">
                                                <label for="categoryDescription" class="form-label">Description (optional)</label>
                                                <textarea class="form-control" id="categoryDescription" name="categoryDescription" rows="3" placeholder="Enter a brief description (optional)"></textarea>
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                                <button type="submit" class="btn btn-primary">Save changes</button>
                                            </div>
                                        </form>
                                    </div>
                                    
                                </div>
                            </div>
                        </div>

                        <div class="modal fade" id="manufacturerModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h1 class="modal-title fs-5" id="exampleModalLabel">Create New Manufacturer</h1>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body">
                                    <form action="{{ url('products/manufacturer/store') }}" id="newManufacturerForm" enctype="multipart/form-data">
                                        @csrf
                                        <!-- Manufacturer Name Input -->
                                        <div class="mb-3">
                                            <label for="manufacturerName" class="form-label">Manufacturer Name</label>
                                            <input type="text" class="form-control" id="manufacturerName" name="manufacturerName" placeholder="Enter manufacturer name" required>
                                        </div>

                                        <!-- Contact Phone Input -->
                                        <div class="mb-3">
                                            <label for="contactPhone" class="form-label">Contact Phone</label>
                                            <input type="text" class="form-control" id="contactPhone" name="contactPhone" placeholder="Enter contact phone number" required>
                                        </div>

                                        <!-- Contact Email Input -->
                                        <div class="mb-3">
                                            <label for="contactEmail" class="form-label">Contact Email <span style="color:gray">(Optional)</span></label>
                                            <input type="text" class="form-control" id="contactEmail" name="contactEmail" placeholder="Enter contact email">
                                        </div>

                                        <!-- Address Input -->
                                        <div class="mb-3">
                                            <label for="address" class="form-label">Address</label>
                                            <textarea class="form-control" id="address" name="address" rows="3" placeholder="Enter manufacturer's address" required></textarea>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                            <button type="submit" class="btn btn-primary">Save changes</button>
                                        </div>
                                    </form>
                                    </div>
                                    
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    
    <div class="row col-sm mt-2 flex-grow-1" style="min-height:300px;">
        <div class="col-lg d-flex">
                <div class="card text-white border-secondary flex-grow-1" style="background-color:rgb(12, 12, 12)">
                    <div class="card-header"><h6>{{ __('Coach Info') }}</h6></div>
                    <div class="card-body" >
                        <div class="table-responsive " style="overflow:auto;max-height:300px;">
                            <table id="coachTable" class="datatable" >
                                <thead>
                                    <tr class="text-center">
                                        <th>Coach ID</th>
                                        <th>Image</th>
                                        <th >Last Name</th>
                                        <th >First Name</th>
                                        
                                        <th >Address</th>
                                        <th >Edit</th>
                                        <th >Delete</th>
                                    </tr>
                                </thead>
                                <tbody id="coachBody"></tbody>
                            </table>
                        </div>
                    </div>   
                </div>
            </div>
        </div>
    </div>

<div class="modal fade text-dark bd-example-modal-lg" id="newClientModal" role="dialog" style="display:none">
                            <div class="modal-dialog modal-lg">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h1 class="modal-title fs-5" id="exampleModalLabel">New Client Profile</h1>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body text-dark">
                                        <form id="newClientForm" enctype="multipart/form-data" action="#" method="#">
                                            <!-- Category Name Input -->
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

                        <div class="modal fade text-dark bd-example-modal-lg" id="newCoachProfile" role="dialog" style="display:none">
                            <div class="modal-dialog modal-lg">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h1 class="modal-title fs-5" id="exampleModalLabel">New Coach Profile</h1>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body text-dark">
                                        <form id="newCoachForm" name="newCoachForm" enctype="multipart/form-data" action="#" method="#">
                                            <!-- Category Name Input -->
                                            <div class="mb-3">
                                                <div class="form-group">
                                                    <label for="image" class="control-label">Image</label>
                                                    <input type="file" class="form-control" id="coachImage_upload" name="coachImage_upload"/>
                                                </div>
                                            </div>

                                             <h6>General Information</h6>
                                             <hr class="bg-danger border-2 border-top border-secondary" />
                                            <div class="container-fluid">
                                                <div class="row">
                                                    <div class="col">
                                                        <label for="productDesc" class="form-label">First Name</label>
                                                        <input type="text" class="form-control" id="coachFname" name="coachFname" >
                                                    </div>

                                                    <div class="col">
                                                        <label for="productCategory" class="form-label">Last Name</label>
                                                        <input type="text" class="form-control" id="coachLname" name="coachLname" >
                                                    </div>
                                                </div>
                                            </div>
                                            
                                            <div class="container-fluid">
                                                <div class="mb-3">
                                                    <label for="productManu" class="form-label">Address Line</label>
                                                    <input type="text" class="form-control" id="coachAddressline" name="coachAddressline" >
                                                </div>
                                            </div>
                                            
                                            <div class="container-fluid">
                                                <div class="row">
                                                    <div class="col">
                                                        <label for="productPrice" class="form-label">Phone</label>
                                                        <input type="text" class="form-control" id="coachPhone" name="coachPhone" >
                                                    </div>

                                                    <div class="col">
                                                        <label for="productCost" class="form-label">Zipcode</label>
                                                        <input type="text" class="form-control" id="coachZipcode" name="coachZipcode" >
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="container-fluid">
                                                <div class="row">
                                                    <div class="col">
                                                        <label for="productPrice" class="form-label">Age</label>
                                                        <input type="text" class="form-control" id="coachAge" name="coachAge" >
                                                    </div>

                                                    <div class="col">
                                                        <label for="productCost" class="form-label">Gender</label>
                                                        <input type="text" class="form-control" id="coachGender" name="coachGender" >
                                                    </div>
                                                </div>
                                            </div>
                                            

                                            <!-- Optional Description Input -->
                                            
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                                <button id="coachSubmit" type="submit" class="btn btn-primary">Save changes</button>
                                            </div>
                                        </form>
                                    </div>
                                    
                                </div>
                            </div>
                        </div>


                        <div class="modal fade text-dark bd-example-modal-lg" id="editCoachProfile" role="dialog" style="display:none">
                            <div class="modal-dialog modal-lg">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h1 class="modal-title fs-5" id="exampleModalLabel">Edit Coach Profile</h1>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body text-dark">
                                        <form id="editCoachForm" enctype="multipart/form-data" action="#" method="#">
                                            <div class="mb-3">
                                                <div class="form-group">
                                                    <label for="image" class="control-label">Image</label>
                                                    <input type="file" class="form-control" id="coachImage_upload2" name="coachImage_upload2"/>
                                                </div>
                                            </div>

                                             <h6>General Information</h6>
                                             <hr class="bg-danger border-2 border-top border-secondary" />
                                            <div class="container-fluid">
                                                <div class="row">
                                                    <div class="col">
                                                        <label for="productDesc" class="form-label">First Name</label>
                                                        <input type="text" class="form-control" id="coachFname2" name="coachFname2" required>
                                                    </div>

                                                    <div class="col">
                                                        <label for="productCategory" class="form-label">Last Name</label>
                                                        <input type="text" class="form-control" id="coachLname2" name="coachLname2" required>
                                                    </div>
                                                </div>
                                            </div>
                                            
                                            <div class="container-fluid">
                                                <div class="mb-3">
                                                    <label for="productManu" class="form-label">Address Line</label>
                                                    <input type="text" class="form-control" id="coachAddressline2" name="coachAddressline2" required>
                                                </div>
                                            </div>
                                            
                                            <div class="container-fluid">
                                                <div class="row">
                                                    <div class="col">
                                                        <label for="productPrice" class="form-label">Phone</label>
                                                        <input type="text" class="form-control" id="coachPhone2" name="coachPhone2" required>
                                                    </div>

                                                    <div class="col">
                                                        <label for="productCost" class="form-label">Zipcode</label>
                                                        <input type="text" class="form-control" id="coachZipcode2" name="coachZipcode2" required>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="container-fluid">
                                                <div class="row">
                                                    <div class="col">
                                                        <label for="productPrice" class="form-label">Age</label>
                                                        <input type="text" class="form-control" id="coachAge2" name="coachAge2" required>
                                                    </div>

                                                    <div class="col">
                                                        <label for="productCost" class="form-label">Gender</label>
                                                        <input type="text" class="form-control" id="coachGender2" name="coachGender2" required>
                                                    </div>
                                                </div>
                                            </div>
                                            

                                            <!-- Optional Description Input -->
                                            
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                                <button id="coachUpdate" type="submit" class="btn btn-primary" data-bs-dismiss="modal">Save changes</button>
                                            </div>
                                        </form>
                                    </div>
                                    
                                </div>
                            </div>
                        </div>

                        

                        <div class="modal fade text-dark bd-example-modal-lg" id="editClientMod" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog modal-lg">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h1 class="modal-title fs-5" id="exampleModalLabel">Edit Client Profile</h1>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body text-dark">
                                        <form id="editClientForm" enctype="multipart/form-data" action="#" method="#">
                                            <!-- Category Name Input -->
                                            <div class="mb-3">
                                                <div class="form-group">
                                                    <label for="image" class="control-label">Image</label>
                                                    <input type="file" class="form-control" id="image_upload2" name="image_upload2"/>
                                                </div>
                                            </div>

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
                                            <br>

                                            <h6>Log In Information</h6>
                                            <hr class="bg-danger border-2 border-top border-secondary" />

                                            <div class="container-fluid">
                                                <div class="mb-3">
                                                    <label for="productManu" class="form-label">Email Address</label>
                                                    <input type="email" class="form-control" id="email2" name="email2" required>
                                                </div>
                                            </div>
                                            

                                            <!-- Optional Description Input -->
                                            
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                                <button id="clientUpdate" class="btn btn-primary" data-bs-dismiss="modal">Submit</button>
                                            </div>
                                        </form>
                                    </div>
                                    
                                </div>
                            </div>
                        </div>

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
                    
 


</style>
<label for="image" class="control-label">Image</label>
                                                    <input type="file" class="form-control" id="coachImage_upload" name="coachImage_upload"/>
                                                </div>
                                            </div>

                                             <h6>General Information</h6>
                                             <hr class="bg-danger border-2 border-top border-secondary" />
                                            <div class="container-fluid">
                                                <div class="row">
                                                    <div class="col">
                                                        <label for="productDesc" class="form-label">First Name</label>
                                                        <input type="text" class="form-control" id="coachFname" name="coachFname" required>
                                                    </div>

                                                    <div class="col">
                                                        <label for="productCategory" class="form-label">Last Name</label>
                                                        <input type="text" class="form-control" id="coachLname" name="coachLname" required>
                                                    </div>
                                                </div>
                                            </div>
                                            
                                            <div class="container-fluid">
                                                <div class="mb-3">
                                                    <label for="productManu" class="form-label">Address Line</label>
                                                    <input type="text" class="form-control" id="coachAddressline" name="coachAddressline" required>
                                                </div>
                                            </div>
                                            
                                            <div class="container-fluid">
                                                <div class="row">
                                                    <div class="col">
                                                        <label for="productPrice" class="form-label">Phone</label>
                                                        <input type="text" class="form-control" id="coachPhone" name="coachPhone" required>
                                                    </div>

                                                    <div class="col">
                                                        <label for="productCost" class="form-label">Zipcode</label>
                                                        <input type="text" class="form-control" id="coachZipcode" name="coachZipcode" required>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="container-fluid">
                                                <div class="row">
                                                    <div class="col">
                                                        <label for="productPrice" class="form-label">Age</label>
                                                        <input type="text" class="form-control" id="coachAge" name="coachAge" required>
                                                    </div>

                                                    <div class="col">
                                                        <label for="productCost" class="form-label">Gender</label>
                                                        <input type="text" class="form-control" id="coachGender" name="coachGender" required>
                                                    </div>
                                                </div>
                                            </div>
<script>
    
</script>

<script src="https://code.jquery.com/jquery-3.7.1.js" integrity="sha256-eKhayi8LEQwp4NKxN+CfCh+3qOVUtJn3QNZ0TciWLP4=" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.3/js/bootstrap.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/jquery-validation@1.19.5/dist/jquery.validate.min.js"></script>
<script src="https://cdn.datatables.net/2.1.2/js/dataTables.js"></script>
<script src="{{ asset('js/coach.js') }}"></script>
<script src="{{ asset('js/client.js') }}"></script>

@endsection
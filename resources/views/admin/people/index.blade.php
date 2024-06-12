@extends('layouts.admin')

@section('content')
<style>
    .delete-btn {
        background-color: transparent;
        transition:.5s;
        color:#5F2E2E;
    }
    .delete-btn:hover {
                        transition: .5s;
                        background-color: #5F2E2E;
                        color: white;
                    }
</style>
<div class="container-fluid d-flex flex-column justify-content-center p-3 overflow-hidden" style="height:92vh">
    <div class="row flex-grow-1 justify-content-center">
        <div class="col-lg">
            <div class="card text-white border-secondary"  style="height:96%; background-color:rgb(12, 12, 12)">
                <div class="card-header " style="background-color:rgb(18, 18, 18)"><h6>{{ __('Clients Info') }}</h6></div>

                <div class="mx-3 card-body d-flex flex-row gap-2" id="profileCards" style="max-width:1100px;overflow-x:auto">
                    
                    
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
                            <button type="button" class="btn text-white py-2" style="background-color:rgb(79, 70, 229)" data-bs-toggle="modal" data-bs-target="#productModal">
                                New Client
                            </button>
                            <button type="button" class="btn text-white py-2" style="background-color:rgb(79, 70, 229)" data-bs-toggle="modal" data-bs-target="#manufacturerModal">
                                New Coach
                            </button>
                            <button type="button" class="btn text-white" style="background-color:rgb(79, 70, 229)">
                                See Datatables
                            </button>
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
            <div class="row">
                <div class="card text-white border-secondary" style="background-color:rgb(12, 12, 12)">
                    <div class="card-body d-flex justify-content-center">
                        <div class="row justify-content-center gap-2 p-3">
                            <button type="button" class="btn text-white py-2" style="background-color:rgb(79, 70, 229)" data-bs-toggle="modal" data-bs-target="#productModal">
                                New Branch
                            </button>
                            <button type="button" class="btn text-white py-2" style="background-color:rgb(79, 70, 229)" data-bs-toggle="modal" data-bs-target="#manufacturerModal">
                                New Facility
                            </button>
                        </div>
                        

                        <div class="modal fade text-dark bd-example-modal-lg" id="productModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
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
                                                <button id="clientSubmit" type="submit" class="btn btn-primary">Save changes</button>
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
                                    <form id="newManufacturerForm">
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
                                            <input type="email" class="form-control" id="contactEmail" name="contactEmail" placeholder="Enter contact email" required>
                                        </div>

                                        <!-- Address Input -->
                                        <div class="mb-3">
                                            <label for="address" class="form-label">Address</label>
                                            <textarea class="form-control" id="address" name="address" rows="3" placeholder="Enter manufacturer's address" required></textarea>
                                        </div>

                                    </form>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                        <button type="button" class="btn btn-primary">Save changes</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    
    <div class="row col-sm mt-2 flex-grow-1" style="min-height:220px;">
        <div class="col-lg d-flex">
                <div class="card text-white border-secondary flex-grow-1" style="background-color:rgb(12, 12, 12)">
                    <div class="card-header"><h6>{{ __('Coach Info') }}</h6></div>

                    <div class="card-body">
                        ...
                </div>   
            </div>
        </div>
    </div>
</div>
@endsection
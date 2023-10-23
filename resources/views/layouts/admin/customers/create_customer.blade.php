@extends('layouts.admin.index')

@section('content')
<section class="page-header mb-3 mt-2">
    <h3 class="text-uppercase pos-text-color mb-0" style="font-weight: 900;">Add Customer</h3>
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb text-uppercase">
          <li class="breadcrumb-item"><a href="{{ route('admin.customers.index') }}" class="pos-text-color text-decoration-none">Customers</a></li>
          <li class="breadcrumb-item active" aria-current="page">Create</li>
        </ol>
      </nav>
      <a href="{{ route('admin.customers.index') }}" class="text-decoration-none pos-text-color d-inline-block">
        <div class="icon-container d-flex"><span class="material-icons-outlined">arrow_back</span></div>
    </a>
</section>
<div class="card shadow-sm border-0">
    <div class="card-header fw-bold text-secondary d-flex align-items-center justify-content-between">
        <span>{{ __('New Customer') }}</span>
    </div>

    <div class="card-body py-4">
        @if ($errors->any())
            <div class="alert alert-danger m-1" style="font-size: 12px;">
                <ul class="mb-0">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="{{ route('admin.customers.store') }}" method="post">
            @csrf
            <div class="container-fluid">

                <ul class="nav nav-tabs mt-2 mb-5">

                    <li class="nav-item">
                    <a class="nav-link active" data-bs-toggle="tab" data-bs-target="#personal" aria-controls="personal" role="tab" aria-selected="false" aria-current="page" href="#personal">Personal</a>
                    </li>

                    <li class="nav-item">
                    <a class="nav-link" data-bs-toggle="tab" data-bs-target="#address" aria-controls="address" role="tab" aria-selected="false" href="#address">Address</a>
                    </li>
                    
                    <li clas    s="nav-item">
                    <a class="nav-link" data-bs-toggle="tab" data-bs-target="#others" aria-controls="others" role="tab" aria-selected="false" href="#others">Others</a>
                    </li>
                
                </ul>

                <div class="tab-content" id="pos-tab">
                    <div class="tab-pane fade show active" role="tabpanel" aria-labelledby="personal" id="personal">
                        
                        <div class="row">
                            <div class="col-sm-12 col-md-6">
                                <div class="form-group">
                                    <label for="firstname" class="form-label">Firstname</label>
                                    <input type="text" name="firstname" id="firstname" class="form-control @error('firstname') is-invalid @enderror" value="{{ old('firstname') }}" placeholder="Enter firstname" autocomplete="firstname" autofocus>
                                    
                                    @error('firstname')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                
                                <div class="form-group">
                                    <label for="lastname" class="form-label">Lastname</label>
                                    <input type="text" name="lastname" id="lastname" class="form-control @error('lastname') is-invalid @enderror" value="{{ old('lastname') }}" placeholder="Enter lastname" autocomplete="lastname" autofocus>
                                    
                                    @error('lastname')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>

                            </div>
                            <div class="col-sm-12 col-md-6">
                                
                                <div class="form-group">
                                    <label for="email" class="form-label">Email</label>
                                    <input type="email" name="email" id="email" class="form-control @error('email') is-invalid @enderror" value="{{ old('email') }}" placeholder="Enter email" autocomplete="email" autofocus>
                                    
                                    @error('email')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>

                                <div class="form-group">
                                    <label for="mobile_no" class="form-label">Mobile No.</label>
                                    <input type="number" name="mobile_no" id="mobile_no" class="form-control @error('mobile_no') is-invalid @enderror" value="{{ old('mobile_no') }}" placeholder="Enter mobile no" autocomplete="mobile no" autofocus>
                                    
                                    @error('mobile_no')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>

                            </div>
                            
                        </div>
                      
                    </div>

                    <div class="tab-pane fade" role="tabpanel" aria-labelledby="address" id="address">
                        <div class="row">
                            
                            <div class="col-sm-12 col-md-6">
                                <div class="form-group">
                                    <label for="country" class="form-label">Country</label>
                                    <input type="text" name="country" id="country" class="form-control @error('country') is-invalid @enderror" value="{{ old('country') }}" placeholder="Enter country" autocomplete="country" autofocus>
                                    
                                    @error('country')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>

                                <div class="form-group">
                                    <label for="postal_code" class="form-label">Postal Code</label>
                                    <input type="number" name="postal_code" id="postal_code" class="form-control @error('postal_code') is-invalid @enderror" value="{{ old('postal_code') }}" placeholder="Enter postal code" autocomplete="postal-code" autofocus>
                                    
                                    @error('postal_code')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                
                                <div class="form-group">
                                    <label for="province_state" class="form-label">Province / State</label>
                                    <input type="text" name="province_state" id="province_state" class="form-control @error('province_state') is-invalid @enderror" value="{{ old('province_state') }}" placeholder="Enter province / state" autocomplete="province-state" autofocus>
                                    
                                    @error('province_state')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>

                                <div class="form-group">
                                    <label for="municipality_city" class="form-label">Municipality / City</label>
                                    <input type="text" name="municipality_city" id="municipality_city" class="form-control @error('municipality_city') is-invalid @enderror" value="{{ old('municipality_city') }}" placeholder="Enter municipality / city" autocomplete="municipality-city" autofocus>
                                    
                                    @error('municipality_city')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>

                            </div>

                            <div class="col-sm-12 col-md-6">

                                <div class="form-group">
                                    <label for="disctrict" class="form-label">Disctrict</label>
                                    <input type="text" name="disctrict" id="disctrict" class="form-control @error('disctrict') is-invalid @enderror" value="{{ old('disctrict') }}" placeholder="Enter disctrict" autocomplete="disctrict" autofocus>
                                    
                                    @error('disctrict')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>

                                <div class="form-group">
                                    <label for="street_name" class="form-label">Street Name</label>
                                    <input type="text" name="street_name" id="street_name" class="form-control @error('street_name') is-invalid @enderror" value="{{ old('street_name') }}" placeholder="Enter street name" autocomplete="street-name" autofocus>
                                    
                                    @error('street_name')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                
                                <div class="form-group">
                                    <label for="building_no" class="form-label">Building No.</label>
                                    <input type="text" name="building_no" id="building_no" class="form-control @error('building_no') is-invalid @enderror" value="{{ old('building_no') }}" placeholder="Enter building no" autocomplete="building-no" autofocus>
                                    
                                    @error('building_no')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>

                                <div class="form-group">
                                    <label for="plot_identication" class="form-label">Plot Identication</label>
                                    <input type="text" name="plot_identication" id="plot_identication" class="form-control @error('plot_identication') is-invalid @enderror" value="{{ old('plot_identication') }}" placeholder="Enter plot identication" autocomplete="plot-identication" autofocus>
                                    
                                    @error('plot_identication')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                            
                            <div class="col-sm-12 col-md-6">

                                <div class="form-group">
                                    <label for="barangay" class="form-label">Barangay</label>
                                    <input type="text" name="barangay" id="barangay" class="form-control @error('barangay') is-invalid @enderror" value="{{ old('barangay') }}" placeholder="Enter barangay" autocomplete="barangay" autofocus>
                                    
                                    @error('barangay')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>

                            </div>
                        </div>
                    </div>

                    <div class="tab-pane fade" role="tabpanel" aria-labelledby="others" id="others">
                        <div class="row">
                            
                            <div class="col-sm-12 col-md-6">

                                <div class="form-group">
                                    <label for="customer_type" class="form-label">Customer Type</label>
                                    <select name="customer_type" id="customer_type" class="form-select @error('customer_type') is-invalid @enderror">
                                        <option value="">Select type</option>
                                        <option value="regular">Regular</option>
                                        <option value="senior-citizen">Senior Citizen</option>
                                        <option value="pwd">PWD (Person With Disability)</option>
                                        <option value="athlete">Athlete</option>
                                    </select>

                                    @error('customer_type')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>

                                <div class="form-group">
                                    <label for="loyalty_card_no" class="form-label">Loyalty Card No.</label>
                                    <input type="number" name="loyalty_card_no" id="loyalty_card_no" class="form-control @error('loyalty_card_no') is-invalid @enderror" value="{{ old('loyalty_card_no') }}" placeholder="Enter card number" autocomplete="Enter card number" autofocus>
                                    
                                    @error('loyalty_card_no')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                               
                            </div>
                            
                            <div class="col-sm-12 mt-4">
                                <div class="form-group">
                                    <button type="submit" class="btn btn-danger tinker-pro-btn">Add Customer</button>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
            </div>

        </form>
    </div>
</div>
@endsection

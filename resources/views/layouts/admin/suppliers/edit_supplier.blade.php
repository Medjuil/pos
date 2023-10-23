@extends('layouts.admin.index')

@section('content')
<section class="page-header mb-3 mt-2">
    <h3 class="text-uppercase pos-text-color mb-0" style="font-weight: 900;">Add Supplier</h3>
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb text-uppercase">
          <li class="breadcrumb-item"><a href="{{ route('admin.suppliers.index') }}" class="pos-text-color text-decoration-none">Suppliers</a></li>
          <li class="breadcrumb-item active" aria-current="page">Add</li>
        </ol>
      </nav>
      <a href="{{ route('admin.suppliers.index') }}" class="text-decoration-none pos-text-color d-inline-block">
        <div class="icon-container d-flex"><span class="material-icons-outlined">arrow_back</span></div>
    </a>
</section>
<div class="card shadow-sm border-0">
    <div class="card-header fw-bold text-secondary d-flex align-items-center justify-content-between">
        <span>{{ __('Edit Supplier') }}</span>
    </div>
    @if ($errors->any())
        <div class="alert alert-danger m-1" style="font-size: 12px;">
            <ul class="mb-0">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
    <div class="card-body py-4">
        <form action="{{ route('admin.suppliers.update', $supplier->id) }}" method="post">
            @csrf
            @method('put')
            <div class="container-fluid">

                <ul class="nav nav-tabs mt-2 mb-5">

                    <li class="nav-item">
                    <a class="nav-link active" data-bs-toggle="tab" data-bs-target="#company" aria-controls="company" role="tab" aria-selected="false" aria-current="page" href="#company">Company</a>
                    </li>

                    <li class="nav-item">
                    <a class="nav-link" data-bs-toggle="tab" data-bs-target="#address" aria-controls="address" role="tab" aria-selected="false" href="#address">Address</a>
                    </li>
                
                </ul>

                <div class="tab-content" id="pos-tab">
                    <div class="tab-pane fade show active" role="tabpanel" aria-labelledby="company" id="company">
                        
                        <div class="row">
                            <div class="col-sm-12 col-md-6">
                                <div class="form-group">
                                    <label for="company_name" class="form-label">Company Name</label>
                                    <input type="text" name="company_name" id="company_name" value="{{ $supplier->company_name }}" class="form-control @error('company_name') is-invalid @enderror" value="{{ old('company_name') }}" placeholder="Enter company name" autocomplete="company name" autofocus>
                                    
                                    @error('company_name')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                 
                                <div class="form-group">
                                    <label for="email" class="form-label">Email</label>
                                    <input type="email" name="email" id="email" value="{{ $supplier->email }}" class="form-control @error('email') is-invalid @enderror" value="{{ old('email') }}" placeholder="Enter email" autocomplete="email" autofocus>
                                    
                                    @error('email')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                
                                <div class="form-group">
                                    <label for="mobile_no" class="form-label">Mobile No.</label>
                                    <input type="number" name="mobile_no" id="mobile_no" value="{{ $supplier->mobile_no }}" class="form-control @error('mobile_no') is-invalid @enderror" value="{{ old('mobile_no') }}" placeholder="Enter mobile no" autocomplete="mobile no" autofocus>
                                    
                                    @error('mobile_no')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="col-sm-12">
                                <div class="form-group form-check">
                                    <input class="form-check-input" name="status" type="checkbox" value="active" id="status" @if($supplier->status == 'active') checked @endif>
                                    <label class="form-check-label" for="status">
                                        Mark this supplier as active by default.
                                    </label>
                                </div>
                            </div>

                        </div>

                    </div>

                    <div class="tab-pane fade" role="tabpanel" aria-labelledby="address" id="address">
                        <div class="row">
                            
                            <div class="col-sm-12 col-md-6">
                                <div class="form-group">
                                    <label for="country" class="form-label">Country</label>
                                    <input type="text" name="country" id="country" class="form-control @error('country') is-invalid @enderror" value="{{ $supplier->address->country }}" placeholder="Enter country" autocomplete="country" autofocus>
                                    
                                    @error('country')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>

                                <div class="form-group">
                                    <label for="postal_code" class="form-label">Postal Code</label>
                                    <input type="number" name="postal_code" id="postal_code" class="form-control @error('postal_code') is-invalid @enderror" value="{{ $supplier->address->postal_code }}" placeholder="Enter postal code" autocomplete="postal-code" autofocus>
                                    
                                    @error('postal_code')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>

                                <div class="form-group">
                                    <label for="municipality_city" class="form-label">Municipality / City</label>
                                    <input type="text" name="municipality_city" id="municipality_city" class="form-control @error('municipality_city') is-invalid @enderror" value="{{ $supplier->address->municipality_city }}" placeholder="Enter municipality / city" autocomplete="municipality-city" autofocus>
                                    
                                    @error('municipality_city')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                
                                <div class="form-group">
                                    <label for="province_state" class="form-label">Province / State</label>
                                    <input type="text" name="province_state" id="province_state" class="form-control @error('province_state') is-invalid @enderror" value="{{ $supplier->address->province_state }}" placeholder="Enter province / state" autocomplete="province-state" autofocus>
                                    
                                    @error('province_state')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>

                            </div>

                            <div class="col-sm-12 col-md-6">

                                <div class="form-group">
                                    <label for="disctrict" class="form-label">Disctrict</label>
                                    <input type="text" name="disctrict" id="disctrict" class="form-control @error('disctrict') is-invalid @enderror" value="{{ $supplier->address->disctrict }}" placeholder="Enter disctrict" autocomplete="disctrict" autofocus>
                                    
                                    @error('disctrict')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>

                                <div class="form-group">
                                    <label for="street_name" class="form-label">Street Name</label>
                                    <input type="text" name="street_name" id="street_name" class="form-control @error('street_name') is-invalid @enderror" value="{{ $supplier->address->street_name }}" placeholder="Enter street name" autocomplete="street-name" autofocus>
                                    
                                    @error('street_name')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                
                                <div class="form-group">
                                    <label for="building_no" class="form-label">Building No.</label>
                                    <input type="text" name="building_no" id="building_no" class="form-control @error('building_no') is-invalid @enderror" value="{{ $supplier->address->building_no }}" placeholder="Enter building no" autocomplete="building-no" autofocus>
                                    
                                    @error('building_no')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>

                                <div class="form-group">
                                    <label for="plot_identication" class="form-label">Plot Identication</label>
                                    <input type="text" name="plot_identication" id="plot_identication" class="form-control @error('plot_identication') is-invalid @enderror" value="{{ $supplier->address->plot_identication }}" placeholder="Enter plot identication" autocomplete="plot-identication" autofocus>
                                    
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
                                    <input type="text" name="barangay" id="barangay" class="form-control @error('barangay') is-invalid @enderror" value="{{ $supplier->address->barangay }}" placeholder="Enter barangay" autocomplete="barangay" autofocus>
                                    
                                    @error('barangay')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>

                            </div>

                        </div>
                        <div class="row">

                            <div class="col-sm-12 col-md-6">
                                <div class="form-group">
                                    <button type="submit" class="btn btn-danger tinker-pro-btn">Update Supplier</button>
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

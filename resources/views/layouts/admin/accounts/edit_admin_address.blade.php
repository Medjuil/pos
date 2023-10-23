@extends('layouts.admin.index')

@section('content')
<section class="page-header mb-3 mt-2">
    <h3 class="text-uppercase pos-text-color mb-0" style="font-weight: 900;">Address</h3>
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb text-uppercase">
          <li class="breadcrumb-item"><a href="{{ route('admin.accounts.my-account') }}" class="pos-text-color text-decoration-none">My Account</a></li>
          <li class="breadcrumb-item"><a href="{{ route('admin.accounts.my-account') }}" onclick="event.preventDefault();" class="pos-text-color text-decoration-none">Address</a></li>
          <li class="breadcrumb-item active" aria-current="page">Edit</li>
        </ol>
      </nav>
      <a href="{{ route('admin.accounts.my-account') }}" class="text-decoration-none pos-text-color d-inline-block">
        <div class="icon-container d-flex"><span class="material-icons-outlined">arrow_back</span></div>
    </a>
</section>
<div class="card shadow-sm border-0">
    <div class="card-header fw-bold text-secondary d-flex align-items-center justify-content-between">
        <span>{{ __('My Account') }}</span>
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
        <form action="{{ route('admin.accounts.address.update') }}" method="post">
            @csrf
            <input type="hidden" class="d-none" name="admin_address" value="true">

            <div class="container-fluid">

                <ul class="nav nav-tabs mt-2 mb-5">

                    <li class="nav-item">
                    <a class="nav-link active" data-bs-toggle="tab" data-bs-target="#address" aria-controls="address" role="tab" aria-selected="false" aria-current="page" href="#address">Address</a>
                    </li>

                </ul>

                <div class="tab-content" id="pos-tab">
                    <div class="tab-pane fade show active" role="tabpanel" aria-labelledby="address" id="address">
                        
                        <div class="row">

                            <div class="col-sm-12 col-md-6">
                                
                                <div class="form-group">
                                    <label for="country" class="form-label">Country</label>
                                    <input type="text" name="country" id="country" value="{{ $user->address->country }}" class="form-control @error('country') is-invalid @enderror" value="{{ old('country') }}" placeholder="Enter country" autocomplete="country" autofocus>
                                    
                                    @error('country')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>

                                <div class="form-group">
                                    <label for="postal_code" class="form-label">Postal Code</label>
                                    <input type="number" name="postal_code" id="postal_code" value="{{ $user->address->postal_code }}" class="form-control @error('postal_code') is-invalid @enderror" value="{{ old('postal_code') }}" placeholder="Enter postal code" autocomplete="postal-code" autofocus>
                                    
                                    @error('postal_code')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                
                                <div class="form-group">
                                    <label for="province_state" class="form-label">Province / State</label>
                                    <input type="text" name="province_state" id="province_state" value="{{ $user->address->province_state }}" class="form-control @error('province_state') is-invalid @enderror" value="{{ old('province_state') }}" placeholder="Enter province / state" autocomplete="province-state" autofocus>
                                    
                                    @error('province_state')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>

                                <div class="form-group">
                                    <label for="municipality_city" class="form-label">Municipality / City</label>
                                    <input type="text" name="municipality_city" id="municipality_city" value="{{ $user->address->municipality_city }}" class="form-control @error('municipality_city') is-invalid @enderror" value="{{ old('municipality_city') }}" placeholder="Enter municipality / city" autocomplete="municipality-city" autofocus>
                                    
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
                                    <input type="text" name="disctrict" id="disctrict" value="{{ $user->address->district }}" class="form-control @error('disctrict') is-invalid @enderror" value="{{ old('disctrict') }}" placeholder="Enter disctrict" autocomplete="disctrict" autofocus>
                                    
                                    @error('disctrict')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>

                                <div class="form-group">
                                    <label for="street_name" class="form-label">Street Name</label>
                                    <input type="text" name="street_name" id="street_name" value="{{ $user->address->street_name }}" class="form-control @error('street_name') is-invalid @enderror" value="{{ old('street_name') }}" placeholder="Enter street name" autocomplete="street-name" autofocus>
                                    
                                    @error('street_name')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                
                                <div class="form-group">
                                    <label for="building_no" class="form-label">Building No.</label>
                                    <input type="text" name="building_no" id="building_no" value="{{ $user->address->building_no }}" class="form-control @error('building_no') is-invalid @enderror" value="{{ old('building_no') }}" placeholder="Enter building no" autocomplete="building-no" autofocus>
                                    
                                    @error('building_no')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>

                                <div class="form-group">
                                    <label for="plot_identication" class="form-label">Plot Identication</label>
                                    <input type="text" name="plot_identication" id="plot_identication" value="{{ $user->address->plot_identication }}" class="form-control @error('plot_identication') is-invalid @enderror" value="{{ old('plot_identication') }}" placeholder="Enter plot identication" autocomplete="plot-identication" autofocus>
                                    
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
                                    <input type="text" name="barangay" id="barangay" value="{{ $user->address->barangay }}" class="form-control @error('barangay') is-invalid @enderror" value="{{ old('barangay') }}" placeholder="Enter barangay" autocomplete="barangay" autofocus>
                                    
                                    @error('barangay')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>

                            </div>

                        </div>
                        

                        <div class="col-sm-12 mt-4">
                            <div class="form-group">
                                <button type="submit" class="btn btn-danger tinker-pro-btn">Update Address</button>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </form>
    </div>
</div>
@endsection

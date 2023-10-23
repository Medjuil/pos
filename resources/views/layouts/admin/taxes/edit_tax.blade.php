@extends('layouts.admin.index')

@section('content')
<section class="page-header mb-3 mt-2">
    <h3 class="text-uppercase pos-text-color mb-0" style="font-weight: 900;">Update Tax</h3>
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb text-uppercase">
          <li class="breadcrumb-item"><a href="{{ route('admin.taxes.index') }}" class="pos-text-color text-decoration-none">Taxes</a></li>
          <li class="breadcrumb-item active" aria-current="page">Edit</li>
        </ol>
      </nav>
      <a href="{{ route('admin.taxes.index') }}" class="text-decoration-none pos-text-color d-inline-block">
        <div class="icon-container d-flex"><span class="material-icons-outlined">arrow_back</span></div>
    </a>
</section>
<div class="card shadow-sm border-0">
    <div class="card-header fw-bold text-secondary d-flex align-items-center justify-content-between">
        <span>{{ __('Edit Tax') }}</span>
    </div>

    <div class="card-body py-4">
      
        <form action="{{ route('admin.taxes.update', $tax->id) }}" method="post">
            @csrf
            @method('put')
            <div class="container-fluid">

                <div class="row">
                    <div class="col-sm-12 col-md-6">

                        <div class="form-group">
                            <label for="tax_code" class="form-label">Tax Code</label>
                            <input type="text" name="tax_code" id="tax_code" class="form-control @error('tax_code') is-invalid @enderror" value="{{ $tax->tax_code }}" placeholder="Enter tax code" autocomplete="tax-code" autofocus>
                            
                            @error('tax_code')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="tax_type" class="form-label">Tax Type</label>
                            <input type="text" name="tax_type" id="tax_type" class="form-control @error('tax_type') is-invalid @enderror" value="{{ $tax->tax_type }}" placeholder="Enter tax type" autocomplete="tax-type" autofocus>
                            
                            @error('tax_type')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="tax_rate" class="form-label">Tax Rate</label>
                            <input type="number" name="tax_rate" id="tax_rate" class="form-control @error('tax_rate') is-invalid @enderror" value="{{ $tax->tax_rate }}" placeholder="Enter tax rate" autocomplete="tax-rate" autofocus>
                            
                            @error('tax_rate')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="tax_description" class="form-label">Tax Description</label>
                            <input type="text" name="tax_description" id="tax_description" class="form-control @error('tax_description') is-invalid @enderror" value="{{ $tax->tax_description }}" placeholder="Enter tax description" autocomplete="tax-description" autofocus>
                            
                            @error('tax_description')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>

                    </div>
                    
                    <div class="col-sm-12">
                        <div class="form-group form-check">
                            <input class="form-check-input " name="tax_fixed" type="checkbox" id="tax_fixed" @if ((bool)$tax->tax_fixed) checked  @endif>
                            <label class="form-check-label" for="tax_fixed">
                                Fixed Tax.
                            </label>

                        </div>
                    </div>

                    <div class="col-sm-12 mt-4">
                        <div class="form-group">
                            <button type="submit" class="btn btn-danger tinker-pro-btn">Update Tax</button>
                        </div>
                    </div>
                </div>
                
            </div>
        </form>
    </div>
</div>
@endsection

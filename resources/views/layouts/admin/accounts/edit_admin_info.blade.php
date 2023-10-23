@extends('layouts.admin.index')

@section('content')
<section class="page-header mb-3 mt-2">
    <h3 class="text-uppercase pos-text-color mb-0" style="font-weight: 900;">Accounts</h3>
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb text-uppercase">
          <li class="breadcrumb-item"><a href="{{ route('admin.accounts.my-account') }}" class="pos-text-color text-decoration-none">My Account</a></li>
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
        <form action="{{ route('admin.accounts.personal.update') }}" method="post">
            @csrf
            <input type="hidden" class="d-none" name="admin_personal" value="true">

            <div class="container-fluid">

                <ul class="nav nav-tabs mt-2 mb-5">

                    <li class="nav-item">
                    <a class="nav-link active" data-bs-toggle="tab" data-bs-target="#personal" aria-controls="personal" role="tab" aria-selected="false" aria-current="page" href="#personal">Personal</a>
                    </li>

                </ul>

                <div class="tab-content" id="pos-tab">
                    <div class="tab-pane fade show active" role="tabpanel" aria-labelledby="personal" id="personal">
                        
                        <div class="row">
                            <div class="col-sm-12 col-md-6">
                                <div class="form-group">
                                    <label for="firstname" class="form-label">Firstname</label>
                                    <input type="text" name="firstname" id="firstname" value="{{ $user->firstname }}" class="form-control @error('firstname') is-invalid @enderror" value="{{ old('firstname') }}" placeholder="Enter firstname" autocomplete="firstname" autofocus>
                                    
                                    @error('firstname')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                
                                <div class="form-group">
                                    <label for="lastname" class="form-label">Lastname</label>
                                    <input type="text" name="lastname" id="lastname" value="{{ $user->lastname }}" class="form-control @error('lastname') is-invalid @enderror" value="{{ old('lastname') }}" placeholder="Enter lastname" autocomplete="lastname" autofocus>
                                    
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
                                    <input type="email" name="email" id="email" value="{{ $user->email }}" class="form-control @error('email') is-invalid @enderror" value="{{ old('email') }}" placeholder="Enter email" autocomplete="email" autofocus>
                                    
                                    @error('email')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>

                                <div class="form-group">
                                    <label for="mobile_no" class="form-label">Mobile No.</label>
                                    <input type="number" name="mobile_no" id="mobile_no" value="{{ $user->mobile_no }}" class="form-control @error('mobile_no') is-invalid @enderror" value="{{ old('mobile_no') }}" placeholder="Enter mobile no" autocomplete="mobile no" autofocus>
                                    
                                    @error('mobile_no')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>

                            </div>
                            
                        </div>
                        
                        <div class="col-sm-12 mt-4">
                            <div class="form-group">
                                <button type="submit" class="btn btn-danger tinker-pro-btn">Update Account</button>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </form>
    </div>
</div>
@endsection

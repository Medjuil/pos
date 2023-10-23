@extends('layouts.admin.index')

@section('content')
<section class="page-header mb-3 mt-2">
    <h3 class="text-uppercase pos-text-color mb-0" style="font-weight: 900;">User Information</h3>
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb text-uppercase">
          <li class="breadcrumb-item"><a href="{{ route('admin.accounts.users.index') }}" class="pos-text-color text-decoration-none">Users</a></li>
          <li class="breadcrumb-item active" aria-current="page">View</li>
        </ol>
      </nav>
      <a href="{{ route('admin.accounts.users.index') }}" class="text-decoration-none pos-text-color d-inline-block">
        <div class="icon-container d-flex"><span class="material-icons-outlined">arrow_back</span></div>
    </a>
</section>
<div class="card shadow-sm border-0">
    <div class="card-header fw-bold text-secondary d-flex align-items-center justify-content-between">
        <span>{{ __('Account') }}</span>
    </div>

    <div class="card-body">
        <div class="container-fluid">
            <div class="row align-items-center">

                <div class="col-sm-12 col-md-6">
                    <div class="profile-container">
                        <img src="{{ asset('assets/images/avatar-1968236_1280.png') }}" class="img-fluid rounded-circle" width="100" alt="" srcset="">
                    </div>
                </div>

                <div class="col-sm-12 col-md-6">

                    <div class="col-item">
                        <span class="text-secondary text-uppercase fw-bold">Full Name</span>
                        <p class="text-secondary text-uppercase">Medjuil Casagan</p>
                    </div>

                    <div class="col-item">
                        <span class="text-secondary text-uppercase fw-bold">Email Address</span>
                        <p class="text-secondary text-uppercase">s.casagan.medjuil@cmu.edu.ph</p>
                    </div>

                    <div class="col-item">
                        <span class="text-secondary text-uppercase fw-bold">Mobile No.</span>
                        <p class="text-secondary text-uppercase">0987654321</p>
                    </div>

                    <div class="col-item">
                        <span class="text-secondary text-uppercase fw-bold">System Role</span>
                        <p class="text-secondary text-uppercase">Cashier</p>
                    </div>
                
                    <div class="col-item">
                        <span class="text-secondary text-uppercase fw-bold">Address</span>
                        <p class="text-secondary text-uppercase">Wao, Lanao del Sur</p>
                    </div>

                </div>

            </div>
        </div>
    </div>
</div>
@endsection

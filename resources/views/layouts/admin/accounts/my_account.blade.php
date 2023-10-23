@extends('layouts.admin.index')

@section('content')
<section class="page-header mb-4 mt-2">
    <h3 class="text-uppercase pos-text-color" style="font-weight: 900;">My Account</h3>
</section>
<div class="card shadow-sm border-0">
    <div class="card-header fw-bold text-secondary d-flex align-items-center justify-content-between">
        <span>{{ __('Personal Information') }}</span>
    </div>

    <div class="card-body">
        @if ($errors->any()) 
            <div class="alert alert-danger" role="alert">
                <div class="icon-container d-flex align-items-center gap-2 me-1">
                    <span class="material-icons-outlined">close</span>
                    @foreach ($errors->all() as $error)
                        <span style="font-size: 12px;">{{ $error }}</span>
                    @endforeach
                </div>
            </div>
        @endif

        @if (Session::get('success')) 
            <div class="alert alert-success" role="alert">
                <div class="icon-container d-flex align-items-center gap-2 me-1">
                    <span class="material-icons-outlined">task_alt</span>
                    <span style="font-size: 12px;">{{ Session::get('success') }}</span>
                </div>
            </div>
        @endif

        <div class="profile-image-container d-flex justify-content-center position-relative">
            <img src="{{ auth()->user()->profile ? asset(str_replace('public','storage', auth()->user()->profile)) : asset('assets/images/avatar-1968236_1280.png') }}" style="width: 15rem; height: 15rem; object-fit: cover; border: 1px solid rgb(255 125 0);" class="img-fluid rounded-circle" alt="" srcset="">
            <a href="#" class="text-decoration-none profile-update-icon-container" data-bs-toggle="modal" data-bs-target="#update-admin-profile">
                <!-- Button trigger modal -->
                <div class="icon-container d-flex">
                    <span class="material-icons-outlined">edit</span>
                </div>
            </a>
        </div>
        <div class="table-responsive d-flex justify-content-center">
            <table class="table table-bordered w-50">
                <tbody>
                    <tr>
                        <td class="text-end pb-2 fw-bold"><span>Name</span></td>
                        <td>{{ auth()->user()->firstname .' '.auth()->user()->lastname }}</td>
                    </tr>
                    <tr>
                        <td class="text-end pb-2 fw-bold">Mobile No</td>
                        <td>{{ auth()->user()->mobile_no }}</td>
                    </tr>
                    <tr>
                        <td class="text-end pb-2 fw-bold">Email</td>
                        <td>{{ auth()->user()->email }}</td>
                    </tr>
                    <tr>
                        <td class="text-end pb-2 fw-bold">Role</td>
                        <td>{{ auth()->user()->role }}</td>
                    </tr>
                    <tr>
                        <td class="text-end pb-2 fw-bold">Status</td>
                        <td> {{ auth()->user()->active }}</td>
                    </tr>
                    <tr>
                        <td class="text-end pb-2 fw-bold">Location</td>
                        <td>
                            <span>{{ auth()->user()->address->barangay.', ' ?? '' }} {{ auth()->user()->address->municipality_city.', ' ?? '' }} {{  auth()->user()->address->province_state ?? '' }}</span>
                            <a href="{{ route('admin.accounts.address.edit') }}" class="text-decoration-none pos-text-color d-inline">
                                <!-- Button trigger modal -->
                                <div class="icon-container d-inline">
                                    <span class="material-icons-outlined">edit</span>
                                </div>
                            </a>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
        <div class="information-update-container d-flex justify-content-center">
            <a href="{{ route('admin.accounts.personal.edit') }}" class="btn btn-danger tinker-pro-btn">Edit Personal</a>
        </div>
    </div>
</div>

<!-- Modal -->
<div class="modal fade" id="update-admin-profile" tabindex="-1" aria-labelledby="update-admin-profile" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5 text-secondary" id="update-admin-profile">Update Profile Image</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body d-flex justify-content-center">
                <img src="{{ asset('assets/images/avatar-1968236_1280.png') }}" style="width: 15rem; height: 15rem;object-fit: cover;" id="admin-profile-previewer" class="img-fluid rounded-circle" alt="" srcset="">
            </div>
            <div class="modal-footer">
                <a href="#" class="me-auto pos-text-color" onclick="event.preventDefault(); document.getElementById('admin-profile-file').click();">Select image</a>
                <form action="{{ route('admin.accounts.profile.update') }}"  method="post" enctype="multipart/form-data">
                    @csrf
                    <input type="file" class="d-none" name="file" id="admin-profile-file">
                    <button type="submit" class="btn btn-danger tinker-pro-btn">Save changes</button>
                </form>
            </div>
        </div>
    </div>
</div>

<!-- Modal -->
<div class="modal fade" id="update-admin-info" tabindex="-1" aria-labelledby="update-admin-info" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <form action="{{ route('admin.accounts.profile.update') }}" method="post" enctype="multipart/form-data">
                @csrf

                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="update-admin-info">Update Information</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="form-group">
                        <label for="firstname">Firstname</label>
                        <input type="text" name="firstname" class="form-control" placeholder="Enter firstname">
                    </div>
                    <div class="form-group">
                        <label for="lastname">Lastname</label>
                        <input type="text" name="lastname" class="form-control" placeholder="Enter lastname">
                    </div>
                    <div class="form-group">
                        <label for="email">Email</label>
                        <input type="text" name="email" class="form-control" placeholder="Enter email">
                    </div>
                    <div class="form-group">
                        <label for="mobile_no">mobile_no</label>
                        <input type="text" name="mobile_no" class="form-control" placeholder="Enter mobile no">
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-danger tinker-pro-btn">Save changes</button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection

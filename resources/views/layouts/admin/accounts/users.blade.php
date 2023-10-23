@extends('layouts.admin.index')

@section('content')
<section class="page-header mb-4 mt-2">
    <h3 class="text-uppercase pos-text-color" style="font-weight: 900;">Users Dashboard</h3>
</section>
<div class="card shadow-sm border-0">
    <div class="card-header fw-bold text-secondary d-flex align-items-center justify-content-between">
        <span>{{ __('User Accounts') }}</span>
        <a href="{{ route('admin.accounts.users.create') }}" class="btn btn-danger tinker-pro-btn d-flex align-items-center">
            <div class="icon-container d-flex me-1"><span class="material-icons-outlined">add_circle</span></div>
            <div class="text-container"><span>Add User</span></div>
        </a>
    </div>

    <div class="card-body">
        @if (Session::get('success')) 
            <div class="alert alert-success" role="alert">
                <div class="icon-container d-flex align-items-center gap-2 me-1">
                    <span class="material-icons-outlined">task_alt</span>
                    <span style="font-size: 12px;">{{ Session::get('success') }}</span>
                </div>
            </div>
        @endif

        <div class="table-responsive">
            <table class="table table-bordered text-nowrap datatable">
                <thead>
                    <tr class="border-0">
                        <th>No.</th>
                        <th>Name</th>
                        <th>Email</th>
                        <th>Mobile No.</th>
                        <th>Role</th>
                        <th>Status</th>
                        <th style="width: 0;" class="text-center">Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($users as $user)
                        <tr>
                            <td>{{ $loop->index+1 }}</td>
                            <td>{{ $user->firstname .' '. $user->lastname }}</td>
                            <td>{{ $user->email }}</td>
                            <td>{{ $user->mobile_no }}</td>
                            <td class="text-center"><span class="badge bg-success me-1">{{ $user->role }}</span></td>
                            <td class="text-center">
                                @if ($user->active == 'active')
                                    <span class="badge bg-success me-1">Active</span>
                                @else
                                    <span class="badge bg-danger me-1">Inactive</span>
                                @endif
                            </td>
                            <td class="d-flex gap-1 text-nowrap w-0">
                                <a href="{{ route('admin.accounts.users.edit',  $user->id) }}" class="btn btn-primary d-flex align-items-center">
                                    <div class="icon-container d-flex me-1"><span class="material-icons-outlined">edit</span></div>
                                    <div class="text-container"><span>Edit</span></div>
                                </a>
                                <button type="button" onclick="event.preventDefault(); document.getElementById('delete-user-{{$user->id}}').submit();" class="btn btn-danger d-flex align-items-center">
                                    <div class="icon-container d-flex me-1"><span class="material-icons-outlined">delete_sweep</span></div>
                                    <div class="text-container"><span>Delete</span></div>
                                </button>
                                <form action="{{ route('admin.accounts.users.destroy',  $user->id) }}" id="delete-user-{{$user->id}}" method="post">
                                    @csrf
                                    @method('delete')
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection

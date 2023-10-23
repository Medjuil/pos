@extends('layouts.admin.index')

@section('content')
<section class="page-header mb-4 mt-2">
    <h3 class="text-uppercase pos-text-color" style="font-weight: 900;">Customers Dashboard</h3>
</section>
<div class="card shadow-sm border-0">
    <div class="card-header fw-bold text-secondary d-flex align-items-center justify-content-between">
        <span>{{ __('Customer Accounts') }}</span>
        <a href="{{ route('admin.customers.create') }}" class="btn btn-danger tinker-pro-btn d-flex align-items-center">
            <div class="icon-container d-flex me-1"><span class="material-icons-outlined">add_circle</span></div>
            <div class="text-container"><span>Add Customer</span></div>
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
                        <th>Customer Type</th>
                        <th>Loyalty Card No.</th>
                        <th style="width: 0;" class="text-center">Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($customers as $customer)
                        <tr>
                            <td>{{ $loop->index+1 }}</td>
                            <td>{{ $customer->firstname .' '. $customer->lastname }}</td>
                            <td>{{ $customer->email }}</td>
                            <td>{{ $customer->mobile_no }}</td>
                            <td>{{ $customer->customer_type }}</td>
                            <td class="text-center"><span class="badge bg-success me-1">{{ $customer->loyalty_card_no }}</span></td>
                           
                            <td class="d-flex gap-1 text-nowrap w-0">
                               
                                <a href="{{ route('admin.customers.edit',  $customer->id) }}" class="btn btn-primary d-flex align-items-center">
                                    <div class="icon-container d-flex me-1"><span class="material-icons-outlined">edit</span></div>
                                    <div class="text-container"><span>Edit</span></div>
                                </a>
                                <button type="button" onclick="event.preventDefault(); document.getElementById('delete-customer-{{$customer->id}}').submit();" class="btn btn-danger d-flex align-items-center">
                                    <div class="icon-container d-flex me-1"><span class="material-icons-outlined">delete_sweep</span></div>
                                    <div class="text-container"><span>Delete</span></div>
                                </button>
                                <form action="{{ route('admin.customers.destroy',  $customer->id) }}" id="delete-customer-{{$customer->id}}" method="post">
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

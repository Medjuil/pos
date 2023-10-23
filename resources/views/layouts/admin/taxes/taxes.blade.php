@extends('layouts.admin.index')

@section('content')
<section class="page-header mb-4 mt-2">
    <h3 class="text-uppercase pos-text-color" style="font-weight: 900;">Taxes</h3>
</section>
<div class="card shadow-sm border-0">
    <div class="card-header fw-bold text-secondary d-flex align-items-center justify-content-between">
        <span>{{ __('Taxes') }}</span>
        <a href="{{ route('admin.taxes.create') }}" class="btn btn-danger tinker-pro-btn d-flex align-items-center">
            <div class="icon-container d-flex me-1"><span class="material-icons-outlined">add_circle</span></div>
            <div class="text-container"><span>Add Tax</span></div>
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
            <table class="table table-bordered text-nowrap  datatable">
                <thead>
                    <tr class="border-0">
                        <th>No.</th>
                        <th>Tax Code</th>
                        <th>Tax Type</th>
                        <th>Tax Description</th>
                        <th class="text-center">Tax Fixed</th>
                        <th style="width: 0;" class="text-center">Action</th>
                    </tr>
                </thead>
                <tbody class="text-wrap">
                    @foreach ($taxes as $tax)
                    <tr>
                        <td>{{ $loop->index+1 }}</td>
                        <td>{{ $tax->tax_code }}</td>
                        <td>{{ $tax->tax_type }}</td>
                        <td>{{ $tax->tax_description }}</td>
                        <td class="text-center">
                            @if ($tax->tax_fixed == 1)
                                <span class="material-icons-outlined text-success">task_alt</span>
                            @else
                                <span class="material-icons-outlined text-danger">cancel</span>
                            @endif
                        </td>
                        <td class="d-flex gap-1 text-nowrap w-0">
                            <a href="{{ route('admin.taxes.edit',  $tax->id) }}" class="btn btn-primary d-flex align-items-center">
                                <div class="icon-container d-flex me-1"><span class="material-icons-outlined">edit</span></div>
                                <div class="text-container"><span>Edit</span></div>
                            </a>
                            <button type="button" onclick="event.preventDefault(); document.getElementById('delete-tax-{{$tax->id}}').submit();" class="btn btn-danger d-flex align-items-center">
                                <div class="icon-container d-flex me-1"><span class="material-icons-outlined">delete_sweep</span></div>
                                <div class="text-container"><span>Delete</span></div>
                            </button>
                            <form action="{{ route('admin.taxes.destroy',  $tax->id) }}" id="delete-tax-{{$tax->id}}" method="post">
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

@extends('layouts.admin.index')

@section('content')
<section class="page-header mb-4 mt-2">
    <h3 class="text-uppercase pos-text-color" style="font-weight: 900;">Product Categories</h3>
</section>
<div class="card shadow-sm border-0">
    <div class="card-header fw-bold text-secondary d-flex align-items-center justify-content-between">
        <span>{{ __('Product Categories') }}</span>
        <a href="{{ route('admin.categories.create') }}" class="btn btn-danger tinker-pro-btn d-flex align-items-center">
            <div class="icon-container d-flex me-1"><span class="material-icons-outlined">add_circle</span></div>
            <div class="text-container"><span>Add product category</span></div>
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
            <table class="table table-bordered datatable">
                <thead class="text-nowrap">
                    <tr class="border-0">
                        <th>No.</th>
                        <th>Category Name</th>
                        <th>Category Description</th>
                        <th style="width: 0;" class="text-center">Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($productCategories as $productCategory)
                    <tr>
                        <td>{{ $loop->index+1 }}</td>
                        <td>{{ $productCategory->category_name }}</td>
                        <td>{{ $productCategory->description }}</td>
                        <td class="d-flex gap-1 text-nowrap w-0">
                            <a href="{{ route('admin.category.products', $productCategory->id) }}" class="btn btn-success d-flex align-items-center">
                                <div class="icon-container d-flex me-1"><span class="material-icons-outlined">open_in_new</span></div>
                                <div class="text-container"><span>View</span></div>
                            </a>
                            <a href="{{ route('admin.categories.edit', $productCategory->id ) }}" class="btn btn-primary d-flex align-items-center">
                                <div class="icon-container d-flex me-1"><span class="material-icons-outlined">edit</span></div>
                                <div class="text-container"><span>Edit</span></div>
                            </a>
                            
                            <a href="{{ route('admin.categories.edit', $productCategory->id ) }}" onclick="event.preventDefault(); document.getElementById('delete-category').submit();" class="btn btn-danger d-flex align-items-center">
                                <div class="icon-container d-flex me-1"><span class="material-icons-outlined">delete_sweep</span></div>
                                <div class="text-container"><span>Delete</span></div>
                                <form action="{{ route('admin.categories.destroy', $productCategory->id ) }}" id="delete-category" method="post">
                                    @csrf
                                    @method('delete')
                                </form>
                            </a>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection

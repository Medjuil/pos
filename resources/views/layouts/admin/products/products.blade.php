@extends('layouts.admin.index')

@section('content')
<section class="page-header mb-4 mt-2">
    <h3 class="text-uppercase pos-text-color" style="font-weight: 900;">Products</h3>
</section>
<div class="card shadow-sm border-0">
    <div class="card-header fw-bold text-secondary d-flex align-items-center justify-content-between">
        <span>{{ __('User Accounts') }}</span>
        <a href="{{ route('admin.products.create') }}" class="btn btn-danger tinker-pro-btn d-flex align-items-center">
            <div class="icon-container d-flex me-1"><span class="material-icons-outlined">add_circle</span></div>
            <div class="text-container"><span>Add Product</span></div>
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
                        <th>Code</th>
                        <th>Product Name</th>
                        <th>Barcode</th>
                        <th>Product Category</th>
                        <th>Cost</th>
                        <th>Price</th>
                        <th>Tax</th>
                        <th>Tax rate</th>
                        <th>Markup</th>
                        <th>Fixed Markup</th>
                        <th>Price before tax</th>
                        <th>Price after tax</th>
                        <th>Stock</th>
                        <th>Unit</th>
                        <th>Unit Value</th>
                        <th>Supplier</th>
                        <th>Expiration Date</th>
                        <th style="width: 0;" class="text-center">Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($products as $product)
                        <tr>
                            <td>{{ $loop->index+1 }}</td>
                            <td>{{ $product->code }}</td>
                            <td>{{ $product->product_name }}</td>
                            <td>{{ $product->barcode }}</td>
                            <td>{{ $product->product_category->category_name }}</td>
                            <td>{{ $product->cost }}</td>
                            <td>
                                @if (!(bool)$product->fixed_markup)
                                    {{ $product->cost + (($product->markup / 100) * $product->cost) }}
                                @else
                                    {{ $product->cost + $product->markup }}
                                @endif
                            </td>
                            <td>{{ $product->tax->tax_type }}</td>
                            <td>{{ $product->tax->tax_rate }}</td>
                            <td>{{ $product->markup }}</td>
                            <td>
                                @if (!(bool)$product->fixed_markup)
                                    No
                                @else
                                    Yes
                                @endif
                            </td>
                            <td>
                                @if (!(bool)$product->fixed_markup)
                                    {{ $product->cost + (($product->markup / 100) * $product->cost) }}
                                @else
                                    {{ $product->cost + $product->markup }}
                                @endif
                            </td>
                            <td>
                                @if (!(bool)$product->fixed_markup)
                                    {{ ($product->cost + (($product->markup / 100) * $product->cost)) + (($product->tax->tax_rate / 100) * ($product->cost + (($product->markup / 100) * $product->cost))) }}
                                @else
                                    {{ ($product->cost + $product->markup) + (($product->tax->tax_rate / 100) * ($product->cost + $product->markup)) }}
                                @endif    
                            </td>
                            <td class="text-center">
                                @if ($product->stock > 10)
                                    <span class="badge bg-success me-1">{{ $product->stock }}</span>
                                @else
                                    <span class="badge bg-danger me-1">{{ $product->stock }}</span>
                                @endif
                            </td>
                            <td>{{ $product->unit }}</td>
                            <td>{{ $product->unit_value }}</td>
                            <td>{{ $product->shop->company_name }}</td>
                            <td>{{ $product->expiration_date }}</td>
                           
                            <td class="d-flex gap-1 text-nowrap w-0">
                                <a href="{{ route('admin.products.show', $product->id) }}" class="btn btn-success d-flex align-items-center">
                                    <div class="icon-container d-flex me-1"><span class="material-icons-outlined">open_in_new</span></div>
                                    <div class="text-container"><span>View</span></div>
                                </a>
                                <a href="{{ route('admin.products.edit',  $product->id) }}" class="btn btn-primary d-flex align-items-center">
                                    <div class="icon-container d-flex me-1"><span class="material-icons-outlined">edit</span></div>
                                    <div class="text-container"><span>Edit</span></div>
                                </a>
                                <button type="button" onclick="event.preventDefault(); document.getElementById('delete-product-{{$product->id}}').submit();" class="btn btn-danger d-flex align-items-center">
                                    <div class="icon-container d-flex me-1"><span class="material-icons-outlined">delete_sweep</span></div>
                                    <div class="text-container"><span>Delete</span></div>
                                </button>
                                <form action="{{ route('admin.products.destroy',  $product->id) }}" id="delete-product-{{$product->id}}" method="post">
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

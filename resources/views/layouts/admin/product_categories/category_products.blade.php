@extends('layouts.admin.index')

@section('content')
<section class="page-header mb-4 mt-2">
    <h3 class="text-uppercase pos-text-color" style="font-weight: 900;">Categories</h3>
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb text-uppercase">
          <li class="breadcrumb-item"><a href="{{ route('admin.categories.index') }}" class="pos-text-color text-decoration-none">{{ $category->category_name }}</a></li>
          <li class="breadcrumb-item active" aria-current="page">Products</li>
        </ol>
    </nav>
    <a href="{{ route('admin.categories.index') }}" class="text-decoration-none pos-text-color d-inline-block">
        <div class="icon-container d-flex"><span class="material-icons-outlined">arrow_back</span></div>
    </a>
</section>
<div class="card shadow-sm border-0">
    <div class="card-header fw-bold text-secondary d-flex align-items-center justify-content-between">
        <span>{{ __('Products') }}</span>
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
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection

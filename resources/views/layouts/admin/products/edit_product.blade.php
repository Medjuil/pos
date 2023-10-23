@extends('layouts.admin.index')

@section('content')
<section class="page-header mb-3 mt-2">
    <h3 class="text-uppercase pos-text-color mb-0" style="font-weight: 900;">Update Product</h3>
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb text-uppercase">
          <li class="breadcrumb-item"><a href="{{ route('admin.products.index') }}" class="pos-text-color text-decoration-none">Products</a></li>
          <li class="breadcrumb-item active" aria-current="page">Edit</li>
        </ol>
      </nav>
      <a href="{{ route('admin.products.index') }}" class="text-decoration-none pos-text-color d-inline-block">
        <div class="icon-container d-flex"><span class="material-icons-outlined">arrow_back</span></div>
    </a>
</section>
<div class="card shadow-sm border-0">
    <div class="card-header fw-bold text-secondary d-flex align-items-center justify-content-between">
        <span>{{ __('Update Product') }}</span>
    </div>

    <div class="card-body py-4">
        
        @if ($errors->any())
            <div class="alert alert-danger m-1" style="font-size: 12px;">
                <ul class="mb-0">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="{{ route('admin.products.update', $product->id) }}" method="post">
            @csrf
            @method('put')
            <div class="container-fluid">
                
                <div class="row">
                    <div class="col-sm-12 col-md-6">
                        
                        <div class="form-group">
                            <label for="code" class="form-label">Code</label>
                            <input type="number" name="code" value="{{ $product->code }}" id="code" class="form-control @error('code') is-invalid @enderror" value="{{ old('code') }}" placeholder="Enter code" autocomplete="code" autofocus>
                            
                            @error('code')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        
                        <div class="form-group">
                            <label for="barcode" class="form-label">Barcode</label>
                            <input type="number" name="barcode" value="{{ $product->barcode }}" id="barcode" class="form-control @error('barcode') is-invalid @enderror" value="{{ old('barcode') }}" placeholder="Enter barcode" autocomplete="barcode" autofocus>
                            
                            @error('barcode')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="product_name" class="form-label">Product Name</label>
                            <input type="text" name="product_name" value="{{ $product->product_name }}" id="product_name" class="form-control @error('product_name') is-invalid @enderror" value="{{ old('product_name') }}" placeholder="Enter product name" autocomplete="product-name" autofocus>
                            
                            @error('product_name')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="cost" class="form-label">Cost</label>
                            <input type="number" name="cost" value="{{ $product->cost }}" id="cost" class="form-control @error('cost') is-invalid @enderror" value="{{ old('cost') }}" placeholder="Enter cost" autocomplete="cost" autofocus>
                            
                            @error('cost')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                
                        <div class="form-group">
                            <label for="tax_id" class="form-label">Tax</label>
                            <select name="tax_id" class="form-select @error('tax_id') is-invalid @enderror" id="tax_id">
                                <option value="">Select tax</option>
                                @foreach ($taxes as $tax)
                                    <option value="{{ $tax->id }}" @if($tax->id == $product->tax->id) selected @endif>{{ $tax->tax_type }}</option>
                                @endforeach
                            </select>
                            @error('tax_id')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="markup" class="form-label">Markup (<span id="markup-indicator">%</span>)</label>
                            <input type="number" name="markup" value="{{ $product->markup }}" id="markup" class="form-control @error('markup') is-invalid @enderror" value="{{ old('markup') }}" placeholder="Enter markup" autocomplete="markup" autofocus>
                           
                            @error('markup')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        
                    </div>

                    <div class="col-sm-12 col-md-6">

                        <div class="form-group">
                            <label for="stock" class="form-label">Stock</label>
                            <input type="number" name="stock" value="{{ $product->stock }}" id="stock" class="form-control @error('stock') is-invalid @enderror" value="{{ old('stock') }}" placeholder="Enter stock" autocomplete="stock" autofocus>
                            
                            @error('stock')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="unit" class="form-label">Unit</label>
                            <input type="text" name="unit" value="{{ $product->unit }}" id="unit" class="form-control @error('unit') is-invalid @enderror" value="{{ old('unit') }}" placeholder="Enter unit" autocomplete="unit" autofocus>
                            
                            @error('unit')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="unit_value" class="form-label">Unit Value</label>
                            <input type="number" name="unit_value" value="{{ $product->unit_value }}" id="unit_value" class="form-control @error('unit_value') is-invalid @enderror" value="{{ old('unit_value') }}" placeholder="Enter unit value" autocomplete="unit-value" autofocus>
                            
                            <small class="text-secondary">Specify the value of product as indicated in unit measurement.</small>
                            @error('unit_value')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="product_category_id" class="form-label">Product category</label>
                            <select name="product_category_id" class="form-select @error('product_category_id') is-invalid @enderror" id="product_category_id">
                                <option value="">Select category</option>
                                @foreach ($categories as $category)
                                    <option value="{{ $category->id }}" @if($category->id == $product->product_category->id) selected @endif>{{ $category->category_name }}</option>
                                @endforeach
                            </select>
                            @error('product_category_id')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="shop_id" class="form-label">Supplier</label>
                            <select name="shop_id" class="form-select @error('shop_id') is-invalid @enderror" id="shop_id">
                                <option value="">Select supplier</option>
                                @foreach ($suppliers as $supplier)
                                    <option value="{{ $supplier->id }}" @if($supplier->id == $product->shop->id) selected @endif >{{ $supplier->company_name }}</option>
                                @endforeach
                            </select>
                            @error('shop_id')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        
                        <div class="form-group">
                            <label for="expiration_date" class="form-label">Expiration Date</label>
                            <input type="date" name="expiration_date" value="{{ $product->expiration_date }}" id="expiration_date" class="form-control @error('expiration_date') is-invalid @enderror" value="{{ old('expiration_date') }}" placeholder="Enter expiration date" autocomplete="expiration-date" autofocus>
                          
                            @error('expiration_date')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>
                    
                    <div class="col-sm-12">

                        <div class="form-group">
                            <label for="description" class="form-label">Description <small class="text-secondary">(optional)</small></label>
                            <textarea name="description" value="{{ $product->description }}" class="form-control bg-white @error('description') is-invalid @enderror" placeholder="Enter the description of the product." id="description" cols="30" rows="5"></textarea>
                            
                            @error('description')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        
                    </div>

                    <div class="col-sm-12">

                        <div class="form-group form-check">
                            <input class="form-check-input" name="fixed_markup" @if((bool)$product->fixed_markup) checked @endif type="checkbox" value="true" id="fixed_markup">
                            <label class="form-check-label" for="fixed_markup">
                                Fixed Markup.
                            </label>
                        </div>

                        <div class="form-group mt-4">
                            <button type="submit" class="btn btn-danger tinker-pro-btn">Update Product</button>
                        </div>

                    </div>

                </div>

            </div>
        </form>
    </div>
</div>
@endsection

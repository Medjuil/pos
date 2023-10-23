@extends('layouts.admin.index')

@section('content')
<section class="page-header mb-3 mt-2">
    <h3 class="text-uppercase pos-text-color mb-0" style="font-weight: 900;">Add Product Category</h3>
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb text-uppercase">
          <li class="breadcrumb-item"><a href="{{ route('admin.categories.index') }}" class="pos-text-color text-decoration-none">Product Category</a></li>
          <li class="breadcrumb-item active" aria-current="page">Add</li>
        </ol>
      </nav>
      <a href="{{ route('admin.categories.index') }}" class="text-decoration-none pos-text-color d-inline-block">
        <div class="icon-container d-flex"><span class="material-icons-outlined">arrow_back</span></div>
    </a>
</section>
<div class="card shadow-sm border-0">
    <div class="card-header fw-bold text-secondary d-flex align-items-center justify-content-between">
        <span>{{ __('New Product') }}</span>
    </div>

    <div class="card-body py-4">
        <form action="{{ route('admin.categories.store') }}" method="post">
            @csrf
            <div class="container-fluid">
                
                <div class="row">
                    <div class="col-sm-12">
                        
                        <div class="form-group">
                            <label for="category_name" class="form-label">Category Name</label>
                            <input type="text" name="category_name" id="category_name" class="form-control @error('category_name') is-invalid @enderror" value="{{ old('category_name') }}" placeholder="Enter category name" autocomplete="category-name" autofocus>
                            
                            @error('category_name')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        
                        <div class="form-group">
                            <label for="description" class="form-label">Description</label>
                            <textarea name="description" id="description" class="form-control bg-white @error('description') is-invalid @enderror" placeholder="Enter description" cols="30" rows="10"></textarea>
                            
                            @error('description')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>

                        <div class="form-group mt-4">
                            <button type="submit" class="btn btn-danger tinker-pro-btn">Add Product Category</button>
                        </div>
    
                    </div>

                </div>
            </div>
        </form>
    </div>
</div>
@endsection

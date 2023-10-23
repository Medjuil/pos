<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProductCategoryRequest;
use App\Models\ProductCategory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

class ProductCategoryController extends Controller
{
    public function index(): View {
        $productCategories = ProductCategory::all();
        return view('layouts.admin.product_categories.product_categories', compact('productCategories'));
    }

    public function create(): View {
        return view('layouts.admin.product_categories.create_product_category');
    }

    public function store(ProductCategoryRequest $productCategoryRequest): RedirectResponse {
        ProductCategory::create($productCategoryRequest->validated());
        return redirect()->route('admin.categories.index')->with('success','New product category successfully added!');
    }

    public function edit(ProductCategory $category): View {
        return view('layouts.admin.product_categories.edit_product_category', ['category' => $category]);
    }

    public function update(ProductCategoryRequest $productCategoryRequest, ProductCategory $category): RedirectResponse {
        $request = json_decode(json_encode($productCategoryRequest->validated()));
        $category->category_name = $request->category_name;
        $category->description = $request->description;
        $category->save();

        return redirect()->route('admin.categories.index')->with('success','Product category successfully updated!');
    }

    public function destroy(ProductCategory $category): RedirectResponse {
        $category->delete();

        return redirect()->route('admin.categories.index')->with('success','Product category successfully deleted!');
    }

    public function category_products(ProductCategory $category) {
        $products = $category->products;

        return view('layouts.admin.product_categories.category_products', compact(['category', 'products']));
    }
}

<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProductRequest;
use App\Models\Product;
use App\Models\ProductCategory;
use App\Models\Shop;
use App\Models\Tax;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;

class ProductController extends Controller
{
    public function index() {
        $products = Product::all();
        return view('layouts.admin.products.products', compact('products'));
    }
    
    public function create() {
        $categories = ProductCategory::all();
        $suppliers = Shop::all();
        $taxes = Tax::all();
        return view('layouts.admin.products.create_product', compact(['taxes', 'categories', 'suppliers']));
    }

    public function show(Product $product) {
        return view('layouts.admin.products.view_product', compact('product'));
    }

    public function store(ProductRequest $product): RedirectResponse {
        $request = json_decode(json_encode($product->validated()));

        Product::create([
            "code" => $request->code,
            "barcode" => $request->barcode,
            "product_name" => $request->product_name,
            "cost" => $request->cost,
            "tax_id" => $request->tax_id,
            "markup" => $request->markup,
            "stock" => $request->stock,
            "unit" => $request->unit,
            "unit_value" => $request->unit_value,
            "product_category_id" => $request->product_category_id,
            "shop_id" => $request->shop_id,
            "expiration_date" => $request->expiration_date,
            "description" => $request->description,
            "fixed_markup" => $request->fixed_markup ?? false,
        ]);

        return Redirect::route('admin.products.index')->with('success','New product successfully added!');
    }

    public function edit(Product $product) {
        $categories = ProductCategory::all();
        $suppliers = Shop::all();
        $taxes = Tax::all();
        return view('layouts.admin.products.edit_product', compact(['taxes', 'categories', 'suppliers', 'product']));
    }

    public function update(ProductRequest $productRequest, Product $product): RedirectResponse {
        $request = json_decode(json_encode($productRequest->validated()));

            $product->code = $request->code;
            $product->barcode = $request->barcode;
            $product->product_name = $request->product_name;
            $product->cost = $request->cost;
            $product->tax_id = $request->tax_id;
            $product->markup = $request->markup;
            $product->stock = $request->stock;
            $product->unit = $request->unit;
            $product->unit_value = $request->unit_value;
            $product->product_category_id = $request->product_category_id;
            $product->shop_id = $request->shop_id;
            $product->expiration_date = $request->expiration_date;
            $product->description = $request->description;
            $product->fixed_markup = (bool)($request->fixed_markup ?? false);
            $product->save();

        return Redirect::route('admin.products.index')->with('success','Product successfully updated!');
    }

    public function destroy(Product $product) {
        $product->delete();

        return Redirect::route('admin.products.index')->with('success','Product successfully removed!');
    }
}

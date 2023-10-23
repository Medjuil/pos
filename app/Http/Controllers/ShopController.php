<?php

namespace App\Http\Controllers;

use App\Http\Requests\SupplierRequest;
use App\Models\Address;
use App\Models\Shop;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;

class ShopController extends Controller
{
    public function index() {
        $suppliers = Shop::all();
        return view('layouts.admin.suppliers.suppliers', compact('suppliers'));
    }

    public function create() {
        return view('layouts.admin.suppliers.create_supplier');
    }

    public function store(SupplierRequest $supplierRequest): RedirectResponse {
        $request = json_decode(json_encode($supplierRequest->validated()));
        $address = Address::create([
            'country' => $request->country ?? null,
            'region' => $request->region ?? null,
            'district' => $request->district ?? null,
            'province_state' => $request->province_state ?? null,
            'municipality_city' => $request->municipality_city ?? null,
            'barangay' => $request->barangay ?? null,
            'street_name' => $request->street_name ?? null,
            'building_no' => $request->building_no ?? null,
            'postal_code' => $request->postal_code ?? null,
            'plot_identification' => $request->plot_identification ?? null,
        ]);

        Shop::create([
            'company_name' => $request->company_name,
            'email' => $request->email,
            'mobile_no' => $request->mobile_no,
            'status' => $request->status ?? 'inactive' ,
            'address_id' => $address->id,
        ]);

        return Redirect::route('admin.suppliers.index')->with('success','New supplier successfully added!');
    }

    public function edit(Shop $supplier) {
        return view('layouts.admin.suppliers.edit_supplier', ['supplier' => $supplier]);
    }

    public function update(SupplierRequest $supplierRequest, Shop $supplier): RedirectResponse {
        $request = json_decode(json_encode($supplierRequest->validated()));
        // updating address
        $address = Address::findOrfail($supplier->address->id);
        $address->country  = $request->country ?? null;
        $address->region  = $request->region ?? null;
        $address->district  = $request->district ?? null;
        $address->province_state  = $request->province_state ?? null;
        $address->municipality_city  = $request->municipality_city ?? null;
        $address->barangay  = $request->barangay ?? null;
        $address->street_name  = $request->street_name ?? null;
        $address->building_no  = $request->building_no ?? null;
        $address->postal_code  = $request->postal_code ?? null;
        $address->plot_identification  = $request->plot_identification ?? null;
        $address->save();

        // update user information
        $supplier->company_name = $request->company_name;
        $supplier->email = $request->email;
        $supplier->mobile_no = $request->mobile_no;
        $supplier->status = $request->status ?? 'inactive';
        $supplier->address_id = $address->id;
        $supplier->save();


        return Redirect::route('admin.suppliers.index')->with('success','Supplier successfully updated!');
    }

    public function destroy(Shop $supplier): RedirectResponse {
        $supplier->delete();

        return Redirect::route('admin.suppliers.index')->with('success','Supplier successfully deleted!');
    }

    public function supplier_products(Shop $supplier) {
        $products = $supplier->products;

        return view('layouts.admin.suppliers.supplier_products', compact(['supplier', 'products']));
    }
}

<?php

namespace App\Http\Controllers;

use App\Http\Requests\CustomerRequest;
use App\Models\Address;
use App\Models\Customer;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;

class CustomerController extends Controller
{
    public function index() {

        $customers = Customer::all();
        return view('layouts.admin.customers.customers', compact('customers'));
    }

    public function create() {
        return view('layouts.admin.customers.create_customer');
    }

    public function store(CustomerRequest $customerRequest): RedirectResponse {
        $request = json_decode(json_encode($customerRequest->validated()));
        
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

        Customer::create([
            'firstname' => $request->firstname,
            'lastname' => $request->lastname,
            'email' => $request->email,
            'mobile_no' => $request->mobile_no,
            'customer_type' => $request->customer_type,
            'loyalty_card_no' => $request->loyalty_card_no ?? null,
            'address_id' => $address->id,
        ]);

        return Redirect::route('admin.customers.index')->with('success','New customer successfully added!');
    }

    public function edit(Customer $customer): View {
        return view('layouts.admin.customers.edit_customer', ['customer' => $customer]);
    }

    public function update(CustomerRequest $customerRequest, Customer $customer) {
        $request = json_decode(json_encode($customerRequest->validated()));
        // updating address
        $address = Address::findOrfail($customer->address->id);
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
        $customer->firstname = $request->firstname;
        $customer->lastname = $request->lastname;
        $customer->email = $request->email;
        $customer->mobile_no = $request->mobile_no;
        $customer->customer_type = $request->customer_type;
        $customer->loyalty_card_no = $request->loyalty_card_no ?? null;
        $customer->address_id = $address->id;
        $customer->save();

        return Redirect::route('admin.customers.index')->with('success','Customer successfully updated!');
    }

    public function destroy(Customer $customer): RedirectResponse {
        $customer->delete();
        return Redirect::route('admin.customers.index')->with('success','Customer successfully deleted!');
    }
}

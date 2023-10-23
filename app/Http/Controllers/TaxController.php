<?php

namespace App\Http\Controllers;

use App\Http\Requests\TaxRequest;
use App\Models\Tax;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;

class TaxController extends Controller
{
    public function index(): View {
        $taxes = Tax::all();
        return view('layouts.admin.taxes.taxes', compact('taxes'));
    }

    public function create(): View {
        return view('layouts.admin.taxes.create_tax');
    }

    public function store(TaxRequest $taxRequest): RedirectResponse {
        $tax = json_decode(json_encode($taxRequest->validated()));
        Tax::create([
            'tax_type' => $tax->tax_type,
            'tax_code' => $tax->tax_code,
            'tax_rate' => $tax->tax_rate,
            'tax_fixed' => (bool)($tax->tax_fixed ?? false),
            'tax_description' => $tax->tax_description,
        ]);

        return redirect::route('admin.taxes.index')->with('success','New Tax successfully added!');
    }

    public function edit(Tax $tax): View {
        return view('layouts.admin.taxes.edit_tax', ['tax' => $tax]);
    }

    public function update(TaxRequest $taxRequest, Tax $tax): RedirectResponse {
        $taxRequestData = json_decode(json_encode($taxRequest->validated()));
        $tax->tax_type = $taxRequestData->tax_type;
        $tax->tax_code = $taxRequestData->tax_code;
        $tax->tax_rate = $taxRequestData->tax_rate;
        $tax->tax_fixed = (bool)($taxRequestData->tax_fixed ?? false);
        $tax->tax_description = $taxRequestData->tax_description;
        $tax->save();
        
        return redirect::route('admin.taxes.index')->with('success','Tax successfully updated!');
    }

    public function destroy(Tax $tax): RedirectResponse {
        $tax->delete();
        return redirect::route('admin.taxes.index')->with('success','Tax successfully removed!');
    }

    public function tax_products(Tax $tax) {
        $products = $tax->products;

        return view('layouts.admin.suppliers.supplier_products', compact(['tax', 'products']));
    }
}

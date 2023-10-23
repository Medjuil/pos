<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProductRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'code' => ['required','min_digits:6','unique:products'],
            'barcode' => ['required','min_digits:11','unique:products'],
            'product_name' => ['required','unique:products'],
            'cost' => ['required'],
            'markup' => ['required'],
            'fixed_markup' => ['nullable'],
            'stock' => ['required'],
            'unit' => ['required'],
            'unit_value' => ['required'],
            'expiration_date' => ['required'],
            'description' => ['required'],
            'shop_id' => ['required'],
            'tax_id' => ['required'],
            'product_category_id' => ['required'],
        ];
    }
}

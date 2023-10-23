<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class SupplierRequest extends FormRequest
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
            'company_name' => ['required', 'unique:shops'],
            'email' => ['required','unique:shops'],
            'mobile_no' => ['required','min_digits:11','max_digits:11','unique:shops'],
            'status' => ['nullable'],
            'country' => ['nullable'],
            'region' => ['nullable'],
            'district' => ['nullable'],
            'province_state' => ['nullable'],
            'municipality_city' => ['nullable'],
            'barangay' => ['required'],
            'street_name' => ['nullable'],
            'building_no' => ['nullable'],
            'postal_code' => ['nullable'],
            'plot_identification' => ['nullable'],
        ];
    }
}

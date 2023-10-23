<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rules\Password;

class CustomerRequest extends FormRequest
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
            'firstname' => ['required'],
            'lastname' => ['required'],
            'email' => ['required','unique:customers'],
            'mobile_no' => ['required','min_digits:11','max_digits:11','unique:customers'],
            'customer_type' => ['required'],
            'loyalty_card_no' => ['required','unique:customers'],
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

    public function messages()
    {
        return [
            'loyalty_card_no.required' => 'The loyalty card number cannot be empty.'
        ];
    }
}

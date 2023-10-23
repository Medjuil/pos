<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rules\Password;

class UserRequest extends FormRequest
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
        if((bool)$this->request->get('admin_personal')) {
            return [
                'firstname' => ['required'],
                'lastname' => ['required'],
                'email' => ['required','unique:users'],
                'mobile_no' => ['required','min_digits:11','max_digits:11','unique:users'],
            ];
        } elseif((bool)$this->request->get('admin_address')) {
            return [
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
        } else {
            return [
                'firstname' => ['required'],
                'lastname' => ['required'],
                'email' => ['required','unique:users'],
                'mobile_no' => ['required','min_digits:11','max_digits:11','unique:users'],
                'password' => ['required','confirmed', Password::min(8)->letters()->mixedCase()->numbers()->symbols()->uncompromised()],
                'role' => ['required'],
                'active' => ['nullable'],
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

    public function messages()
    {
        return [
            'file.required' => 'Opps! Something went wrong in your request. Kindly check your file then try again.'
        ];
    }
}

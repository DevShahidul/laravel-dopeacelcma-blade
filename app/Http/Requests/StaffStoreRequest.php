<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StaffStoreRequest extends FormRequest
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
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array|string>
     */
    public function rules(): array
    {
        return [
            'phone' => ['required', 'string', 'max:60'],
            'country_id' => ['required'],
            'state_id' => ['required'],
            'city_id' => ['required'],
            'zip_code' => ['required', 'max:255'],
            'address' => ['required', 'string', 'max:255'],
            'ngo_id' => ['required'],
            'user_id' => ['required'],
            'designation_id' => ['required'],
            'facebook_url' => ['required'],
            'whatsapp_number' => ['required'],
        ];
    }
}

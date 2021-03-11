<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AddSettingRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'vat' => 'nullable|string|max:255',
            'shipping_charge' => 'nullable|string|max:255',
            'shopname' => 'required|string|max:255',
            'email' => 'required|string|max:255',
            'phone' => 'required|string|max:255',
            'address' => 'required|string|max:255',
            'logo' => 'required_without|mimes:png,jpg,jpeg',
            'twitter' => 'nullable|string|max:255',
            'facebook' => 'nullable|string|max:255',
            'youtube' => 'nullable|string|max:255',

        ];
    }
}

<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AddSeoRequest extends FormRequest
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
            'meta_title' => 'required|string|max:255',
            'meta_author' => 'required|string|max:255',
            'meta_description' => 'required|string|max:255',
            'meta_tag' => 'required|string|max:255',
            'google_analytics' => 'required|string|max:255',
            'bing_analytics' => 'required|string|max:255',
        ];
    }
}

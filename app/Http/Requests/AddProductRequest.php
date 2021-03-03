<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AddProductRequest extends FormRequest
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
            'category_id'=>'required|integer|exists:categories,id',
            'subcategory_id'=>'nullable|integer|exists:sub_categories,id',
            'brand_id'=>'nullable|integer|exists:brands,id',
            'name'=>'required|string|max:255',
            'description'=>'required|string',
            'quantity'=>'required|integer|min:1',
            'price'=>'required|integer',
            'size'=>'nullable|string',
            'color'=>'nullable|string',
            'image_one'=>'required_without:id|image|mimes:png,jpeg,jpg',
            'image_two'=>'nullable|image|mimes:png,jpeg,jpg',
            'image_three'=>'nullable|image|mimes:png,jpeg,jpg',
            'discount'=>'nullable|integer',
            'video_link'=>'nullable|string',
            'status'=>'nullable|integer',
            'main_slider'=>'nullable|integer',
            'hot_deal'=>'nullable|integer',
            'mid_slider'=>'nullable|integer',
            'best_rated'=>'nullable|integer',
            'trend'=>'nullable|integer',
            'on_sale'=>'nullable|integer',
            'get_one'=>'nullable|integer',
        ];
    }
}

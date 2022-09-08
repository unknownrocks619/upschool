<?php

namespace App\Http\Requests\Admin\Ecommerce;

use Illuminate\Foundation\Http\FormRequest;

class StoreBookProductRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
        return auth()->check() ? true : false;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            //
            'product_name' => "required",
            "author" => "required",
            "product_type" => "required",
            "product_price" => "required",
            "short_description" => "required",
            "full_description" => "required",
            "categories" => "required|array",
            "featured_image" => "required|mimes:png,jpg,jpeg,gif",
            "status" => "required"
        ];
    }
}

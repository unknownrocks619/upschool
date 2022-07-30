<?php

namespace App\Http\Requests\Admin\Menu;

use Illuminate\Foundation\Http\FormRequest;

class MenuStoreRequest extends FormRequest
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
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            //
            "menu_name" => "required",
            "slug" => "nullable|unique:menus,slug",
            "menu_description" => "nullable",
            "menu_type" => "required",
            "active_status" => "required|boolean",
            "featured_image" => "nullable",
            "display" => "required|in:public,private,protected",
            "parent_menu" => "nullable|integer",
            "meta_keyword" => "nullable",
            "meta_title" => "nullable",
            "meta_description" => "nullable"
        ];
    }
}

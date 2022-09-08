<?php

namespace App\Http\Requests\Frontend\User;

use Illuminate\Foundation\Http\FormRequest;

class BookUploadStoreStepThreeRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return (auth()->check() && auth()->id() == $this->book->user_id) ? true : false;
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
            "cat_id" => "required|max:5|array"
        ];
    }

    public function messages()
    {
        return [
            "cat_id.required" => "Please select atleast one category",
            "cat_id.max" => "You can select upto 5 category only",
            "cat_id.array" => "Please select atleast one category"
        ];
    }
}

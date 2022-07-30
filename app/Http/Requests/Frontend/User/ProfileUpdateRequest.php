<?php

namespace App\Http\Requests\Frontend\User;

use Illuminate\Foundation\Http\FormRequest;

class ProfileUpdateRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
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
            "first_name" => "required|string",
            "middle_name" => "nullable",
            "last_name" => "required",
            "username" => "required|unique:users,username," . auth()->user()->id,
            "email" => "required|email|unique:users,email," . auth()->user()->id,
            "profile" => "nullable|mimes:png,jpg,gif"
        ];
    }

    public function messages()
    {
        return [
            "first_name.required" => "Provide your first name.",
            "first_name.string" => "Invalid first name.",
            "last_name.required" => "Provide your last name.",
            "username.required" => "Username field is required.",
            "username.unique" => "Username already taken. Try something differnt.",
            "email.required" => "Email is required.",
            "email.email" => "Invalid Email address.",
            "email.unique" => "Email Not Available.",
        ];
    }
}

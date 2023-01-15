<?php

namespace App\Http\Requests\Frontend\User;

use Illuminate\Foundation\Http\FormRequest;

class BookUploadStoreStepTwoRequest extends FormRequest
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
        $rules =  [
            //
            "book_title" => "required",
            "book_description" => "required",
            "canva_book" => "nullable|active_url",
            "project" => "nullable|integer|exists:organisation_projects,id",
            "parent_email" => "nullable|email",
        ];

        // if (!auth()->user()->date_of_birth) {
        //     $rules["date_of_birth"] = "required|date";
        // }

        // if (!auth()->user()->email) {
        //     $rules["email"] = "required|email";
        // }

        return $rules;
    }

    public function messages()
    {
        return [
            "book_title.require" => "Book Title is required",
            "book_description.required" => "Please provide book description",
            "book_description.active_url" => "Provide canva link is not valid or not accessable.",
            "project.required" => "Please select a project.",
            "project.integer"  => "Please select a project.",
            "project.exists" => "Please select a project",
            "date_of_birth.required" => "Please provide your date of birth.",
            "date_of_birth.date" => "Please provide valid date format. YYYY-MM-DD",
            "email.required" => "Please provide your email address.",
            "email.email" => "Invalid email addrss.",
            "canva_book.active_url" => "Please Provide valid canva link",
            "parent_email.email" => "Please provide valid email address."
        ];
    }
}

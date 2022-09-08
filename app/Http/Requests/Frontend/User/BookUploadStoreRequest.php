<?php

namespace App\Http\Requests\Frontend\User;

use Illuminate\Foundation\Http\FormRequest;

class BookUploadStoreRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return (auth()->check()) ? true : false;
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
            "file" => "required|mimes:pdf|file"
        ];
    }

    public function messages()
    {
        return [
            "file.required" => "Please Select file to upload",
            "file.mimes" => "Only PDF is accepted.",
            "file.file" => "Uploaded content must be file."
        ];
    }
}

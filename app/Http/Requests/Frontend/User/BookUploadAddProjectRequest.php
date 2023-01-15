<?php

namespace App\Http\Requests\Frontend\User;

use Illuminate\Foundation\Http\FormRequest;

class BookUploadAddProjectRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return (auth()->check() && $this->book->user_id == auth()->id()) ? true : false;
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
            // 'project' => "required|integer|exists:organisation_projects,id"
        ];
    }

    public function messages()
    {
        return [
            'project.required' => "Please select a project to donate.",
            'project.integer' => "Please select a project to donate.",
            'project.exists' => 'Please select a project to donate.'
        ];
    }
}

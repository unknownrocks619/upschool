<?php

namespace App\Http\Requests\Frontend\Course;

use App\Models\CourseStudent;
use Illuminate\Foundation\Http\FormRequest;

class WatchCourseRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        if (!auth()->check()) return false;
        $enroleed = CourseStudent::where('course_id', $this->course->id)->where('user_id', auth()->id())->exists();

        if (!$enroleed) return false;

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
        ];
    }
}

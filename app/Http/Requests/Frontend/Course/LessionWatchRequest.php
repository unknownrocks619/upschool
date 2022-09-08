<?php

namespace App\Http\Requests\Frontend\Course;

use App\Models\CourseStudent;
use App\Models\Role;
use Illuminate\Foundation\Http\FormRequest;

class LessionWatchRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        if (!auth()->check()) return false;

        if (auth()->user()->role == 1) return true;

        $enroleed = CourseStudent::where('course_id', $this->course->id)->where('user_id', auth()->id())->exists();
        if (!$enroleed) return false;

        // check if user is authorized to access this course.
        $role = auth()->user()->user_role;
        $program_access = $this->course->course_access;

        $allow = true;

        if ($program_access->category == "org" && auth()->user()->role == 2) {
        }

        return $allow;
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

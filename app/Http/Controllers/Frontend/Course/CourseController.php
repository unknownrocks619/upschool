<?php

namespace App\Http\Controllers\Frontend\Course;

use App\Http\Controllers\Controller;
use App\Http\Requests\Frontend\Course\LessionWatchRequest;
use App\Models\Course;
use App\Models\CourseStudent;
use App\Models\Lession;
use App\Models\User;
use Illuminate\Http\Request;

class CourseController extends Controller
{
    //

    public function index()
    {
        $courses = User::where("id", auth()->id())->with(['courses' => fn ($query) => $query->withCount(["chapters"])])->get()->first()->courses;

        return view("frontend.courses.subscribed", compact('courses'));
    }

    public function show(Course $course)
    {
        return view("frontend.pages.courses.detail", compact("course"));
    }

    public function enroll(Course $course)
    {

        // check if user is already enrolled
        $exists = CourseStudent::where('course_id', $course->id)->where('user_id', auth()->id())->exists();
        if ($exists) {
            return redirect()->route('frontend.course.watch', [$course->id]);
        }


        $enrollStudent = new CourseStudent;
        $enrollStudent->course_id  = $course->id;
        $enrollStudent->user_id = auth()->id();
        $enrollStudent->active = true;

        try {
            $enrollStudent->save();
        } catch (\Throwable $th) {
            //throw $th;
            session()->flash("error", "unable to enroll at the moment.");
            return back();
        }

        session()->flash("success", "Congratulation, You are now enrolled in course. " . $course->title);
        return redirect()->route('frontend.course.watch', [$course->id]);
    }

    public function watch(Course $course)
    {
        $course = $course->load(["chapters" => function ($query) {
            return $query->with(["lession"]);
        }]);
        // dd("This featured is disabled by admin.");
        return view('frontend.courses.watch', compact("course"));
    }


    public function lession(LessionWatchRequest $request, Course $course, Lession $lession)
    {
        return view('frontend.courses.partials.video-section', compact("course", "lession"));
    }
}

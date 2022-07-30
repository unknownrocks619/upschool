<?php

namespace App\Http\Controllers\Frontend\Course;

use App\Http\Controllers\Controller;
use App\Models\Course;
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

    public function watch()
    {
        dd("This featured is disabled by admin.");
        return view('frontend.courses.watch');
    }
}

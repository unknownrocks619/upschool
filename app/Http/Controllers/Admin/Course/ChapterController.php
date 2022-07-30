<?php

namespace App\Http\Controllers\Admin\Course;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Course\ChapterStoreRequest;
use App\Http\Requests\Admin\Course\ChapterUpdateRequest;
use App\Models\Chapter;
use App\Models\Course;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\DB;

class ChapterController extends Controller
{
    //
    public function index()
    {
        $courses_list = Course::latest()->get();
        $chapters = Chapter::latest()->withCount(["lession"])->with(["courses"])->get();
        return view('admin.chapters.index', compact("courses_list", 'chapters'));
    }

    public function create()
    {
        return view('admin.chapters.create');
    }

    public function store(ChapterStoreRequest $request)
    {
        $chapter = new Chapter;
        $chapter->chapter_name = $request->chapter_name;
        $chapter->slug = Str::slug($request->chapter_name);
        $chapter->chapter_description = $request->chapter_description;
        $chapter->active =  ($request->status == "y") ? true : false;

        $max_order = Chapter::select('display_order')->max('display_order');
        $chapter->display_order = $max_order + 1;

        try {
            $chapter->save();
            $chapter->courses()->attach($request->course);
        } catch (\Throwable $th) {
            //throw $th;
            session()->flash('error', "Error: " . $th->getMessage());
            return back()->withInput();
        }

        session()->flash("success", "Chapter Created.");
        return back();
    }

    public function edit(Chapter $chapter)
    {
        $courses = Course::latest()->with(["chapters" => fn ($query) => $query->where('chapter_id', '!=', $chapter->id)])->get();
        return view('admin.chapters.edit', compact("chapter", "courses"));
    }

    public function update(ChapterUpdateRequest $request, Chapter $chapter)
    {
        $chapter->chapter_name = $request->chapter_name;
        $chapter->slug = Str::slug($request->chapter_name);
        $chapter->chapter_description = $request->chapter_description;
        $chapter->active =  ($request->status == "y") ? true : false;

        try {
            $chapter->save();

            if ($request->course) {
                $chapter->courses()->attach($request->course);
            }
        } catch (\Throwable $th) {
            session()->flash('error', "Error: " . $th->getMessage());
            return back()->withInput();
        }

        session()->flash('success', "Chapter Updated");
        return back();
    }


    public function destroy(Chapter $chapter)
    {
        try {
            DB::transaction(function () use ($chapter) {
                $chapter->courses->destroy();
                $chapter->delete();
            });
        } catch (\Throwable $th) {
            //throw $th;

            session()->flash('error', "Error: " . $th->getMessage());
            return back();
        }

        session()->flash("success", "Chapter Removed.");
        return back();
    }

    public function destroyCourse(Course $course, Chapter $chapter)
    {
        try {
            $chapter->courses()->detach($course->id);
        } catch (\Throwable $th) {
            session()->flash('error', "Error: " . $th->getMessage());
            return back();
        }

        session()->flash('success', "Course Deattached.");
        return back();
    }
}

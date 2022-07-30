<?php

namespace App\Http\Controllers\Admin\Course;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Course\CoursePermisionUpdateRequest;
use App\Http\Requests\Admin\Course\CourseStoreRequest;
use App\Http\Requests\Admin\Course\CourseUpdateRequest;
use App\Models\Chapter;
use App\Models\Course;
use App\Models\Widget;
use App\Traits\VideoHandler;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Upload\Media\Traits\FileUpload;

class CourseController extends Controller
{
    //
    use FileUpload, VideoHandler;
    public function index()
    {
        $courses = Course::latest()->withCount(["chapters" => fn ($query) => $query->withCount(["lession"])])->get();
        return view("admin.course.index", compact('courses'));
    }

    public function create()
    {
        return view('admin.course.create');
    }

    public function store(CourseStoreRequest $request)
    {
        $course = new Course;
        $course->title = $request->course_title;
        $course->alias_title = Str::slug($request->course_title);
        $course->short_description = $request->short_description;
        $course->full_description = $request->full_description;
        $course->under_development = false;
        $course->banner_text = $request->banner_text;
        $course->pre_requirement = $request->pre_prequirements;
        $course->course_access = ["category" => $request->course_access];
        $course->draft = ($request->course_active == "draft") ? true : false;
        $course->active = (!$course->course_active == "active") ? true : false;
        $course->created_by = auth()->id();
        $course->course_level = $request->course_level;
        $course->category_id = ($request->category) ? $request->category : null;
        try {
            $course->save();
        } catch (\Throwable $th) {
            //throw $th;
            session()->flash('error', "Error: " . $th->getMessage());
            return back()->withInput();
        }

        session()->flash("success", "New Course Created.");
        return redirect()->route('admin.course.course.index');
    }

    public function show(Course $course)
    {
    }

    public function edit(Course $course)
    {
    }

    public function update(CourseUpdateRequest $request, Course $course)
    {
    }


    public function permission(Course $course)
    {
        // $orgs = 
        return view('admin.course.manage.permission', compact('course'));
    }

    public function updatePermission(CoursePermisionUpdateRequest $request, Course $course)
    {
        $course_access = ["category" => $request->permission];

        if ($request->permission == "org") {
            $innerArray = [];
            $course_access["allowed_orgs"] = ($request->orgs) ? $request->orgs : null;
            $course_access["allowed_groups"] = ($request->groups) ? $request->groups : null;
        }
        $course->course_access = $course_access;

        try {
            $course->save();
        } catch (\Throwable $th) {
            //throw $th;
            session()->flash('error', "Error: ", $th->getMessage());
            return back();
        }

        session()->flash('success', "Permission Updated.");
        return back();
    }


    public function removePermission(Request $request, Course $course)
    {
        $request->validate([
            "type" => "required|in:group,org",
            "code" => "required"
        ]);

        $current_permission = $course->course_access;

        $update = ($request->type == "group") ? "allowed_groups" : "allowed_orgs";
        $search = (gettype($current_permission->$update) == "object") ? (array) $current_permission->$update  : $current_permission->$update;
        if (($key = array_search($request->code, $search)) !== false) {
            if (gettype($current_permission->$update) == "object") {
                unset($current_permission->$update->$key);
            } else {
                unset($current_permission->$update[$key]);
            }
        }
        $current_permission->$update = ((array)$current_permission->$update) ? $current_permission->$update : null;
        // dd((array) $current_permission->$update);
        $course->course_access = $current_permission;

        try {
            $course->save();
        } catch (\Throwable $th) {
            //throw $th;
            session()->flash('error', "Error: " . $th->getMessage());
            return back();
        }

        session()->flash('success', "Permision Updated.");
        return back();
    }

    /**
     * Resource
     */

    public function resource(Course $course)
    {
        return view('admin.course.manage.resources', compact('course'));
    }

    public function updateResource(Request $request, Course $course)
    {
        $this->set_access("file");
        $this->set_upload_path("website/course/resources");
        if ($request->resource_type == "image") {
            $resource_category = $request->resource_category;
            $current_images = (array) $course->images;

            if (array_key_exists($resource_category, $current_images)) {
                $current_images[$resource_category] = ["image" => $this->upload("image"), "title" => $request->caption, "content" => $request->image_description];
            } else {
                $current_images[$resource_category] = ["image" => $this->upload("image"), "title" => $request->caption, "content" => $request->image_description];
                // $current_images[] = [$resource_category => ["image" => $this->upload("image"), "title" => $request->caption, "content" => $request->image_description]];
            }
            $course->images = $current_images;
        }

        if ($request->resource_type == "video") {
            $source = (Str::contains($request->video_url, "youtube", true)) ? "youtube" : "vimeo";
            $this->set_source($source);
            // dd($source);
            $resource_category = $request->resource_category_video;

            $current_videos = (array) $course->videos;

            if (array_key_exists($resource_category, $current_videos)) {
                $current_videos[$resource_category] = ["video" => $this->video_parts($request->video_url), "title" => $request->resource_title, "content" => $request->description];
            } else {
                $current_videos[$resource_category] = ["video" => $this->video_parts($request->video_url), "title" => $request->resource_title, "content" => $request->description];
                // $current_images[] = [$resource_category => ["image" => $this->upload("image"), "title" => $request->caption, "content" => $request->image_description]];
            }
            $course->videos = $current_videos;
        }


        if ($request->resource_type == "file") {
            $resource_category = $request->resource_category;
            $file_resource = (array) $course->file_resource;

            if (array_key_exists($resource_category, $file_resource)) {
                $file_resource[$resource_category] = ["image" => $this->upload("download_file"), "title" => $request->download_file_title];
            } else {
                $file_resource[$resource_category] = ["image" => $this->upload("download_file"), "title" => $request->download_file_title];
                // $file_resource[] = [$resource_category => ["image" => $this->upload("image"), "title" => $request->caption, "content" => $request->image_description]];
            }
            $course->file_resource = $file_resource;
        }

        try {
            $course->save();
        } catch (\Throwable $th) {
            //throw $th;
            session()->flash("error", "Error: " . $th->getMessage());
            return back()->withInput();
        }
        session()->flash('success', "Resources added.");
        return back();
    }

    public function removeResource(Course $course)
    {
    }

    public function widget(Course $course)
    {
        $widgets = Widget::get();
        return view('admin.course.manage.widgets', compact('widgets', 'course'));
    }

    public function storeWidget(Request $request, Course $course)
    {
        $request->validate(["widget" => "required"]);
        if (!$course->widget()->count()) {
            $pivot["sort_by"] = 1;
        } else {
            $pivot["sort_by"] = $course->widget()->max("sort_by") + 1;
        }
        $course->widget()->attach($request->widget, $pivot);
        return response()->json("Widget Added");
    }

    public function removeWidget(Course $course, Widget $widget)
    {
        try {
            $course->widget()->detach($widget->id);
        } catch (\Throwable $th) {
            //throw $th;
            session()->flash("error", "Error: " . $th->getMessage());
            return back();
        }

        session()->flash('success', "Widget Removed.");
        return back();
    }

    /**
     * Chapters
     */

    public function chapters(Course $course)
    {
        $chapters = $course->chapters()->withCount(["lession"])->get();
        $all_chapters  = Chapter::whereNotIn('id', $chapters->pluck("id")->toArray())->get();
        return view('admin.course.manage.chapters', compact("course", "chapters", "all_chapters"));
    }

    public function storeChapter(Request $request, Course $course)
    {
        try {
            $course->chapters()->attach($request->chapter);
        } catch (\Throwable $th) {
            //throw $th;
            session()->flash("error", "Error: " . $th->getMessage());
            return back();
        }

        session()->flash('success', "Chapter Added.");
        return back();
    }

    public function removeChapter(Course $course, Chapter $chapter)
    {
        try {
            $course->chapters()->detach($chapter->id);
        } catch (\Throwable $th) {
            //throw $th;
            session()->flash("error", "Error: " . $th->getMessage());
            return back();
        }

        session()->flash('success', "Chapter removed.");
        return back();
    }
}

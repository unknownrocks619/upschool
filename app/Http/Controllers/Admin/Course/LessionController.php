<?php

namespace App\Http\Controllers\Admin\Course;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Course\LessionStoreRequest;
use App\Http\Requests\Admin\Course\LessionUpdateRequest;
use App\Models\Chapter;
use App\Models\Lession;
use App\Models\Resource;
use App\Models\Widget;
use App\Traits\VideoHandler;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Upload\Media\Traits\FileUpload;

class LessionController extends Controller
{

    use FileUpload, VideoHandler;

    //
    use VideoHandler;
    public function index(Chapter $chapter)
    {
        $lessions = Lession::where('chapter_id', $chapter->id)->with(["widget", "resources"])->get();
        return view('admin.lessions.index', compact("chapter", "lessions"));
    }

    public function create(Chapter $chapter)
    {
        return view('admin.lessions.add', compact('chapter'));
    }

    public function store(LessionStoreRequest $request, Chapter $chapter)
    {
        $lession = new Lession;
        $lession->chapter_id = $chapter->id;
        $lession->lession_name = $request->lession_name;
        $lession->slug = Str::slug($request->lession_name);
        $lession->intro_text = $request->intro_text;
        $lession->lession_description = $request->full_description;
        $lession->video_duration = $request->video_duration;

        // check if existing records is there.
        $total_lession = Lession::where('chapter_id', $chapter->id)->count();
        if (!$total_lession) {
            $order = 1;
        } elseif ($total_lession == 1) {
            $order = 2;
        } else {
            $max_order = Lession::where('chapter_id', $chapter->id)->max('sort');
            $order = $max_order + 1;
        }

        $lession->sort = $order;

        $this->set_source((Str::contains($request->video_url, "youtube", true)) ? "youtube" : "vimeo");
        $lession->video = $this->video_parts($request->video_url);

        try {
            $lession->save();
        } catch (\Throwable $th) {
            session()->flash('error', "Error: " . $th->getMessage());
            return back()->withInput();
        }
        session()->flash('success', "Lession added.");
        return redirect()->route('admin.lession.chapter.lession.index', [$chapter->id]);
    }

    public function edit(Chapter $chapter, Lession $lession)
    {
        return view("admin.lessions.edit", compact("chapter", "lession"));
    }

    public function update(LessionUpdateRequest $request, Chapter $chapter, Lession $lession)
    {
        $lession->chapter_id = $chapter->id;
        $lession->lession_name = $request->lession_name;
        $lession->slug = Str::slug($request->lession_name);
        $lession->intro_text = $request->intro_text;
        $lession->lession_description = $request->full_description;
        $lession->video_duration = $request->video_duration;

        $this->set_source((Str::contains($request->video_url, "youtube", true)) ? "youtube" : "vimeo");
        $lession->video = $this->video_parts($request->video_url);


        try {
            $lession->save();
        } catch (\Throwable $th) {
            //throw $th;
            session()->flash("error", "Error: " . $th->getMessage());
            return back()->withInput();
        }

        session()->flash('success', "Lession updated");
        return redirect()->route('admin.lession.chapter.lession.index', $chapter->id);
    }

    public function destroy(Chapter $chapter, Lession $lession)
    {
        try {
            $lession->delete();
            $lession->resources()->delete();
            $lession->widget()->detach();
        } catch (\Throwable $th) {
            //throw $th;
            session()->flash('error', "Error: " . $th->getMessage());
            return back();
        }

        session()->flash('success', "Lession removed.");
        return back();
    }

    public function addWidget(Lession $lession)
    {
        $widgets = Widget::get();
        return view('admin.lessions.widget.add', compact('lession', 'widgets'));
    }

    public function storeWidget(Request $request, Lession $lession)
    {
        $request->validate(["widget" => "required"]);
        if (!$lession->widget()->count()) {
            $pivot["sort_by"] = 1;
        } else {
            $pivot["sort_by"] = $lession->widget()->max("sort_by") + 1;
        }
        $lession->widget()->attach($request->widget, $pivot);
        return response()->json("Widget Added");
    }

    public function removeWidget(Lession $lession, Widget $widget)
    {
        try {
            $lession->widget()->detach($widget->id);
        } catch (\Throwable $th) {
            //throw $th;
            session()->flash('error', "Error: " . $th->getMessage());
            return back();
        }

        session()->flash('success', "Widget Removed.");
        return back();
    }

    public function storeResource(Request $request)
    {
        // dd($request->all());
        $resource = new Resource;
        $resource->source = "lession";
        $resource->source_id = $request->lession_name;
        $resource->location = $request->resource_location;
        $resource->type = $request->resource_type;
        $downloadable_content = [
            "title" => $request->title,
            "description" => $request->description
        ];

        /**
         * For File type
         */
        if ($request->resource_type == "file") {
            $downloadable_content["label"] = $request->file_label;
            $downloadable_content["type"] = $request->file_type;
            $downloadable_content["external_link"] = $request->external_link;
            if ($request->file_type == "upload" && $request->hasFile('upload_file')) {
                $this->set_access("file");
                $this->set_upload_path("website/lms/resources");
                $downloadable_content["file"] = $this->upload("upload_file");
            }
            $resource->downloadable_content = $downloadable_content;
        }

        /**
         * For Image Type
         */
        elseif ($request->resource_type == "image") {
            $this->set_access("file");
            $this->set_upload_path("website/lms/resources");
            $downloadable_content["image"] = $this->upload("upload_image");

            $resource->image = $downloadable_content;
        }
        /**
         * For Video Type
         */
        elseif ($request->resource_type == "video") {
            $this->set_source(Str::contains($request->video_url, "vimeo", true) ? "vimeo" : "youtube");
            $downloadable_content["video"] = $this->video_parts($request->video_url);
            $resource->video = $downloadable_content;
        }
        /**
         * For Link Type
         */
        elseif ($request->resource_type == "link") {
            $downloadable_content["label"] = $request->link_label;
            $downloadable_content["url"] = $request->link_url;
            $resource->links = $downloadable_content;
        }

        try {
            $resource->save();
        } catch (\Throwable $th) {
            //throw $th;
            session()->flash("error", "Error: " . $th->getMessage());
            return back();
        }

        session()->flash("success", "Resource Saved.");
        return back();
    }

    public function viewResource(Lession $lession)
    {
        $resources = Resource::where('source', 'lession')->where('source_id', $lession->id)->get();
        return view("admin.lessions.widget.manage-resource", compact("lession", "resources"));
    }

    public function removeResource(Lession $lession, Resource $resource)
    {
        try {
            $resource->delete();
        } catch (\Throwable $th) {
            //throw $th;
            dd($th->getMessage());
            session()->flash('error', "Error: " . $th->getMessage());
            return back();
        }
        session()->flash('success', "Resource Removed.");
        return back();
    }
}

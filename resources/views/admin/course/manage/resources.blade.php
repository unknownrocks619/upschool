@extends("themes.admin.master")

@section("title")
:: {{ $course->title }} :: Resources
@endsection

@push("plugin_css")
<link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
@endpush
@section("content")
<x-layout heading="`{{ $course->title }}` Resource Management">
    <div class="col-xl-10 main-content ps-xl-4 pe-xl-5">
        <div class="card">
            <div class="card-header bg-success text-white">
                <h4>Add Resource</h4>
            </div>
            <form enctype="multipart/form-data" action="{{ route('admin.course.resource.update',$course->id) }}" method="post">
                @method("PATCH")
                @csrf
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="resource_type" class="label-control">
                                    Resource Type
                                    <sup class="text-danger">*</sup>
                                </label>
                                <select name="resource_type" id="resource_type" class="form-control">
                                    <option value="">Select Resource Type</option>
                                    <option value="image">Image</option>
                                    <option value="video">Video</option>
                                    <option value="file">File</option>
                                </select>
                            </div>
                        </div>
                        <!-- <div class="col-md-6">
                            <div class="form-group">
                                <label for="resource_position" class="label-control">
                                    Resource Poisition
                                    <sup class="text-danger">*</sup>
                                </label>
                                <select name="resource_position" id="resource_position" class="form-control">
                                    <option value="top">Before Lession</option>
                                    <option value="bottom">After Lession</option>
                                    <option value="last">Last</option>
                                </select>
                            </div>
                        </div> -->
                        <div class="row mt-3" id="media_image" style="display:none">
                            <div class="col-md-8 mb-2">
                                <div class="form-group">
                                    <label for="image_type" class="image_type">
                                        Image Type
                                    </label>
                                    <select class="form-control" name="resource_category" id="resource_category" tabindex="-98">
                                        <option value="banner_background">Wallpaper</option>
                                        <option value="banner_featured_image">Banner Image</option>
                                        <option value="intro_image">Intro Image</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-6 mb-3">
                                <div class="form-group">
                                    <label for="caption" class="label-control">Image Caption
                                        <sup class="text-danger">*</sup>
                                    </label>
                                    <input type="text" name="caption" id="caption" class="form-control" />
                                </div>
                            </div>
                            <div class="col-md-6 mb-3">
                                <div class="form-group">
                                    <label for="image" class="label-control">Upload Image
                                        <sup class="text-danger">*</sup>
                                    </label>
                                    <input type="file" name="image" id="image" class="form-control" />
                                </div>
                            </div>
                            <div class="col-md-12 mb-3">
                                <div class="form-group">
                                    <label for="description" class="label-control">
                                        Content
                                    </label>
                                    <textarea name="image_description" id="description" class="form-control"></textarea>
                                </div>
                            </div>
                        </div>
                        <div class="row mt-3" id="media_video" style="display:none">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="resource_category_video" class="label-control">Select Resource Category</label>
                                    <select class="form-control" name="resource_category_video" id="resource_category_video" tabindex="-98">
                                        <option value="video_intro">Intro Video</option>
                                        <option value="featured_video">Featured Video</option>
                                        <option value="resource">Resource</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="resource_title" class="label-control">
                                        Resource Title
                                    </label>
                                    <input type="text" name="resource_title" id="resource_titl" class="form-control" />
                                </div>
                            </div>
                            <div class="col-md-6 mt-3">
                                <div class="form-group">
                                    <label for="video_url" class="label-control">Video Url
                                        <sup class="text-danger">*</sup>
                                    </label>
                                    <input type="url" name="video_url" class="form-control" id="video_url" />
                                </div>
                            </div>
                            <div class="col-md-12 mt-3">
                                <div class="form-group">
                                    <label for="descritpion" class="label-control">Description</label>
                                    <textarea name="description" id="video_description" class="form-control"></textarea>
                                </div>
                            </div>
                        </div>
                        <div class="row mt-3" id="media_file" style="display:none">
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="downloadfile" class="label-control">
                                            Title
                                        </label>
                                        <input type="text" name="download_file_title" id="downloadFileTitle" class="form-control" />
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="upload_file" class="label-control">
                                            Select File
                                        </label>
                                        <input type="file" name="download_file" id="download_file" class="form-control">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row mt-3">
                        <div class="col-md-6">
                            <button type="submit" class="btn btn-primary w-100">
                                Save Resource
                            </button>
                        </div>
                    </div>
                </div>
            </form>
        </div>
        <div class="card mt-3">
            <div class="card-header bg-secondary text-white">
                <h4>Available Resources</h4>
            </div>
            <div class="card-body">
                <table class="table table-hover table-boredered">
                    <thead>
                        <tr>
                            <th>
                                S.No
                            </th>
                            <th>
                                Resource Type
                            </th>
                            <th>
                                Category
                            </th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>
                                1
                            </td>
                            <td>
                                Image
                            </td>
                            <td>
                                {{ ($course->images && isset($course->images->banner_background)) ? "Banner Background" : "Not Defined" }}
                            </td>
                        </tr>
                        <tr>
                            <td>
                                2
                            </td>
                            <td>
                                Image
                            </td>
                            <td>
                                {{ ($course->images && isset($course->images->banner_featured_image)) ? "Banner Image" : "Not Defined" }}
                            </td>
                        </tr>
                        <tr>
                            <td>
                                3
                            </td>
                            <td>
                                Image
                            </td>
                            <td>
                                {{ ($course->images && isset($course->images->intro_image)) ? "Course Intro Image" : "Not Defined" }}
                            </td>
                        </tr>
                        <tr>
                            <td>
                                4
                            </td>
                            <td>
                                Video
                            </td>
                            <td>
                                {{ ($course->videos && isset($course->videos->video_intro)) ? "Course Video Intro" : "Not Defined" }}
                            </td>
                        </tr>
                        <tr>
                            <td>
                                5
                            </td>
                            <td>
                                Video
                            </td>
                            <td>
                                {{ ($course->videos && $course->videos->featured_video) ? "Course Featured Video" : "Not Defined" }}
                            </td>
                        </tr>

                    </tbody>
                </table>
            </div>
        </div>
    </div>
    @include("admin.course.manage.nav",compact("course"))
</x-layout>
@endsection

@push("custom_script")
<script>
    $("#resource_type").change(function() {
        display($(this).val())
    })

    function display(value) {
        $media = $("#media_image");
        $video = $("#media_video");
        $file = $("#media_file");

        if (!value || value == "") {
            $media.fadeOut("fast");
            $video.fadeOut("fast");
            $file.fadeOut('fast');

        }

        if (value == "image") {
            $media.fadeIn("medium");
            $video.fadeOut("fast");
            $file.fadeOut('fast');
        }

        if (value == "video") {
            $media.fadeOut("fast");
            $video.fadeIn("medium");
            $file.fadeOut('fast');

        }
        if (value == "file") {
            $media.fadeOut("fast");
            $video.fadeOut("fast");
            $file.fadeIn('medium');

        }

    }
</script>
@endpush
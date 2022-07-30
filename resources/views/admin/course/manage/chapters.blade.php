@extends("themes.admin.master")

@section("title")
:: {{ $course->title }} :: Permission
@endsection

@push("plugin_css")
<link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
@endpush
@section("content")
<x-layout heading="`{{ $course->title }}` Permission Management">
    <div class="col-xl-10 main-content ps-xl-4 pe-xl-5">
        <a href="{{ route('admin.course.course.index') }}" class="btn btn-primary my-4 ">
            <x-arrow-left>
                Back to Courses
            </x-arrow-left>
        </a>
        <div class="card">
            <div class="card-header bg-success text-white">
                <h4>Attach New Chapter</h4>
            </div>
            <form action="{{ route('admin.course.chapters.create',$course->id) }}" method="post">
                @csrf

                <div class="card-body">
                    <div class="row">
                        <div class="col-md-8">
                            <div class="form-group">
                                <label for="chapter" class="label-control">Chapters
                                </label>
                                <select multiple name="chapter[]" id="chapter" class="form-control">
                                    @foreach ($all_chapters as $chapter)
                                    <option value='{{ $chapter->id }}'>
                                        {{ $chapter->chapter_name }}
                                    </option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card-footer">
                    <button type="submit" class="btn btn-primary"> Add Chapters </button>
                </div>
            </form>
        </div>
        <div class="card mt-3">
            <div class="card-header bg-secondary text-white">
                <h4>Current Chapters</h4>
            </div>
            <div class="card-body">
                <table class="table table-bordered table-hover">
                    <thead>
                        <tr>
                            <th>Chapter Name</th>
                            <th>
                                Total Lession
                            </th>
                            <th>

                            </th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($chapters as $chapter)
                        <tr>
                            <td>
                                {{ $chapter->chapter_name }}
                            </td>
                            <td>
                                {{ $chapter->lession_count }}
                            </td>
                            <td>
                                <form action="{{ route('admin.course.chapters.delete',[$course->id,$chapter->id]) }}" method="post">
                                    @csrf
                                    @method("DELETE")
                                    <button type="submit" class="btn btn-outline-danger">
                                        <x-trash>
                                            Delete
                                        </x-trash>
                                    </button>
                                </form>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    @include("admin.course.manage.nav",compact("course"))
</x-layout>
@endsection

@push("custom_script")
<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
<script>
    $(function() {
        'use strict'

        if ($("#chapter").length) {
            $("#chapter").select2({
                'class': "form-control",
                "width": "100%"
            });
        }
    })
</script>
@endpush
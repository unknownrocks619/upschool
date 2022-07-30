@extends("themes.admin.master")

@section("title")
::Courses
@endsection

@section("content")
<x-layout>
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-body">
                    <div class="row mb-3">
                        <div class="col-md-6">
                            <a class="btn btn-primary" href="{{ route('admin.course.course.create') }}">
                                <x-plus>Add New Course</x-plus>
                            </a>
                        </div>
                    </div>
                    <table class="table table-hover table-bordered">
                        <thead>
                            <tr>
                                <th>Course Title</th>
                                <th>Permission</th>
                                <th>Status</th>
                                <th>Total Enrolled</th>
                                <th></th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($courses as $course)
                            <tr>
                                <td>
                                    {{ $loop->iteration }}
                                </td>
                                <td>
                                    {{ $course->title }}
                                    <br />
                                    <span class="text-muted">
                                        {{ $course->chapters_count }} Chapters
                                    </span>
                                </td>
                                <td>
                                    <span class="border @if($course->active) border-success text-success @else border-danger text-danger @endif px-3">
                                        {{ ($course->active) ? "Active" :( ($course->draft) ? "Draft" : "Inactive") }}
                                    </span>
                                </td>
                                <td>

                                </td>
                                <td>
                                    <a href="{{ route('admin.course.permission',$course->id) }}" class="btn btn-outline-primary btn-sm">Detail</a>
                                    <a href="{{ route('admin.course.course.edit',$course->id) }}" class="btn btn-outline-primary btn-sm">
                                        <x-pencil>Edit</x-pencil>
                                    </a>
                                    <form action="{{ route('admin.course.course.destroy',$course->id) }}" method="post" class="d-inline">
                                        @csrf
                                        @method('delete')
                                        <button type="submit" class="btn btn-outline-danger btn-sm">
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
    </div>
</x-layout>
@endsection
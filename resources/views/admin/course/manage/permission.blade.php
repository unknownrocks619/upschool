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
                <h4>Current Permission</h4>
            </div>
            <div class="card-body">
                <p>
                    <strong>Access : </strong>
                    {{ __("permission.".$course->course_access->category) }}

                </p>

                @if($course->course_access->category == 'org' )
                <p>
                    Allowed Organisation / Institute:
                    <?php
                    if ($course->course_access->allowed_orgs) {
                        $orgs = \App\Models\Organisation::whereIn("id", $course->course_access->allowed_orgs)->get();
                        foreach ($orgs as $org) {
                            echo "<span class='mx-3'>";
                            echo "<span class='btn btn-outline-primary position-relative' style='border-right:none;border-top-right-radius:0%;border-bottom-right-radius: 0%'>";
                            echo $org->org_name;
                            echo "</span>";
                            echo "<a href='' class='btn btn-danger mr-3' style='border-top-left-radius:0%; border-bottom-left-radius: 0%'>";
                            echo '
                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-trash-2">
                                    <polyline points="3 6 5 6 21 6"></polyline>
                                    <path d="M19 6v14a2 2 0 0 1-2 2H7a2 2 0 0 1-2-2V6m3 0V4a2 2 0 0 1 2-2h4a2 2 0 0 1 2 2v2"></path>
                                    <line x1="10" y1="11" x2="10" y2="17"></line>
                                    <line x1="14" y1="11" x2="14" y2="17"></line>
                                </svg>';
                            echo "</a>";
                            echo "</span>";
                        }
                    } else {
                        echo "<span class='btn btn-sm btn-outline-info px-3'> Allowed All Groups </span>";
                    }

                    ?>
                </p>
                <br />
                Allowed Group:
                <?php
                if ($course->course_access->allowed_groups) {
                    foreach ($course->course_access->allowed_groups as $groups) {
                        echo "<span class='mx-3'>";
                        echo "<span class='btn btn-outline-primary position-relative' style='border-right:none;border-top-right-radius:0%;border-bottom-right-radius: 0%'>";
                        echo trans("permission." . $groups);
                        echo "</span>";
                        echo "<form method='post' action='" . route('admin.course.permission.delete', [$course->id]) . "' style='display:inline'>";
                        echo "<input type='hidden' name='_method' value='DELETE' />";
                        echo "<input type='hidden' name='type' value='group' />";
                        echo "<input type='hidden' name='_token' value='" . csrf_token() . "' />";
                        echo "<input type='hidden' name='code' value='{$groups}' />";
                        echo "<button type='submit' class='btn btn-danger mr-3 remove_group' style='border-top-left-radius:0%; border-bottom-left-radius: 0%'>";
                        echo '
                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-trash-2">
                                    <polyline points="3 6 5 6 21 6"></polyline>
                                    <path d="M19 6v14a2 2 0 0 1-2 2H7a2 2 0 0 1-2-2V6m3 0V4a2 2 0 0 1 2-2h4a2 2 0 0 1 2 2v2"></path>
                                    <line x1="10" y1="11" x2="10" y2="17"></line>
                                    <line x1="14" y1="11" x2="14" y2="17"></line>
                                </svg>';
                        echo "</button>";
                        echo "</form>";
                        echo "</span>";
                    }
                } else {
                    echo "<span class='btn btn-sm btn-outline-info px-3'> Allowed All Groups </span>";
                }

                ?>
                @endif

                <!-- {"category":"org","orgs":null,"allowed_groups":null}
                {"category":"org","orgs":["1","3"],"allowed_groups":null}
                {"category":"org","orgs":["1","3"],"allowed_groups":["major_student","school_teacher"]} -->
            </div>
        </div>
        <div class="card mt-3">
            <div class="card-header bg-secondary text-white">
                <h4>Change Permission</h4>
            </div>

            <form action="{{ route('admin.course.permission.update',$course->id) }}" method="post">
                @method("PATCH")
                @csrf
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="permission" class="label-control">
                                    Course Access
                                    <sup class="text-danger">*</sup>
                                </label>
                                <select name="permission" id="permission" class="form-control ">
                                    <option value="free">Free</option>
                                    <option value="paid">Paid</option>
                                    <option value="other">Other</option>
                                    <option value="student_above">Student Above 18</option>
                                    <option value="student_below">Student Below 18</option>
                                    <option value="parent_of_student">Parent of Student</option>
                                    <option value="teacher">Teacher</option>
                                    <option value="org">Organisation / Intution</option>
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="row mt-4 bg-light py-3" id="permission_table" style="display:none">
                        <div class="col-md-12 mb-3">
                            You can select multiple items to implement permission
                        </div>
                        <div class="col-md-8">
                            <div class="form-grup">
                                <label for="org_list" class="label-control mb-1">Select Organisations / Intitute
                                </label>
                                <select name="orgs[]" id="orgs" class="form-control">
                                    <?php
                                    ?>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-8 mt-4 pt-4">
                            <div class="form-grup">
                                <label for="groups" class="label-control mb-1">Select Group / Role
                                </label>
                                <select name="groups[]" multiple id="groups" class="form-control multiple-roles">
                                    <option value="student_above">Student Above 18</option>
                                    <option value="student_below">Student Below 18</option>
                                    <option value="teacher">Teacher</option>
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="row mt-3">
                        <div class="col-md-8">
                            <button type="submit" class="btn btn-primary btn-block w-100">
                                Update Permission
                            </button>
                        </div>
                    </div>
                </div>
            </form>
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

        if ($(".multiple-roles").length) {
            $(".multiple-roles").select2({
                'class': "form-control",
                "width": "100%"
            });
        }

        $("#permission").change(function() {

            if ($(this).val() == "org") {
                $("#permission_table").fadeIn('medium');
            } else {
                $("#permission_table").fadeOut('fast');
            }
        })
    });
</script>
@endpush
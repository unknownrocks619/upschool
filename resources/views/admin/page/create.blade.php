@extends("themes.admin.master")

@section("title")
New Page
@endsection

@section("content")
<x-layout heading="New Page">
    <form action="{{ route('admin.page.page.store') }}" enctype="multipart/form-data" method="post">
        @csrf
        <div class="card">
            <div class="card-body">
                <div class="row mb-3">
                    <div class="col-md-12">
                        <a class="btn btn-secondary" href="{{ route('admin.page.page.index') }}">
                            <x-arrow-left>Go Back</x-arrow-left>
                        </a>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-8">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label class="label-control">
                                        Title
                                        <sup class="text-danger">*</sup>
                                    </label>
                                    <input type="text" name="page_name" id="page_name" class="form-control" />
                                </div>
                            </div>
                            <div class="col-md-12 mt-3">
                                <div class="form-group">
                                    <label class="label-control">
                                        Page Description
                                    </label>
                                    <textarea class="form-control" name="page_description" id="page_description"></textarea>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label class="label-control">
                                        Page Type
                                    </label>
                                    <select name="page_type" id="page_type" class="form-control">
                                        <option value="terms">Terms & Condition</option>
                                        <option value="standard">Standard</option>
                                        <option value="gallery">Gallery</option>
                                        <option value="about-us">About Us</option>
                                        <option value="contact-us">Contact Us</option>
                                        <option value="team">Team</option>
                                        <option value="project-single">Project Single</option>
                                        <option value="course">Course</option>
                                        <option value="video">Video</option>
                                        <option value="home">Home</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-12 mt-3">
                                <div class="form-group">
                                    <label class="label-control">
                                        Display Option
                                    </label>
                                    <select name="display_option" id="display_option" class="form-control">
                                        <option value="public">Public</option>
                                        <option value="admin">Admin</option>
                                        <option value="parent">Parent</option>
                                        <option value="auth">Autheticated</option>
                                        <option value="student">Student</option>
                                        <option value="org">Organisation</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-12 mt-3">
                                <div class="form-group">
                                    <label class="label-control">
                                        Featured Image
                                    </label>
                                    <input type="file" name="featured_image" id="featured_image" class="form-control">
                                </div>
                            </div>
                            <div class="col-md-12 mt-3">
                                <div class="form-group">
                                    <label class="label-control">
                                        Banner Image
                                    </label>
                                    <input type="file" name="banner_image" id="featured_image" class="form-control">
                                </div>
                            </div>
                            <div class="col-md-12 mt-2">
                                <div class="form-group">
                                    <strong>
                                        Widgets
                                    </strong>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6">
                        <button type="submit" class="btn btn-primary">
                            Create Page
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </form>
</x-layout>
@endsection
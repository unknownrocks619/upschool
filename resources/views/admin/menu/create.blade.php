@extends("themes.admin.master")

@section("title")
::Menu::New Menu
@endsection

@section("content")
<x-layout heading="Create New Menu">
    <form action="{{ route('admin.menu.menu.store') }}" method="post">
        @csrf
        <div class="card">
            <div class="card-body">
                <a href="{{ route('admin.menu.menu.index') }}" class="btn btn-secondary mb-3">
                    <x-arrow-left>
                        Go Back
                    </x-arrow-left>
                </a>
                <div class="row">
                    <div class="col-md-8">
                        <div class="row">
                            <div class="col-md-8">
                                <div class="form-group">
                                    <strong>
                                        Menu Name
                                        <sup class="text-danger">*</sup>
                                    </strong>
                                    <input value="{{ old('menu_name') }}" type="text" name="menu_name" id="menu_name" style="border-radius:0px;" class="form-control">
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <strong>
                                        Slug
                                        <sup class="text-danger">*</sup>
                                    </strong>
                                    <input type="text" name="slug" id="slug" placeholder="[Auto-Generate]" class="form-control">
                                </div>
                            </div>
                        </div>
                        <div class="row mt-2">
                            <div class="col-md-12">
                                <strong>Describe Menu
                                    <sup class="text-danger">*</sup>
                                </strong>
                                <textarea name="menu_description" id="menu_description" class="form-control">{{ old('menu_description') }}</textarea>
                            </div>
                        </div>
                        <div class="row mt-2">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <strong>
                                        Menu Type
                                        <sup class="text-danger">
                                            *
                                        </sup>
                                    </strong>
                                    <select name="menu_type" id="menu_type" class="form-control">
                                        <option value="home" @if(old('menu_type')=="home" ) selected @endif>Home page</option>
                                        <option value="gallery" @if(old('menu_type')=="gallery" ) selected @endif>Gallery</option>
                                        <option value="about" @if(old('menu_type')=="about" ) selected @endif>About Us</option>
                                        <option value="contact" @if(old('menu_type')=="contact" ) selected @endif>Contact Us</option>
                                        <option value="course" @if(old('menu_type')=="course" ) selected @endif>Course</option>
                                        <option value="course-list" @if(old('menu_type')=="course-list" ) selected @endif>Course List</option>
                                        <option value="page" @if(old('menu_type')=="page" ) selected @endif>Page</option>
                                        <option value="post" @if(old('menu_type')=="post" ) selected @endif>Post</option>
                                        <option value="category" @if(old('menu_type')=="category" ) selected @endif>Category</option>
                                        <option value="blog" @if(old('menu_type')=="blog" ) selected @endif>Blog</option>
                                        <option value="project" @if(old('menu_type')=="project" ) selected @endif>Project</option>
                                        <option value="library" @if(old('menu_type')=="library" ) selected @endif>Libary</option>
                                        <option value="charity" @if(old('menu_type')=="charity" ) selected @endif>Charity</option>
                                        <option value="book-upload" @if(old('menu_type')=="book-upload" ) selected @endif>Book Upload</option>
                                        <option value="book-upload-form" @if(old('menu_type')=="book-upload-form" ) selected @endif>Book Upload Form</option>
                                        <option value="book-list" @if(old('menu_type')=="book-list" ) selected @endif>Book List</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <strong>
                                        Active Status
                                        <sup class="text-danger">
                                            *
                                        </sup>
                                    </strong>
                                    <select name="active_status" id="active_status" class="form-control">
                                        <option value="1">Yes</option>
                                        <option value="0">No</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="row mt-3">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <strong>
                                        Select Featured Image
                                    </strong>
                                    <input type="file" name="featured_image" id="featured_image" class="form-control" />
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- sidebar -->
                    <div class="col-md-4">
                        <div class="row">
                            <div class="col-md-12">
                                <strong>
                                    Display
                                    <sup class="text-danger">*</sup>
                                </strong>
                                <select name="display" id="display_type" class="form-control">
                                    <option value="public" @if(old('display_type')=="public" ) selected @endif>Public</option>
                                    <option value="draft" @if(old('menu_type')=="draft" ) selected @endif>Draft</option>
                                    <option value="private" @if(old('menu_type')=="private" ) selected @endif>Private</option>
                                    <option value="protected" @if(old('menu_type')=="protected" ) selected @endif>Protected</option>
                                </select>
                            </div>
                            <div class="col-md-12 mt-2">
                                <div class="form-group">
                                    <strong>Menu Position</strong>
                                    <select name="menu_position" id="menu_poistion" class="form-control">
                                        <option value="top" @if(old('menu_position')=="top" ) selected @endif>Top Menu</option>
                                        <option value="main_menu" @if(old('menu_position')=="main_menu" ) selected @endif>Main Menu</option>
                                        <option value="footer_menu" @if(old('menu_position')=="footer" ) selected @endif>Footer Menu</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-12 mt-2">
                                <div class="form-group">
                                    <strong>
                                        Parent Menu
                                    </strong>
                                    <select name="parent_menu" id="parent_menu" class="form-control">
                                        <option value="0">No Parent Menu</option>
                                        @foreach ($menus as $list_menu)
                                        <option value="{{$list_menu->id}}">
                                            {{ $list_menu->menu_name }} - <small>{{$list_menu->menu_poistion}}</small>
                                        </option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="card-body bg-light border-top">
                <h5 class="mb-3"><strong>SEO </strong> Settings</h5>
                <div class="row">
                    <div class="col-md-8">
                        <div class="form-group">
                            <strong>
                                Meta Title
                                <sub class="text-info">
                                    Title that is displayed in google search bar
                                </sub>
                            </strong>
                            <input value="{{ old('meta_title') }}" type="text" name="meta_title" id="metai_title" class="form-control" />
                        </div>
                    </div>
                </div>
                <div class="row mt-3">
                    <div class="col-md-6">
                        <div class="form-group">
                            <strong>
                                Meta keyword
                                <sub class="text-info">
                                    Search Keyword, use comma seperated value
                                </sub>
                            </strong>
                            <input type="text" value="{{ old('meta_keyword') }}" name="meta_keyword" class="form-control" id="meta_keyword" />
                        </div>
                    </div>
                </div>
                <div class="row mt-2">
                    <div class="col-md-12">
                        <div class="form-group">
                            <strong>Meta Description
                                <sub class="text-info">
                                    Description that will be shown on google search
                                </sub>
                            </strong>
                            <textarea name="meta_description" class="form-control" id="meta_description">{{ old('meta_description') }}</textarea>
                        </div>
                    </div>
                </div>
            </div>

            <div class="card-footer">
                <div class="row">
                    <div class="col-md-8">
                        <button type="submit" class="btn btn-primary w-100">
                            Save Menu
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </form>
</x-layout>
@endsection
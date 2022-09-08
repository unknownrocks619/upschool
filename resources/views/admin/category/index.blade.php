@extends("themes.admin.master")

@section("title")
Category
@endsection

@section("content")
<x-layout heading="Category">
    <div class="card">
        <div class="card-body">
            <h6 class="card-title">
                Available Categories
            </h6>
            <div class="row">
                <div class="col-md-12 text-right">
                    <a data-bs-target="#new_category" data-bs-toggle="modal" href="" class="btn btn-primary">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-plus-circle">
                            <circle cx="12" cy="12" r="10"></circle>
                            <line x1="12" y1="8" x2="12" y2="16"></line>
                            <line x1="8" y1="12" x2="16" y2="12"></line>
                        </svg>
                        Add New Category
                    </a>
                </div>
            </div>
            <table class="table dataTable no-footer">
                <thead>
                    <tr>
                        <th>
                            Category Name
                        </th>
                        <th>
                            Category Type
                        </th>
                        <th>
                            Description
                        </th>
                        <th>
                            Total Count
                        </th>
                        <th>

                        </th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($categories as $category)
                    <tr>
                        <td>{{$category->category_name}}</td>
                        <td>{{ __("category.".$category->category_type) }}</td>
                        <td>{!! strip_tags($category->description) !!}</td>
                        <td>0</td>
                        <td>
                            <a href="{{ route('admin.web.category.edit',$category->id) }}" class="pr-3">Edit </a>
                            <form style="display: inline;" onsubmit="return confirm('Are you sure to delete `{{ $category->category_name }}`')" action="{{ route('admin.web.category.destroy',$category->id)  }}" method="post">
                                @csrf
                                @method("DELETE")
                                |
                                <button class="btn btn-link text-danger"> Delete</button>
                            </form>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</x-layout>
@endsection

@section("modal")
<x-modal modal="new_category">
    <form action="{{ route('admin.web.category.store') }}" method="post">
        @csrf
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">
                    New Category
                </h5>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="category_name">Category Name
                                <sup class="text-danger">*</sup>
                            </label>
                            <input type="text" name="category_name" value="{{ old('category_name') }}" id="category_name" class="form-control">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="category_type">Category Type
                                <sup class="text-danger">*</sup>
                            </label>
                            <select name="category_type" id="category_type" class="form-control">
                                <option value="general">General</option>
                                <option value="gallery" @if(old('category_type')=="gallery" ) selected @endif>Gallery</option>
                                <option value="lms" @if(old('category_type')=="lms" ) selected @endif>LMS</option>
                                <option value="video" @if(old('category_type')=="video" ) selected @endif>Video</option>
                                <option value="book_upload_category" @if(old('category_type')=="book_upload_category" ) selected @endif>Book Upload Category</option>
                            </select>
                        </div>
                    </div>
                </div>
                <div class="row my-3">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="parent_category">Parent Category
                            </label>
                            <select name="parent_id" class="form-control" id="parent_id">
                                <option value="">Select Parent Category</option>
                                @foreach ($categories as $category)
                                <option value="{{ $category->id }}">{{ $category->category_name }}</option>
                                @if($category->descendants)
                                @foreach ($category->descendants as $children)
                                <option value="{{$children->id}}" class="pl-5 ml-3">-{{ $children->category_name }}</option>
                                @endforeach
                                @endif
                                @endforeach
                            </select>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <div class="form-group">
                            <label for="description">
                                Descripton
                            </label>
                            <textarea name="description" id="description" class="form-control">{{ old('description') }}</textarea>
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button class="btn btn-primary" type="submit">Create Category</button>
            </div>
        </div>
    </form>
</x-modal>
@endsection
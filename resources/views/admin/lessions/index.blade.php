<x-admin-layout heading="Chapters :: {{ $chapter->chapter_name }}">
    <div class="col-md-12">
        <div class="card">
            <div class="card-body">
                <a href="{{ route('admin.chapter.chapter.index') }}" class="btn btn-primary">
                    <x-arrow-left>
                        Go Back
                    </x-arrow-left>
                </a>
                <a href="{{ route('admin.lession.chapter.lession.create',[$chapter->id]) }}" class="btn btn-secondary">
                    <x-plus>
                        Add New Lession
                    </x-plus>
                </a>
                <a href="#" class="btn btn-secondary" data-bs-target="#resource-modal" data-bs-toggle="modal">
                    Add Resource
                </a>

                <table class="mt-3 table table-hover table-bordered">
                    <thead>
                        <tr>
                            <!-- <th>
                                S.No
                            </th> -->
                            <th>
                                Lession title
                            </th>
                            <th>
                                Widgets
                            </th>
                            <th>

                            </th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($lessions as $lession)
                        <tr>
                            <td>
                                <a data-bs-toggle='modal' class="add_widget" data-bs-target="#widget" href="{{ route('admin.lession.widget',$lession->id) }}">
                                    <x-plus></x-plus>
                                </a>
                                {{-- $loop->iteration --}}
                            </td>
                            <td>
                                {{ $lession->lession_name }}
                                @if($lession->resources->count())
                                <p class="text-muted">
                                    <a href="{{ route('admin.lession.resource.view',[$lession->id]) }}" class="add_widget" data-bs-target='#widget' data-bs-toggle="modal">Manage Resource</a>
                                </p>
                                @endif
                            </td>
                            <td>
                                @if( ! $lession->widget->count())
                                <span class="border border-danger text-muted">
                                    Widgets not Attached
                                </span>
                                @else
                                @foreach ($lession->widget as $widget)
                                <span class='mx-3 d-block mb-1'>
                                    <span class='btn btn-outline-primary position-relative' style='border-right:none;border-top-right-radius:0%;border-bottom-right-radius: 0%'>
                                        {{ $widget->widget_name }}
                                    </span>
                                    <form class="d-inline" action="{{ route('admin.lession.widget.delete',[$lession->id,$widget->id]) }}" method="post">
                                        @csrf
                                        @method("DELETE")
                                        <button type="submit" class="btn btn-danger" style='border-top-left-radius:0%; border-bottom-left-radius: 0%'>
                                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-trash-2">
                                                <polyline points="3 6 5 6 21 6"></polyline>
                                                <path d="M19 6v14a2 2 0 0 1-2 2H7a2 2 0 0 1-2-2V6m3 0V4a2 2 0 0 1 2-2h4a2 2 0 0 1 2 2v2"></path>
                                                <line x1="10" y1="11" x2="10" y2="17"></line>
                                                <line x1="14" y1="11" x2="14" y2="17"></line>
                                            </svg>
                                        </button>
                                    </form>
                                </span>
                                @endforeach
                                @endif
                            </td>
                            <td>
                                <a href="{{ route('admin.lession.chapter.lession.edit',[$chapter->id,$lession->id]) }}" class="btn btn-outline-primary">
                                    <x-pencil>Edit</x-pencil>
                                </a>
                                <form class="d-inline" action="{{ route('admin.lession.chapter.lession.destroy',[$chapter->id,$lession->id]) }}" method="post">
                                    @csrf
                                    @method("DELETE")
                                    <button type="submit" class="btn btn-outline-danger">
                                        <x-trash>Delete</x-trash>
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


    <x-modal modal="widget">

    </x-modal>

    <x-modal modal="resource-modal">
        <form enctype="multipart/form-data" action="{{ route('admin.lession.resource.store') }}" method="post">
            @csrf
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">
                        Add Resource
                    </h5>
                </div>
                <div class="modal-body">
                    <div class="row bg-light my-2 py-4">
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="resource_type" class="label-control">Resource Type
                                    <sup class="text-danger">*</sup>
                                </label>
                                <select name="resource_type" id="resource_type" class="form-control">
                                    <option value="file">File</option>
                                    <option value="image">Image</option>
                                    <option value="video">Video</option>
                                    <option value="text">Text</option>
                                    <option value="link">Link</option>
                                </select>
                            </div>
                        </div>

                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="lession" class="label-control">Lession
                                    <sup class="text-danger">*</sup>
                                </label>
                                <select name="lession_name" id="lession" class="form-control">
                                    @foreach ($lessions as $lession)
                                    <option value="{{ $lession->id }}">{{ $lession->lession_name }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="resource_location" class="label-control">Resource Location
                                    <sup class="text-danger">*</sup>
                                </label>
                                <select name="resource_location" id="resource_location" class="form-control">
                                    <option value="top">Above Lession Content</option>
                                    <option value="bottm">Below Lession Content</option>
                                    <option value="bottom_widget">Below all widgets</option>
                                </select>
                            </div>
                        </div>
                    </div>

                    <div class="row mt-3 d-flex toHide" id="file">

                        <div class="col-md-8">
                            <div class="form-group">
                                <label for="file_type" class="label-control">
                                    File Type
                                    <sup class="text-danger">*</sup>
                                </label>

                                <select name="file_type" id="file_type" class="form-control">
                                    <option value="external" selected>External Link</option>
                                    <option value="upload">Upload</option>
                                </select>
                            </div>
                        </div>

                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="file_label" class="label-control">
                                    Click / Download Button Label
                                </label>
                                <input type="text" name="file_label" value="Click here to view" id="file_label" class="form-control" />
                            </div>
                        </div>

                        <div class="col-md-12 mt-3 d-block" id="external">
                            <div class="form-group">
                                <label for="external_link" class="label-control">
                                    External Url
                                </label>
                                <input type="url" name="external_link" id="external_link" class="form-control border border-primary" />
                            </div>
                        </div>

                        <div class="col-md-6 mt-3 d-none " id="upload">
                            <div class="form-group">
                                <label for="upload_file" class="label-control">
                                    File Upload
                                </label>
                                <input type="file" name="upload_file" id="upload_file" class="form-control border border-primary" />
                            </div>
                        </div>


                    </div>

                    <div class="row mt-2 d-none toHide" id="image">
                        <div class="col-md-6 mt-3">
                            <div class="form-group">
                                <label for="upload_file" class="label-control">
                                    File Upload
                                </label>
                                <input type="file" name="upload_image" id="upload_file" class="form-control border border-primary" />
                            </div>
                        </div>
                    </div>

                    <div class="row mt-2 d-none toHide" id="video">
                        <div class="col-md-6 mt-3">
                            <div class="form-group">
                                <label for="video_url" class="label-control">
                                    Video Url
                                </label>
                                <input type="url" name="video_url" id="video_url" class="form-control border border-primary" />
                            </div>
                        </div>
                    </div>

                    <div class="row mt-2 d-none toHide" id="link">
                        <div class="col-md-6 mt-3">
                            <div class="form-group">
                                <label for="link_label" class="label-control">
                                    Link Label
                                </label>
                                <input type="text" name="link_label" id="link_label" class="form-control border border-primary" />
                            </div>
                        </div>
                        <div class="col-md-6 mt-3">
                            <div class="form-group">
                                <label for="link_url" class="label-control">
                                    Link Url
                                </label>
                                <input type="url" name="link_url" id="link_url" class="form-control border" />
                            </div>
                        </div>
                    </div>

                    <div class="row mt-2">
                        <div class="col-md-6 mt-3">
                            <div class="form-group">
                                <label for="file_title" class="label-control">
                                    Title / Text
                                </label>
                                <input type="text" name="title" id="file_title" value="{{ old('title') }}" class="form-control">
                            </div>
                        </div>

                        <div class="col-md-12 mt-4">
                            <div class="form-group">
                                <label for="description" class="label-control">
                                    Description / Content
                                </label>
                                <textarea name="description" id="description" class="form-control">{{ old('description') }}</textarea>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="modal-footer">
                    <div class="row">

                        <div class="col-md-8">
                            <button type="submit" class="btn btn-primary">
                                Add Resources
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </x-modal>

    @push("custom_script")
    <script src="https://code.jquery.com/ui/1.13.1/jquery-ui.js"></script>
    <script>
        $(document).on('click', '.add_widget', function(event) {
            event.preventDefault();
            $.get($(this).attr('href'), function(response) {
                $("#widget").html(response);
            })
        })
    </script>

    <script>
        $("#resource_type").change(function(event) {
            $('.toHide').removeClass("d-flex").addClass("d-none");
            $("#" + $(this).val()).removeClass('d-none').addClass('d-flex');
        });

        $("#file_type").change(function(event) {
            if ($(this).val() == "external") {
                $("#external").removeClass("d-none").addClass("d-block");
                $("#upload").removeClass("d-block").addClass("d-none");
            } else {
                $("#upload").removeClass("d-none").addClass("d-block");
                $("#external").removeClass("d-block").addClass("d-none");

            }
        })
    </script>

    @endpush
</x-admin-layout>
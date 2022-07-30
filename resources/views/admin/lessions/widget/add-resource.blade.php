<form id='add_widget_form' action="" method="post">
    @csrf

    <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title">
                Add Resource
            </h5>
        </div>
        <div class="modal-body">
            <div class="row">
                <div class="col-md-8">
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
            </div>

            <div class="row mt-2 d-inline" id="file">

                <div class="col-md-6">
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

                <div class="col-md-6 mt-3">
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

                <div class="col-md-6 mt-3 d-none" id="upload">
                    <div class="form-group">
                        <label for="upload_file" class="label-control">
                            File Upload
                        </label>
                        <input type="file" name="upload_file" id="upload_file" class="form-control border border-primary" />
                    </div>
                </div>


            </div>

            <div class="row mt-2 d-none" id="image">
                <div class="col-md-6 mt-3 d-none">
                    <div class="form-group">
                        <label for="upload_file" class="label-control">
                            File Upload
                        </label>
                        <input type="file" name="upload_image" id="upload_file" class="form-control border border-primary" />
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
                <div class="col-md-8 text-right">
                    Close once you are done adding widgets.
                </div>
                <div class="col-md-4">
                    <a href="" class='btn btn-secondary'>
                        Close
                    </a>
                </div>
            </div>
        </div>
    </div>
</form>
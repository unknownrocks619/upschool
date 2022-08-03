<x-admin-layout>
    @section("title")
    :: Organisation
    @endsection

    <form action="{{ route('admin.org.org.project.update',$project->id) }}" method="post" enctype="multipart/form-data">
        @csrf
        @method("PUT")
        <div class="col-md-12">
            <div class="card">
                <div class="card-body">
                    <a href="{{ route('admin.org.org.project.list',$project->organisations_id) }}" class="btn btn-primary mb-3">
                        <x-arrow-left>Go Back</x-plus>
                    </a>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="title" class="label-control">Project Title
                                    <sup class="text-danger">*</sup>
                                </label>
                                <input type="text" class="form-control border border-primary" name="title" id="title" class="form-control" value="{{ old('title',$project->title) }}">
                                @error('title')
                                <div class="text-danger">
                                    {{ $message }}
                                </div>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="slug" class="label-control">Slug
                                    <sup class="text-danger">*</sup>
                                </label>
                                <input type="text" required class="form-control border border-primary" name="slug" id="slug" class="form-control" value="{{ old('slug',$project->slug) }}">
                                @error('title')
                                <div class="text-danger">
                                    {{ $message }}
                                </div>
                                @enderror
                            </div>
                        </div>
                    </div>
                    <div class="row mt-3">
                        <div class="col-md-12">
                            <label for="description" class="label-control">Content</label>
                            <textarea name="description" id="description" class="description form-control">{{ old('description',$project->description) }}</textarea>
                        </div>
                    </div>
                    <div class="row mt-3">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="banner_image" class="label-control">Banner Image
                                    <sup class="text-danger">*</sup>
                                </label>
                                <input type="file" name="banner_image" id="banner_image" class="form-control">
                            </div>
                        </div>

                        <div class="col-md-6">
                            @if(isset($project->images->banner))

                            <img src='{{ asset($project->images->banner->path) }}' class="img-fluid border h-50" />
                            @endif
                        </div>
                    </div>
                    <div class="row mt-3">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="banner_image" class="label-control">Genre
                                    <sup class="text-danger">*</sup>
                                </label>
                                <input value="{{ old('genre',$project->genre) }}" type="text" name="genre" id="genre" class="form-control">
                            </div>
                        </div>
                    </div>

                    <div class="row mt-3">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="country">Select Country</label>
                                <select name="country" id="country" class="form-control">
                                    <?php
                                    $countries = \App\Models\Country::get();
                                    foreach ($countries as $country) {
                                        echo "<option value='{$country->name}' ";
                                        if (old('country',$project->country) == $country->name) {
                                            echo " selected ";
                                        }
                                        echo ">";
                                        echo $country->name;
                                        echo "</option>";
                                    }
                                    ?>
                                </select>
                            </div>
                        </div>
                    </div>

                    <div class="row mt-5">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="image_one">Image One</label>
                                <input type="file" name="image_one" id="image_one" class="form-control">
                            </div>
                            <div class="form-group">
                                <label for="image_two">Image Two</label>
                                <input type="file" name="image_two" id="image_two" class="form-control">
                            </div>
                            <div class="form-group">
                                <label for="image_three">Image Three</label>
                                <input type="file" name="image_three" id="image_three" class="form-control">
                            </div>
                            <div class="form-group">
                                <label for="image_four">Image Four</label>
                                <input type="file" name="image_four" id="image_four" class="form-control">
                            </div>
                            <div class="form-group">
                                <label for="image_five">Image Five</label>
                                <input type="file" name="image_five" id="image_five" class="form-control">
                            </div>
                        </div>

                        <div class="col-md-6">
                            @if(isset($project->images->image_one))
                            <img src='{{ asset($project->images->image_one->path) }}' class="img-fluid" style="width:50px; height:50px;" />
                            <p>Image One</p>
                            @endif
                            @if(isset($project->images->image_two))
                            <img src='{{ asset($project->images->image_two->path) }}' class=" img-fluid" style="width:50px; height:50px;" />
                            <p>Image Two</p>
                            @endif
                            @if(isset($project->images->image_three))
                            <img src='{{ asset($project->images->image_three->path) }}' class=" img-fluid" style="width:50px; height:50px;" />
                            <p>Image Three</p>
                            @endif
                            @if(isset($project->images->image_four))
                            <img src='{{ asset($project->images->image_four->path) }}' class=" img-fluid" style="width:50px; height:50px;" />
                            <p>Image Four</p>
                            @endif
                            @if(isset($project->images->image_five))
                            <img src='{{ asset($project->images->image_five->path) }}' class=" img-fluid" style="width:50px; height:50px;" />
                            <p>Image Five</p>
                            @endif
                        </div>
                    </div>
                </div>

                <div class=" card-footer">
                    <div class="row">
                        <div class="col-md-12">
                            <button type="submit" class="btn btn-primary">Update Project </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </form>

    @push("custom_script")
    <script src="https://cdn.tiny.cloud/1/gfpdz9z1bghyqsb37fk7kk2ybi7pace2j9e7g41u4e7cnt82/tinymce/6/tinymce.min.js" referrerpolicy="origin"></script>
    <script type="text/javascript">
        const useDarkMode = window.matchMedia('(prefers-color-scheme: dark)').matches;
        const isSmallScreen = window.matchMedia('(max-width: 1023.5px)').matches;

        tinymce.init({
            selector: 'textarea',
            plugins: 'preview importcss searchreplace autolink autosave save directionality code visualblocks visualchars fullscreen image link media template codesample table charmap pagebreak nonbreaking anchor insertdatetime advlist lists wordcount help charmap quickbars emoticons',
            editimage_cors_hosts: ['picsum.photos'],
            menubar: 'file edit view insert format tools table help',
            toolbar: 'undo redo | bold italic underline strikethrough | fontfamily fontsize blocks | alignleft aligncenter alignright alignjustify | outdent indent |  numlist bullist | forecolor backcolor removeformat | pagebreak | charmap emoticons | fullscreen  preview save print | insertfile image media template link anchor codesample | ltr rtl',
            toolbar_sticky: false,
            toolbar_sticky_offset: isSmallScreen ? 102 : 108,
            autosave_ask_before_unload: true,
            autosave_interval: '30s',
            autosave_prefix: '{path}{query}-{id}-',
            autosave_restore_when_empty: false,
            autosave_retention: '2m',
            image_advtab: true,
            link_list: [{
                    title: 'Home Page',
                    value: 'https://upschool.co'
                },
                {
                    title: 'Contact us',
                    value: 'https://upschool.co'
                }
            ],
            image_list: [{
                    title: 'My page 1',
                    value: 'https://www.tiny.cloud'
                },
                {
                    title: 'My page 2',
                    value: 'http://www.moxiecode.com'
                }
            ],
            image_class_list: [{
                    title: 'None',
                    value: ''
                },
                {
                    title: 'Some class',
                    value: 'class-name'
                }
            ],
            importcss_append: true,
            file_picker_callback: elFinderBrowser,

            // file_picker_callback: (callback, value, meta) => {
            //     /* Provide file and text for the link dialog */
            //     if (meta.filetype === 'file') {
            //         callback('https://www.google.com/logos/google.jpg', {
            //             text: 'My text'
            //         });
            //     }

            //     /* Provide image and alt text for the image dialog */
            //     if (meta.filetype === 'image') {
            //         callback('https://www.google.com/logos/google.jpg', {
            //             alt: 'My alt text'
            //         });
            //     }

            //     /* Provide alternative source and posted for the media dialog */
            //     if (meta.filetype === 'media') {
            //         callback('movie.mp4', {
            //             source2: 'alt.ogg',
            //             poster: 'https://www.google.com/logos/google.jpg'
            //         });
            //     }
            // },
            templates: [{
                    title: 'New Table',
                    description: 'creates a new table',
                    content: '<div class="mceTmpl"><table width="98%%"  border="0" cellspacing="0" cellpadding="0"><tr><th scope="col"> </th><th scope="col"> </th></tr><tr><td> </td><td> </td></tr></table></div>'
                },
                {
                    title: 'Starting my story',
                    description: 'A cure for writers block',
                    content: 'Once upon a time...'
                },
                {
                    title: 'New list with dates',
                    description: 'New List with dates',
                    content: '<div class="mceTmpl"><span class="cdate">cdate</span><br><span class="mdate">mdate</span><h2>My List</h2><ul><li></li><li></li></ul></div>'
                }
            ],
            template_cdate_format: '[Date Created (CDATE): %m/%d/%Y : %H:%M:%S]',
            template_mdate_format: '[Date Modified (MDATE): %m/%d/%Y : %H:%M:%S]',
            height: 600,
            image_caption: true,
            quickbars_selection_toolbar: 'bold italic | quicklink h2 h3 blockquote quickimage quicktable',
            noneditable_class: 'mceNonEditable',
            toolbar_mode: 'sliding',
            contextmenu: 'link image table',
            skin: useDarkMode ? 'oxide-dark' : 'oxide',
            content_css: useDarkMode ? 'dark' : 'default',
            content_style: 'body { font-family:Helvetica,Arial,sans-serif; font-size:16px }'
        });

        function elFinderBrowser(callback, value, meta) {
            tinymce.activeEditor.windowManager.openUrl({
                title: 'File Manager',
                url: "{{ route('elfinder.tinymce5') }}",
                /**
                 * On message will be triggered by the child window
                 * 
                 * @param dialogApi
                 * @param details
                 * @see https://www.tiny.cloud/docs/ui-components/urldialog/#configurationoptions
                 */
                onMessage: function(dialogApi, details) {
                    if (details.mceAction === 'fileSelected') {
                        const file = details.data.file;

                        // Make file info
                        const info = file.name;

                        // Provide file and text for the link dialog
                        if (meta.filetype === 'file') {
                            callback(file.url, {
                                text: info,
                                title: info
                            });
                        }

                        // Provide image and alt text for the image dialog
                        if (meta.filetype === 'image') {
                            callback("{{ config('app.request_protocol') }}" + file.url, {
                                alt: info
                            });
                        }

                        // Provide alternative source and posted for the media dialog
                        if (meta.filetype === 'media') {
                            callback(file.url);
                        }

                        dialogApi.close();
                    }
                }
            });
        }
    </script>
    @endpush

</x-admin-layout>
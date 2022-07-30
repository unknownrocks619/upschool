<x-admin-layout>
    @section("title")
    Organisation
    @endsection

    <div class="col-md-12">
        <form action="{{ route('admin.org.org.update',$org->id) }}" method="post">
            @csrf
            @method("PUT")
            <div class="card">
                <div class="card-body">
                    <a href="{{ route('admin.org.org.index') }}" class="btn btn-outline-primary mb-4">
                        <x-arrow-left> Go Back</x-plus>
                    </a>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="organisation_name" class="label-control">Organisation / Institute Name
                                    <sup class="text-danger">*</sup>
                                </label>
                                <input type="text" name="organisation_name" id="organisation_name" class="form-control" value="{{ old('organisation_name',$org->name) }}" />
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="type" class="label-control">
                                    Type
                                </label>
                                <select name="type" id="type" class="form-control">
                                    <option value="school" @if(old('type',$org->type) == "school") selected @endif>School</option>
                                    <option value="university" @if(old('type',$org->type) == "university") selected @endif>Univerity</option>
                                    <option value="college" @if(old('type',$org->type) == "college") selected @endif>College</option>
                                    <option value="institute" @if(old('type',$org->type) == "institute") selected @endif>Institute</option>
                                    <option value="organisation" @if(old('type',$org->type) == "organisation") selected @endif>Organisation</option>
                                    <option value="company" @if(old('type',$org->type) == "company") selected @endif>Company</option>
                                    <option value="non-profit" @if(old('type',$org->type) == "non-profit") selected @endif>Not For Profit</option>
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="row mt-4">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="contact_person" class="label-control" id="contact_person">
                                    Contact Person
                                </label>
                                <input type="text" value="{{ old('contact_person',$org->contact_person) }}" name="contact_person" id="contact_person" class="form-control" />
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="contact_number" class="label-control">Contact Number
                                </label>
                                <input value="{{ old('contact_number',$org->contact_number) }}" type="text" name="contact_number" id="contact_number" class="form-control" />
                            </div>
                        </div>
                    </div>
                    <div class="row mt-4">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="logo" class="label-control">Logo</label>
                            </div>
                            <input type="file" name="logo" id="logo" class="form-control" />
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="active" class="label-control">
                                    Active
                                </label>
                                <select name="active" id="active" class="form-control">
                                    <option value="inactive">Inactive</option>
                                    <option value="active" selected>Active</option>
                                    <option value="pending">Pending</option>
                                    <option value="rejected">Pending</option>
                                </select>
                            </div>
                        </div>
                        @if($org->logo)
                        <div class="col-md-6 mt-3">
                            <img src='{{ asset($org->logo->path) }}' style="width:75px; height: 50px;" />
                        </div>
                        @endif
                    </div>
                    <div class="row mt-4">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="remarks" class="label-control">Description</label>
                                <textarea name="remarks" id="remarks" class="form-control">{{ old('remarks',$org->remarks) }}</textarea>
                            </div>
                        </div>
                    </div>
                    <div class="row mt-3">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="banner_image" class="label-control">Banner Image</label>
                                <input type="file" name="banner_image" id="banner_image" class="form-control" />
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="video_banner" class="label-control">Video Banner</label>
                                <input type="url" value="{{ old('video_banner',isset($org->featured_videos->video_banner)?$org->featured_videos->video_banner->link :null) }}" placeholder="https://vimeo.com/42345352 or https://youtube.com/watch?v=sdl654564sdf" name="video_banner" id="video_banner" class="form-control" />
                            </div>
                        </div>
                    </div>
                    @if(isset($org->featured_image->banner_image) )
                    <div class="row mt-4">
                        <div class="col-md-4">
                            <img src='{{ asset($org->featured_image->banner_image->path) }}' style="width:75px; height:50px;" />
                        </div>
                    </div>
                    @endif
                    <div class="row mt-4">
                        <div class="col-md-4 mb-2">
                            <div class="form-group">
                                <label for="website" class="label-control">Website
                                </label>
                                <input type="url" value="{{ old('website',(isset($org->website->website)?$org->website->website:null)) }}" name="website" id="website" class="form-control" />
                            </div>
                        </div>
                        <div class="col-md-4 mb-2">
                            <div class="form-group">
                                <label for="instagram" class="label-control">Instagram</label>
                                <input type="text" value="{{ old('instagram',isset($org->website->instagram)?$org->website->instagram:null) }}" name="instagram" id="instagram" class="form-control" />
                            </div>
                        </div>
                        <div class="col-md-4 mb-2">
                            <div class="form-group">
                                <label for="facebook" class="label-control">Facebook</label>
                                <input type="text" value="{{ old('facebook',isset($org->website->facebook)?$org->website->facebook:null) }}" name="facebook" id="facebook" class="form-control" />
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="linkedIn" class="label-control">Linked In</label>
                                <input type="text" name="linkedIn" value="{{ old('linkedIn',isset($org->website->linkedin)?$org->website->linkedin:null) }}" id="linkedIn" class="form-control" />
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="twitter" class="label-control">Twitter</label>
                                <input value="{{-- old('twitter',isset($org->website->twitter)?$org->website->twitter:null) --}}" type="text" name="twitter" id="twitter" class="form-control" />
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card-footer">
                    <div class="row">
                        <div class="col-md-6">
                            <button type="submit" class="btn btn-primary">Update Detail</button>
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </div>
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
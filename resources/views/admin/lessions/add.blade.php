<x-admin-layout title="Add New Lession" heading="Create new lession">

    <div class="col-md-12">
        <x-alert></x-alert>
        <div class="card">
            <x-form action="{{ route('admin.lession.chapter.lession.store',$chapter->id) }}">
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="lession_name" class="label-control">
                                    Lession Name
                                    <sup class="text-danger">*</sup>
                                </label>
                                <input type="text" value="{{ old('lession_name') }}" name="lession_name" id="lession_name" class="form-control" />
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="video_url" class="label-control">
                                    Video Url
                                    <sup class="text-danger">*</sup>
                                </label>
                                <input type="text" value="{{ old('video_url') }}" name="video_url" id="video_url" class="form-control" />
                            </div>
                        </div>
                        <div class="col-md-6 mt-3 mb-2">
                            <div class="form-group">
                                <label for="video_duration" class="label-control">
                                    Total Duration
                                </label>
                                <input type="text" value="{{ old('video_duration') }}" placeholder="HH:MM:SS" name="video_duration" id="video_duration" class="form-control" />
                            </div>
                        </div>
                    </div>
                    <div class="row mt-3">
                        <div class="form-group">
                            <label for="intro_text" class="label-control">
                                Intro Text
                            </label>
                            <textarea name="intro_text" class="form-control" id="intro_text">{{ old('intro_text') }}</textarea>
                        </div>
                    </div>
                    <div class="row mt-3">
                        <div class="form-group">
                            <label for="full_description" class="label-control">Lession Content</label>
                            <textarea name="full_description" class="form-control" id="full_description">{{ old('full_description') }}</textarea>
                        </div>
                    </div>
                </div>
            </x-form>
        </div>
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
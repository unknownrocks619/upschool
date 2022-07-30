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
                    <x-form action="{{ route('admin.course.course.store') }}">
                        <div class="row">
                            <div class="col-md-8">
                                <div class="form-group">
                                    <label for="course_title" class="label-control">
                                        Course Title
                                        <sup class="text-danger">*</sup>
                                    </label>
                                    <input type="text" require name="course_title" value="{{ old('course_title') }}" id="course_title" class="form-control @error('course_title') border border-danger @enderror">
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="course_active">Course Status</label>
                                    <select name="course_active" id="course_active" class="form-control @error('course_active') border border-danger @enderror">
                                        <option value="active" @if(old('course_active')=='active' ) selected @endif>Active</option>
                                        <option value="inactive" @if(old('course_active')=='inactive' ) selected @endif>Inactive</option>
                                        <option value="draf" @if(old('course_active')=='draf' ) selected @endif>Draft</option>
                                        <option value="promotion" @if(old('course_active')=='promotion' ) selected @endif>Promotion</option>
                                    </select>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-12 mt-4">
                                <div class="form-group">
                                    <label for="short_description">Short Description</label>
                                    <textarea name="short_description" id="short_description" class="form-control">{{ old('short_description') }}</textarea>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-12 mt-4">
                                <div class="form-group">
                                    <label for="full_description" class="label-control">Full Description
                                        <sup class="text-danger">*</sup>
                                    </label>
                                    <textarea name="full_description" id="full_description" class="form-control  border border-info">{{ old('full_description') }}</textarea>
                                </div>
                            </div>
                        </div>

                        <div class="row mt-4 pt-4">
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="permission" class="label-control">Permission
                                        <sup class="text-danger">*</sup>
                                    </label>
                                    <select name="permission" id="permission" class="form-control @error('permission') border border-danger @enderror">
                                        <option value="free" @if(old('permission')=="free" ) selected @endif>Free</option>
                                        <option value="paid" @if(old('permission')=="paid" ) selected @endif>Paid</option>
                                        <option value="other" @if(old('permission')=="other" ) selected @endif>Other</option>
                                        <option value="student_above" @if(old('permission')=="student_above" ) selected @endif>Student Above 18</option>
                                        <option value="student_below" @if(old('permission')=="student_below" ) selected @endif>Student Below 18</option>
                                        <option value="parent_of_student" @if(old('permission')=="parent_of_student" ) selected @endif>Parent of Student</option>
                                        <option value="teacher" @if(old('permission')=="teacher" ) selected @endif>Teacher</option>
                                        <option value="org" @if(old('permission')=="org" ) selected @endif>Organisation / Intution</option>
                                    </select>
                                </div>
                            </div>

                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="course_level" class="label-control">Course Level
                                        <sup class="text-danger">*</sup>
                                    </label>
                                    <select name="course_level" id="course_level" class="form-control">
                                        <option value="beginner">Beginner</option>
                                        <option value="Intermediate">Intermediate</option>
                                        <option value="advance">Advance</option>
                                        <option value="all">All Level</option>
                                        <option value="none">None</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="category" class="label-control">Category
                                    </label>
                                    <select name="category" id="category" class="form-control">
                                        <option value="">Select Category to Bind</option>
                                        @foreach (\App\Models\Category::where('category_type','lms')->get() as $category)
                                        <option value='{{ $category->id }}'>{{ $category->category_name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                        </div>

                        <div class="row mt-4">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="banner_text" class="label-control">Banner Text</label>
                                    <textarea name="banner_text" id="banner_text" class="form-control">{{ old('banner_text') }}</textarea>
                                </div>
                            </div>
                        </div>
                        <div class="row mt-4 mb-4">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="pre_requirement" class="label-control">Pre Requirements</label>
                                    <textarea name="pre_requirement" id="pre_requirement" class="form-control">{{ old('pre_requirement') }}</textarea>
                                </div>
                            </div>
                        </div>
                    </x-form>
                </div>
            </div>
        </div>
    </div>
</x-layout>
@endsection

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
@extends("themes.admin.master")

@section("title")
Chapters
@endsection
@push("plugin_css")
<link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
@endpush
@section("content")
<x-layout heading="Chapters">
    <div class="card">
        <a data-bs-toggle='modal' data-bs-target="#newChapter" class="btn btn-secondary" href="{{ route('admin.chapter.chapter.create') }}">
            <x-plus>Create new Chapter</x-plus>
        </a>
        <div class="card-body">
            <table class="table table-hover table-bordered">
                <thead>
                    <tr>
                        <th>Chapter Name</th>
                        <th>Total Lession</th>
                        <th>Course</th>
                        <th></th>
                        <th></th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($chapters as $chapter)
                    <tr>
                        <td>
                            {{ $chapter->chapter_name }}
                        </td>
                        <td>
                            {{ $chapter->lession_count }}
                        </td>
                        <td>

                            @if($chapter->courses->count())
                            @foreach ($chapter->courses as $course)
                            <span class='mx-3 d-block mb-1'>
                                <span class='btn btn-outline-primary position-relative' style='border-right:none;border-top-right-radius:0%;border-bottom-right-radius: 0%'>
                                    {{ $course->title }}
                                </span>
                                <form class="d-inline" action="{{ route('admin.chapter.remove_course',[$course->id,$chapter->id]) }}" method="post">
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
                            @else
                            <a href='{{ route("admin.chapter.chapter.edit",$chapter->id) }}' class="btn btn-outline-primary">
                                Add Course
                            </a>
                            @endif
                        </td>
                        <td>
                            <a href="{{ route('admin.lession.chapter.lession.index',$chapter->id) }}">Manage Lessions</a>
                        </td>
                        <td>
                            <a href="{{ route('admin.chapter.chapter.edit',$chapter->id) }}" class="btn btn-outline-primary btn-xs">
                                <x-pencil>Edit</x-pencil>
                            </a>
                            <form class="d-inline" action="{{ route('admin.chapter.chapter.destroy',$chapter->id) }}" method="post">
                                @csrf
                                @method("DELETE")
                                <button type="submit" class="btn btn-outline-danger btn-xs">
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
</x-layout>
@endsection

@section("modal")
<x-modal modal="newChapter">
    <form action="{{ route('admin.chapter.chapter.store') }}" method="post">
        @csrf
        <div class="modal-header">
            <h5>
                Create New Chapter
            </h5>
        </div>
        <div class="modal-body">
            <div class="row">
                <div class="col-md-8">
                    <div class="form-group">
                        <label for="chapter_name" class="label-control">
                            Chapter Name
                            <sup class="text-danger">
                                *
                            </sup>
                        </label>
                        <input type="text" name="chapter_name" id="chapter_name" class="form-control" />
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="form-group">
                        <label for="course" class="label-control">Courses
                        </label>
                        <select name="course[]" id="course" class="form-control multiple">
                            <option value="">Select Course</option>
                            @foreach ($courses_list as $course)
                            <option value='{{ $course->id }}'>{{ $course->title }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
            </div>
            <div class="row mt-4">
                <div class="col-md-12">
                    <div class="form-group">
                        <label for="chapter_description" class="label-control">Course Description</label>
                        <textarea name="chapter_description" id="chapter_description" class="form-control">{{ old('course_description') }}</textarea>
                    </div>
                </div>
            </div>
            <div class="row mt-4">
                <!-- <div class="col-md-6">
                    <div class="form-group">
                        <label for="video_time" class="label-control">Total Video Length
                        </label>
                        <input type="time" name="video_time" id="video_time" class="form-control" />
                    </div>
                </div> -->
            </div>
            <div class="row mt-4">
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="active" class="label-control">Active
                            <sup class="text-danger">*</sup>
                        </label>
                        <select name="status" id="active" class="form-control">
                            <option value="y">Yes</option>
                            <option value="n">No</option>
                        </select>
                    </div>
                </div>
            </div>
        </div>
        <div class="modal-footer">
            <button type="submit" class="btn btn-primary">
                Save Chapter
            </button>
        </div>
    </form>
</x-modal>
@endsection

@push("custom_script")
<script src="https://cdn.tiny.cloud/1/gfpdz9z1bghyqsb37fk7kk2ybi7pace2j9e7g41u4e7cnt82/tinymce/6/tinymce.min.js" referrerpolicy="origin"></script>
<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
<!-- <script>
    $(function() {
        'use strict'

        $("#course").select2({
            'class': "form-control",
            "width": "100%"
        });
    });
</script> -->
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
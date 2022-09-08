<x-admin-layout title="Book <> Product" heading="Product Edit">

    <div class="col-md-12">
        <a class="btn btn-outline-primary mb-3" href="{{ route('admin.commerce.product.list') }}">
            <x-arrow-left></x-arrow-left>
            Go Back
        </a>
        <x-alert></x-alert>
        <div class="card">
            <x-form action="{{ route('admin.commerce.product.update',$product->id) }}" method="PUT">
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="product_name" class="label-control">
                                    Product Name
                                    <sup class="text-danger">*</sup>
                                </label>
                                <input type="text" value="{{ old('product_name', $product->product_name) }}" name="product_name" id="product_name" class="form-control @error('product_name') border border-danger @enderror" />
                                @error('product_name')
                                <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="video_url" class="label-control">
                                    Author
                                    <sup class="text-danger">*</sup>
                                </label>
                                <input type="text" value="{{ old('author',$product->author->full_name()) }}" name="author" id="author" readonly class="form-control disabled @error('author') border border-danger @enderror" />
                                @error("author")
                                <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-6 mt-3 mb-2">
                            <div class="form-group">
                                <label for="video_duration" class="label-control">
                                    Select Product Type
                                    <sup class="text-danger">*</sup>
                                </label>
                                <select name="product_type" id="product_type" class="form-control">
                                    <option value="digital" @if(old('product_type',$product->type) == "digital") selected @endif>Digital Only</option>
                                    <option value="physical" @if(old('product_type',$product->type) == "physical") selected @endif>Physical Product Only</option>
                                    <option value="digital_physical" @if(old('product_type',$product->type) == "digital_physical") selected @endif>Digital & Physical (Both)</option>
                                    <option value="service" @if(old('product_type',$product->type) == "service") selected @endif>Service</option>
                                    <option value="all" @if(old('product_type',$product->type) == "all") selected @endif>All</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-6 mt-3 mb-2">
                            <div class="form-group">
                                <label for="product_price">Product Price (AUD)
                                    <sup class="text-danger">
                                        *
                                    </sup>
                                </label>
                                <input type="text" name="product_price" value="{{ old('product_price',$product->price) }}" id="product_price" class="form-control @error('product_price') border border-danger @enderror" />
                                @error("product_price")
                                <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                    </div>
                    <div class="row mt-3">
                        <div class="form-group">
                            <label for="intro_text" class="label-control">
                                Short Description
                                <sup class="text-danger">
                                    *
                                </sup>
                            </label>
                            <textarea name="short_description" class="form-control @error('short_description') border border-danger @enderror" id="intro_text">{{ old('short_description',$product->short_description) }}</textarea>
                        </div>
                    </div>
                    <div class="row mt-3">
                        <div class="form-group">
                            <label for="full_description" class="label-control">
                                Full Description
                                <sup class="text-danger">*</sup>
                            </label>
                            <textarea name="full_description" class="form-control @error('full_description') border border-danger @enderror" id="full_description">{{ old('full_description',$product->full_description) }}</textarea>
                        </div>
                    </div>

                    <div class="row mt-3 bg-light p-5">
                        <div class="col-md-12">
                            <label for="categories">Categories
                                <sup class="text-danger">*</sup>
                            </label>
                            <select name="categories[]" multiple id="categories" class="form-control categories @error('categories') border border-danger @enderror">
                                <?php
                                $categories = \App\Models\Category::where('category_type', 'book_upload_category')->with("products")->latest()->get();
                                ?>
                                @foreach ($categories as $category)
                                <option value="{{ $category->id }}" @if($category->products->count()) selected @endif> {{ $category->category_name }} </option>
                                @endforeach
                            </select>

                            @error("categories")
                            <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="col-md-6 mt-3">
                            <div class="form-group">
                                <label for="featured_image">Featured Image
                                    <sup class="text-danger">*</sup>
                                </label>
                                <input type="file" name="featured_image" id="featured_image" class="form-control @error('featured_image') border border-danger @enderror" />
                                @error("featured_image")
                                <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                        @if($product->featured_image)
                        <div class="col-md-6 mt-3">
                            <div class="form-group">
                                <img src="{{ asset($product->featured_image->path) }}" class="img-fluid w-50" />
                            </div>
                        </div>
                        @endif

                        <div class="col-md-6 mt-3">
                            <div class="form-group">
                                <label for="status">
                                    Status
                                    <sup class="text-danger">*</sup>
                                </label>
                            </div>
                            <select name="status" id="status" class="form-control">
                                <option value="publish" @if(old('status')=="publish" || $product->status == "active") selected @endif>Publish</option>
                                <option value="draft" @if(old('status',$product->status)=="draft" ) selected @endif>Draft</option>
                            </select>
                        </div>

                        <div class="col-md-12 mt-3">
                            <div class="form-group">
                                <label for="project">Project
                                    <sup class="text-danger">*</sup>
                                </label>
                                <span class="form-control disabled">
                                    {{ $product->projects->title }}
                                </span>
                            </div>
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
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
    <script type="text/javascript">
        $(document).ready(function() {
            $(".categories").select2();
        })
    </script>
    @endpush

    @push("plugin_css")
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
    @endpush
</x-admin-layout>
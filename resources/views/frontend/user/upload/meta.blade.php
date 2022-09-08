@extends("themes.frontend.master")

@section("page_title")
:: Upload
@endsection

@section("content")
<div class="container mb-11 mt-8">
    <div class="row gx-0 m-3 my-4 ">
        <div class="col-md-8 col-xl-7 mx-auto border my-4 rounded rounded-2">
            <img src="https://upschool.co/wp-content/uploads/2022/07/Upschool-Shopping-Cart-1440-%C3%97-300-px-6-1024x213.png" alt="Upload Book - Upschool" srcset="https://upschool.co/wp-content/uploads/2022/07/Upschool-Shopping-Cart-1440-%C3%97-300-px-6-1024x213.png" class="img-fluid  rounded rounded-2" />
        </div>
        <div class="col-md-8 col-xl-7 mx-auto text-center my-4 rounded rounded-2">
            <h3 class="sample-text mb-3">
                Upload Your Book !
            </h3>
        </div>
    </div>
    <div class="row">
        <div class="col-md-3">
            <div class="card border-none" style="border: 3px solid #D9D9D9">
                <div class="card-body">
                    <h4 class="card-title text-center fs-5" style="color:#242254;">
                        Your Book Details
                    </h4>
                    <div class="row">
                        <div class="col-md-1">
                            <i class="fas fa-solid fa-arrow-left text-white" style="background-color:#CA265F;border-radius:50%;padding:3.5px;"></i>
                        </div>
                        <div class="col-md-10 ms-2">
                            <?php
                            $menu = menus()->where('menu_type', 'upload-book-form')->first();
                            if ($menu == null) {
                                $menu = \App\Models\Menu::select('slug')->where('menu_type', 'book-upload-form')->first();
                            }
                            ?>
                            <a href="@if($menu) {{ route('frontend.view',[$menu->slug,$book->id]) }} @endif">Back to Book Upload Page</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-md-6 text-center">
            <form action="{{ route('frontend.auth_user.books.book.meta.store', $book->id) }}" method="post">
                @csrf
                <div class="card" style="min-height: 60%">
                    <div class="card-body" style="border: none !important">
                        <div class="row">
                            <div class="col-md-12">

                            </div>
                        </div>
                        <h4 class="mb-4">
                            Please Enter Following Information
                        </h4>
                        <div class="row">
                            <div class="col-md-12">
                                <x-flash></x-flash>
                            </div>
                        </div>
                        <div class="row mt-3">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <input type="text" name="book_title" id="book_title" value="{{ old('book_title',$book->book_title) }}" placeholder="Book Title" class="form-control @error('book_title') border border-danger @enderror">
                                    @error("book_title")
                                    <div class="text-danger text-start">{{$message}}</div>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-12 mt-4">
                                <div class="form-group">
                                    <textarea name="book_description" placeholder="Book Description" id="book_description" class="form-control @error('book_description') border border-danger @enderror">{{old('book_description',$book->full_description)}}</textarea>
                                    @error("book_description")
                                    <div class="text-danger text-start">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-12 mt-3">
                                <div class="form-group">
                                    <input type="url" name="canva_link" value="{{ old('canva_link',$book->canva_link) }}" id="canva_link" class="form-control @error('canva_link') border border-danger @enderror" placeholder="Canva Book Link" />
                                    @error("canva_link")
                                    <div class="text-danger text-start">{{ $message }}</div>
                                    @enderror
                                    <div class="text-start">
                                        <a href="" class="">How to get canva link</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row mt-3">
                            @if( ! auth()->user()->email)
                            <div class="col-md-12 mb-3">
                                <div class="form-group">
                                    <input placeholder="Your Email" value="{{ old('email',auth()->user()->email) }}" type="email" name="email" id="email" class="form-control @error border border-danger @enderror" />
                                    @error("email")
                                    <div class="text-danger text-start">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            @endif
                            <div class="col-md-12">
                                <div class="form-group">
                                    <input type="text" value="{{ old('college',$book->school) }}" placeholder="Your School Name (Optional)" name="college" value="{{ old('email') }}" id="college" class="form-control @error('college') border border-danger @enderror" />
                                    @error("college")
                                    <div class="text-danger text-start">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            @if( ! auth()->user()->country)
                            <div class="col-md-12 mt-3">
                                <div class="form-group">
                                    <select name="country" id="country" class="form-control @error('country') border border-danger @enderror">
                                        <?php
                                        $countries = \App\Models\Country::get();
                                        ?>
                                        @foreach ($countries as $country)
                                        <option value="{{$country->name}}" @if(old('country',auth()->user()->country)==$country->name) selected @endif>{{ $country->name }}</option>
                                        @endforeach
                                    </select>
                                    @error("country")
                                    <div class="text-danger text-start">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            @endif
                            @if(! auth()->user()->date_of_birth)
                            <div class="col-md-12 mt-3">
                                <div class="form-group text-start">
                                    <label for="date_of_birth" class="text-start">Date of Birth
                                        <sup class="text-danger">*</sup>
                                    </label>
                                    <input type="date" value="{{ old('date_of_birth',auth()->user()->date_of_birth) }}" name="date_of_birth" id="date_of_birth" class="form-control @error('date_of_birth') border border-danger @enderror" placeholder="Date of birth" />
                                    @error("date_of_birth")
                                    <div class="text-danger text-start">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            @endif
                        </div>
                        <div class="row mt-3">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <select name="project" id="project" class="form-control">
                                        <option value="" @if( ! old('project',$book->project_id)) selected @endif> Please select a project</option>
                                        <?php
                                        $projects = \App\Models\OrganisationProject::get();
                                        ?>
                                        @foreach ($projects as $project)
                                        <option value="{{ $project->id }}" @if(old('project',$book->project_id)==$project->id) selected @endif>{{ $project->title }}</option>
                                        @endforeach
                                    </select>

                                    @error("project")
                                    <div class="text-danger text-start">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card-body mt-2" style="border: none !important">
                        <div class="row">
                            <div class="col-md-12">
                                <button type="submit" class="btn btn-primary w-100">
                                    Next Step
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
        </div>

        <div class="col-md-3">
            <div class="card border-none" style="border: 3px solid #D9D9D9">
                <div class="card-body">
                    <h4 class="card-title text-center fs-5" style="color:#242254;">
                        Upload your book in three simple steps
                    </h4>
                    <div class="row ms-1 bg-primary p-2 pt-2 mb-2" style="background:#242254 !important;color:#fff">
                        <div class="col-md-1">
                            <i class="fas fa-solid fa-check text-white" style="background-color:#99B83C;border-radius:50%;padding:3.5px;"></i>
                        </div>
                        <div class="col-md-10">
                            <h5 class="mb-0 px-2">Step 01</h5>
                            <small class="mt-0 px-2">
                                Upload Your Book
                            </small>
                        </div>
                    </div>
                    <div class="row ms-1 bg-primary p-2 mb-2" style="background:#242254 !important;color:#fff">
                        <div class="col-md-1">
                            <i class="fas fa-solid fa-check text-white" style="background-color:#99B83C;border-radius:50%;padding:3.5px;"></i>
                        </div>
                        <div class="col-md-10">
                            <h5 class="mb-0 px-2">Step 02</h5>
                            <small class="mt-0 px-2">
                                Write details about your book
                            </small>
                        </div>
                    </div>
                    <div class="row ms-1 bg-primary p-2 mb-2" style="background:#242254 !important;color:#fff">
                        <div class="col-md-1">
                            <i class="fas fa-solid fa-check text-white" style="background-color:#A6A6A6;border-radius:50%;padding:3.5px;"></i>
                        </div>
                        <div class="col-md-10">
                            <h5 class="mb-0 px-2">Step 03</h5>
                            <small class="mt-0 px-2">
                                Your book category
                            </small>
                        </div>
                    </div>
                    <div class="row ms-1 bg-primary p-2" style="background:#242254 !important;color:#fff">
                        <div class="col-md-1">
                            <i class="fas fa-solid fa-check text-white" style="background-color:#A6A6A6;border-radius:50%;padding:3.5px;"></i>
                        </div>
                        <div class="col-md-10">
                            <h5 class="mb-0 px-2">Step 04</h5>
                            <small class="mt-0 px-2">
                                Your book preview and summary
                            </small>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@push("custom_css")
<link rel="stylesheet" href="https://unpkg.com/dropzone@5/dist/min/dropzone.min.css" type="text/css" />
<style type="text/css">
    .dropzone {
        border: 2px dashed #d9d9d9;
        box-shadow: 0px 0px 0px 5px rgb(255 255 255);
        display: flex;
        align-items: center;
        justify-content: center;
        flex-direction: column;
        background: #F8F8F8;
    }
</style>
@endpush

@push("custom_scripts")
<script src="https://unpkg.com/dropzone@5/dist/min/dropzone.min.js"></script>
<script type="text/javascript">
    Dropzone.options.bookUploadDropzone = {
        paramName: "file", // The name that will be used to transfer the file
        maxFilesize: 100, // MB
        acceptedFiles: "application/pdf",

        error: function(file) {

        },
        success: function(file, response) {
            if (response == "success") {
                // let's display the message that we are moving forward with the proccess

            }
        },
        complete: function(response, file) {
            if (response.accepted == false) {
                this.removeAllFiles(response);
                console.log("condition matched");
                $("#dz-file-allowed-error").fadeIn("fast")
            }
        },
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    }

    $("#remove-error-type").click(function(event) {
        event.preventDefault();
        $("#dz-file-allowed-error").fadeOut("medium", function() {
            $("#book-upload-dropzone").fadeIn("fast");

        });
    })
</script>
@endpush
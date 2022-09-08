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
                        Upload Your Designs
                    </h4>
                    <p>
                        Before you upload your design, check your file for the following:
                    </p>
                    <div class="row">
                        <div class="col-md-1">
                            <i class="fas fa-solid fa-check text-white" style="background-color:#CA265F;border-radius:50%;padding:3.5px;"></i>
                        </div>
                        <div class="col-md-10 ms-2">
                            Supported Files Use PDF files for best results for your print.

                        </div>
                    </div>
                    <div class="row mt-3">
                        <div class="col-md-1">
                            <i class="fas fa-solid fa-check text-white" style="background-color:#CA265F;border-radius:50%;padding:3.5px;"></i>
                        </div>
                        <div class="col-md-10 ms-2">
                            Download your book from Canva as 'PDF Print'
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-md-6 text-center">
            <div class="card" style="min-height: 60%">
                <div class="card-body" style="display:flex;align-items:center;justify-content:center">
                    <div id="dz-file-allowed-error" class="overlay text-center" style="background: #ff0000ed;position: absolute;width: 100%;height: 100%;z-index: 9999; display: none;">
                        <h4 class="text-white" style="margin-top:20%">Invalid File Type</h4>
                        <p class="text-white">Only PDF format file is allowed. Please select correct file type before moving forward</p>
                        <p class="text-white">Your PDF file should not exceed 100 MB</p>
                        <a href="#" id="remove-error-type" class="btn btn-info">GOT IT !</a>
                    </div>
                    <form action="{{ route('frontend.auth_user.books.store-book-upload') }}" class="dropzone w-100" id="book-upload-dropzone">
                        <div class="dz-message">
                            <div class="row">
                                <div class="col-md-12"><img src="https://upschool.co/wp-content/plugins/pdf_upload_and_sales1/asset/css/images/uploder-icon.png" class="img-fluid" /></div>
                                <div class="col-md-12 mt-4 pt-4">
                                    <p>
                                        Max 100 MB per File
                                        <br />
                                        Support File Type: PDF
                                    </p>
                                </div>
                                <div class="col-md-12 mt-4 pt-4">
                                    <a href="#" class="btn btn-primary " style="background:#242254">Drag or Click to Upload File</a>
                                </div>
                            </div>
                        </div>
                        <input type="file" name="file" id="file" class="form-control d-none">
                    </form>
                </div>

                @if(isset($book) && ! empty ($book) )
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-10 text-start me-0 pe-0">
                            <p class="form-control border border-success border-end-0 me-0 pe-0">
                                <i class="fas fa-file-pdf fs-2 text-danger"></i>
                                <span class="fs-4">{{ $book->book->original_filename }}</span>
                            </p>
                        </div>
                        <div class="col-md-2 ms-0 ps-0 text-start">
                            <form onsubmit="return confirm('Are you sure, You cannot undo this action')" action="{{ route('frontend.auth_user.books.book.destroy',$book->id) }}" method="post" class="ms-0 ps-0">
                                @csrf
                                @method("DESTROY")
                                <input type="hidden" name="upload" value="true" />
                                <button type="submit" class=" fs-3 btn btn-danger btn-sm  border border-success border-start-0">
                                    <i class="fas fa-trash"></i>
                                </button>
                            </form>
                        </div>

                    </div>

                    <div class="row">
                        <div class="col-md-12">
                            <form action="{{ route('frontend.auth_user.books.book.meta',$book->id) }}" method="get">
                                <button type="submit" class="btn btn-primary w-100">
                                    Next Step
                                </button>
                            </form>
                        </div>
                    </div>
                </div>
                @endif
            </div>
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
                            <p class="mt-0 px-2">
                                Upload Your Book
                            </p>
                        </div>
                    </div>
                    <div class="row ms-1 bg-primary p-2 mb-2" style="background:#242254 !important;color:#fff">
                        <div class="col-md-1">
                            <i class="fas fa-solid fa-check text-white" style="background-color:#A6A6A6;border-radius:50%;padding:3.5px;"></i>
                        </div>
                        <div class="col-md-10">
                            <h5 class="mb-0 px-2">Step 02</h5>
                            <p class="mt-0 px-2">
                                Upload Your Book
                            </p>
                        </div>
                    </div>
                    <div class="row ms-1 bg-primary p-2 mb-2" style="background:#242254 !important;color:#fff">
                        <div class="col-md-1">
                            <i class="fas fa-solid fa-check text-white" style="background-color:#A6A6A6;border-radius:50%;padding:3.5px;"></i>
                        </div>
                        <div class="col-md-10">
                            <h5 class="mb-0 px-2">Step 03</h5>
                            <p class="mt-0 px-2">
                                Upload Your Book
                            </p>
                        </div>
                    </div>
                    <div class="row ms-1 bg-primary p-2" style="background:#242254 !important;color:#fff">
                        <div class="col-md-1">
                            <i class="fas fa-solid fa-check text-white" style="background-color:#A6A6A6;border-radius:50%;padding:3.5px;"></i>
                        </div>
                        <div class="col-md-10">
                            <h5 class="mb-0 px-2">Step 04</h5>
                            <p class="mt-0 px-2">
                                Upload Your Book
                            </p>
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
            console.log(response.status);
            if (response.status == "success") {
                let responseURL = JSON.parse(response.xhr.response);

                window.location.replace(responseURL.url);
            }
        },
        queuecomplete: function(response) {
            console.log("queue is now complete.");
            console.log(response);
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
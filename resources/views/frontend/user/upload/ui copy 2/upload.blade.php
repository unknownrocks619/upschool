@extends('themes.frontend.master-book-upload')

@section('page_title')
    :: Upload your book
@endsection

@push('custom_css')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/lightbox2/2.11.1/css/lightbox.min.css">
    <link rel="stylesheet" href="https://unpkg.com/dropzone@5/dist/min/dropzone.min.css" type="text/css" />
    <link href="https://fonts.googleapis.com/css2?family=Inter&display=swap" rel="stylesheet">

    <style type="text/css">
        .dropzone {
            border: 2px dashed #E2E6EA;
            /* box-shadow: 0px 0px 0px 5px rgb(255 255 255); */
            display: flex;
            align-items: center;
            justify-content: center;
            flex-direction: column;
            background: #F8F8F8;
            border-radius: 24px;

        }

        .dz-filename {
            display: none !important;
        }

        .image-3d {
            -webkit-transition: 0.2s;
        }

        .image-3d:hover {
            transform: perspective(400px) rotateY(-20deg);
            box-shadow: 0px 3px 30px rgba(0, 0, 0.22);
            transform-style: preserve-3d;
            transition: .2s;
            /* transition-timing-function: ease-in; */
            -webkit-transition: 0.2s;
        }

        ._df_thumb {
            box-shadow: none !important;
            border: none !important;
        }
    </style>
    <style type="text/css">
        p {
            font-family: 'Inter', sans-serif !important;
        }

        label {
            font-family: 'Inter';
            font-weight: 400;
            line-height: 23px;
            /* font-size: 19px; */
        }

        .dynamic-padding {
            padding-left: 80px !important;
            /* padding-right: 20px !important; */
        }

        input {
            box-shadow: none;
            font-family: "Inter";


        }

        textarea {
            font-family: 'Inter';
        }

        .next {
            background: #242254;
            color: #fff;
        }

        .next:hover {
            background: #242254 !important;
            color: #fff !important;

        }
        .next:visited {
            background: inherit !important;
        }
        .next:active {
            background: inherit !important;
        }
        .next:disabled {
            background: inherit !important;
        }
        input[type="checkbox"]:checked{
        border-color: red;
        background-color:red;
    }
        /* .active-bar {
            background: #fff;
            min-height: 40px;
            min-width: 40px;
            border-radius: 50%;
            border: 2px solid red;
            max-width: 30px;
            margin-top: 78px;
        } */
        .active-circle {
            background: #fff !important;
            color: #fff !important;
            border: 2px solid red !important;
        }

        .active-text {
            color: #fff !important;
        }

        .active-line {
            background: #fff !important;
            color: #fff !important;

        }

        .information {
            font-size: 19px;
            color: #fff;
            font-family: 'Inter';
            line-height: 24px;
            margin-top: 15px;
            margin-left: 6px;
        }

        .information-line {
            min-width: 1px;
            min-height: 32px;
            background: rgba(255, 255, 255, 0.2);
            max-width: 1px;
            margin-left: 19px;
            margin-top: 10px
        }

        .information-circle-disabled {
            background: transparent;
            min-height: 40px;
            min-width: 40px;
            border-radius: 50%;
            border: 2px solid rgba(255, 255, 255, 0.2);
            color: rgba(255, 255, 255, 0.2);
            max-width: 30px;
            margin-top: 15px;
        }

        .information-circle-disabled:first {
            background: transparent;
            min-height: 40px;
            min-width: 40px;
            border-radius: 50%;
            border: 2px solid #6076D1;
            max-width: 30px;
            margin-top: 15px;
        }

        .first {
            margin-top: 5px;
        }

        .information-disabled {
            font-size: 19px;
            /* color: #6076D1; */
            color: rgba(255, 255, 255, 0.2);
            font-family: 'Inter';
            line-height: 24px;
            margin-top: 15px;
            margin-left: 6px;
        }

        .information-line-disabled {
            min-width: 1px;
            min-height: 32px;
            /* background: #6076D1; */
            background: rgba(255, 255, 255, 0.2);
            max-width: 1px;
            margin-left: 19px;
            margin-top: 10px
        }

        .progress-title {
            text-align: left;
            color: #fff;
            font-size: 23px;
            font-family: 'Inter';
            line-height: 28px;
            margin-left: 0px;
            padding-left: 0px;
            margin-top: 0px;
            padding-top: 0px;
        }

        .progress-title>h5 {
            color: #fff !important;
            font-family: 'Inter' !important;
        }

        .steps {
            font-size: 14px;
            font-family: 'Inter';
            color: #B5CCEC;
            line-height: 17px;
        }

        .signup-progress-bar {
            margin-top: 50px;
            text-align: left;

        }

        .progress-bar {
            background: #D61A5F !important;
        }

        .steps>p {
            font-size: 14px !important;
            font-family: "Inter";
        }

        @media only screen and (max-width: 600px) {
            .dynamic-padding {
                padding-left: 10px !important;
                /* padding-right: 10px !important; */
            }
            .pe-5{
                padding-right: 0px !important;
            }
            .me-1{
                margin-right: 0px !important;
            }
            .me-5{
                margin-right: 0px !important;
            }
            .w-100
            {
                width:98% !important;
            }
        }
    </style>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/lightbox2/2.11.1/css/lightbox.min.css">
    <link rel="stylesheet"
        href="https://upschool.co/wp-content/plugins/3d-flipbook-dflip-lite/assets/css/dflip.min.css?ver=1.7.31">
    <link rel="stylesheet" href="https://upschool.co/wp-content/plugins/dearpdf-lite/assets/css/dearpdf.min.css?ver=1.2.61">
@endpush

@section('content')
    <div class="container mb-11 mx-auto px-0 mt-4">
        <div class="row px-0 mx-auto step-parent-row mt-4 mb-4 "
            style="margin-top: 50px !important; margin-bottom:50px !important">
            <!-- Row -->
            <div class="mt-4 col-md-9 pl-0 ml-0 mx-auto step-parent step-parent-column"
                style="padding-left:0px !important;position:relative">

                @include('frontend.user.upload.ui.' . $tab)
            </div>

            <div class="mt-4 col-md-3 d-none d-md-block mx-auto sidebar"
                style="background-color: #242254 !important;align-items:center;background-size:cover;">
                <div class=" px-0 ps-3  ms-1">
                    <div class="sidebar_steps row first mt-4">
                        <div class="col-md-12 mt-4">
                            <div class="d-flex justify-content-start">
                                <div class="information-circle-disabled active-circle" data-step='1'
                                    style="display:flex;justify-content:center;align-items:center">
                                    <img src="{{ asset('images/1.png') }}" class="current-image d-none"
                                        style="width:25px; height: 25px;" />
                                </div>
                                <div class="information-disabled active-text pt-2 ps-3">
                                    Upload PDF
                                </div>
                            </div>
                            <div class="information-line-disabled active-line">
                            </div>
                        </div>
                    </div>

                    <div class="sidebar_steps row second">
                        <div class="col-md-12 ">
                            <div class="d-flex justify-content-start">
                                <div class="information-circle-disabled" data-step='1'
                                    style="display:flex;justify-content:center;align-items:center">
                                    <img src="{{ asset('images/1.png') }}" class="current-image d-none"
                                        style="width:25px; height: 25px;" />
                                </div>
                                <div class="information-disabled pt-2 ps-3">
                                    About your Book
                                </div>
                            </div>
                            <div class="information-line-disabled">
                            </div>
                        </div>
                    </div>

                    <div class="sidebar_steps row third">
                        <div class="col-md-12 ">
                            <div class="d-flex justify-content-start">
                                <div class="information-circle-disabled" data-step='1'
                                    style="display:flex;justify-content:center;align-items:center">
                                    <img src="{{ asset('images/1.png') }}" class="current-image d-none"
                                        style="width:25px; height: 25px;" />
                                </div>
                                <div class="information-disabled pt-2 ps-3">
                                    Book Category
                                </div>
                            </div>
                            <div class="information-line-disabled">
                            </div>
                        </div>
                    </div>

                    <div class="sidebar_steps row fourth">
                        <div class="col-md-12 ">
                            <div class="d-flex justify-content-start">
                                <div class="information-circle-disabled" data-step='1'
                                    style="display:flex;justify-content:center;align-items:center">
                                    <img src="{{ asset('images/1.png') }}" class="current-image d-none"
                                        style="width:25px; height: 25px;" />
                                </div>
                                <div class="information-disabled pt-2 ps-3">
                                    Select a Project
                                </div>
                            </div>
                            <div class="information-line-disabled">
                            </div>
                        </div>
                    </div>

                    <div class="sidebar_steps row five">
                        <div class="col-md-12 ">
                            <div class="d-flex justify-content-start">
                                <div class="information-circle-disabled" data-step='1'
                                    style="display:flex;justify-content:center;align-items:center">
                                    <img src="{{ asset('images/1.png') }}" class="current-image d-none"
                                        style="width:25px; height: 25px;" />
                                </div>
                                <div class="information-disabled ps-3" style="max-height: 40px;">
                                    Book Summary and Preview
                                </div>
                            </div>

                        </div>
                    </div>

                    <div class="row signup-progress-bar ps-3 mb-5 pb-5">
                        <div class="col-md-12 steps p-0 m-0 mt-5">
                            <p class="p-0 m-0 text-left"><span class="step-count">1</span> of 5 Steps</p>
                        </div>
                        <div class="progress-title col-md-12">
                            <h5><span class="percent-complete">100%</span> to Complete</h5>
                        </div>
                        <div class="col-md-12 bar mt-2 ps-0">
                            <div class="progress w-75" style="background-color: #fff;">
                                <div class="progress-bar progress-effect" style="width: 2%;" role="progressbar"
                                    aria-valuenow="0" aria-valuemin="0" aria-valuemax="100"></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>


        </div>
    </div>
@endsection

@push('custom_scripts')
    <script src="https://unpkg.com/dropzone@5/dist/min/dropzone.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/lightbox2/2.11.3/js/lightbox.min.js"
        integrity="sha512-k2GFCTbp9rQU412BStrcD/rlwv1PYec9SNrkbQlo6RZCf75l6KcC3UwDY8H5n5hl4v77IDtIPwOk9Dqjs/mMBQ=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    {{-- <script src="{{ asset('js/dearpdf-lite.min.js') }}"></script>
    <script src="{{ asset('js/dflip.min.js') }}"></script> --}}

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

    <script type="text/javascript">
        $(document).on('click', 'button.step-back', function(event) {
            event.preventDefault();

            let currentButton = $(this);
            loadAjax(currentButton)
        })
        lightbox.option({
            'resizeDuration': 200,
            'wrapAround': true
        })
    </script>


    <script type="text/javascript">
        function loadAjax(element) {
            $.ajax({
                method: "get",
                url: $(element).data('url'),
                data: "partial=true",
                success: function(response) {
                    $('.step-parent').empty().html(response);
                }
            })
        }

        function handleError(errors) {

            $.each(errors, function(index, element) {
                if ($("#" + index + "_error").length != 0) {

                    $("#" + index + "_error").empty().html(element);

                }
            });
        }

        function highlightProcess(currentStep, progressBar, percentage) {
            var sidebarElements = $('.sidebar_steps');
            sidebarElements.each(function(index, element) {
                if (index == (currentStep - 1)) {
                    $(element).find(".information-circle-disabled").addClass('active-circle')
                    $(element).find(".current-image").addClass('d-none')
                    $(element).find(".information-disabled").addClass('active-text')
                }

                if (index < (currentStep - 1)) {
                    $(element).find(".information-circle-disabled").addClass('active-circle')
                    $(element).find(".current-image").removeClass('d-none')
                    $(element).find(".information-disabled").addClass('active-text')
                }

                if (index > (currentStep - 1)) {
                    $(element).find(".information-circle-disabled").removeClass('active-circle')
                    $(element).find(".current-image").addClass('d-none')
                    $(element).find(".information-disabled").removeClass('active-text');

                }

                $(".progress-effect").css("width", progressBar)
                $(".percent-complete").text(percentage)
                $(".step-count").text(currentStep)
                $(".social-login-row").fadeIn();
            })

        }

        highlightProcess("{{ $instances['step'] }}", "{{ $instances['progressBar'] }}", "{{ $instances['percentage'] }}")
    </script>
@endpush
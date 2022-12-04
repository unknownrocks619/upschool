@extends("themes.frontend.master")

@section("page_title")
:: Upload your book
@endsection

@push("custom_css")
<link rel="stylesheet" href="https://unpkg.com/dropzone@5/dist/min/dropzone.min.css" type="text/css" />
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
        background: #fff;
        max-width: 1px;
        margin-left: 19px;
        margin-top: 10px
    }

    .information-circle-disabled {
        background: transparent;
        min-height: 40px;
        min-width: 40px;
        border-radius: 50%;
        border: 2px solid #6076D1;
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
        color: #6076D1;
        font-family: 'Inter';
        line-height: 24px;
        margin-top: 15px;
        margin-left: 6px;
    }

    .information-line-disabled {
        min-width: 1px;
        min-height: 32px;
        background: #6076D1;
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
    }
</style>
@endpush


@section("content")
<div class="container-fluid border-start mb-11 mx-auto px-0">
    <div class="row px-0 mx-auto">
        <!-- Row -->
        <div class="col-md-9 pl-0 ml-0 mx-auto step-parent" style="padding-left:0px !important;">
            <!-- Step Zero -->
            <div class="row step-zero-row main">
                <div class="col-md-12">

                    <div class="row">
                        <div class="col-md-12">
                            <div class="bg-white pt-4 mt-3 pb-3 ps-5 dynamic-padding" style="height:100%">
                                <div class="row me-5 social-login-row">
                                    <h4 class="mb-0" style="color: #03014C !important;font-weight:700;line-height:42px;font-size:33.34px">
                                        Upload Your Book!
                                    </h4>
                                </div>
                            </div>
                        </div>
                    </div>


                    <div class="row dynamic-padding pe-5">
                        <div class="col-md-12">
                            <div class="card border-0" style="border-radius: 24px;">
                                <div class="card-header border-0 bg-white text-center px-5 py-3">
                                    <button class="btn btn-danger w-100 py-3 border border-dark" style="background:#D61A5F;border-radius: 50px;font-family:'Inter';font-size:20px;box-shadow: 0px 4px 4px rgba(0, 0, 0, 0.25);">
                                        View Book Upload Checklist
                                    </button>
                                </div>
                                <div class="card-body bg-light rounded-0">
                                    <div class="row">
                                        <div class="col-md-12 px-5">
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
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row mb-2 mt-5 text-right me-5">
                            <div class="col-md-12 mt-5 text-right d-flex justify-content-end">
                                <button class="btn next py-3 px-5 step-back" data-step="1">
                                    Next
                                    <i class="fas fa-arrow-right"></i>
                                </button>
                            </div>
                        </div>
                    </div>


                </div>
            </div>

            @include('frontend.user.upload.ui.about-book')
            @include('frontend.user.upload.ui.category')
            @include('frontend.user.upload.ui.project')
            @include('frontend.user.upload.ui.overview')
        </div>

        <div class="col-md-3 d-none d-md-block mx-auto" style="background-color: #242254 !important;align-items:center;background:url({{ asset('images/background.png') }});background-size:cover;">
            <div class=" px-0 ps-5  ms-2">
                <div class="row first mt-4">
                    <div class="col-md-8">
                        <div class="information-circle-disabled active-circle" data-step='1' style="display:flex;justify-content:center;align-items:center">
                            <img src="{{ asset('images/1.png') }}" class="current-image d-none" style="width:25px; height: 25px;" />
                        </div>
                        <div class="information-disabled active-text">
                            Upload PDF
                        </div>
                        <div class="information-line-disabled active-line">
                        </div>
                    </div>
                </div>

                <div class="row second">
                    <div class="col-md-8 ">
                        <div class="information-circle-disabled" data-step='1' style="display:flex;justify-content:center;align-items:center">
                            <img src="{{ asset('images/1.png') }}" class="current-image d-none" style="width:25px; height: 25px;" />
                        </div>
                        <div class="information-disabled">
                            About your Book
                        </div>
                        <div class="information-line-disabled">
                        </div>
                    </div>
                </div>

                <div class="row third">
                    <div class="col-md-8 ">
                        <div class="information-circle-disabled" data-step='1' style="display:flex;justify-content:center;align-items:center">
                            <img src="{{ asset('images/1.png') }}" class="current-image d-none" style="width:25px; height: 25px;" />
                        </div>
                        <div class="information-disabled">
                            Book Category
                        </div>
                        <div class="information-line-disabled">
                        </div>
                    </div>
                </div>

                <div class="row fourth">
                    <div class="col-md-8 ">
                        <div class="information-circle-disabled" data-step='1' style="display:flex;justify-content:center;align-items:center">
                            <img src="{{ asset('images/1.png') }}" class="current-image d-none" style="width:25px; height: 25px;" />
                        </div>
                        <div class="information-disabled">
                            Select a Project
                        </div>
                        <div class="information-line-disabled active-line">
                        </div>
                    </div>
                </div>

                <div class="row five">
                    <div class="col-md-8 ">
                        <div class="information-circle-disabled" data-step='1' style="display:flex;justify-content:center;align-items:center">
                            <img src="{{ asset('images/1.png') }}" class="current-image d-none" style="width:25px; height: 25px;" />
                        </div>
                        <div class="information-disabled">
                            Book Summary and Preview
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
                            <div class="progress-bar" style="width: 2%;" role="progressbar" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100"></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>


    </div>
</div>
@endsection

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

<script type="text/javascript">
    $("button.step-back").click(function(event) {
        event.preventDefault();
        let currentButton = $(this);
        // query select for all input field for currently selected 
        const inputs = [...$(currentButton).closest(".main").find("input")];
        if (!$(this).hasClass('next')) {
            var allValid = true;
        } else {
            var allValid = inputs.every(input => input.reportValidity());
        }
        if (allValid) {
            $(currentButton).closest(".main").fadeOut('fast', function() {
                if (currentButton.data('step') == 1) {
                    $('.step-one-row').fadeIn('fast').removeClass("d-none");
                    $("div.first").find(".information-circle-disabled").addClass('active-circle')
                    $("div.first").find(".current-image").removeClass('d-none')
                    $("div.second").find(".information-circle-disabled").addClass('active-circle')
                    $("div.second").find(".current-image").addClass('d-none')
                    $("div.second").find(".information-disabled").addClass('active-text')
                    $("div.third").find(".information-circle-disabled").removeClass('active-circle')
                    $("div.third").find(".information-disabled").removeClass('active-text')

                    $(".progress-bar").css("width", "20%")
                    $(".percent-complete").text("80%")
                    $(".step-count").text("2")
                    $(".social-login-row").fadeOut();

                }

                if (currentButton.data('step') == 2) {
                    $('.step-two-row').fadeIn("fast").removeClass("d-none");
                    $("div.third").find(".information-circle-disabled").addClass('active-circle')
                    $("div.third").find(".information-disabled").addClass('active-text')
                    $("div.second").find(".current-image").removeClass('d-none')
                    $("div.third").find(".current-image").addClass('d-none')

                    $(".progress-bar").css("width", "40%")
                    $(".percent-complete").text("60%")
                    $(".step-count").text("3")
                    $(".social-login-row").fadeOut();
                    $("div.fourth").find(".information-circle-disabled").removeClass('active-circle')
                    $("div.fourth").find(".information-disabled").removeClass('active-text')


                }


                if (currentButton.data('step') == 3) {
                    $('.step-third-row').fadeIn("fast").removeClass("d-none");
                    $("div.fourth").find(".information-circle-disabled").addClass('active-circle')
                    $("div.fourth").find(".information-disabled").addClass('active-text')
                    $("div.third").find(".current-image").removeClass('d-none')
                    $("div.four").find(".current-image").addClass('d-none')

                    $(".progress-bar").css("width", "80%")
                    $(".percent-complete").text("40%")
                    $(".step-count").text("4")
                    $(".social-login-row").fadeOut();


                }
                if (currentButton.data('step') == 4) {
                    $('.step-four-row').fadeIn("fast").removeClass("d-none");
                    $("div.five").find(".information-circle-disabled").addClass('active-circle')
                    $("div.five").find(".information-disabled").addClass('active-text')
                    $("div.fourth").find(".current-image").removeClass('d-none')

                    $(".progress-bar").css("width", "100%")
                    $(".percent-complete").text("0%")
                    $(".step-count").text("4")
                    $(".social-login-row").fadeOut();


                }

                if (currentButton.data('step') == 0) {
                    $(".step-zero-row").fadeIn('fast').removeClass("d-none");
                    $("div.first").find(".information-circle-disabled").addClass('active-circle')
                    $("div.first").find(".current-image").addClass('d-none')

                    $("div.second").find(".information-circle-disabled").removeClass('active-circle')
                    $("div.second").find(".current-image").addClass('d-none')
                    $("div.second").find(".information-disabled").removeClass('active-text');
                    $(".progress-bar").css("width", "2%")
                    $(".percent-complete").text("100%")
                    $(".step-count").text("1")
                    $(".social-login-row").fadeIn();
                }
            }).addClass("d-none")

        }

    })
    var lastEmail = ""
    $("input[type='email']").focusout(function(event) {

        var inputEmail = $(this);
        console.log('Last Email: ', lastEmail);
        if (lastEmail == inputEmail) {
            return;
        }
        lastEmail = inputEmail;
        if ($("#email_error")) {
            $("#email_error").remove();
        }
        const validateEmail = () => {
            return String($(this).val())
                .toLowerCase()
                .match(
                    /^(([^<>()[\]\\.,;:\s@"]+(\.[^<>()[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/
                );
        };
        if (!validateEmail()) {
            $(inputEmail).addClass("border border-danger");
        } else {
            $.ajax({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                beforeSend: function() {
                    $("form#registerForm").find('button').prop('disabled', true);
                    $(inputEmail).attr("disabled", true);
                    $processing = "<div style='font-family:Inter !important;color:#6076D1 !important' class='text-info' id='email_processing_text'>validating email...</div>"
                    $(inputEmail).parent('div').append($processing);
                },
                complete: function() {
                    $(inputEmail).removeAttr("disabled");
                    $("#email_processing_text").remove();
                },
                method: "POST",
                data: "email=" + $(inputEmail).val() + "&_token=" + $('meta[name="csrf-token"]').attr('content'),
                url: "{{ route('email_verify') }}",
                success: function(response) {
                    if ($("#password").val() === $("#confirm_password").val()) {
                        $("form#registerForm").find('button').prop('disabled', false);
                    }
                    if ($(inputEmail).hasClass("border-danger")) {
                        $(inputEmail).removeClass("border-danger");
                        $(inputEmail).addClass('border-success');
                    }
                },
                error: function(response, status) {
                    parseResponse = JSON.parse(response.responseText);
                    if (response.status == 422) {
                        let s_response_text = parseResponse.errors.email[0];
                        $text = `<div id='email_error' class='text-danger'>${s_response_text}</div>`;
                        $(inputEmail).parent("div").append($text);
                    }
                },
                statusCode: {
                    422: function(response) {
                        console.log(response);
                        if (!$(inputEmail).hasClass("border border-danger")) {
                            $(inputEmail).addClass("border border-danger");
                        }
                    }
                }
            })
        }

    })

    $("#confirm_password").focusout(function() {
        if ($("#passwordText")) {
            $("#passwordText").remove();
        }
        var password = $("#password");
        if ($(password).val() !== $(this).val() || $(this).val() == "") {
            $("form#registerForm").find('button').prop('disabled', true);
            $(this).parent('div').append("<p id='passwordText' class='text-danger'>Confirm Password doesn't match</p>");
        } else if (!$("input[type='email']").hasClass('border-danger')) {
            $("form#registerForm").find('button').prop('disabled', false);

        }
    })

    $("#canva").change(function(event) {
        console.log($(this).val());
        if ($(this).val() == "no") {
            $(".canva-term").fadeOut("medium", function() {
                $(this).find("input").attr("required", false)
            });
        } else {
            if ($(this).val() == "yes") {
                $('.canva-term').fadeIn('fast', function() {
                    $(this).find("input").attr("required", true)
                });
            }
        }
    })

    $(function() {
        $('#search').on('keyup', function() {
            var pattern = $(this).val();
            $('.searchable-container .items').hide();
            $('.searchable-container .items').filter(function() {
                return $(this).text().match(new RegExp(pattern, 'i'));
            }).show();
        });
    });
</script>

@endpush
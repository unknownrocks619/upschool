@extends("themes.frontend.master")

@section("page_title")
::Register
@endsection

@push("custom_css")
<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Inter&display=swap" rel="stylesheet">
<style type="text/css">
    p {
        font-family: 'Inter', sans-serif !important;
    }

    .social-login {
        font-family: 'Inter'sans-serif !important;
        font-weight: 600;
        color: #03014C !important
    }

    label {
        font-family: 'Inter';
        font-weight: 400;
        line-height: 23px;
        font-size: 19px;
    }

    .dynamic-padding {
        padding-left: 80px !important;
        /* padding-right: 20px !important; */
    }

    input {
        box-shadow: none;
        font-family: "Inter";


    }

    .next {
        background: #242254;
        color: #fff;
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

    .done {}

    .first {
        margin-top: 75px;
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

    .steps:hover {
        background: #242254 !important;
    }

    .signup-progress-bar {
        margin-top: 175px;
        text-align: left;

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

<div class="container mb-11 d-flex justify-content-center mx-auto px-0" style="min-height:100vh;align-items:center">
    <div class="row px-0 mx-auto">
        <!-- Row -->
        <div class="col-md-12 pl-0 ml-0 mx-auto step-parent pb-5" style="padding-left:0px !important;">
            <!-- Step Zero -->

            <div class="row ">
                <div class="col-md-12">
                    <div class="bg-white pt-3 ps-5 dynamic-padding" style="height:100%">
                        <h4 class="mb-0 text-danger" style="line-height:42px;color:#D61A5F !important">
                            Oops ! Your Link has expired.
                        </h4>

                    </div>
                </div>
            </div>
            <form id="verificationForm" action="{{ route('frontend.user.registration.resend-link') }}" method="post" class="mb-5">
                <div class="row step-zero-row main">
                    <div class="col-md-12">
                        <div class="bg-white pt-3 ps-5 dynamic-padding" style="height:100%">
                            <x-flash></x-flash>
                            @csrf
                            @google_captcha()
                            <div class="row me-5 mt-3">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label for="email" class="mb-2 fs-5" style="color: #03014C !important;font-weight:700;line-height:42px;">Please provide your email to re-send your verification link.
                                            <!-- <sup class="text-danger">*</sup> -->
                                        </label>
                                        <input value="{{ old('email') }}" type="text" name="email" class="py-4 form-control rounded-3 @error('email') border border-danger @enderror" id="email" placeholder="youremail@email.com" required />
                                        @error("email")
                                        <div class="text-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                            </div>

                            <div class="row mt-4 text-right me-5">
                                <div class="col-md-12 text-right d-flex justify-content-end">
                                    <button class="w-100 btn btn-primary next py-3 px-5 step-back" type="submit">
                                        Re-Send Verification Link
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row step-zero-row main mt-4">
                    <div class="col-md-12">
                        <div class="bg-white pt-3 ps-5 dynamic-padding" style="height:100%">
                            <p style="color:#03014C">
                                Don’t have an Upschool account? <a href="{{ route('register') }}" class="text-danger" style="color:#242254 !important">Sign up</a>
                            </p>
                        </div>
                    </div>
                </div>
            </form>


        </div>

        <!-- <div class="col-md-4 d-none d-md-block mx-auto px-0 ps-5" style="background-color: #242254 !important;align-items:center;background-image:url({{-- asset('images/upschool-fly.png') --}});background-repeat:no-repeat;background-size:contain">
        </div> -->


    </div>
</div>
@endsection

@push("custom_scripts")
<script src="https://www.google.com/recaptcha/api.js?render={{ config('captcha.google.site_key') }}"></script>

<script>
    grecaptcha.ready(function() {
        document.getElementById('verificationForm').addEventListener("submit", function(event) {
            $(this).children("input").prop('disabled');
            event.preventDefault();
            grecaptcha.execute("{{ config('captcha.google.site_key') }}", {
                    action: 'login'
                })
                .then(function(token) {
                    document.getElementById("recaptcha_token").value = token;
                    document.getElementById('verificationForm').submit();
                });
        });
    });
</script>
@endpush
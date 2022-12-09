@extends("themes.frontend.master")

@section("page_title")
::Rest Password
@endsection

@push("custom_css")
<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Inter&display=swap" rel="stylesheet">
<style type="text/css">
    p {
        font-family: 'Inter' !important;
    }

    .social-login {
        font-family: 'Inter' !important;
        font-weight: 600;
        color: #03014C !important
    }

    .btn-outline-secondary:hover {
        background-color: #f7f7f7 !important;

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

    .signup-progress-bar {
        margin-top: 175px;
        text-align: left;

    }

    .steps>p {
        font-size: 14px !important;
        font-family: "Inter";
    }

    .btn-primary:disabled {
        background-color: #666578 !important;
    }

    .btn-primary:hover {
        background: #242254 !important;
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

<div class="container mb-11 mx-auto px-0">
    <div class="row px-0 mx-auto mb-5">
        @if(session()->has('success'))
        <div class="row me-5 mt-4 mx-auto" style="min-height: 100vh;">
            <div class="col-md-8 mt-4 py-4 mx-auto">
                <div class="bg-white py-5 ps-5 dynamic-padding" style="color:#03014C !important;font-size:20px;font-family:'Lexend'">
                    We'll send password reset instructions to the email address associated with your account.
                </div>
            </div>
        </div>
        @else
        <!-- Row -->
        <div class="mt-5  col-md-8 pl-0 ml-0 mx-auto step-parent pb-5 bg-white" style="padding-left:0px !important;">
            <div class="row bg-white px-0 mx-0">
                <div class="col-md-12 ps-2">
                    <div class="bg-white pt-5 mt-3 ps-5 dynamic-padding" style="height:100%">
                        <p class="mt-3" style="color:#03014C !important;font-family:'Lexend' !important;font-size:20px;line-height:25px;">
                            We'll send password reset instructions to the email address associated with your account.
                        </p>
                    </div>
                </div>
            </div>
            <form method="POST" id="loginForm" action="{{ route('frontend.user.reset_link') }}">
                @google_captcha()
                <div class="row step-zero-row main">
                    <div class="col-md-12">
                        <div class="bg-white pt-3 ps-5 dynamic-padding" style="height:100%">
                            <!-- <x-alert></x-alert> -->
                            @csrf
                            <div class="row me-5">
                                <div class="col-md-12">
                                    <div class="form-group">

                                        <label for="email" class="mb-2" style="color:#03014C !important;font-size:20px;font-weight:700;font-family:'Lexend'">
                                            Enter Email Address
                                        </label>
                                        <input value="{{ old('email') }}" type="text" name="email" class="py-4 form-control rounded-3 @error('email') border border-danger @enderror" id="email" placeholder="" />
                                        @error("email")
                                        <div class="text-danger" style="font-weight:700;color:#B81242 !important;font-family:'Inter' !important;font-size:17px !important;">{{ $message }}</div>
                                        @enderror

                                    </div>
                                </div>
                            </div>
                            <div class="row mt-4 text-start me-5">
                                <div class="col-md-12 text-start mt-4 d-flex justify-content-start">
                                    <button class="btn btn-primary next py-3 px-5 login-button" type="submit">
                                        Reset Password
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
        </div>

        <div class="col-md-8 pl-0 dynamic-padding ml-0 mx-auto step-parent pb-5 bg-white" style="color:#03014C !important; font-weight:700">
            Don’t have an Upschool account? <a href="{{ route('register') }}" class="text-danger" style="color:#D61A5F !important;text-decoration:none">Sign up</a>
        </div>
        @endif
    </div>
</div>
@endsection

@push("custom_scripts")
<script src="https://www.google.com/recaptcha/api.js?render={{ config('captcha.google.site_key') }}"></script>

<script type="text/javascript">
    grecaptcha.ready(function() {
        document.getElementById('loginForm').addEventListener("submit", function(event) {
            $(this).find('button').text('Please wait...');
            $(this).find('input').prop('readonly', true);
            $(this).find('button').prop('disabled', true);
            event.preventDefault();
            grecaptcha.execute("{{ config('captcha.google.site_key') }}", {
                    action: 'login'
                })
                .then(function(token) {
                    document.getElementById("recaptcha_token").value = token;
                    document.getElementById('loginForm').submit();
                });
        });
    });
</script>
@endpush
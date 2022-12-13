@extends("themes.frontend.master")

@section("page_title")
::Register
@endsection

@push("custom_css")
<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Inter&display=swap" rel="stylesheet">
<style type="text/css">
    body {
        background-color: #f4f4f4 !important;
    }

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

    a {
        font-family: 'Inter' !important;
    }

    @media only screen and (max-width: 600px) {
        .dynamic-padding {
            /* padding-left: 10px !important; */
            /* padding-right: 10px !important; */
        }
    }
</style>
@endpush

@section("content")

<div class="container mb-11 mx-auto px-0" style="margin-top:80px; margin-bottom:80px;">
    <div class="row px-0 mx-auto">
        <!-- Row -->
        <div class="col-md-7 pl-0 ml-0 mx-auto step-parent pb-4 bg-white" style="padding-left:0px !important;">
            <!-- Step Zero -->
            <?php
            $rateLimit = Illuminate\Support\Facades\RateLimiter::tooManyAttempts(request()->ip(), 3);
            ?>
            @if ( ! $rateLimit )
            <div class="row bg-white px-0 mx-0">
                <div class="col-md-12 ps-2">
                    <div class="bg-white pt-5 mt-3 ps-5 dynamic-padding" style="height:100%">
                        <h4 class="mb-0" style="color: #03014C !important;font-weight:700;line-height:42px;font-size:33px;font-family:'Lexend'">Welcome Back to Upschool.co</h4>
                        <p class="mt-3" style="color:#242254 !important;font-family:'Inter' !important;font-size:18px">
                            Sign in to continue to your account.
                        </p>

                        <!-- <div class="row mb-3 me-5">
                            <div class="col-md-6 mt-4 col-sm-12 col-xs-12 col-lg-6 ">
                                <form action="{{-- route('google-register') --}}" method="post">
                                    @csrf
                                    <button formaction="{{-- route('google-register') --}}" type="submit" class="btn btn-outline-secondary px-4 py-4 social-login w-100">
                                        <img src="{{-- asset('images/3.png') --}}" style="width:25px; height: 25px;position:relative;top: -4px; left:-14px;" />
                                        Continue With Google
                                    </button>
                                </form>
                            </div>
                            <div class="col-md-6 mt-4 col-lg-6 col-sm-12 col-xs-12">
                                <form action="{{-- route('facebook-register') --}}" method="post">
                                    @csrf
                                    <button formaction="{{-- route('facebook-register') --}}" type="submit" class="btn btn-outline-secondary px-4 py-4 w-100  social-login">
                                        <img src="{{-- asset('images/4.png') --}}" style="width:25px; height: 25px;position:relative;top: -4px; left:-14px;" /> Continue with Facebook
                                    </button>
                                </form>
                            </div>
                        </div> -->

                    </div>
                </div>
            </div>
            <form method="POST" id="loginForm" action="{{ route('login') }}">
                <div class="row step-zero-row main">
                    <div class="col-md-12">
                        <div class="bg-white pt-3 ps-5 dynamic-padding" style="height:100%">
                            <!-- <x-alert></x-alert> -->
                            @csrf
                            <div class="row me-5">
                                <div class="col-md-12">
                                    <div class="form-group">

                                        @error("email")
                                        <div class="text-danger mb-2" style="font-weight:700;color:#B81242 !important;font-family:'Inter' !important;font-size:17px !important;">{{ $message }}</div>
                                        @enderror
                                        <input value="{{ old('email') }}" type="text" style="font-family:'Inter'" name="email" class="py-4 form-control rounded-3 @error('email') border border-danger @enderror w-100" id="email" placeholder="Email Address" />

                                    </div>
                                </div>
                            </div>
                            <div class="row mt-1 me-5">
                                <div class="col-md-12 mt-1">
                                    <div class="form-group mt-3">
                                        <input required type="password" style="font-family:'Inter' !important" value="{{ old('password') }}" name="password" placeholder="Password" class="py-4 rounded-3 form-control @error('password') border border-danger @enderror" id="password" />
                                        @error('password')
                                        <div class="text-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                            <div class="row mt-4 me-5">

                                <div class="col-md-12  d-flex justify-content-start">
                                    <input id="remember" style="width:22px; height: 22px;" type="checkbox" name="remember" value="1" />

                                    <label for="remember" class="mb-2 ms-2 pt-0">
                                        Keep me logged in until I log out
                                    </label>
                                </div>
                                @google_captcha()
                            </div>
                            <div class="row mt-4 text-right me-5">
                                <div class="col-md-12 text-right d-flex justify-content-end">
                                    <button class="w-100 btn btn-primary next py-3 px-5 login-button" type="submit">
                                        Sign In
                                    </button>
                                </div>
                            </div>

                            <div class="row mt-4">
                                <div class="col-md-6" style="color:#03014C;font-size:17px; font-family:'Inter';font-weight:700">
                                    <a style="color:#03014C !important;text-decoration:none" href="{{ route('password.request') }}">Forgot Password?</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
        </div>
        <!-- <div class="row mt-2"> -->
        <div class="col-md-7 pl-0 dynamic-padding ml-0 mx-auto step-parent pb-5 bg-white" style="color:#03014C !important; font-weight:400">
            Don’t have an Upschool account? <a href="{{ route('register') }}" class="text-danger" style="color:#D61A5F !important;text-decoration:none">Sign up</a>
        </div>
        <!-- </div> -->
        @else
        <div class="row me-5" style="min-height: 100vh;">
            <div class="col-md-12">
                <div class="bg-white pt-3 ps-5 dynamic-padding" style="height:100%">
                    <div class="alert alert-danger">
                        ! Too many invalid attempt, Please try again after few minute.
                    </div>
                </div>
            </div>
        </div>
        @endif
    </div>
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
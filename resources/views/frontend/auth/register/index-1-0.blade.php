@extends("themes.frontend.master")

@section("page_title")
| Register
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

    .social-login:hover {
        background: #CFCFCF !important;
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

<div class="container border-start mb-11 mx-auto px-0">
    <div class="row px-0 mx-auto">
        <!-- Row -->
        <div class="col-md-8 pl-0 ml-0 mx-auto step-parent" style="padding-left:0px !important;">
            <!-- Step Zero -->

            <div class="row ">
                <div class="col-md-12">
                    <div class="bg-white pt-5 mt-3 pb-3 ps-5 dynamic-padding" style="height:100%">
                        <div class="row me-5 social-login-row">
                            <h4 class="mb-0" style="color: #03014C !important;font-weight:700;line-height:42px;">Create Your Upschool Account </h4>
                            <p>
                                You are a few clicks away from creating your account.
                            </p>
                            @if(settings('google_login'))
                            <div class="col-md-6 mt-2 col-sm-12 col-xs-12 col-lg-6 ">
                                <form action="{{ route('google-register') }}" method="post">
                                    @csrf
                                    <button formaction="{{ route('google-register') }}" type="submit" class="btn btn-outline-secondary px-4 py-3 social-login w-100">
                                        <img src="{{ asset('images/3.png') }}" style="width:25px; height: 25px;position:relative;top: -4px; left:-14px;" />
                                        Continue With Google
                                    </button>
                                </form>
                            </div>
                            @endif
                            @if(settings('facebook_login'))
                            <div class="col-md-6 mt-2 col-lg-6 col-sm-12 col-xs-12">
                                <form action="{{ route('facebook-register') }}" method="post">
                                    @csrf
                                    <button formaction="{{ route('facebook-register') }}" type="submit" class="btn btn-outline-secondary px-4 py-3 w-100  social-login">
                                        <img src="{{ asset('images/4.png') }}" style="width:25px; height: 25px;position:relative;top: -4px; left:-14px;" /> Continue with Facebook
                                    </button>
                                </form>
                            </div>
                            @endif

                            @if( settings("google_login") || settings("facebook_login") )
                            <div class="row me-5">
                                <div class="col-md-12 mb-3 mt-4 ms-1">
                                    <div class="border-bottom"></div>
                                </div>
                            </div>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
            <form method="POST" id="registerForm" action="{{ route('register') }}">
                <div class="row step-zero-row main">
                    <div class="col-md-12">
                        <div class="bg-white ps-5 dynamic-padding" style="height:100%">
                            <x-alert></x-alert>
                            @csrf
                            <div class="row me-5">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="first_name" class="mb-2">First Name
                                            <sup class="text-danger">*</sup>
                                        </label>
                                        <input value="{{ old('first_name') }}" type="text" name="first_name" class="py-3 form-control rounded-3 @error('first_name') border border-danger @enderror" id="first_name" placeholder="Your First Name" required />
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="last_name" class="mb-2">Last Name </label>
                                        <input type="text" value="{{ old('last_name') }}" name="last_name" class="py-3 rounded-3 form-control @error('last_name') border border-danger @enderror" id="last_name" placeholder="Your Last Name" />
                                    </div>
                                </div>
                            </div>
                            <div class="row mt-2 me-5">
                                <div class="col-md-12 mt-1">
                                    <div class="form-group">
                                        <label for="email" class="mb-2">Email address
                                            <sup class="text-danger">*</sup>
                                        </label>
                                        <input required type="email" value="{{ old('email') }}" name="email" placeholder="name@example.com" class="py-3 rounded-3 form-control @error('email') border border-danger @enderror" id="email" />
                                        @error('email')
                                        <div class="text-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                            <div class="row mt-4 me-5">
                                <div class="col-md-6">
                                    <div class="form-group ">
                                        <label for="password" class="mb-2">
                                            Password
                                            <sup class="text-danger">*</sup>
                                        </label>
                                        <input required value="{{ old('password') }}" placeholder="Password" type="password" name="password" id="password" class="py-3 rounded-3 form-control @error('password') border border-danger @enderror" />
                                        @error('password')
                                        <div class="text-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                                @google_captcha()

                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="confirm_password" class="mb-2">
                                            Confirm Password
                                            <sup class="text-danger">*</sup>
                                        </label>
                                        <input required placeholder="Confirm Password" type="password" value="{{ old('password_confirmation') }}" name="password_confirmation" class="py-3 rounded-3 form-control @error('password_confirmation') border border-danger @enderror" id="confirm_password" />
                                        @error('password_confirmation')
                                        <div class="text-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                            <div class="row mb-2 mt-4 text-right me-5">
                                <div class="col-md-12 text-right d-flex justify-content-end">
                                    <button class="btn next py-3 px-5 step-back" data-step="1">
                                        Next
                                        <i class="fas fa-arrow-right"></i>
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Step One -->
                <div class="row step-one-row d-none main">
                    <div class="col-md-12">
                        <div class="bg-white pt-3 ps-5 dynamic-padding" style="height:100%">
                            <h4 class="mb-0" style="color: #03014C !important;font-weight:700;line-height:42px;">Create Your Upschool Account </h4>
                            <p>
                                You are a few clicks away from creating your account.
                            </p>

                            <div class="row me-5">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label for="country" class="mb-2">Select Your Country
                                            <sup class="text-danger">*</sup>
                                        </label>
                                        <select name="country" class="form-control form-select py-3 rounded-3 @error('country') border border-danger @enderror" id="country" style="font-family:'Inter'">
                                            @foreach ($countries as $country)
                                            <option value="{{ $country->id }}" @if($country->id == 13) selected @endif>{{ $country->name }}</option>
                                            @endforeach
                                        </select>
                                        @error("country")
                                        <div class="text-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                            <div class="row mt-4 me-5">
                                <div class="col-md-12 mt-3">
                                    <div class="form-group">
                                        <label for="email" class="mb-2">What Describes You?
                                            <sup class="text-danger">*</sup>
                                        </label>
                                        <select name="role" id="role" class="py-3 rounded-3 form-control form-select @error('role') border border-danger @enderror" style="font-family:'Inter'">
                                            <option value="parent" @if(old('role')=='parent' ) selected @endif>Parent of Student</option>
                                            <option value="student-above" @if(old('role')=='student-above' ) selected @endif>Student Above 18</option>
                                            <option value="student-below" @if(old('role')=='student-under' ) selected @endif>Student Below 18</option>
                                            <option value="teacher" @if(old('role')=='teacher' ) selected @endif>School Teacher</option>
                                        </select>
                                        @error("role")
                                        <div class="text-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                            <div class="row mt-4 me-5">
                                <div class="col-md-12 mt-3">
                                    <div class="form-group">
                                        <label for="date_of_birth" class="mb-2">Your Date of Birth
                                            <sup class="text-danger">*</sup>
                                        </label>
                                        <input required="true" type="date" min="1920-01-01" max="2022-12-31" value="{{ old('date_of_birth') }}" name="date_of_birth" id="date_of_birth" class="form-control py-3 rounded-3 @error('date_of_birth') border border-danger @enderror" />
                                        @error("date_of_birth")
                                        <div class="text-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                            <div class="row mt-4 pt-4 text-right me-5">
                                <div class="col text-start pt-3">
                                    <button data-step="0" class="step-back btn btn-link mt-2 pt-1" style="color:#242254;font-weight:400;text-decoration:underline;font-size:18px;line-height:25.42px;font-family:'Inter'">
                                        <i class=" fas fa-arrow-left"></i>
                                        Go back
                                    </button>
                                </div>
                                <div class="col mt-3 text-right d-flex justify-content-end">
                                    <button class="btn btn-primary next py-3 px-5 step-back" data-step="2">
                                        Next
                                        <i class="fas fa-arrow-right"></i>
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Step Three -->
                <div class="row step-two-row d-none main">
                    <div class="col-md-12">
                        <div class="bg-white pt-3 ps-5 dynamic-padding" style="height:100%">
                            <div class="row">
                                <div class="col-md-12">
                                    <h4 class="mb-0" style="color: #03014C !important;font-weight:700;line-height:42px;font-size:34px;">Your Canva Account </h4>
                                </div>
                                <div class="col-md-10">
                                    <p style="font-size:19px;color:#242254" class="mt-4 pt-4">
                                        Thanks to a collaboration between Upschool and Canva, registered Upschool users can receive a FREE Canva for Education account! This means you can create incredible graphic designs, images, books, and a range of other creative products using Canva's premium design package at no cost.
                                    </p>

                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-10">
                                    <h3 class="" style="color: #242254 !important;font-weight:700;line-height:22.99px;font-size:19px;">
                                        Canva is an essential tool used in many of Upschool’s courses, and we highly recommend you register.
                                    </h3>
                                </div>
                            </div>
                            <div class="row me-5 mt-3">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label for="canva" class="mb-2">Would you like to register for a FREE Canva for Education account?
                                            <sup class="text-danger">*</sup>
                                        </label>
                                        <select name="canva" id="canva" autocomplete="off" class="py-3 rounded-3 form-control form-select @error('canva') border bordered-danger @enderror">
                                            <option value="yes" @if(old('canva') !='no' ) selected @endif>Yes</option>
                                            <option value="no" @if(old('canva')=='no' ) selected @endif>No</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="row mt-4 me-5">

                                <div class="col-md-12 mt-3 canva-term">
                                    <div class="form-group">
                                        <div class="row">
                                            <div class="col-md-1 mt-3">
                                                <input type="checkbox" @if(old('canva')=="yes" && old('personal_detail')) checked @endif required value="1" name="personal_detail" id="personal_detail" style="width:30px; height:30px;" />
                                                <span></span>

                                            </div>
                                            <div class="col-md-10">
                                                <label for="personal_detail" class="mb-2">I acknowledge and accept that my name and email address may be visible to Upschool users registered with Canva.
                                                    <sup class="text-danger">*</sup>
                                                </label>

                                            </div>
                                        </div>
                                        @error("personal_detail")
                                        <div class="text-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>


                                <div class="col-md-12 mt-3 canva-term">
                                    <div class="form-group">
                                        <div class="row">
                                            <div class="col-md-1 mt-3">
                                                <input @if(old('canva')=="yes" && old('canva_free')) checked @endif type="checkbox" required value="1" name="canva_free" id="canva_free" style="width:30px; height:30px;" />
                                                <span></span>

                                            </div>
                                            <div class="col-md-10">
                                                <label for="canva_free" class="mb-2">I acknowledge that should I not wish to have my details visible to other users, I can instead sign up for free Canva basic here.
                                                    <sup class="text-danger">*</sup>
                                                </label>

                                            </div>
                                        </div>
                                        @error("canva_free")
                                        <div class="text-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>


                                <div class="col-md-12 mt-3">
                                    <div class="form-group">
                                        <div class="row">
                                            <div class="col-md-1 mt-1">
                                                <input type="checkbox" @if(old('terms')) checked @endif required value="1" name="terms" id="terms" style="width:30px; height:30px;" />
                                                <span></span>

                                            </div>
                                            <div class="col-md-10">
                                                <label for="terms" class="mb-2">I agree to Upschool’s <a href="" style="color:#242254;font-family:'Inter'">Terms and Conditions</a> and <a href="" style="color:#242254;font-family:'Inter'">Privacy Policy</a>.
                                                    <sup class="text-danger">*</sup>
                                                </label>

                                            </div>
                                        </div>
                                        @error("terms")
                                        <div class="text-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>


                            </div>
                            <div class="row mt-4 pt-4 text-right me-5">
                                <div class="col text-start pt-3">
                                    <button class="step-back btn bnt-link mt-2 pt-1" data-step="1" style="color:#242254;font-weight:400;text-decoration:underline;font-size:18px;line-height:25.42px;font-family:'Inter'">
                                        <i class=" fas fa-arrow-left"></i>
                                        Go back
                                    </button>
                                </div>
                                <div class="col mt-3 text-right d-flex justify-content-end mb-5">
                                    <button type="submit" class="btn btn-primary next py-3 px-5" data-step="2">
                                        Register
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
        </div>
        <div class="col-md-4 d-none d-md-block mx-auto" style="background-color: #242254 !important;align-items:center;background:url({{ asset('images/background.png') }});background-size:cover;">
            <div class="row mx-auto">
                <div class="col-md-12 text-center mt-5 pt-1">
                    <img src="{{ asset('images/upschool-banner.png') }}" alt="" class="w-75">
                </div>
            </div>
            <div class=" px-0 ps-5  ms-2">
                <div class="row first mt-4">
                    <div class="col-md-8">
                        <div class="information-circle-disabled active-circle" data-step='1' style="display:flex;justify-content:center;align-items:center">
                            <img src="{{ asset('images/1.png') }}" class="current-image d-none" style="width:25px; height: 25px;" />
                        </div>
                        <div class="information-disabled active-text">
                            Account Information
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
                            About You
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
                            Your Canva Account
                        </div>
                    </div>
                </div>
                <div class="row signup-progress-bar ps-3 mb-5 pb-5">
                    <div class="col-md-12 steps p-0 m-0 mt-5">
                        <p class="p-0 m-0 text-left"><span class="step-count">1</span> to 3 Steps</p>
                    </div>
                    <div class="progress-title col-md-12">
                        <h5><span class="percent-complete">100%</span> to Complete</h5>
                    </div>
                    <div class="col-md-12 bar mt-2 ps-0">
                        <div class="progress w-75" style="background-color: #B4C8E8;">
                            <div class="progress-bar" style="width: 5%;" role="progressbar" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100"></div>
                        </div>
                    </div>
                    <div class="col-md-12 already-exists ps-0 mb-5" style="color: #fff;margin-top: 10px;font-weight:400">
                        <p>Already have an Account ? <a href="https://upschool.co/dashboard" class="text-white" style="text-decoration: none; font-weight:700;font-family:'Inter' !important">Login Here</a></p>
                    </div>
                </div>
            </div>
        </div>


    </div>
</div>
@endsection

@push("custom_scripts")
<script src="https://www.google.com/recaptcha/api.js?render={{ config('captcha.google.site_key') }}"></script>

<script type="text/javascript">
    $("button.step-back").click(function(event) {
        event.preventDefault();
        let currentButton = $(this);
        // query select for all input field for currently selected 
        const inputs = [...$(currentButton).closest(".main").find("input")];
        const allValid = inputs.every(input => input.reportValidity());

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

                    $(".progress-bar").css("width", "33%")
                    $(".percent-complete").text("67%")
                    $(".step-count").text("2")
                    $(".social-login-row").fadeOut();

                }

                if (currentButton.data('step') == 2) {
                    $('.step-two-row').fadeIn("fast").removeClass("d-none");
                    $("div.third").find(".information-circle-disabled").addClass('active-circle')
                    $("div.third").find(".information-disabled").addClass('active-text')
                    $("div.second").find(".current-image").removeClass('d-none')

                    $(".progress-bar").css("width", "67%")
                    $(".percent-complete").text("33%")
                    $(".step-count").text("3")
                    $(".social-login-row").fadeOut();


                }
                if (currentButton.data('step') == 0) {
                    $(".step-zero-row").fadeIn('fast').removeClass("d-none");
                    $("div.first").find(".information-circle-disabled").addClass('active-circle')
                    $("div.first").find(".current-image").addClass('d-none')

                    $("div.second").find(".information-circle-disabled").removeClass('active-circle')
                    $("div.second").find(".current-image").addClass('d-none')
                    $("div.second").find(".information-disabled").removeClass('active-text');
                    $(".progress-bar").css("width", "1%")
                    $(".percent-complete").text("100%")
                    $(".step-count").text("1")
                    $(".social-login-row").fadeIn();

                }
            }).addClass("d-none")

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

    grecaptcha.ready(function() {
        document.getElementById('registerForm').addEventListener("submit", function(event) {
            // $("#pre-submission").fadeOut("fast", function() {
            //     $("#spinner").fadeIn();
            // })
            $("#register :input").prop('disabled', true);
            event.preventDefault();
            grecaptcha.execute("{{ config('captcha.google.site_key') }}", {
                    action: 'register'
                })
                .then(function(token) {
                    document.getElementById("recaptcha_token").value = token;
                    document.getElementById('registerForm').submit();
                });
        });
    });
</script>

<style type="text/css">
    .grecaptcha-badge {
        display: none !important;
    }
</style>
@endpush
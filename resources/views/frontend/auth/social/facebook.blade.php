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

    .done {}

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
        margin-top: 20px;
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
        <div class="col-md-8 pl-0 ml-0 mx-auto step-parent " style="padding-left:0px !important;">
            <!-- Step Zero -->

            <div class="row ">
                <div class="register-title pt-5 mt-2 ps-5 ms-2 dynamic-padding">
                    <h4 class="mb-0" style="color: #03014C !important;font-weight:700;line-height:42px;">Create Your Upschool Account </h4>
                    <p>
                        You are a few clicks away from creating your account.
                    </p>

                </div>
                <div class="col-md-12">
                    <div class="bg-white pt-3 ps-5 dynamic-padding" style="height:100%">

                        <div class="row me-5">
                            <div class="col-md-12 my-1 ms-1">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <form method="POST" id="registerForm" action="{{ route('register') }}">
                @csrf
                @google_captcha()
                <?php
                foreach ($user_detail as $userKey => $userValue) {
                    echo "<input type='hidden' name='{$userKey}' value='{$userValue}' />";
                }
                ?>
                <!-- Step One -->
                <div class="row step-one-row  main">
                    <div class="col-md-12">
                        <x-alert></x-alert>
                        <div class="bg-white pt-2 ps-5 dynamic-padding" style="height:100%">
                            <div class="row me-5">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label for="country" class="mb-2">Select Your Country
                                            <sup class="text-danger">*</sup>
                                        </label>
                                        <select name="country" class="form-control form-select py-3 rounded-3 @error('country') border border-danger @enderror" id="country">
                                            @foreach ($countries as $country)
                                            <option value="{{ $country->id }}">{{ $country->name }}</option>
                                            @endforeach
                                        </select>
                                        @error("country")
                                        <div class="text-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                            <div class="row mt-4 me-5">
                                <div class="col-md-12 mt-2">
                                    <div class="form-group">
                                        <label for="email" class="mb-2">What Describes You?
                                            <sup class="text-danger">*</sup>
                                        </label>
                                        <select name="role" id="role" class="py-3 rounded-3 form-control form-select @error('role') border border-danger @enderror">
                                            <option value="parent" @if(old('role')=='parent' ) selected @endif>Parent of Student</option>
                                            <option value="student-above" @if(old('role')=='student-above' ) selected @endif>Student Above 18</option>
                                            <option value="student-below" @if(old('role')=='student-below' ) selected @endif>Student Below 18</option>
                                            <option value="teacher" @if(old('role')=='teacher' ) selected @endif>School Teacher</option>
                                        </select>
                                        @error("role")
                                        <div class="text-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                            <div class="row mt-2 me-5">
                                <div class="col-md-12 mt-3">
                                    <div class="form-group">
                                        <label for="email" class="mb-2">Your Date of Birth
                                            <sup class="text-danger">*</sup>
                                        </label>
                                        <input required="true" type="date" value="{{ old('date_of_birth') }}" name="date_of_birth" id="date_of_birth" class="form-control py-3 rounded-3 @error('date_of_birth') border border-danger @enderror" />
                                        @error("date_of_birth")
                                        <div class="text-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                            <div class="row mt-2 pt-2 text-right me-5">
                                <div class="col text-start pt-2">

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
                                        As part of your Upschool account, we are pleased to inform you that you can get a FREE Canva Pro Account for Education. This has been made possible through a collaboration between Canva and Upschool who, together, want to enable you to share your voice with the world.
                                    </p>

                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-10">
                                    <h3 class="" style="color: #242254 !important;font-weight:700;line-height:22.99px;font-size:19px;">
                                        We use Canva in many of our courses - so we recommend you get your pro account today.
                                    </h3>
                                </div>
                            </div>
                            <div class="row me-5 mt-3">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label for="first_name" class="mb-2">Would you like us to register you for a FREE Canva Pro Account?
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
                                                <label for="personal_detail" class="mb-2">I acknowledge and accept that my personal details (name, email) may be visible to Upschool users registered with Canva.
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
            <div class="row mx-auto mt-3">
                <div class="col-md-12 text-center mt-2">
                    <img src="{{ asset('images/upschool-banner.png') }}" alt="" class="w-75">
                </div>
            </div>
            <div class=" px-0 ps-5 ms-2">
                <div class="row first mt-4 ">
                    <div class="col-md-8">
                        <div class="information-circle-disabled active-circle" data-step='1' style="display:flex;justify-content:center;align-items:center">
                            <img src="{{ asset('images/1.png') }}" class="current-image " style="width:25px; height: 25px;" />
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
                        <div class="information-circle-disabled active-circle" data-step='1' style="display:flex;justify-content:center;align-items:center">
                            <img src="{{ asset('images/1.png') }}" class="current-image d-none" style="width:25px; height: 25px;" />
                        </div>
                        <div class="information-disabled active-text">
                            About You
                        </div>
                        <div class="information-line-disabled active-line">
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
                <div class="row signup-progress-bar ps-3 mb-2 pb-5">
                    <div class="col-md-12 steps p-0 m-0 mt-4">
                        <p class="p-0 m-0 text-left"><span class="step-count">2</span> to 3 Steps</p>
                    </div>
                    <div class="progress-title col-md-12">
                        <h5><span class="percent-complete">67%</span> to Complete</h5>
                    </div>
                    <div class="col-md-12 bar mt-2 ps-0">
                        <div class="progress w-75" style="background-color: #B4C8E8;">
                            <div class="progress-bar" style="width: 33%;" role="progressbar" aria-valuenow="33" aria-valuemin="0" aria-valuemax="100"></div>
                        </div>
                    </div>
                    <div class="col-md-12 already-exists ps-0 mb-5" style="color: #fff;margin-top: 10px;font-weight:400">
                        <p>Already have an Account ? <a href="#" class="text-white" style="text-decoration: none; font-weight:700;font-family:'Inter' !important">Login Here</a></p>
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
                    $(".register-title").fadeIn();

                }

                if (currentButton.data('step') == 2) {
                    $('.step-two-row').fadeIn("fast").removeClass("d-none");
                    $("div.third").find(".information-circle-disabled").addClass('active-circle')
                    $("div.third").find(".information-disabled").addClass('active-text')
                    $("div.second").find(".current-image").removeClass('d-none')

                    $(".progress-bar").css("width", "67%")
                    $(".percent-complete").text("33%")
                    $(".step-count").text("3")
                    $(".register-title").fadeOut()


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
@endpush
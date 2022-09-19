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

<div class="container border-start mb-11 mx-auto px-0">
    <div class="row px-0 mx-auto">
        <!-- Row -->
        <div class="col-md-8 pl-0 ml-0 mx-auto step-parent pb-5" style="padding-left:0px !important;">
            <!-- Step Zero -->

            <div class="row ">
                <div class="col-md-12">
                    <div class="bg-white pt-3 ps-5 dynamic-padding" style="height:100%">
                        <h4 class="mb-0" style="color: #03014C !important;font-weight:700;line-height:42px;">Log into your Upschool account!</h4>

                        <div class="row mb-3 me-5">
                            <div class="col-md-6 mt-4 col-sm-12 col-xs-12 col-lg-6 ">
                                <form action="{{ route('google-register') }}" method="post">
                                    @csrf
                                    <button formaction="{{ route('google-register') }}" type="submit" class="btn btn-outline-secondary px-4 py-4 social-login w-100">
                                        <img src="{{ asset('images/3.png') }}" style="width:25px; height: 25px;position:relative;top: -4px; left:-14px;" />
                                        Continue With Google
                                    </button>
                                </form>
                            </div>
                            <div class="col-md-6 mt-4 col-lg-6 col-sm-12 col-xs-12">
                                <form action="{{ route('facebook-register') }}" method="post">
                                    @csrf
                                    <button formaction="{{ route('facebook-register') }}" type="submit" class="btn btn-outline-secondary px-4 py-4 w-100  social-login">
                                        <img src="{{ asset('images/4.png') }}" style="width:25px; height: 25px;position:relative;top: -4px; left:-14px;" /> Continue with Facebook
                                    </button>
                                </form>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
            <form method="POST" id="registerForm" action="{{ route('register') }}">
                <div class="row step-zero-row main">
                    <div class="col-md-12">
                        <div class="bg-white pt-3 ps-5 dynamic-padding" style="height:100%">
                            <x-alert></x-alert>
                            @csrf
                            <div class="row me-5">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label for="email" class="mb-2">Your Login Email
                                            <sup class="text-danger">*</sup>
                                        </label>
                                        <input value="{{ old('email') }}" type="text" name="email" class="py-4 form-control rounded-3 @error('email') border border-danger @enderror" id="email" placeholder="youremail@email.com" required />
                                        @error("email")
                                        <div class="text-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                            <div class="row mt-4 me-5">
                                <div class="col-md-12 mt-3">
                                    <div class="form-group">
                                        <label for="email" class="mb-2">Passsword
                                            <sup class="text-danger">*</sup>
                                        </label>
                                        <input required type="password" value="{{ old('password') }}" name="password" placeholder="Enter your password" class="py-4 rounded-3 form-control @error('password') border border-danger @enderror" id="password" />
                                        @error('password')
                                        <div class="text-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                            <div class="row mt-4 me-5">
                                <div class="col-md-12">
                                    <div class="form-group ">
                                        <input style="width:22px; height: 22px;" type="checkbox" name="remember" value="1" />
                                        <label for="password" class="mb-2">
                                            Keep me logged in until I log out
                                            <sup class="text-danger">*</sup>
                                        </label>

                                    </div>
                                </div>
                                @google_captcha()
                            </div>
                            <div class="row mt-4 text-right me-5">
                                <div class="col-md-12 text-right d-flex justify-content-end">
                                    <button class="w-100 btn btn-primary next py-3 px-5 step-back" data-step="1">
                                        Login to Continue
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </form>

            <div class="row mt-5 ms-3">
                <div class="col-md-8 mt-3 ps-5 ms-2">
                    <p style="color:#03014C">
                        Don’t have an Upschool account? <a href="{{ route('register') }}" class="text-danger">Sign up</a>
                    </p>
                </div>
            </div>

        </div>
gi


        <div class="col-md-4 d-none d-md-block mx-auto px-0 ps-5" style="background-color: #242254 !important;align-items:center;background-image:url({{ asset('images/upschool-fly.png') }});background-repeat:no-repeat;background-size:contain">
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

                    $(".progress-bar").css("width", "50%")
                    $(".percent-complete").text("50%")
                    $(".step-count").text("2")

                }

                if (currentButton.data('step') == 2) {
                    $('.step-two-row').fadeIn("fast").removeClass("d-none");
                    $("div.third").find(".information-circle-disabled").addClass('active-circle')
                    $("div.third").find(".information-disabled").addClass('active-text')
                    $("div.second").find(".current-image").removeClass('d-none')

                    $(".progress-bar").css("width", "75%")
                    $(".percent-complete").text("75%")
                    $(".step-count").text("3")


                }
                if (currentButton.data('step') == 0) {
                    $(".step-zero-row").fadeIn('fast').removeClass("d-none");
                    $("div.first").find(".information-circle-disabled").addClass('active-circle')
                    $("div.first").find(".current-image").addClass('d-none')

                    $("div.second").find(".information-circle-disabled").removeClass('active-circle')
                    $("div.second").find(".current-image").addClass('d-none')
                    $("div.second").find(".information-disabled").removeClass('active-text');
                    $(".progress-bar").css("width", "10%")
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
@extends("themes.frontend.master")

@section("page_title")
::Login
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
<div class="container border-start mb-11 mt-8">
    <div class="row">
        <div class="col-md-8 mx-auto mb-5">
            <div class="row">
                <div class="col-md-8 ms-5 ps-5 mt-5 pt-4 ">
                    <!-- Login -->
                    <h2 class="mb-6 text-success" style="font-weight:bold;color:#03014C !important;font-weight:700;">
                        Congratulations! Your Upschool account is created!
                    </h2>
                    <!-- Text -->

                </div>
            </div>
            <div class="row">
                <div class="col-md-8 ms-5 ps-5 mt-4">
                    <p style="color:#242254;font-size:19px; font-weight:400; font-family: 'Inter'">
                        You can now login into your dashboard.
                    </p>
                </div>
            </div>

            <div class="row mb-3 mt-5">
                <div class="col-md-12 text-center">
                    <img src="{{ asset('images/2.png') }}" class="img-fluid w-25" />
                </div>
            </div>

            <div class="row mx-auto text-center mt-5 pt-5">
                <div class="col-md-6 text-center mx-auto">
                    <button style="background: #242254" class="btn btn-primary ms-3 py-3 w-100">Login</button>
                </div>
            </div>
        </div>
        <div class="col-md-4 d-none d-md-block mx-auto px-0 ps-5" style="background-color: #242254 !important;align-items:center">
            <div class="row first">
                <div class="col-md-8">
                    <div class="information-circle-disabled active-circle" data-step='1' style="display:flex;justify-content:center;align-items:center">
                        <img src="{{ asset('images/1.png') }}" class="current-image" style="width:25px; height: 25px;" />
                    </div>
                    <div class="information-disabled active-text">
                        Account Information
                    </div>
                    <div class="information-line-disabled active-line">
                    </div>
                </div>
            </div>
            <div class="row second">
                <div class="col-md-4 ">
                    <div class="information-circle-disabled active-circle" data-step='1' style="display:flex;justify-content:center;align-items:center">
                        <img src="{{ asset('images/1.png') }}" class="current-image" style="width:25px; height: 25px;" />
                    </div>
                    <div class="information-disabled  active-text">
                        About
                    </div>
                    <div class="information-line-disabled active-line">

                    </div>
                </div>
            </div>
            <div class="row third">
                <div class="col-md-8 ">
                    <div class="information-circle-disabled active-circle" data-step='1' style="display:flex;justify-content:center;align-items:center">
                        <img src="{{ asset('images/1.png') }}" class="current-image" style="width:25px; height: 25px;" />
                    </div>
                    <div class="information-disabled  active-text">
                        Your Canva Account
                    </div>
                </div>
            </div>

            <div class="row signup-progress-bar ps-3 mb-5 pb-5">
                <div class="col-md-12 steps p-0 m-0">
                    <p class="p-0 m-0 text-left">3 to 3 Steps</p>
                </div>
                <div class="progress-title col-md-12">
                    <h5><span class="percent-complete">100%</span> Complete</h5>
                </div>
                <div class="col-md-12 bar mt-2 ps-0">
                    <div class="progress w-75" style="background-color: #B4C8E8;">
                        <div class="progress-bar" style="width: 100%;" role="progressbar" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100"></div>
                    </div>

                </div>

                <div class="col-md-12 already-exists ps-0 mb-5" style="color: #fff;margin-top: 30px;font-weight:400">
                    <p>Already have an Account ? <a href="#" class="text-white" style="text-decoration: none; font-weight:700;font-family:'Inter' !important">Login in Here</a></p>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
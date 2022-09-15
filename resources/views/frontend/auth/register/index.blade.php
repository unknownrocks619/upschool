@extends("themes.frontend.master")

@section("page_title")
::Register
@endsection

@push("custom_css")
<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Nunito+Sans&display=swap" rel="stylesheet">
<style type="text/css">
    p.* {
        font-family: 'Nunito Sans', sans-serif;
        ;
    }

    * {
        font-family: 'Nunito Sans', sans-serif !important;
        ;
    }
</style>
@endpush

@section("content")
<form method="POST" action="{{ route('register') }}">
    <div class="container-fluid mb-11 mt-2" style="background: #f4f4f4">
        <div class="row mx-0 px-0" style="background: #f4f4f4">
            <!-- Row -->
            <div class="col-md-3 d-none d-md-block mx-0 px-0">
                <img src="https://upschool.co/wp-content/uploads/2022/04/7736bf08-c9f4-413d-bd1f-2999c0264109.jpg" style="border-top-right-radius:20px;border-bottom-right-radius: 20px;height:100%" class="text-left img-fluid" />
            </div>
            @google_captcha()

            <div class="col-md-5 mt-4 pl-0 ml-0" style="padding-left:0px !important;">
                <h3 class="fw-bold mb-3" style="padding-left:20px !important">
                    Create Your Upschool Account
                </h3>
                <div class="bg-white pt-3" style="padding-left: 20px !important;padding-right:20px !important;height:100%">
                    <h5 class="mb-0" style="color: #242254;font-weight:bold">Step 1 - Your Upschool Account</h5>
                    <x-alert></x-alert>
                    @csrf
                    <div class="row mt-3">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="first_name">First Name
                                    <sup class="text-danger">*</sup>
                                </label>
                                <input value="{{ old('first_name') }}" type="text" name="first_name" class="form-control @error('first_name') border border-danger @enderror" id="first_name" placeholder="First Name" required />
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="last_name">Last Name </label>
                                <input type="text" value="{{ old('last_name') }}" name="last_name" class="form-control @error('last_name') border border-danger @enderror" id="last_name" placeholder="Last Name" />
                            </div>
                        </div>
                    </div>
                    <div class="row mt-4">
                        <div class="col-md-12 mt-3">
                            <div class="form-group">
                                <label for="email">Email address
                                    <sup class="text-danger">*</sup>
                                </label>
                                <input type="email" value="{{ old('email') }}" name="email" placeholder="E-Mail" class="form-control @error('email') border border-danger @enderror" id="email" />
                            </div>
                        </div>
                    </div>
                    <div class="row mt-4">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="country">Your Country
                                    <sup class="text-danger">*</sup>
                                </label>
                                <select name="country" class="form-control @error('country') border border-danger @enderror" id="country">
                                    @foreach ($countries as $country)
                                    <option value="{{ $country->id }}">{{ $country->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="role">
                                    What Describes You
                                    <sup class="text-danger">*</sup>
                                </label>
                                <select name="role" id="role" class="form-control @error('role') border border-danger @enderror">
                                    <option value="parent">Parent of Student</option>
                                    <option value="student-above">Student Above 18</option>
                                    <option value="student-below">Student Below 18</option>
                                    <option value="teacher">School Teacher</option>
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="row mt-4">
                        <div class="col-md-6">
                            <div class="form-group ">
                                <label for="password">
                                    Password
                                    <sup class="text-danger">*</sup>
                                </label>
                                <input required type="password" name="password" value="" id="password" class="form-control @error('password') border border-danger @enderror" />
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="confirm_password">
                                    Confirm Password
                                    <sup class="text-danger">*</sup>
                                </label>
                                <input required type="password" value="{{ old('password_confirmation') }}" name="password_confirmation" class="form-control @error('password_confirmation') border border-danger @enderror" id="confirm_password" />
                            </div>
                        </div>
                    </div>
                    <div class="row mt-4">
                    </div>
                </div>
            </div>

            <div class="col-md-4 mt-4 pl-0 ml-0" style="padding-left:0px !important">
                <div class="pt-3" style="padding-left: 20px !important;padding-right:20px !important">
                    <h5 class="mb-0 mt-3 pt-4" style="color: #242254;font-weight:bold">Part 2 - Your Canva Account (Optional)</h5>

                    <div class="row mt-4">
                        <div class="col-md-12">
                            <p>
                                As part of your Upschool account, we are pleased to inform you that
                                you can get a FREE Canva Pro Account for Education. This has been
                                made possible through a collaboration between Canva and Upschool
                                who, together, want to enable you to share your voice with the world.
                            </p>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12 mt-3">
                            <p class="fw-bold">
                                We use Canva in many of our courses - so we recommend you get
                                your pro account today.
                            </p>
                            <p>
                                <em>Would you like us to register you for a FREE Canva Pro Account?</em>
                            </p>
                        </div>
                        <div class="col-md-6 mt-0 pt-0">
                            <select name="canva" id="canva" autocomplete="off" class="form-control">
                                <option value="yes" selected>Yes</option>
                                <option value="no">No</option>
                            </select>
                        </div>
                    </div>
                    <div class="row mt-4 canva-term">
                        <div class="col-md-1 mt-1 pt-2">
                            <input type="checkbox" required name="personal_detail" id="personal_detail" />
                        </div>
                        <div class="col-md-11 mt-0 pt-0">
                            <label for="personal_detail">
                                I acknowledge and accept that my personal details (name,
                                email) may be visible to Upschool users registered with Canva.
                            </label>
                        </div>

                    </div>
                    <div class="row mt-2 canva-term">
                        <div class="col-md-1 mt-1 pt-2">
                            <input type="checkbox" required value="1" name="canva_free" id="canva_free" />
                        </div>
                        <div class="col-md-11">
                            <label for="canva_free">
                                I acknowledge that should I not wish to have my details visible
                                to other users, I can instead sign up for free Canva basic here.
                            </label>
                        </div>

                    </div>
                    <div class="row mt-2">
                        <div class="col-md-1 mt-1 pt-2">
                            <input type="checkbox" value='1' name="terms" id="terms" />
                        </div>
                        <div class="col-md-11">
                            <label for="terms">
                                I agree to Upschool’s Terms and Conditions and Privacy Policy. </label>
                        </div>

                    </div>

                    <div class="row mt-3">
                        <div class="col-md-6">
                            <button type="submit" class="btn btn-block btn-dark">REGISTER</button>
                        </div>

                        <div class="col-md-12 mt-3">
                            <a href="{{ route('login') }}">Already a member</a> ? Sign-in
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</form>
@endsection

@push("custom_scripts")

<script src="https://www.google.com/recaptcha/api.js?render={{ config('captcha.google.site_key') }}"></script>
<script type="text/javascript">
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
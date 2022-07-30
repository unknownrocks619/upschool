@extends("themes.frontend.master")

@section("page_title")
::Register
@endsection

@section("content")
<div class="container mb-11 mt-2">
    <div id="main-wrapper">
        <div class="row justify-content-center">
            <div class="col-xl-12 col-lg-12 col-md-12">
                <div class="card border-0">
                    <div class="card-body p-0">
                        <form id="registerForm" action="{{ route('register') }}" method="post">
                            @csrf
                            @google_captcha()
                            <div class="row no-gutters">
                                <div class="col-lg-6 d-none d-lg-inline-block">
                                    <div class="account-block rounded-right" style="background-image: url('https://upschool.co/wp-content/uploads/2022/04/7736bf08-c9f4-413d-bd1f-2999c0264109.jpg');background-repeat: no-repeat;background-size:cover;height:100%;position:relative">
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="p-5" style="padding-left: 0px !important;padding-top: 2rem !important">
                                        <h2 class="mb-0" style="color: #242254;font-weight:bold">Create a Free Account</h2>
                                        <p class="text-muted mt-2 mb-5">You are a few clicks away from creating your account.</p>
                                        <x-alert></x-alert>
                                        <form method="POST" action="{{ route('register') }}">
                                            @csrf
                                            <div class="row">
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
                                            <div class="row">
                                                <div class="col-md-12 mt-3">
                                                    <div class="form-group">
                                                        <label for="email">Email address
                                                            <sup class="text-danger">*</sup>
                                                        </label>
                                                        <input type="email" value="{{ old('email') }}" name="email" placeholder="E-Mail" class="form-control @error('email') border border-danger @enderror" id="email" />
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row mt-3">
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
                                            <div class="row mt-3">
                                                <div class="col-md-12">
                                                    <div class="form-group ">
                                                        <label for="password">
                                                            Password
                                                            <sup class="text-danger">*</sup>
                                                        </label>
                                                        <input type="password" name="password" value="" id="password" class="form-control @error('password') border border-danger @enderror" />
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row mt-2">
                                                <div class="col-md-12">
                                                    <div class="form-group">
                                                        <label for="confirm_password">
                                                            Confirm Password
                                                            <sup class="text-danger">*</sup>
                                                        </label>
                                                        <input type="password" value="{{ old('password_confirmation') }}" name="password_confirmation" class="form-control @error('password_confirmation') border border-danger @enderror" id="confirm_password" />
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-group mb-5">
                                                <label for="modalSignupEmail1">Consent
                                                    <sup class="text-danger">*</sup>
                                                </label>
                                                <br />
                                                <input name="terms" style="width:20px; height:20px;" type="checkbox" class='input-checkbox @error("terms") border border-danger @enderror' value='1' /> Yes, I consent with providing the required information.
                                                <div class="form-control disabled mt-2 bg-secondary text-white" style="opacity:1">I agree to that the information provided will be used for internal communication and for the website on-boarding purposes.</div>
                                            </div>
                                            <div class="row mt-4">
                                                <div class="col-md-12">
                                                    <button class="btn btn-block btn-dark w-100" type="submit">
                                                        <div class="spinner-border text-white mb-1" role="status" id="spinner" style="display:none">
                                                            <span class="sr-only">Loading...</span>
                                                        </div>
                                                        <div style="text-transform:uppercase" id="pre-submission">
                                                            Register
                                                        </div>
                                                    </button>
                                                </div>
                                            </div>
                                            <!-- <button type="button" class="btn d-inline-block">Are you associated with university or organisation ??</button> -->
                                            <!-- <a href="#l" class="forgot-link float-right text-primary m-3">Organisation Registration</a> -->
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </form>

                    </div>
                    <!-- end card-body -->
                </div>
                <!-- end card -->

                <p class="text-muted text-center mt-3 mb-0">Already Have an account
                    <a class='text-underline text-primary ml-1' href='{{ route("login") }}'>
                        Login
                    </a>
                </p>

                <!-- end row -->

            </div>
            <!-- end col -->
        </div>
        <!-- Row -->
    </div>
</div>
@endsection

@push("custom_scripts")

<script src="https://www.google.com/recaptcha/api.js?render={{ config('captcha.google.site_key') }}"></script>
<script>
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
</script>

@endpush
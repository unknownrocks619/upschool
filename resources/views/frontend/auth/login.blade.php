@extends("themes.frontend.master")

@section("page_title")
::Login
@endsection

@section("content")
<div class="container mb-11 mt-8">
    <div class="row gx-0 m-3">
        <div class="col-md-8 col-xl-5 mx-auto border p-5">
            <x-flash></x-flash>
            <!-- Login -->
            <h2 class="mb-6" style="color: #242254;font-weight:bold">Log In to Your Upschool Account!</h2>

            <!-- Form Login -->
            <form id="loginForm" action="{{ route('login') }}" method="post" class="mb-5">
                @csrf
                @google_captcha()
                <!-- Email -->
                <div class="form-group mb-3">
                    <label for="email">
                        Email
                    </label>
                    <input type="email" name="email" value="{{old('email')}}" type="text " class="form-control" id="email" placeholder="Eg: johndoe@example.com">
                </div>

                <!-- Password -->
                <div class="form-group mb-3">
                    <label for="password">
                        Password
                    </label>
                    <input name="password" value="" type="password" class="form-control" id="password" placeholder="**********">
                </div>

                <div class="d-flex align-items-center mb-1 font-size-sm">
                    <div class="form-check">
                        <!-- <input  class="form-check-input text-gray-800" value='1' type="checkbox" id="autoSizingCheck1">
                        <label class="form-check-label text-gray-800" for="autoSizingCheck1">
                            Remember me
                        </label> -->
                    </div>

                    <div class="ms-auto">
                        <a href="{{ route('password.request') }}" class='text-gray-800' to='/recover'>Forgot Password</a>
                    </div>
                </div>

                <!-- Submit -->
                <button class="btn btn-block btn-primary w-100" type="submit">
                    <div v-else>
                        LOGIN
                    </div>
                </button>
            </form>

            <!-- Text -->
            <p class="mb-0 font-size-sm text-center">
                Don't have an account?
                <a href="{{ route('register') }}" class='text-underline'>Sign Up</a>
            </p>
        </div>
    </div>
</div>
@endsection

@push("custom_scripts")
<script src="https://www.google.com/recaptcha/api.js?render={{ config('captcha.google.site_key') }}"></script>
<script>
    grecaptcha.ready(function() {
        document.getElementById('loginForm').addEventListener("submit", function(event) {
            $(this).children("input").prop('disabled');
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
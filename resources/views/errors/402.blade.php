@extends('themes.frontend.master')

@section("content")
<div class="container mb-11 mt-8">
    <div class="row gx-0 m-3">
        <div class="col-md-8 col-xl-5 mx-auto border p-5">
            <x-alert></x-alert>
            <!-- Login -->
            @if( ! session()->has('success'))
            <h2 class="mb-6" style="color: #242254;font-weight:bold">
                <span class="text-danger">Oops ! Your Link has expired.</span> Please provide your email to re-send your verification link.
            </h2>
            <p class="text-info">
                If you don't receive an email after few minutes. Please re-check your spam folder as well.
            </p>

            <!-- Form Login -->
            <form id="verificationForm" action="{{ route('frontend.user.registration.resend-link') }}" method="post" class="mb-5">
                @csrf
                @google_captcha()
                <!-- Email -->
                <div class="form-group mb-3">
                    <label for="email">
                        Email
                    </label>
                    <input type="email" name="email" value="{{old('email')}}" type="text " class="form-control" id="email" placeholder="Eg: johndoe@example.com">
                </div>


                <!-- Submit -->
                <button class="btn btn-block btn-primary w-100" type="submit">
                    <div v-else>
                        Send Verification
                    </div>
                </button>
            </form>

            <!-- Text -->
            <p class="mb-0 font-size-sm text-center">
                Don't have an account?
                <a href="{{ route('register') }}" class='text-underline'>Sign Up</a>
            </p>
            <p class="mb-0 font-size-sm text-center">
                Signin with different account?
                <a href="{{ route('login') }}" class='text-underline'>Sign in</a>
            </p>

            @else
            <h2 class="mb-6" style="color: #242254;font-weight:bold">
                Email Sent
            </h2>
            <p class="text-muted fs-4 text-center">
                In mean time
            </p>
            <p class="mb-0 font-size-sm text-center">
                Look Around
                <a href="{{ route('frontend.home') }}" class='text-underline'>Home</a>
            </p>
            <p class="mb-0 font-size-sm text-center">
                Signin with different account?
                <a href="{{ route('login') }}" class='text-underline'>Sign in</a>
            </p>
            @endif
        </div>
    </div>
</div>
@endsection

@if( ! session()->has('success'))

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

@endif
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
            <h2 class="mb-6 text-success" style="font-weight:bold">Please Check your email.</h2>
            <!-- Text -->
            <p class="mb-0 font-size-sm text-center">
                Don't have an account?
                <a href="{{ route('register') }}" class='text-underline'>Sign Up</a>
            </p>
            <p class="mb-0 font-size-sm text-center">
                Explore Upschool
                <a href="{{ route('frontend.home') }}" class='text-underline'>Home</a>
            </p>
        </div>
    </div>
</div>
@endsection
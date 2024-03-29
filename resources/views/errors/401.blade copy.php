@extends("themes.frontend.master")
@section("content")
<div class="content">
    <div class="row">
        <div class="col-md-12 text-center alert alert-danger">
            <h5 class="text-white fs-3" style="color:#242254  !important">
                Your account is already verified.
            </h5>
            <p>
                <a href="https://upschool.co/dashboard">Login</a> | <a href="{{ route('register') }}">Register</a>
            </p>
        </div>
    </div>
</div>
@endsection
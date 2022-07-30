@extends("themes.admin.master")

@section("title")
Website Settings
@endsection

@section("plugins_css")
@endsection

@section("content")

<x-layout heading='Configurations'>
    <div class="col-md-6 grid-margin stretch-card">
        <div class="card">
            <div class="card-body">

                <h6 class="card-title">Images / Logo</h6>

                <form enctype="multipart/form-data" class="forms-sample" method="post" action="{{ route('admin.web.setting.update') }}">
                    @csrf
                    @method("PUT")
                    <div class="mb-3">
                        <label for="main_logo" class="form-label">Main Logo</label>
                        <input type="file" name="main_logo" id="main_logo" class="form-control">
                        @if($settings->where("name","logo")->first()->value)
                        <img src="{{ asset($settings->where('name','logo')->first()->value) }}" />
                        @endif
                    </div>

                    <div class="mb-3">
                        <label for="favicon" class="form-label">Fav Icon</label>
                        <input type="file" name="favicon" id="favicon" class="form-control">
                        <img src="{{ asset($settings->where('name','favicon')->first()->value) }}" />
                    </div>

                    @if($settings->where('name','loading_bar')->first()->value)
                    <div class='mb-3'>
                        <label for=" loading_image" class="form-label">Loading Image</label>
                        <input type="file" name="loading_image" id="loading_image" class="form-control">
                    </div>

                    <img src="{{ asset($settings->where('name','loading_bar_image')->first()->value)  }}" />
                    @endif

                    <button type="submit" class="btn btn-primary me-2">Save</button>
                </form>

            </div>
        </div>
    </div>
    <!-- Basic Settings -->
    <div class="col-md-6 grid-margin stretch-card">
        <div class="card">
            <div class="card-body">
                <x-form action="{{ route('admin.web.setting.update') }}" method="PUT">
                    <h6 class="card-title">Basic Settings</h6>
                    <div class="mb-3">
                        <label for="website_name" class="form-label">Website Name</label>
                        <input type="text" name="website_name" class="form-control" id="website_name" autocomplete="off" value="{{ old('website_name',settings()->where('name','website_name')->first()->value) }}" placeholder="Website name">
                    </div>
                    <div class="mb-3">
                        <label for="website_url" class="form-label">Website URL</label>
                        <input type="url" class="form-control" name="website_url" id="website_url" value="{{ old('website_url',settings()->where('name','website_url')->first()->value) }}" placeholder="Website Url">
                    </div>
                    <div class="mb-3">
                        <label for="cahce" class="form-label">Cache Settings</label>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-check form-check-inline">
                                    <input @if(settings()->where('name','cache')->first()->value) checked @endif type="radio" class="form-check-input" name="cache" value="on" id="cache_on">
                                    <label class="form-check-label" for="cache_on">
                                        On
                                    </label>
                                </div>
                                <div class="form-check form-check-inline">
                                    <input @if( ! settings()->where('name','cache')->first()->value) checked @endif type="radio" class="form-check-input" name="cache" value="off" id="cache_off">
                                    <label class="form-check-label" for="cache_off">
                                        Off
                                    </label>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="mb-3">
                        <label for="main_contant" class="form-label">Official Contact</label>
                        <input type="text" class="form-control" id="main_contant" autocomplete="off" placeholder="Official Contact number" name="main_contact" value="{{ old('main_contact',settings()->where('name','main_contact')->first()->value) }}" />
                    </div>
                    <div class="mb-3">
                        <label for="official_email" class="form-label">Official Email</label>
                        <input type="email" class="form-control" id="official_email" autocomplete="off" placeholder="Official Email Address" name="official_email" value="{{ old('official_email',settings()->where('name','official_email')->first()->value) }}" />
                    </div>
                    <div class="mb-3">
                        <label for="exampleInputPassword1" class="form-label">Company Address</label>
                        <textarea name="company_address" id="company_address" class="form-control">{{ old('company_address',settings()->where('name','company_address')->first()->value) }}</textarea>
                    </div>
                </x-form>
            </div>
        </div>
    </div>
    <!-- /Basic Settings -->

    <!-- Login Settings -->
    <div class="col-md-6 grid-margin stretch-card">
        <div class="card">
            <div class="card-body">
                <x-form action="{{ route('admin.web.setting.update') }}" method="PUT">
                    <h6 class="card-title">Login Settings</h6>
                    <div class="mb-3">
                        <label for="cahce" class="form-label">Enable User Login</label>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-check form-check-inline">
                                    <input type="radio" class="form-check-input" name="login" value="on" id="login_on" @if(settings()->where('name','login')->first()->value) checked @endif>
                                    <label class="form-check-label" for="login_on">
                                        On
                                    </label>
                                </div>
                                <div class="form-check form-check-inline">
                                    <input type="radio" class="form-check-input" name="login" value="off" id="login_off" @if( ! settings()->where('name','login')->first()->value) checked @endif>
                                    <label class="form-check-label" for="login_off">
                                        Off
                                    </label>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="mb-3">
                        <label for="Enable Registration" class="form-label">Enable Registration</label>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-check form-check-inline">
                                    <input type="radio" class="form-check-input" name="signup" value="on" id="signup_on" @if(settings()->where('name','signup')->first()->value) checked @endif>
                                    <label class="form-check-label" for="signup_on">
                                        On
                                    </label>
                                </div>
                                <div class="form-check form-check-inline">
                                    <input type="radio" class="form-check-input" name="signup" value="off" id="signup_off" @if( ! settings()->where('name','signup')->first()->value) checked @endif>
                                    <label class="form-check-label" for="signup_off">
                                        Off
                                    </label>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="mb-3">
                        <label for="pre_registration" class="form-label">Pre Registration</label>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-check form-check-inline">
                                    <input type="radio" class="form-check-input" name="pre_registration" value="on" id="pre_registration_on" @if(settings()->where('name','pre_registration')->first()->value) checked @endif>
                                    <label class="form-check-label" for="pre_registration_on">
                                        On
                                    </label>
                                </div>
                                <div class="form-check form-check-inline">
                                    <input type="radio" class="form-check-input" name="pre_registration" value="off" id="pre_registration_off" @if( ! settings()->where('name','pre_registration')->first()->value) checked @endif>
                                    <label class="form-check-label" for="pre_registration_off">
                                        Off
                                    </label>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="mb-3">
                        <label for="pre_registration" class="form-label">Facebook Login</label>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-check form-check-inline">
                                    <input type="radio" class="form-check-input" name="facebook_login" value="on" id="facebook_login_on" @if(settings()->where('name','facebook_login')->first()->value) checked @endif>
                                    <label class="form-check-label" for="login_on">
                                        On
                                    </label>
                                </div>
                                <div class="form-check form-check-inline">
                                    <input type="radio" class="form-check-input" name="facebook_login" value="off" id="facebook_login_off" @if( ! settings()->where('name','facebook_login')->first()->value) checked @endif>
                                    <label class="form-check-label" for="facebook_login_off">
                                        Off
                                    </label>
                                </div>
                            </div>
                        </div>
                    </div>
                </x-form>
            </div>
        </div>
    </div>

    <div class="col-md-6 grid-margin stretch-card">
        <div class="card">
            <div class="card-body">
                <h6 class="card-title">More Settings Coming Soon</h6>
            </div>
        </div>
    </div>
</x-layout>

@endsection


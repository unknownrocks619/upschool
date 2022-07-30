<x-dashboard>
    <div class="row">
        <div class="col-12">
            <x-flash></x-flash>
            <form action="{{ route('frontend.auth_user.profile.update') }}" method="post" enctype="multipart/form-data">
                @csrf
                <div class="tab-content" id="pills-tabContent">
                    <div class="tab-pane fade active show" id="pills-home" role="tabpanel" aria-labelledby="pills-home-tab">
                        <div class="row bg-secondary py-2">
                            <div class="col">
                                <div class="form-group">
                                    <label for="first_name">First Name
                                        <sup class="text-danger">*</sup>
                                    </label>
                                    <input type="text" name="first_name" id="first_name" class="form-control @error('first_name') border-danger @enderror" value="{{ old('first_name',auth()->user()->first_name) }}" />
                                </div>
                            </div>
                            <div class="col">
                                <div class="form-group">
                                    <label for="middle_name">Middle Name</label>
                                    <input type="text" value="{{ old('middle_name',auth()->user()->middle_name) }}" name="middle_name" id="middle_name" class="form-control @error('first_name') border-danger @enderror" value=" old('first_name',auth()->user()->first_name)  }}" />
                                </div>
                            </div>
                            <div class="col">
                                <div class="form-group">
                                    <label for="last_name">Last Name
                                        <sup class="text-danger">*</sup>
                                    </label>
                                    <input type="text" name="last_name" id="last_name" class="form-control @error('first_name') border-danger @enderror" value="{{ old('last_name',auth()->user()->last_name) }}" />
                                </div>
                            </div>
                        </div>

                        <div class="row bg-secondary mt-6 py-2">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="date_of_birth" class="label-control">Date of Birth</label>
                                    <input type="date" value="{{ auth()->user()->date_of_birth }}" autocomplete="off" class="form-control" name="date_of_birth" id="date_of_birth" />
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="gender">Select Gender
                                    </label>
                                    <select name="gender" id="gender" class="form-control">
                                        <option value="male" @if(auth()->user()->gender == "male") selected @endif>Male</option>
                                        <option value="female" @if(auth()->user()->gender == "female") selected @endif>Female</option>
                                        <option value="other" @if(auth()->user()->gender == "other") selected @endif>Other</option>
                                    </select>
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="country" class="label-control">Country
                                        <sup class="text-danger">*</sup>
                                    </label>
                                    <select autocomplete="off" name="country" id="country" class="form-control">
                                        <?php
                                        $countries = \App\Models\Country::get();
                                        foreach ($countries as $country) {
                                            echo "<option value='{$country->name}' ";
                                            if (auth()->user()->country == $country->name) {
                                                echo " selected=true";
                                            }
                                            echo ">";
                                            echo $country->name;
                                            echo "</option>";
                                        }
                                        ?>
                                    </select>
                                </div>
                            </div>
                            <!-- <div class="col-md-6">
                                <div class="form-group">
                                    <label for="city" class="label-control">City / 
                                        <sup class="text-danger">*</sup>
                                    </label>
                                    <select name="city" id="city" class="form-control">
                                    </select>
                                </div>
                            </div> -->
                        </div>

                        <div class="row mt-3">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="username">Username</label>
                                    <input type="text" autocomplete="off" name="username" id="username" class="form-control @error('username') border-danger @enderror" value="{{ old('username',auth()->user()->username) }}" />
                                    <div id="check_username_message"></div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="email">Email
                                        <sup class="text-danger">*

                                        </sup>
                                    </label>
                                    <input type="email" name="email" id="email" class="form-control @error('email') border-danger @enderror" value="{{ old('email',auth()->user()->email) }}">
                                </div>
                            </div>
                        </div>
                        @if( ! isset(auth()->user()->verify_email) || ! auth()->user()->verify_email->verified)
                        <div class="row mt-3 alert alert-danger">
                            <div class="col-md-12">
                                Your account is not verified. Please verify your account for uninterrupted service.

                                <a href='#' class="mt-3 d-block w-25 btn btn-primary btn-sm verify_email">Verif Now</a>
                            </div>
                        </div>
                        @endif
                        <div class="row mt-3">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="profile">Upload Profile Picture
                                    </label>
                                    <input type="file" name="profile" id="profile" class="form-control @error('profile') border-danger @enderror" />
                                    <div class="text-info">
                                        Only JPG, PNG, GIF
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row mt-3">
                            <div class="col-md-12">
                                <button type="submit" class="btn btn-info w-100">
                                    Update Profile
                                </button>
                            </div>

                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>

    @push("custom_scripts")
    <script src="https://www.google.com/recaptcha/api.js?render={{ config('captcha.google.site_key') }}"></script>

    <script>
        $(".verify_email").click(function(event) {
            event.preventDefault();
            var ele = $(this);
            var ele = $(this).addClass('disabled').removeClass('verify_email').text("Please Wait...");
            grecaptcha.execute("{{ config('captcha.google.site_key') }}", {
                    action: 'email_verify'
                })
                .then(function(token) {
                    $.ajax({
                        type: "POST",
                        url: "{{ route('frontend.user.registration.resend-link') }}",
                        data: "email={{auth()->user()->email}}&recaptcha_token=" + token,
                        headers: {
                            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                        },
                        success: function(response) {
                            $(ele).removeClass("btn-primary verify_email").addClass("btn-outline-primary");
                            $(ele).text("Email Sent")
                            // $(this).parent().append("Email Sent ! Please Check Your email");
                        }
                    })
                });

        })

        function recaptcha() {
            var captcha_token = null;
            grecaptcha.execute("{{ config('captcha.google.site_key') }}", {
                    action: 'email_verify'
                })
                .then(function(token) {
                    captcha_token = token;
                    return token;
                });

            return captcha_token;
        }
    </script>
    @endpush
</x-dashboard>
<x-dashboard>
    <div class="row">
        <div class="col-md-12">
            <x-flash></x-flash>

            <form action="{{ route('frontend.auth_user.password.update') }}" method="post">
                @csrf
                <div class="card">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-8">
                                <div class="form-group">
                                    <label for="old_password">Old Password
                                        <sup class="text-danger">*</sup>
                                    </label>
                                    <input type="password" name="old_password" id="old_password" class="form-control @error('old_password') border-danger @enderror" />
                                    @error("old_password")
                                    <div class="text-danger">
                                        {{ $message }}
                                    </div>
                                    @enderror
                                </div>
                            </div>
                        </div>
                        <div class="row mt-3 pt-3">
                            <div class="col-md-8">
                                <div class="form-group">
                                    <label for="new_password">New Password
                                        <sup class="text-danger">*</sup>
                                    </label>
                                    <input type="password" name="password" id="new_password" class="form-control @error('password') border-danger @enderror">
                                    @error("password")
                                    <div class="text-danger">
                                        {{ $message }}
                                    </div>
                                    @enderror
                                </div>
                            </div>
                        </div>
                        <div class="row mt-3 pt-3">
                            <div class="col-md-8">
                                <div class="form-group">
                                    <label for="confirm_new_password">Confirm New Password
                                        <sup class="text-danger">*</sup>
                                    </label>
                                    <input type="password" name="password_confirmation" id="confirm_new_password" class="form-control @error('password_confirmation') border-danger @enderror">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card-footer">
                        <div class="row">
                            <div class="col-md-4">
                                <button type="submit" class="btn btn-primary w-100">
                                    Change Password
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
</x-dashboard>
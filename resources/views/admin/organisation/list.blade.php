<x-admin-layout>
    @section("title")
    :: Organisation
    @endsection

    <div class="col-md-12">
        <div class="card">
            <div class="card-body">
                <a href="{{ route('admin.org.org.index') }}" class="btn btn-primary mb-3">
                    <x-arrow-left>Go Back</x-plus>
                </a>
                <table class="table-bordered table-hover table">
                    <thead>
                        <tr>
                            <th>Full Name</th>
                            <th>Username</th>
                            <th>Email</th>
                            <th>Enrolled Date</th>
                            <th>Role</th>
                            <th></th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($all_students as $student)
                        <tr>
                            <td>
                                {{ $student->full_name() }}
                            </td>
                            <td>
                                {{ $student->username }}
                            </td>
                            <td>
                                {{ $student->email }}
                            </td>
                            <td>
                                {{ date("Y-m-d", strtotime($student->created_at)) }}
                            </td>
                            <td>
                                {{ $student->user_role->role_name }}
                            </td>
                            <td>
                                <form class="d-inline" onsubmit="return confirm('Are you sure ?? All subscription will be removed from this user' )" action="{{ route('admin.org.user.remove',[$organisation->id,$student->id]) }}" method="post">
                                    @csrf
                                    <button type="submit" class="btn btn-outline-danger">
                                        Remove User
                                    </button>
                                </form>
                                <form class="d-inline" action="{{ route('admin.org.user.password.reset',[$organisation->id,$student->id]) }}" method="post">
                                    @csrf
                                    <button type="submit" class="btn btn-warning btn-sm">
                                        Reset Password
                                    </button>
                                </form>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    @section("modal")
    <x-modal modal="newOrganisation">
        <form action="{{ route('admin.org.org.store') }}" method="post">
            @csrf
            <div class="modal-content">
                <div class="modal-header">
                    <h5>Add New Organisations</h5>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="organisation_name" class="label-control">Organisation / Institute Name
                                    <sup class="text-danger">*</sup>
                                </label>
                                <input type="text" name="organisation_name" id="organisation_name" class="form-control" value="{{ old('organisation_name') }}" />
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="type" class="label-control">
                                    Type
                                </label>
                                <select name="type" id="type" class="form-control">
                                    <option value="school">School</option>
                                    <option value="university">Univerity</option>
                                    <option value="college">College</option>
                                    <option value="institute">Institute</option>
                                    <option value="organisation">Organisation</option>
                                    <option value="company">Company</option>
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="row mt-4">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="contact_person" class="label-control" id="contact_person">
                                    Contact Person
                                </label>
                                <input type="text" name="contact_person" id="contact_person" class="form-control" />
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="contact_number" class="label-control">Contact Number
                                </label>
                                <input type="text" name="contact_number" id="contact_number" class="form-control" />
                            </div>
                        </div>
                    </div>
                    <div class="row mt-4">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="website" class="label-control">Website</label>
                            </div>
                            <input type="url" name="website" id="website" class="form-control">
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="active" class="label-control">
                                    Active
                                </label>
                                <select name="active" id="active" class="form-control">
                                    <option value="inactive">Inactive</option>
                                    <option value="active" selected>Active</option>
                                    <option value="pending">Pending</option>
                                    <option value="rejected">Pending</option>
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="row mt-4">
                        <div class="col-md-8">
                            <div class="form-group">
                                <label for="remarks" class="label-control">Remarks</label>
                                <textarea name="remarks" id="remarks" class="form-control">{{ old('remarks') }}</textarea>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-secondary">Add Organisation</button>
                </div>
            </div>
        </form>
    </x-modal>
    <x-modal modal="importCSV"></x-modal>
    @endsection


    @push("custom_script")
    <script>
        $(document).on("click", '.importCSVLink', function(event) {
            event.preventDefault();
            $.get($(this).attr('href'), (response) => $("#importCSV .modal-content").html(response));
        })
    </script>
    @endpush
</x-admin-layout>
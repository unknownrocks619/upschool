<x-dashboard>
    <x-flash></x-flash>
    <div class="row mb-2">
        <div class="col-md-12">
            <?php
            $role = ($resource_user->user_role->slug == "teacher")  ? "teacher" : "student";

            ?>
            <a href="{{ route('frontend.manage.'.$role) }}" class="btn btn-outline-primary btn-sm">
                <i class="fas fa-arrow-left"></i>
                Go Back</a>
        </div>
    </div>
    <div class="row">
        <div class="col-md-4">
            <div class="card">
                <div class="card-body">
                    @if($resource_user->avatar)
                    <img src='{{ asset($resource_user->avatar->path) }}' class="img-fluid circle-rounded img-circle" />
                    @else
                    <img src='{{ settings("logo") }}' class="img-fluid img-thumbnail" />
                    @endif
                    <p class="d-inline mb-0 text-center @if($resource_user->status =='active') text-success @else text-warning @endif"> {{ ucwords($resource_user->status)  }}
                    <form class="d-inline text-center" method="post" action="{{ route('frontend.manage.update.status',$resource_user->id) }}">
                        @method("PATCH")
                        @csrf
                        @if($resource_user->status == "active")
                        <small class="text-danger">(
                            <button type="submit" class="d-inline btn btn-link px-0 mx-0">Mark Inactive</button>
                            )
                        </small>
                        @else
                        <small class="text-success">(
                            <button type="submit" class="d-inline btn btn-link mx-0 px-0">Mark Active</button>
                            )</small>
                        @endif
                    </form>
                    </p>
                    <p class="text-center"> {{ $resource_user->email  }}</p>
                    <hr />
                    <p>
                        <strong>
                            Role :
                        </strong>
                        {{ $resource_user->user_role->role_name }}
                    </p>

                    <p>
                        <strong>
                            Full Name :
                        </strong>
                        {{ $resource_user->full_name() }}
                    </p>
                    <p>
                        <strong>
                            Country :
                        </strong>
                        {{ $resource_user->country ?? "Not Set" }}
                    </p>

                    <p>
                        <strong>
                            Gender :
                        </strong>
                        {{ ucwords($resource_user->gender) }}
                    </p>
                    <p>
                        <strong>
                            Phone Number:
                        </strong>
                        {{ $resource_user->phone_number }}
                    </p>

                    <div class="card-footer">
                        <form action="{{ route('frontend.manage.delete.user',$resource_user->id) }}" method="post">
                            @csrf
                            @method("DELETE")
                            <button type="submit" class="btn btn-danger w-100">
                                Remove User
                            </button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <div class=" col-md-8">
            <div class="card">
                <div class="card-body">
                    <h4>
                        {{ $resource_user->full_name() }} - Courses
                    </h4>
                    <table class="table table-hover table-bordered">
                        <thead>
                            <tr>
                                <th>
                                    S.No
                                </th>
                                <th>
                                    Course Name
                                </th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($resource_user->courses as $course)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>
                                    {{ $course->title }}
                                </td>
                            </tr>
                            @empty
                            <tr>
                                <td colspan="2" class="text-center">
                                    Not enrolled in any courses
                                </td>
                            </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

    <div class="row mt-4">
        <div class="col-md-12">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">
                        Change Password
                    </h4>
                    <p class="text-muted">
                        @if( ! $resource_user->email)
                        Please copy password afte reset. This user doesn't
                        have any email associated to noitfy.
                        @else
                        User will receive password at `{{ $resource_user->email }}`
                        @endif
                    </p>
                    <form action="{{ route('frontend.manage.reset.password',$resource_user->id) }}" method="post">
                        @csrf
                        <button type="submit" class="btn btn-outline-danger">Change Password</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-dashboard>
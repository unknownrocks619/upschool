@extends("themes.admin.master")

@section("title")
:: Users
@endsection

@push("plugins_css")
<link rel="stylesheet" href="{{ asset('admin/assets/vendors/datatables.net-bs5/dataTables.bootstrap5.css') }}">
@endpush

@section("content")
<div class="page-content">
    <div class="row">
        <div class="col-md-12 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                    <h6 class="card-title">User List</h6>
                    <div class="table-responsive">
                        <table id="users" class="table">
                            <thead>
                                <tr>
                                    <th>Full Name</th>
                                    <th>Email / Username</th>
                                    <th>Organistaion</th>
                                    <th>Course Involved</th>
                                    <th>Create At</th>
                                    <th></th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($users as $user)
                                <tr @if($user->status == 'suspend') class='bg-warning text-white' @endif>
                                    <td>{{ $user->full_name() }} <br />
                                        <span class="text-warning">{{ $user->user_role->role_name }}</span>
                                    </td>
                                    <td>{{ $user->email }}<br /> <span class="text-info">{{ $user->username }}</span> </td>
                                    <td>
                                        <?php
                                        if (!$user->organisations_count) :
                                            "None";
                                        else :
                                            foreach ($user->organisations as $organisations) {
                                                echo "<span class='badge '>";
                                                echo '<button type="button" class="btn btn-xs btn-primary position-relative">';
                                                echo $organisations->name;
                                                echo '<span class="position-absolute top-0 start-100 translate-middle badge rounded-pill bg-danger">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="12" height="12" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-trash-2">
                                                <polyline points="3 6 5 6 21 6"></polyline>
                                                <path d="M19 6v14a2 2 0 0 1-2 2H7a2 2 0 0 1-2-2V6m3 0V4a2 2 0 0 1 2-2h4a2 2 0 0 1 2 2v2"></path>
                                                <line x1="10" y1="11" x2="10" y2="17"></line>
                                                <line x1="14" y1="11" x2="14" y2="17"></line>
                                            </svg>
                                                  <span class="visually-hidden">unread messages</span>
                                                </span>
                                              </button>';
                                                echo  "</span>";
                                            }
                                        endif;

                                        ?>
                                    </td>
                                    <td>
                                        <?php
                                        if ($user->courses_count) :
                                            foreach ($user->courses as $course) {
                                                echo "<span class='badge '>";
                                                echo '<button type="button" class="btn btn-xs btn-primary position-relative">';
                                                echo $course->title;
                                                echo '<span class="position-absolute top-0 start-100 translate-middle badge rounded-pill bg-danger">
                                                        <svg xmlns="http://www.w3.org/2000/svg" width="12" height="12" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-trash-2">
                                                        <polyline points="3 6 5 6 21 6"></polyline>
                                                        <path d="M19 6v14a2 2 0 0 1-2 2H7a2 2 0 0 1-2-2V6m3 0V4a2 2 0 0 1 2-2h4a2 2 0 0 1 2 2v2"></path>
                                                        <line x1="10" y1="11" x2="10" y2="17"></line>
                                                        <line x1="14" y1="11" x2="14" y2="17"></line>
                                                        </svg>
                                                        <span class="visually-hidden">unread messages</span>
                                                        </span>
                                                </button>';
                                                echo  "</span>";
                                                echo "<br />";
                                            }

                                        endif
                                        ?>
                                    </td>
                                    <td>{{ $user->created_at }}</td>
                                    <td>
                                        <form action="{{ route('admin.users.user.ban',$user->id) }}" method="post" class="d-inline">
                                            @method("PATCH")
                                            @csrf
                                            <button type="submit" class="btn btn-outline-info btn-xs px-0 mx-0">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-slash">
                                                    <circle cx="12" cy="12" r="10"></circle>
                                                    <line x1="4.93" y1="4.93" x2="19.07" y2="19.07"></line>
                                                </svg>
                                            </button>
                                        </form>
                                        <a href="{{ route('admin.users.user.edit',$user->id) }}" class="btn btn-xs px-1 btn-outline-primary">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-edit-2">
                                                <path d="M17 3a2.828 2.828 0 1 1 4 4L7.5 20.5 2 22l1.5-5.5L17 3z"></path>
                                            </svg>
                                        </a>
                                        <form onsubmit="return confirm('You are about to delete user and all related data as well. Are you sure ?')" class="d-inline-block" action="{{ route('admin.users.user.destroy',$user->id) }}" method="post">
                                            @csrf
                                            @method("DELETE")
                                            <button type="submit" class="btn btn-xs btn-outline-danger px-1 mx-1">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-trash-2">
                                                    <polyline points="3 6 5 6 21 6"></polyline>
                                                    <path d="M19 6v14a2 2 0 0 1-2 2H7a2 2 0 0 1-2-2V6m3 0V4a2 2 0 0 1 2-2h4a2 2 0 0 1 2 2v2"></path>
                                                    <line x1="10" y1="11" x2="10" y2="17"></line>
                                                    <line x1="14" y1="11" x2="14" y2="17"></line>
                                                </svg>
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
        </div>
    </div>
</div>
@endsection


@push("custom_script")
<script src="https://cdn.datatables.net/1.12.1/js/jquery.dataTables.min.js"></script>
<script type="text/javascript">
    $(document).ready(function() {
        $('#users').DataTable();
    });
</script>
@endpush
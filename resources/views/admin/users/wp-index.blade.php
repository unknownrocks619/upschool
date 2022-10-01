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
                                    <th>
                                        Role
                                    </th>
                                    <th></th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $wp_level = [
                                    "a:1:{s:15:'student-over-18';b:1;}" => "student-over-18",
                                    "a:1:{s:18:'parents-of-student';b:1;}" => "parents-of-student",
                                    "a:1:{s:16:'student-under-18';b:1;}" => "student-under-18",
                                    "a:1:{s:14:'school-teacher';b:1;}" => "school-teacher",
                                    "administrator" => "Administrator",
                                    "editor" => "Editor",
                                    "tutor_instructor" => "Tutor Instructor",
                                    "build-a-library" => "Build a Library",
                                    "subscriber" => "Subscriber"
                                ];
                                ?>
                                @foreach ($users as $user)
                                <tr>
                                    <td>
                                        {{ $user->meta->first_name }}
                                        {{ $user->meta->last_name }}
                                    </td>
                                    <td>
                                        {{ $user->user_email }}
                                    </td>
                                    <td>
                                        <?php
                                        if (isset($wp_level[$user->meta->wp_capabilities])) {
                                            echo ucwords(\Str::replace("-", " ", $wp_level[$user->meta->wp_capabilities]));
                                        } else {
                                            $explode = explode('"', $user->meta->wp_capabilities);
                                            if (isset($explode[1])) {
                                                echo ucwords($explode[1]);
                                            } else {
                                                echo " - ";
                                            }
                                        }
                                        ?>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>

                <div class="card-footer">
                    {{ $users->links() }}
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
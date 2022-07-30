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
                    <h6 class="card-title">Sign up For Canva</h6>
                    <div class="table-responsive">
                        <table id="users" class="table">
                            <thead>
                                <tr>
                                    <th>Full Name</th>
                                    <th>Email / Username</th>
                                    <th>Status</th>
                                    <th></th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($users as $user)
                                <tr>
                                    <td>
                                        {{ $user->full_name }}
                                    </td>
                                    <td>
                                        {{ $user->email }}
                                    </td>
                                    <td>
                                        @if($user->approved)
                                        <span class="badge bg-success">
                                            Approved
                                        </span>
                                        @elseif($user->rejected)
                                        <span class="badge bg-danger">
                                            Rejected
                                        </span>
                                        @else
                                        <span class="badge bg-warning">
                                            Pending
                                        </span>
                                        @endif
                                    </td>
                                    <td>
                                        @if(! $user->approved && ! $user->rejected)
                                        <a class="btn btn-sm btn-outline-primary" href="{{ route('admin.users.canva.status',[$user->id,'type' => 'approve']) }}">Approve</a>

                                        <a href="{{ route('admin.users.canva.status',[$user->id,'type' => 'reject']) }}" class=" btn btn-sm btn-outline-danger">Reject</a>
                                        @endif
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
<x-dashboard>
    <div class="row">
        <div class="col-md-12">
            <x-flash></x-flash>
            <h2>Teacher List</h2>
            <table class="table table-bordered table-hover">
                <thead>
                    <tr>
                        <td>
                            S.No
                        </td>
                        <td>
                            Name
                        </td>
                        <td>
                            Email
                        </td>
                        <td>
                            Staus
                        </td>
                        <td>

                        </td>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($users as $user)
                    <tr>
                        <td>
                            {{ $loop->iteration }}
                        </td>
                        <td>
                            {{ $user->full_name() }}
                        </td>
                        <td>
                            {{ $user->email }}
                        </td>
                        <td>
                            {{ ucwords($user->status) }}
                        </td>
                        <td>
                            <a href="{{ route('frontend.manage.resources',['teacher',$user->id]) }}">View Resource</a>
                            <form class="d-inline" onsubmit="return confirm('Are you sure ? This action cannot be undone.')" action="{{ route('frontend.manage.delete.user',$user->id) }}" method="post">
                                @csrf
                                @method("DELETE")
                                <button type="submit" class="btn btn-link text-danger">Remove</button>
                            </form>
                        </td>
                    </tr>

                    @empty
                    <tr>
                        <td colspan="5" class="text-center bg-light">
                            Record List is empty
                        </td>
                    </tr>
                    @endforelse

                </tbody>
            </table>
        </div>
    </div>
</x-dashboard>
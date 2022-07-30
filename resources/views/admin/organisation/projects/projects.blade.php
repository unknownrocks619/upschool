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
                <a href="{{ route('admin.org.org.project.create',[$organisation->id]) }}" class="btn btn-outline-primary mb-3">
                    <x-plus>Add Project</x-plus>
                </a>
                <table class="table-bordered table-hover table">
                    <thead>
                        <tr>
                            <th>Project Title</th>
                            <th></th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($organisation->projects as $project)
                        <tr>
                            <td>
                                {{ $project->title }}
                            </td>
                            <td>
                                <a href="{{ route('admin.org.org.project.edit',$project->id) }}" class="btn btn-outline-primary">Edit</a>
                                <form class="d-inline" action="{{ route('admin.org.org.project.delete',$project->id) }}" method="post" onsubmit=" return confirm('You are about the delete project. This action cannot be undone. Are you sure ?')">
                                    @csrf
                                    @method("DELETE")
                                    <button type="submit" class="btn btn-outline-danger">Delete</button>
                                </form>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>



    @push("custom_script")
    <script>
        $(document).on("click", '.importCSVLink', function(event) {
            event.preventDefault();
            $.get($(this).attr('href'), (response) => $("#importCSV .modal-content").html(response));
        })
    </script>
    @endpush
</x-admin-layout>
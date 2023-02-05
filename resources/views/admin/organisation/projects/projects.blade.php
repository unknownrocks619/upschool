<x-admin-layout>
    @section("title")
    :: Organisation
    @endsection

    @push('custom_css')

    @endpush

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
                                <br />
                                <a data-bs-toggle='modal' data-bs-target="#enable_breaks" class="btn btn-secondary mb-3 @if($project->dontaion) btn-success @endif enable_breaks" href="{{ route('admin.org.org.project.donation.status',['enable',$project->getKey()]) }}">
                                    <i class="mdi mdi-currency-usd" class="text-lg"></i>
                                </a>
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
        $(document).on('click', '.enable_breaks', function(event) {
            event.preventDefault();
            $.get($(this).attr('href'), function(response) {
                $("#modal-content").html(response);
            })
        });
        $(document).on('click','.clonePlus', function (event) {
            event.preventDefault();
            let clone = $(".fieldCopy").clone();
                $(clone).removeClass('d-none fieldCopy');
            $('.modal-body').append(clone)
        })
        $(document).on('click','.removeClone', function (event) {
            event.preventDefault();

            let parent = $(this).closest('.row');
            $(parent).fadeOut('medium',function() {
                $(this).remove();
            });
        })
    </script>
    @endpush

    <x-modal modal="enable_breaks">

    </x-modal>
</x-admin-layout>

<div class="modal-content">
    <div class="modal-header">
        <h5 class="modal-title">
            {{ $lession->lession_name }} :: Resources
        </h5>
    </div>
    <div class="modal-body">
        <table class="table table-bordered table-hover">
            <thead>
                <tr>
                    <th>S.No</th>
                    <th>Resource Type</th>
                    <th>Position</th>
                    <th></th>
                </tr>
            </thead>
            <tbody>
                @foreach ($resources as $resource)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ ucwords($resource->type) }}</td>
                    <td>{{ ucwords($resource->location) }}</td>
                    <td>
                        Edit
                        <form id="resourceRemove" class="d-inline" action="{{ route('admin.lession.resource.delete',[$lession->id,$resource->id]) }}" method="post">
                            @csrf
                            @method("delete")
                            <button type="submit" class="btn btn-outline-danger btn-xs">
                                <x-trash>Delete</x-trash>
                            </button>
                        </form>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>

    <div class="modal-footer">
        <a href="" class='btn btn-secondary'>
            Close
        </a>
    </div>
</div>

<script type="text/javascript">
    $("form#resourceRemove").submit(function(event) {
        event.preventDefault();
        $.ajax({
            type: "POST",
            data: $(this).serializeArray(),
            url: $(this).attr("action"),
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            success: function(response) {}
        })
        $(this).closest('tr').fadeOut('fast');
    })
</script>
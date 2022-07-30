@extends("themes.admin.master")

@section("title")
:: {{ $course->title }} :: Resources
@endsection

@push("plugin_css")
<link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
@endpush
@section("content")
<x-layout heading="`{{ $course->title }}` Resource Management">
    <div class="col-xl-10 main-content ps-xl-4 pe-xl-5">
        <div class="card">
            <div class="card-header bg-success text-white">
                <h4>Add Widgets</h4>
            </div>
            <form enctype="multipart/form-data" id="add_widget_form" action="{{ route('admin.course.widget.store',$course->id) }}" method="post">
                @method("PATCH")
                @csrf
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-6">
                            <ul class="sortlist">
                                @foreach ($widgets as $widget)
                                <li class="draggable" data-id='{{ $widget->id }}'>
                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-move">
                                        <polyline points="5 9 2 12 5 15"></polyline>
                                        <polyline points="9 5 12 2 15 5"></polyline>
                                        <polyline points="15 19 12 22 9 19"></polyline>
                                        <polyline points="19 9 22 12 19 15"></polyline>
                                        <line x1="2" y1="12" x2="22" y2="12"></line>
                                        <line x1="12" y1="2" x2="12" y2="22"></line>
                                    </svg>
                                    {{ $widget->widget_name }}
                                </li>
                                @endforeach
                            </ul>
                        </div>
                        <div class="col-md-4 ml-3 border border-warning droppable">
                            <p id="message"></p>

                        </div>
                    </div>
                    <div class="row mt-3">
                        <div class="col-md-6">
                            <a href="{{ route('admin.course.widget',$course->id) }}" class="btn btn-primary w-100">
                                Save Resource
                            </a>
                        </div>
                    </div>
                </div>
            </form>
        </div>
        <div class="card mt-3">
            <div class="card-header bg-secondary text-white">
                <h4>Available Resources</h4>
            </div>
            <div class="card-body">
                <table class="table table-hover table-boredered">
                    <thead>
                        <tr>
                            <th>
                                S.No
                            </th>
                            <th>
                                Widget Type
                            </th>
                            <th>
                                Widget Name
                            </th>
                            <th>

                            </th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($course->widget as $widget)
                        <tr>
                            <td>
                                {{ $loop->iteration }}
                            </td>
                            <td>
                                {{ __('widget.'.$widget->widget_type) }}
                            </td>
                            <td>
                                {{ $widget->widget_name }}
                            </td>
                            <td>

                                <form action="{{ route('admin.course.widget.delete',[$course->id,$widget->id]) }}" method="post">
                                    @csrf
                                    @method("DELETE")
                                    <button type="submit" class="btn btn-outline-danger">
                                        <x-trash></x-trash>
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
    @include("admin.course.manage.nav",compact("course"))
</x-layout>
@endsection

@push("custom_script")
<script src="https://code.jquery.com/ui/1.13.1/jquery-ui.js"></script>
<script>
    $(document).on('click', '.add_widget', function(event) {
        event.preventDefault();
        $.get($(this).attr('href'), function(response) {
            $("#add_widget").html(response);
        })
    })
</script>

<script>
    $(".draggable").draggable()
    $(".droppable").droppable({
        drop: function(event, ui) {
            ui.draggable.draggable({
                disabled: true
            })
            console.log("Dropped ID: " + ui.draggable.data("id"));
            $("#message").html("Please..wait...").removeAttr('class').addClass("text-info");
            $(this).removeClass(".draggable");
            $('.draggable .droppable').sortable({
                connectWith: ".sortlist"
            })
            $.post($("form#add_widget_form").attr("action"), {
                _token: "{{ csrf_token() }}",
                widget: ui.draggable.data('id')
            }).done(function(response) {
                console.log(response);
                $("#message").html(response).addClass("text-success");
            })
        }


    })
</script>
@endpush
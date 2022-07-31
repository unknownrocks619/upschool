@extends("themes.admin.master")

@section("title")
:: Menu
@endsection

@section("plugins_css")
<link rel="stylesheet" href="{{ asset ('admin/assets/vendors/datatables.net-bs5/dataTables.bootstrap5.css') }}">
<link rel="stylesheet" href="//code.jquery.com/ui/1.13.1/themes/base/jquery-ui.css">

@endsection

@section("content")
<x-layout heading="Menu Manager">
    <div class="card">
        <div class="card-body">
            <div class="row mb-3">
                <div class="col-md-12">
                    <a href="{{ route('admin.menu.menu.create') }}" class="btn btn-primary btn-sm">
                        <x-plus>
                            Add New Menu
                        </x-plus>
                    </a>
                </div>
            </div>
            <table class=" table table-bordered">
                <thead>
                    <tr>
                        <th></th>
                        <th>Menu Name</th>
                        <th>Menu Type</th>
                        <th>Status</th>
                        <th>Position</th>
                        <th>Module</th>
                        <th></th>
                    </tr>
                </thead>
                @foreach ($menus->sortBy("sort_by") as $menu)
                <tbody data-id="{{ $menu->id }}" class="sortable">
                    <tr data-id="{{$menu->id}}" @if($menu->children->count()) class='bg-light parent_menu' @else class='parent_menu' @endif>
                        <td>
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-move">
                                <polyline points="5 9 2 12 5 15"></polyline>
                                <polyline points="9 5 12 2 15 5"></polyline>
                                <polyline points="15 19 12 22 9 19"></polyline>
                                <polyline points="19 9 22 12 19 15"></polyline>
                                <line x1="2" y1="12" x2="22" y2="12"></line>
                                <line x1="12" y1="2" x2="12" y2="22"></line>
                            </svg>
                        </td>
                        <td>{{$menu->menu_name}}</td>
                        <td>{{ __("menu.".$menu->menu_type)  }}</td>
                        <td>
                            {!! ($menu->active) ? "<span class='border border-success px-2 text-success'> Active </span>" : "<span class='border border-danger px-2 text-danger'> Inactive </span>" !!}
                        </td>
                        <td>
                            {{ __("menu.".$menu->menu_position) }}
                        </td>
                        <td>
                            <a data-bs-toggle="modal" data-bs-target="#menu_module" href="{{ route('admin.menu.link_module_options',$menu->id) }}" class="btn btn-outline-primary btn-xs link_module">
                                <x-plus>Link Module</x-plus>
                            </a>
                        </td>
                        <td>
                            <a href="{{ route('admin.menu.manage_module',$menu->id) }}" class="btn btn-primary btn-xs">Manage Module</a>
                            <a class="px-0 mx-0 btn btn-xs btn-outline-info" href="{{ route('admin.menu.menu.edit',$menu->id) }}">
                                <x-pencil>
                                </x-pencil>
                            </a>
                            <form class="d-inline" action="{{ route('admin.menu.menu.destroy',$menu->id) }}" method="post" onsubmit="return confirm('Are you sure? This action cannot be undone ?')">
                                @csrf
                                @method("DELETE")
                                <button type="submit" class="mx-0 px-0 btn btn-xs btn-outline-danger">
                                    <x-trash>

                                    </x-trash>
                                </button>
                            </form>
                        </td>
                    </tr>

                    @if($menu->children->count())
                    @foreach ($menu->children->sortBy("sort_by") as $child_menu)
                    <tr data-id="{{ $child_menu->id }}" class="child_menu">
                        <td>
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-move">
                                <polyline points="5 9 2 12 5 15"></polyline>
                                <polyline points="9 5 12 2 15 5"></polyline>
                                <polyline points="15 19 12 22 9 19"></polyline>
                                <polyline points="19 9 22 12 19 15"></polyline>
                                <line x1="2" y1="12" x2="22" y2="12"></line>
                                <line x1="12" y1="2" x2="12" y2="22"></line>
                            </svg>
                        </td>
                        <td>{{ $child_menu->menu_name }}</td>
                        <td>{{ $child_menu->menu_type }}</td>
                        <td> {!! ($child_menu->active) ? "<span class='border border-success px-2 text-success'> Active </span>" : "<span class='border border-danger px-2 text-danger'> Inactive </span>" !!}</td>
                        <td>

                            <form action="{{ route('admin.menu.reorder_position',$child_menu->id) }}" method="post">
                                @csrf
                                @method("PUT")
                                <div class="row">
                                    <div class="col-md-3">
                                        <input type="text" name="sort_by" value="{{ $child_menu->sort_by }}" id="sort_by">
                                    </div>
                                    <div class="col-md-2">
                                        <button type="submit">Update</button>
                                    </div>
                                </div>
                            </form>
                        </td>
                        <td>
                            <a data-bs-toggle="modal" data-bs-target="#menu_module" href="{{ route('admin.menu.link_module_options',$child_menu->id) }}" class="btn btn-outline-primary btn-xs link_module">
                                <x-plus>Link Module</x-plus>
                            </a>
                        </td>
                        <td>
                            <a href="{{ route('admin.menu.manage_module',$child_menu->id) }}" class="btn btn-primary btn-xs">Manage Module</a>
                            <a class="px-0 mx-0 btn btn-xs btn-outline-info" href="{{ route('admin.menu.menu.edit',$child_menu->id) }}">
                                <x-pencil>
                                </x-pencil>
                            </a>
                            <form class="d-inline" action="{{ route('admin.menu.menu.destroy',$child_menu->id) }}" method="post" onsubmit="return confirm('Are you sure? This action cannot be undone ?')">
                                @csrf
                                @method("DELETE")
                                <button type="submit" class="mx-0 px-0 btn btn-xs btn-outline-danger">
                                    <x-trash>

                                    </x-trash>
                                </button>
                            </form>
                        </td>
                    </tr>
                    @endforeach
                    @endif
                </tbody>
                @endforeach
            </table>
        </div>
    </div>
</x-layout>
@endsection

@section("modal")
<x-modal modal="menu_module">
</x-modal>
@endsection

@push("custom_script")
<script src="https://code.jquery.com/ui/1.12.0/jquery-ui.min.js"></script>

<script src="{{ asset ('admin/assets/vendors/datatables.net/jquery.dataTables.js') }}"></script>
<script src="{{ asset ('admin/assets/vendors/datatables.net-bs5/dataTables.bootstrap5.js') }}"></script>
<script>
    $(function() {
        'use strict';

        $(function() {
            $('#menu_table').DataTable({
                "aLengthMenu": [
                    [10, 30, 50, -1],
                    [10, 30, 50, "All"]
                ],
                "iDisplayLength": 10,
                "language": {
                    search: ""
                }
            });
            $('#menu_table').each(function() {
                var datatable = $(this);
                // SEARCH - Add the placeholder for Search and Turn this into in-line form control
                var search_input = datatable.closest('.dataTables_wrapper').find('div[id$=_filter] input');
                search_input.attr('placeholder', 'Search');
                search_input.removeClass('form-control-sm');
                // LENGTH - Inline-Form control
                var length_sel = datatable.closest('.dataTables_wrapper').find('div[id$=_length] select');
                length_sel.removeClass('form-control-sm');
            });
        });

        var $menus = $(".sortable");
        // $(".sortable").sortable({
        //     // cancel: "thead",
        //     // items: "tr.parent_menu",
        //     connectWith: '.sortable',

        //     stop: function(event, ui) {
        //         var items = $(ui.item).parent().sortable('toArray', {
        //             attribute: 'data-id'
        //         });
        //         var ids = $.grep(items, (item) => item !== "");

        //         // let $category = $(ui.item).parent();
        //         // var items = $category.sortable('toArray', {
        //         //     attribute: 'data-id'
        //         // });
        //         // var ids = $.grep(items, (item) => item !== "");
        //         $.post("{{ route('admin.menu.reorder') }}", {
        //             _token: "{{csrf_token()}}",
        //             ids,
        //             menu_id: $(ui.item).parent().data('id')
        //         }).done(function(response) {
        //             console.log(response);
        //         }).fail(function(response) {
        //             console.log(response);
        //         })
        //     }
        // });
    });
</script>

<script>
    $(document).on('click', '.link_module', function(event) {
        event.preventDefault();
        $.get($(this).attr('href'), function(response) {
            $("#menu_module").html(response);
        })
    })
</script>
@endpush
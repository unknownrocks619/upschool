@extends("themes.admin.master")

@section("title")
New Widget Manager
@endsection

@section("plugins_css")
<link rel="stylesheet" href="{{ asset('admin/assets/vendors/mdi/css/materialdesignicons.min.css') }}">

@endsection

@section("content")
<x-layout heading="New Widget :: {{ request()->widget_name }}">
    <div class="card">
        <div class="card-body">
            @include("admin.widgets.create.".request()->widget_type.".sample")
            @include("admin.widgets.create.".request()->widget_type)
        </div>
    </div>
</x-layout>
@endsection

@push("custom_script")
<script>
    $(".add_widget_row").click(function(event) {
        event.preventDefault();
        let content = $("#sample_form").clone();
        let tetId = Math.floor(Math.random() * 57);
        $(content).find('text-area').replaceWith("<textarea id='accord_" + tetId + "' class='form-control' name='widget_content[]'>");
        $(content).insertBefore("#submit_button").fadeIn().removeAttr("id");

        // tinymce.init({
        //     selector: 'textarea#accord_' + tetId,
        //     plugins: 'advlist autolink lists link image charmap preview anchor pagebreak',
        //     toolbar_mode: 'floating',
        // });
    })
    // $(".remove_section").click(function(event) {
    //     event.preventDefault();
    //     console.log("clicked on remove section");
    //     $(this).closest('.row').remove();
    // })
</script>
@endpush
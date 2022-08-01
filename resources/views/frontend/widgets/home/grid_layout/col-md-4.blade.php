<!-- Grid md-4 -->
<div class="row mb-5">
    @foreach ($widget->fields as $module)
    <div class="{{ $widget->layouts->layout }} col-sm-12 six-points">
        <div class="icon d-flex justify-content-center">
            <i class="{{ __('widget.'.$module->icon) }}"></i>
        </div>
        <div class="text-center">
            <p class="mb-0 title">{{ $module->title }}</p>
        </div>
        <div class="text-center details">
            {!! $module->content !!}
        </div>
    </div>
    @endforeach

</div>
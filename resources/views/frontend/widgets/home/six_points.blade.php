<!-- six points -->
{!! widget_start(["class"=>"container"]) !!}
@php
$widget = $widgets->where('widget_type',"grid-icon")->first();
$layout = json_decode($widget->widget_setting);
@endphp
<div class="row mb-5">
    @foreach ((array) json_decode($widget->widgets) as $key=> $value)
    <div class="col-lg-{{ $layout->layout }} col-md-{{ $layout->layout }} col-sm-12 six-points">
        <div class="icon d-flex justify-content-center">
            <i class="{{ $value->icon_class }}"></i>
        </div>
        <div class="text-center">
            <p class="mb-0 title">{{ $value->title }}</p>
        </div>
        <div class="text-center details">
            {!! $value->text !!}
        </div>
    </div>
    @endforeach

</div>
{!! widget_close() !!}
<!-- six points -->
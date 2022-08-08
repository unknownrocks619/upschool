@foreach ($widget->fields as $module)
<div class="footer-new" style="background-image: url({{ $module->image->path }});">
    <h4 id="magic-video-title" class="text-center pb-0 " id="footer-section-title">
        <span>{{ $module->title }}</span>
    </h4>
    <div class="text-white text-center container footer-details" id="footer-section-details" style="position: relative;z-index:2">
        {!! $module->content !!}
    </div>
    <div class="" style="background-color:{{ $widget->settings->theme_color }};position:absolute;width:100%;height:100%;top:0;opacity:0.5;z-index:1"></div>
</div>
@endforeach
@foreach (to_object($widget->widgets) as $widget)
<section class="mt-5">
    <div id="video-info" class="vert-center-container">
        <div class="d-flex justify-content-center">
            {!!
            iframe_loader($widget->video->source,$widget->video->id,$widget->title,"70%","70%",false)
            !!}
        </div>

    </div>
</section>
@endforeach
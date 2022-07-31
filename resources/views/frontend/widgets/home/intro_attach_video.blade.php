@foreach ((array) json_decode($widget->widgets) as $key => $value)
    <div class="mojaic"></div>
    <!-- banner bottom image -->
    <div class="d-flex justify-content-center banner-bottom-img">
        <img src="{{ $value->video->thumbnail }}" class="img-fluid img-responsive" />
    </div>
    <!-- banner bottom image -->
@endforeach
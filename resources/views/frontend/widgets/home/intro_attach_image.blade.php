@foreach ((array) json_decode($widget->widgets) as $key => $value)

    <div class="mojaic"></div>
    <!-- banner bottom image -->
    <div class="d-flex justify-content-center banner-bottom-img">
        <img src="{{ asset($value->featured_image->path) }}" class="img-fluid" alt="">
    </div>
    <!-- banner bottom image -->
@endforeach
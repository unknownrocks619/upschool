@foreach ((array) json_decode($widget->widgets) as $key => $value)
<section class="entrepreneurship-section mt-5 mb-5">
    <div class="container">
        <div class="row entrepreneurship-row">
            <div class="col-lg-7 col-12 d-flex justify-content-center align-items-center">
                <div>
                    <p class="text-white entrepreneurship-title">
                        {{ $value->title }}
                    </p>
                    <div class="text-white entrepreneurship-details">
                        {!! $value->content !!}
                    </div>
                </div>
            </div>
            <div class="col-lg-5 col-12">
                <div class="img-position">
                    <img src="{{ asset($value->featured_image->path) }}" class="img-fluid" alt="">
                </div>
            </div>
        </div>
    </div>
</section>

@endforeach
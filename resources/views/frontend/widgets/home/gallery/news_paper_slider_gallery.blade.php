<section class="container">
    <h1 class="sample-text mb-3">{{ $widget->fields[0]->title}}</h1>
    <div class="click-explain mb-3">
        {!! $widget->fields[0]->content !!}
    </div>

    <!-- Swiper -->
    <div class="swiper popUp container experienced-school-builder-magnific">
        <div class="swiper-wrapper">
            @foreach ($widget->fields as $module)
            <div class="swiper-slide">
                <a href="{{ asset($module->image->path) }}">
                    <img src="{{ asset($module->image->path) }}" class="img-fluid mb-5" alt="">
                </a>
            </div>
            @endforeach
        </div>
        <div class="swiper-button-next bg-white"></div>
        <div class="swiper-button-prev bg-white"></div>
        <div class="swiper-pagination"></div>
    </div>
</section>
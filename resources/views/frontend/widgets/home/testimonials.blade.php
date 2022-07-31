{!! widget_start() !!}
<h1 class="text-center mb-5 saying-title">
    {{ $widget->widget_name }}
</h1>
<!-- Swiper -->
<div class="swiper mySwiper swiper-initialized swiper-horizontal swiper-pointer-events swiper-css-mode">
    <div class="swiper-wrapper" id="swiper-wrapper-f085ea886bfeb52f" aria-live="off">
        @foreach ( (array) json_decode($widget->widgets) as $key => $value)
        <div class="swiper-slide @if( ! $loop->index) swiper-slide-active @elseif($loop->index == 1) swiper-slide-next @endif " data-swiper-slide-index="{{ $loop->index }}" style="width: 1079px;" role="group" aria-label="9 / 9">
            <div class="mb-4 person-img">
                <img src="@if($value->featured_image && $value->featured_image->path) {{ asset($value->featured_image->path) }} @else {{ asset('assets/images.jpg') }} @endif" alt="{{ $value->client }}">
            </div>
            <div class="pagination-gap">
                <div class="details testimonial-text">
                    {!! $value->testimonial !!}
                </div>
                <p class="name mb-2 mt-3">{{ $value->client }}</p>
                <p class="details designation">{{ $value->post }},{{ $value->client_org }}</p>
            </div>
        </div>

        @endforeach

    </div>
    <div class="swiper-button-next" tabindex="0" role="button" aria-label="Next slide" aria-controls="swiper-wrapper-f085ea886bfeb52f"></div>
    <div class="swiper-button-prev" tabindex="0" role="button" aria-label="Previous slide" aria-controls="swiper-wrapper-f085ea886bfeb52f"></div>
    <div class="swiper-pagination swiper-pagination-bullets swiper-pagination-horizontal"><span class="swiper-pagination-bullet"></span><span class="swiper-pagination-bullet swiper-pagination-bullet-active" aria-current="true"></span><span class="swiper-pagination-bullet"></span><span class="swiper-pagination-bullet"></span><span class="swiper-pagination-bullet"></span><span class="swiper-pagination-bullet"></span><span class="swiper-pagination-bullet"></span><span class="swiper-pagination-bullet"></span><span class="swiper-pagination-bullet"></span></div>
    <span class="swiper-notification" aria-live="assertive" aria-atomic="true"></span>
</div>
{!! widget_close() !!}
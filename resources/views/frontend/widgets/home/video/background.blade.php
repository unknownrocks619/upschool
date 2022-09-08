<style type="text/css">
    .video-background {
        background: #000;
        position: fixed;
        top: 0;
        right: 0;
        bottom: 0;
        left: 0;
        z-index: -99;
    }

    .video-foreground,
    .video-background iframe {
        position: absolute;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        pointer-events: none;
    }

    @media (min-aspect-ratio: 16/9) {
        .video-foreground {
            height: 300%;
            top: -100%;
        }
    }

    @media (max-aspect-ratio: 16/9) {
        .video-foreground {
            width: 300%;
            left: -100%;
        }
    }
</style>
@foreach ($widget->fields as $module)
<div class="vert-center-container">
    <div style="padding:56.25% 0 0 0;position:relative;opacity:0.5">
        <iframe src="https://player.vimeo.com/video/{{ $module->video->id }}?h=b24b030396&autoplay=1&loop=1&title=0&byline=0&portrait=0&background=1&controls=0" style="position:absolute;top:0;left:0;width:100%;height:100%;" frameborder="0" allow="autoplay; fullscreen; picture-in-picture" allowfullscreen></iframe>
    </div>
    <script src="https://player.vimeo.com/api/player.js"></script>

    <!-- <video autoplay playsinline muted loop id="myVideo player" height="900" class="home-top-video">
        <source src="https://www.w3schools.com/howto/rain.mp4" type="video/mp4">
        Your browser does not support HTML5 video.
    </video> -->
    <div class="vert-center-text" @if(isset($widget->settings->featured)) id="responsive-banner-title" @else style="top:6%;display:flex;align-items:center;justify-content:center"@endif>
        @if(isset ($widget->settings->featured) )
        <img src="{{ asset(settings('logo')) }}" class="img-fluid" alt="" />
        <h1 class="banner-title"><strong>{{ $module->title }}</strong></h1>
        @endif
        <div class="text-white @if(isset($widget->settings->featured)) mt-2  @else w-75 @endif banner-over-text text-center">
            {!! $module->content !!}
        </div>
    </div>
</div>
@endforeach
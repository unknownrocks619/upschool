@foreach ( (array) json_decode($widget->widgets) as $key => $value)

{!! widget_start() !!}
<div class="vert-center-container">
    <div id="myVideo" height="900" class="home-top-video">
        <iframe id="home_banner_iframe" src="https://player.vimeo.com/video/{{ $value->video->id }}?h=90402a2b5b&amp;muted=1&amp;autoplay=1&amp;loop=1&amp;transparent=0&amp;background=1&amp;app_id=122963" width="100%" height="360" frameborder="0" allow="autoplay; fullscreen; picture-in-picture" allowfullscreen="" title="Upschool Background 2" data-ready="true" class="elementor-background-video-embed" style="width: 1502.22px; height: 845px;opacity:0.4"></iframe>
    </div>
    <div class="vert-center-text" id="responsive-banner-title">
        <img src="{{ asset('upschool/frontend/images/home/footer-logo.png') }}" class="img-fluid" alt="" />
        <h1 class="banner-title"><strong>{{ $value->title }}</strong></h1>
        <p class="text-white mt-2 banner-over-text">…. by providing them with the skills, inspiration & support to solve real-world problems that have impact. </p>
    </div>
</div>

{!! widget_close() !!}
@endforeach
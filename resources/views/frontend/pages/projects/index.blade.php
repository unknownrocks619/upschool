@extends('themes.frontend.master')

@section("page_title")
{{ $menu->menu_name }}

@endsection

@push("custom_css")
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
@endpush

@section("content")
<div class="vert-center-container">
    <div id="myVideo" height="500" class="home-top-video" style="height: 550px;overflow:hidden">
        <iframe id="home_banner_iframe" src="https://player.vimeo.com/video/637345924?h=90402a2b5b&amp;muted=1&amp;autoplay=1&amp;loop=1&amp;transparent=0&amp;background=1&amp;app_id=122963" width="100%" height="260" frameborder="0" allow="autoplay; fullscreen; picture-in-picture" allowfullscreen="" title="Upschool Background 2" data-ready="true" class="elementor-background-video-embed" style="width: 1502.22px; height: 845px;opacity:0.4"></iframe>
    </div>
    <div class="vert-center-text" id="responsive-banner-title" style="top:15%">
        <img src="{{ asset('upschool/frontend/images/home/footer-logo.png') }}" class="img-fluid" alt="" />
        <h1 class="banner-title"><strong>Choose a Project: <br />Change the World</strong></h1>
        <p class="text-white mt-2 banner-over-text">We’re working with charity partners and schools across the globe to support projects that help build a better world.</p>
    </div>
</div>

<div class="container mt-4">
    <div class="row" style="background:#edf5f7">
        @foreach ($orgs as $org)
        <div class="col-md-2 pt-2" style="background:#edf5f7">
            <div class="card">
                @if($org->logo)
                <img src="{{ asset($org->logo->path) }}" alt="Upschool.co" class="img-fluid">
                @else

                <img src="https://upschool.co/wp-content/uploads/2022/06/Add-a-heading13.png" alt="Upschool.co" class="img-fluid">
                @endif
            </div>
            <p class="text-center mt-2">
                {{ $org->name }}
            </p>
        </div>
        @endforeach
    </div>

    <div class="row mt-4" style="margin-top:60px !important">
        @foreach ($projects as $project)
        <div class="col-md-4">
            <div class="card">
                @if($project->image)
                <igm src="{{ asset($project->image->path) }}" class="img-fluid" />
                @else
                <img src="https://upschool.co/wp-content/uploads/elementor/thumbs/Upschool-Charity-Projects-psgju87nr5soudwzo1zqs6lm5o8vksc0dcewgbufmo.png" class="img-fluid" />
                @endif
                <small class="text-center">
                    {{ $project->organisation->name }} | {{ ($project->country) ? $project->country : "Australia" }}
                </small>
                <h1 class="mt-3 px-3" style="font-size:16px;">
                    <a href="" style="color:#242254;line-height:1.3em;text-decoration:none">{{ $project->title }}</a>
                </h1>
                <div class="mt-4 px-3" style="font-size:13px; color:#242254">
                    {{ \Str::words(strip_tags(htmlspecialchars_decode($project->description)),15,"...")  }}
                </div>
                <div class="card-footer bg-white mt-3">
                    <a href="" class="btn btn-primary rounded-3" style="background:#b81242">Read More</a>
                </div>
            </div>
        </div>
        @endforeach
    </div>
</div>
@endsection
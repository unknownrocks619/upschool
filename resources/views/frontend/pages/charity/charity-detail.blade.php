@extends('themes.frontend.master')

@section("page_title")
{{ $organisation->name }} | Upschool.co

@endsection

<?php
$background = $organisation->featured_image->banner_image->path ? asset($organisation->featured_image->banner_image->path) : $organisation->featured_image->banner_image->fullPath;
$backgroundTablet = "";
$backgroundMobile = "";
$overlaybackground = "";
$textTransform = "";
$fontSize = "";
?>

@section("content")
<div class="container-fluid bg-white">
    <div class="row headerBanner" style="position: relative">
        <div class="backgroundOverlay border bg-white" style="position: absolute;width:205px; height: 205px;z-index:1;    right: 116px;
        bottom: -125px;">
            <img class="img-fluid" src='{{$organisation->logo->fullPath}}' />
        </div>
        <div class="col-md-12 headerBanner bannerText d-flex justify-content-center align-items-center" style="position: relative">
            <div class="col-8">
                <h2 class="text-center bigText">{{ $organisation->name }}</h2>
            </div>
        </div>
    </div>

    <!-- Content -->
    <div class="container mt-3 bg-white">
        <div class="row mt-4">
            <!--Social Login -->
            <div class="col-md-2 d-flex justify-content-start" style="column-gap: 15px;">
                <div class="col">
                    <a href="https://www.bluedragon.org/" target="_blank">
                        <span class="elementor-icon-list-icon">
                            <i aria-hidden="true" class="fas fa-globe"></i>
                        </span>
                        <span class="elementor-icon-list-text"></span>
                    </a>
                </div>
                <div class="col">
                    <a href="https://www.bluedragon.org/" target="_blank">
                        <span class="elementor-icon-list-icon">
                            <i aria-hidden="true" class="fab fa-facebook-square"></i>
                        </span>
                        <span class="elementor-icon-list-text"></span>
                    </a>
                </div>
                <div class="col">
                    <a href="https://www.bluedragon.org/" target="_blank">
                        <span class="elementor-icon-list-icon">
                            <i aria-hidden="true" class="fab fa-instagram"></i>
                        </span>
                        <span class="elementor-icon-list-text"></span>
                    </a>
                </div>
                <div class="col">
                    <a href="https://www.bluedragon.org/" target="_blank">
                        <span class="elementor-icon-list-icon">
                            <i aria-hidden="true" class="fab fa-linkedin"></i>
                        </span>
                        <span class="elementor-icon-list-text"></span>
                    </a>
                </div>
            </div>
        </div>
        <div class="row mt-5 mb-4">
            <div class="col-md-12 description">
                {!! $organisation->description !!}
            </div>
        </div>
    </div>

    <div class="container mt-4 bg-white">
        @foreach ($organisation->projects as $project)
            @include('frontend.pages.charity.projects.projects',compact('project'))
        @endforeach
    </div>

</div>

@endsection


@push('custom_css')
<style type="text/css">
    ul {
        list-style: none
    }
    h2.card-title {
        font-size: 18px;
        font-family: "Lexend", Sans-serif;
        line-height: 1.2em;
        letter-spacing: 0.5px;
        color: #242254;
        font-weight: 700
    }

    .card-footer {
        border-top: none !important;
    }
    .elementor-icon-list-icon{
        color :#B81242;
        font-size: 36px;
    }
    .btn-upschool-primary {
        background: #B81242 !important;
        font-family: "Nunito Sans", Sans-serif;
        font-size: 14px;
        font-weight: 600;
        letter-spacing: 1px;
        fill: #fff;
        color: #fff;
        border-radius: 28px 28px 28px 28px;
        padding: 12px 24px;
        line-height: 1;
    }

    .btn-upschool-primary:hover {
        transition: all 0.35s;
    }

    .btn-float-animation {

        transition-duration: .3s;
        transition-property: transform;
        transition-timing-function: ease-out;

    }

    .btn-float-animation:hover {
        transform: translateY(-8px);
    }

    .description {
        font-size: 18px;
        font-weight: 400;
        color: #242254;
        font-family: 'Nunito Sans';
        line-height: 29px;
        /* margin: -62px 0px 0px 0px; */
    }

    .headerBanner {
        background-image: url({{$background}});
        background-position: center center;
        min-height: 400px;
        background-size: cover;
    }

    .card-img {
        min-height: 234px !important;
        max-height: 234px !important;
    }

    .card {
        box-shadow: none !important;
    }

    /* next size - tablet */
    @media (max-width: 768px) {
        .headerBanner {
            background: url({{$backgroundTablet}});
            background-size: cover;

            background-position-x: "";

            background-position-y: "";
            ;
        }

        .card-img {
            max-height: 245px !important;
        }
    }

    /** next size - mobile */
    @media (max-width: 480px) {
        .headerBanner {
            background: url({{$backgroundMobile}});
            background-size: cover;
        }

        .card-img {
            max-height: 172px !important;
        }
    }

    .backgroundOverlay {
        transition: background 0.3s,
            border-radius 0.3s,
            opacity 0.3s;
    }

    h2.bigText {
        text-transform: {{ $textTransform }};
        font-size : 53px;
        color: #fff !important;
        z-index: 1;
        text-shadow: 2px 0px 2px #000;
        font-family: "Lexend", Sans-serif;
        line-height: 1;
        font-weight: 700;
    }
</style>
@endpush

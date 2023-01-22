@extends('themes.frontend.master')

@section("page_title")
{{ $project->title }} | Upschool.co

@endsection

<?php
$background = $project->images->banner->path ? asset($project->images->banner->path) : $project->images->banner->fullPath;
$backgroundTablet = "";
$backgroundMobile = "";
$overlaybackground = "";
$textTransform = "";
$fontSize = "";
?>

@section("content")
<div class="container-fluid bg-white">
    <div class="row headerBanner" style="position: relative">
        <div class="backgroundOverlay logoPosition" style="position: absolute;z-index:1;    right: 116px;
        bottom: -125px;">
            <div class="row">
                <div class="col-md-12">
                    <img class="img-fluid" height="500" width="500" src='{{$project->organisation->logo->fullPath }}' />
                </div>
            </div>

            <div class="row mt-4 ">
                <div class="col-md-12" style="display:inherit !important">
                    <a class="btn-upschool-secondary w-100" href="{{route('frontend.charity.name',[$project->organisation->slug])}}">
                        View All Projects
                    </a>
                </div>
            </div>

            <div class="row mt-4 ">
                <div class="col-md-12 text-center d-block">
                    <div class="card">
                        <div class="card-body">
                            <h2 class="mb-3">
                                Fund this Project
                            </h2>
                            <i aria-hidden="true" class="fas fa-info-circle text-lg" style="font-size:50px;color:#242254;"></i>

                            <div class="mt-3">
                                <h5>
                                    The Donate Function Is Coming Soon
                                </h5>
                            </div>
                            <div class="description mt-3">
                                    You will be able to donate to projects in early 2023.
                            </div>

                            <div class="button btn-upschool-pink mt-4" style="">
                                Donate (Coming Soon)
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Content -->
    <div class="container mt-3 bg-white">
        <div class="row mt-3">
            <div class="col-md-7 fw-bold">
                @include('frontend.pages.charity.projects.project-title')
            </div>
        </div>
        <div class="row mt-3">
            @include('frontend.pages.charity.projects.project-small-images',compact('project'))
        </div>

        <div class="row my-3">
            <div class="col-md-12">
                <ul class="ps-0 ms-0 description">
                    <li class="mb-2" style="font-family: 'Roboto' !important">
                        <strong>
                            Charity:
                        </strong>
                        {{$project->organisation->name}}
                    </li>
                    <li class="mb-2">
                        <strong>
                            Location
                        </strong>
                        {{$project->country}}
                    </li>
                    <li class="mb-2">
                        <strong>
                            Genre:
                        </strong>
                        {{$project->genre}}
                    </li>
                </ul>
            </div>
        </div>
        <div class="row mt-3">
            <div class="col-md-8">
                @include('frontend.pages.charity.projects.project-description',compact('project'))
            </div>
        </div>

        <div class="row mt-5 pt-5 mb-4">
            <div class="col-md-10 mb-4">
                <div class="description" style="font-family: 'Roboto' !important;font-weight:300 !important">
                    {!! nl2br($project->additional_blocks->topBlock[0]->description) !!}
                </div>
            </div>
        </div>

        @foreach ($project->additional_blocks->blocks as $block)
            <div class="row mt-3 pt-3">
                @if($loop->iteration % 2 )
                    <div class="col-md-6">
                        <img src='{{ $block->image }}' class='img-fluid' />
                    </div>
                    <div class="description col-md-6 d-flex justify-content-center align-item-center" style="flex-direction: column">
                        {!! ($block->post && $block->post->meta_value) ? $block->post->meta_value : '' !!}
                    </div>
                @else
                    <div class="description col-md-6 d-flex justify-content-center align-item-center" style="flex-direction: column">
                        {!! ($block->post && $block->post->meta_value) ? $block->post->meta_value : '' !!}
                    </div>
                    <div class="col-md-6">
                        <img src='{{ $block->image }}' class='img-fluid' />
                    </div>
                @endif
            </div>
        @endforeach


        <div class="row mt-3">
            <div class="col-md-7">
                <h2>
                    More Information
                </h2>
                <div class="description">
                    Visit Website: <span class="fw-bolder" style="font-weight: 700 !important">{{ ucwords(strtolower($project->organisation->name))}}</span>
                </div>
            </div>
        </div>

        <div class="row  d-flex justify-content-center">
            <div class="col-md-6 my-5">
                <a href="{{route('frontend.charity.name',[$project->organisation->slug])}}" class="btn btn-upschool-secondary btn-float-animation btn-hover" style="font-size: 16px;">
                    View All Projects of {{ ucwords(strtolower($project->organisation->name)) }}
                </a>
            </div>
        </div>


    </div>

</div>

@endsection


@push('custom_css')
<link rel='stylesheet' id='zilom-fonts-css' href='https://fonts.googleapis.com/css2?family=Kumbh+Sans:wght@400;700&#038;display=swap' type='text/css' media='all' />
<link rel='stylesheet' id='f_font_googleapisCSS-css' href='https://fonts.googleapis.com/css2?family=Roboto%3Awght%40400%3B700&#038;display=swap&#038;ver=1' type='text/css' media='all' />

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
    .btn-upschool-secondary {
        background: #242254 !important;
        font-family: "Kumbh Sans", sans-serif;
        font-weight: 600;
        letter-spacing: 1px;
        text-decoration: none;
        fill: #fff;
        color: #fff;
        padding: 12px 24px;
        line-height: 1;
        width:100% !important;
        text-align: center;
        font-size: 20px;
    }
    .btn-upschool-pink {
        background: #B81242 !important;
        font-family: "Kumbh Sans", sans-serif;
        letter-spacing: 1px;
        text-decoration: none;
        fill: #fff;
        color: #fff;
        padding: 12px 24px;
        line-height: 1;
        width:100% !important;
        text-align: center;
        font-size: 15px;
    }
    .btn-upschool-primary:hover {
        transition: all 0.35s;
    }

    .btn-hover:hover {
        color: #fff !important;
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

    .description > span {
        font-weight: 300 !important
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

    .logoPosition {
        width: 340px;
        height: 340px;
    }

    @media(min-width : 769px) {
        .logoPosition {
            width: 340px;
            height: 340px;
        }
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

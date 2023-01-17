@extends('themes.frontend.master')

@section("page_title")
{{ $menu->menu_name }}

@endsection

@section("content")

<?php
$elementorImage = json_decode($elementor->_elementor_data);
$imageSettings = $elementorImage[0]->settings;
$background = $elementorImage[0]->settings->background_image->url;
$overlaybackground = "#242254";
$backgroundTablet = $imageSettings->background_image_tablet->url;
$backgroundMobile = $imageSettings->background_image_mobile->url;
$backgroundPosition = $imageSettings->background_position_mobile;
$backgroundPositionX = $imageSettings->background_xpos->size . $imageSettings->background_xpos->unit;
$backgroundPositionY = $imageSettings->background_ypos->size . $imageSettings->background_ypos->unit;

/**
 * Typo Settings.
 */
$typeSettings = $elementorImage[0]->elements[0]->elements[0]->settings;

$fontSize = $typeSettings->typography_font_size->size . $typeSettings->typography_font_size->unit;
$textTransform =$typeSettings->typography_text_transform;
?>
<div class="container-fluid">
    <div class="row headerBanner" style="position: relative">
        <div class="backgroundOverlay" ></div>
        <div class="col-md-12 headerBanner bannerText d-flex justify-content-center align-items-center">
            {!! $elementor->post_content !!}...
        </div>
        </div>
    </div>
</div>

<div class="container mt-5">
    <div class="row mt-4">
        @foreach ($organisations as $org)
            <div class="col-md-4 col-sm-6 col-sm-12 mb-4">
                <div class="card" style="position: relative">
                    <img src='{{ $org->featured_image->banner_image->fullPath }}' class="img-fluid card-img" />
                    <div class="logo border" style="position: absolute;right:15px;top: 195px">
                        <img src="{{ $org->logo->fullPath }}" class="img-fluid" style="max-height: 53px; max-width:53px;"/>
                    </div>
                    <div class="mt-4" style="padding:10px;">
                        <h2 class="card-title" style="font-size:18px;">
                            {{$org->name}}
                        </h2>
                        <div class="description">

                            {{ excerptText($org->short_description,135) }}
                        </div>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
</div>

@endsection


@push('custom_css')
<style type="text/css">
    .description {
        font-size: 13px;
        font-weight:300;
        color : #242254;
        font-family: 'Nunito Sans'

    }
    .headerBanner {
        background: url({{$background}});
        background-position: {{$backgroundPosition}};
        min-height: 400px;
    }

    .card-img {
        max-height: 234px !important;
    }
    /* next size - tablet */
    @media (max-width: 768px) {
        .headerBanner {
            background: url({{$backgroundTablet}});
            background-size: cover;
            background-position-x: {{$backgroundPositionX}};
            background-position-y: {{$backgroundPositionY}};
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
        background-color: {{$overlaybackground}};
        opacity: 0.5;
        height: 100%;
        width:100%;
        position: absolute;
        left: 0;
        transition: background 0.3s, border-radius 0.3s, opacity 0.3s;
    }

    .bannerText > h2 {
        text-transform: {{$textTransform}};
        font-size : {{$fontSize}};
        color: #fff !important;
        z-index: 1
    }
</style>
@endpush

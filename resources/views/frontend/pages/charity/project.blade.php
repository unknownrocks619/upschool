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
$donation = $project->dontaion;
?>

@section("content")
<form action="{{route('frontend.frontend.checkout.list',[auth()->check() ? 'user': 'guest'])}}" method="post">

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


                            @if( ! $donation)
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

                            </div>
                            @else
                                    @csrf
                                    <div class="row">
                                        <div class="col-md-12 text-center p-2" style="background: #e7e7e7">
                                            <p class="fw-600 mb-0 pb-0">
                                                Total Funds Raised For this Project:
                                            </p>
                                            <p class="text-danger fs-3 mt-0 pt-0">
                                                AU $0.00
                                            </p>
                                        </div>
                                    </div>
                                    <div class="row mt-3">
                                        <div class="col-md-4 donation_amount_selection">
                                            <input type="radio" name="amount" value="5" class="d-none">
                                            <div class="border p-2 text-center">
                                                AU $5
                                            </div>
                                        </div>
                                        <div class="col-md-4 donation_amount_selection">
                                            <input type="radio" name="amount" value="20" checked class="d-none">
                                            <div class="border p-2 text-center">
                                                AU $20
                                            </div>
                                        </div>
                                        <div class="col-md-4 donation_amount_selection">
                                            <input type="radio" name="amount" value="50" class="d-none">
                                            <div class="border p-2 text-center">
                                                AU $50
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row mt-3">
                                        <div class="col-md-8">
                                            <input type="number" placeholder="Custom Amount" name="custom_amount" id="" class="form-control w-100">
                                        </div>
                                        <div class="col-md-4">
                                            <button type="button" class="btn btn-upschool-rectange submit-button">
                                                Donate
                                            </button>
                                        </div>
                                    </div>

                            @endif
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
<div class="modal fade" id="donateOption" tabindex="-1" aria-labelledby="myExtraLargeModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-md">
        <div class="modal-content" id="modal-content">
            <div class="modal-body">
                <div class="description">
                    Your Support is Appreciated.
                </div>
                <h2 class="mb-1 pb-1">Donation: <span class="donation-modal-text"></span></h2>
                <div class="description">
                    Less Credit card processing fees (2.9% + AU  $0.30)
                </div>

                <h4 class="mt-4">
                    TIP UPSCHOOL PLATFORM
                </h4>
                <div class="description">
                    Upschool does not take a commission on donations - but we do have significat expenses to operate and maintain this platform. Giving us a tip will allow us to continue to develop the platform. Thank you!
                </div>

                <div class="row mt-4">
                    <div class="col-md-2">
                        AU $0
                    </div>
                    <div class="col-md-8">
                        <input type="range" min="0" max="20" value="3" class="form-range" style="box-shadow: none" id="customRange1">
                    </div>
                    <div class="col-md-2">
                        AU $20
                    </div>
                </div>

                <div class="row mt-3">
                    <div class="col-md-12">
                        <h3>Tip: AU $ <span class="textTip">3.00</span></h3>
                    </div>
                </div>

                <div class="row mt-3 d-flex justify-content-between border-bottom">
                    <div class="col-md-4">
                        Donation
                    </div>
                    <div class="col-md-8 d-flex justify-content-end">
                        AU $ <span class="text-donation-bar"></span>
                    </div>
                    <div class="col-md-4">
                        Tip
                    </div>
                    <div class="col-md-8  d-flex justify-content-end">
                        AU $<span class="textTip">3.00</span>
                    </div>
                    <div class="col-md-6 mt-1">
                        Credit Card/Bank Processing Fee
                    </div>
                    <div class="col-md-6 mt-2  d-flex justify-content-end">
                        AU $0.53
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12 d-flex justify-content-between">
                        <h4>
                            Total Donation
                        </h4>
                        <h4>
                            AU $ <span class="total_check"></span>
                        </h4>
                    </div>
                </div>

                <div class="row mt-2">
                    <div class="col-md-12">
                        <button type="submit" class="btn  btn-upschool-rectange w-100">
                            Continue to Checkout
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
</form>
@endsection


@push('custom_scripts')
    <script type='text/javascript'>
        $(document).on('click','.donation_amount_selection', function (event) {
            event.preventDefault();
            $('.donation_amount_selection').find('input').attr('checked',false);
            $('.donation_amount_selection').find('div').removeClass('border-primary');
            $("input[name=custom_amount]").val('').attr('placeholder','Custom Amount').attr('required',false);
            $(this).find('input').attr('checked',true);
            $(this).find('div').addClass('border-primary')
            $('.donation-modal-text').data('amount',0);

            let donationAmount = $(this).find('input').val();
            if (donationAmount > 0 ) {
                $("#donateOption").modal('show');
                donationText(donationAmount);
            }
        });

        $('input[type=range]').change( function (event) {
            event.preventDefault();
            let tip = $('.textTip').html(parseFloat($(this).val()).toFixed(2));
            donationAmount = parseFloat($('.donation-modal-text').data('amount'));
            let totalAmount = parseFloat($(this).val()) + donationAmount + 0.53;

            $('.total_check').empty().html(parseFloat(totalAmount).toFixed(2));

        })

        function donationText(amount) {
            $('.textTip').html(parseFloat(3).toFixed(2));
            $(".donation-modal-text").html('AU $' + parseFloat(amount).toFixed(2)).data('amount',parseFloat(amount).toFixed(2));
            $(".text-donation-bar").html(parseFloat(amount).toFixed(2));
            $('.total_check').html(parseFloat(amount) + 3.0 + 0.53);

        }

        $(document).on('click','input[name=custom_amount]', function (event) {
            $('.donation_amount_selection').find('input').attr('checked',false);
            $('.donation_amount_selection').find('div').removeClass('border-primary');
            $(this).attr('required',true);
        })

        $(document).on('click', '.submit-button', function (event) {


            let donationAmount = 0;
            // check if input has default value.
            if ($('input[name=custom_amount]').val() && $('input[name=custom_amount]').val() > 0 ) {
                donationAmount = $('input[name=custom_amount]').val();
            } else {
                $.each ($('.donation_amount_selection') , function (index, element) {
                    if ( $(element).find('input').is(':checked') ) {
                        donationAmount = $(element).find('input').val();
                    }
                })
            }

            if (donationAmount > 0 ) {
                $(".modal-backdrop").remove();
                $(this).attr('data-bs-target','#donateOption')
                        .attr('data-bs-toggle','modal')
                        .attr('data-bs-backdrop',"static");
                $('#donateOption').modal('toggle');
                donationText(donationAmount);
            } else {
                $(this).removeAttr('data-bs-target')
                        .removeAttr('data-bs-toggle')
                        .removeAttr('data-bs-backdrop');
            }
        })

    </script>
@endpush


@push('custom_css')
<link rel='stylesheet' id='zilom-fonts-css' href='https://fonts.googleapis.com/css2?family=Kumbh+Sans:wght@400;700&#038;display=swap' type='text/css' media='all' />
<link rel='stylesheet' id='f_font_googleapisCSS-css' href='https://fonts.googleapis.com/css2?family=Roboto%3Awght%40400%3B700&#038;display=swap&#038;ver=1' type='text/css' media='all' />

<style type="text/css">
    .donation_amount_selection {
        cursor: pointer;
    }
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
    input[type=number] {
        box-shadow: none;
        font-family: "Nunito Sans", Sans-serif;

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
    .btn-upschool-rectange {
        background: #B81242 !important;
        font-family: "Nunito Sans", Sans-serif;
        font-size: 14px;
        font-weight: 600;
        letter-spacing: 1px;
        fill: #fff;
        color: #fff;
        border-radius: 4px;
        padding: 12px 12px;
        line-height: 1;
    }
    .btn-upschool-rectange:hover {
        color: #fff;
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

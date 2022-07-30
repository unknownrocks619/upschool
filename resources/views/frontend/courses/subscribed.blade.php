<x-dashboard>
    @push("custom_css")
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/owl-carousel/1.3.3/owl.carousel.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/owl-carousel/1.3.3/owl.theme.min.css">
    <style type="text/css">
        /******************  News Slider Demo-9 *******************/
        .post-slide9 {
            margin: 0 10px;
            background: #fff;
            box-shadow: 0 1px 2px rgba(43, 59, 93, .3);
            margin-bottom: 2em
        }

        .post-slide9 .post-img {
            overflow: hidden;
            position: relative
        }

        .post-slide9 .post-img img {
            width: 100%;
            height: auto;
            transform: scale(1, 1);
            transition: all .3s ease 0s
        }

        .post-slide9:hover .post-img img {
            transform: scale(1.2, 1.2)
        }

        .post-slide9 .over-layer {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            opacity: 0;
            text-align: center;
            background: rgba(68, 67, 64, .9);
            transition: all .5s linear
        }

        .post-slide9:hover .over-layer {
            opacity: 1
        }

        .post-slide9 .post-link {
            padding: 0;
            margin: 0;
            list-style: none;
            position: relative;
            top: 45%
        }

        .post-slide9 .post-link li {
            display: inline-block;
            margin-right: 10px
        }

        .post-slide9 .post-link li a {
            width: 60px;
            height: 60px;
            line-height: 59px;
            border-radius: 50%;
            color: #fff;
            background: #333;
            font-size: 20px;
            transform: scale(1, 1);
            transition: all .2s linear
        }

        .post-slide9 .post-link li a:hover {
            text-decoration: none;
            transform: scale(1.1, 1.1)
        }

        .post-slide9 .post-review {
            padding: 15px 0;
            overflow: hidden
        }

        .post-slide9 .post-title {
            margin-top: 0
        }

        .post-slide9 .post-title a {
            display: block;
            color: #333;
            font-size: 18px;
            text-align: center;
            font-weight: 700;
            text-transform: uppercase;
            transition: all .5s ease 0s
        }

        .post-slide9 .post-title a:hover {
            text-decoration: none;
            color: #1f80bb
        }

        .post-slide9 .post-info {
            list-style: none;
            padding: 10px 0 0 0;
            margin: 0 0 7px 0;
            text-align: center;
            border-top: 1px solid #d3d3d3
        }

        .post-slide9 .post-info li {
            display: inline-block;
            margin-right: 13px
        }

        .post-slide9 .tag-info {
            margin: 0;
            padding: 0 0 10px 0;
            text-align: center;
            border-bottom: 1px solid #d3d3d3
        }

        .post-slide9 .tag-info li {
            list-style: none;
            display: inline-block
        }

        .post-slide9 .tag-info li a {
            color: grey;
            text-transform: capitalize
        }

        .post-slide9 .tag-info li a:hover {
            color: #1f80bb;
            text-decoration: none
        }

        .post-slide9 .post-description {
            color: #828282;
            font-size: 14px;
            padding: 5px 25px;
            line-height: 25px
        }

        .post-slide9 .read-more {
            color: #333;
            float: right;
            font-weight: 700;
            margin-right: 25px;
            text-transform: capitalize
        }

        .post-slide9 .read-more:hover {
            color: #1f80bb;
            text-decoration: none
        }

        .owl-theme .owl-buttons div {
            position: relative;
            border-radius: 0;
            background: #807b87;
            padding: 7px 15px;
            transition: all .5s ease 0s
        }

        .owl-theme .owl-buttons .owl-prev {
            position: absolute;
            left: 0;
            top: 50%;
            opacity: 0;
            transition: all .5s linear
        }

        .owl-carousel:hover .owl-buttons .owl-prev {
            opacity: 1;
            left: -30px
        }

        .owl-theme .owl-buttons .owl-next {
            position: absolute;
            right: 0;
            top: 50%;
            opacity: 0;
            transition: all .5s linear
        }

        .owl-carousel:hover .owl-buttons .owl-next {
            opacity: 1;
            right: -30px
        }

        .owl-next:before,
        .owl-prev:before {
            content: "\f053";
            font-family: "Font Awesome 5 Free";
            font-weight: 900;
            color: #fff
        }

        .owl-next:before {
            content: "\f054"
        }

        @media only screen and (max-width:990px) {
            .post-slide9 .post-info li {
                margin-right: 5px
            }

            .owl-theme .owl-buttons div {
                display: none
            }
        }

        @media only screen and (max-width:767px) {
            .post-slide9 .post-link li a {
                width: 40px;
                height: 40px;
                line-height: 39px;
                font-size: 13px
            }

            .post-slide9 .post-title a {
                font-size: 14px
            }
        }
    </style>
    @endpush

    <div class="row">
        <div class="col-md-12">
            <div id="news-slider9" class="owl-carousel">
                @forelse ($courses as $course)
                <div class="post-slide9">
                    <div class="post-img">
                        <?php
                        $featured_post = ($course->images && $course->images->intro_image) ? asset($course->images->intro_image->image->path) : settings("logo");
                        ?>
                        <img class="pic-1" src="{{ $featured_post }}">
                        <div class="over-layer">
                            <ul class="post-link">
                                <li><a href="#" class="fa fa-search"></a></li>
                                <li><a href="#" class="fa fa-link"></a></li>
                            </ul>
                        </div>
                    </div>
                    <div class="post-review">
                        <h3 class="post-title"><a href="{{ route('frontend.course.watch',$course->id) }}">{{ $course->title }}</a></h3>
                        <ul class="post-info">
                            <li>Total Chapter: {{ $course->chapters->count() }}</li>
                            <!-- <li>Date: Feb 21, 2016</li> -->
                            <!-- <li>Author:Williamson</li> -->
                        </ul>
                        <!-- <ul class="tag-info">
                            <li>Tags:</li>
                            <li><a href="">Mockups,</a></li>
                            <li><a href="">Graphics,</a></li>
                            <li><a href="">Web Projects</a></li>
                        </ul> -->
                        <div class="post-description">
                            {!! $course->short_description !!}
                        </div>
                        <a href="{{ route('frontend.course.index',$course->id) }}" class="read-more">Continue Lession >></a>
                    </div>
                </div>
                @empty
                <h5 class="text-muted">
                    Not Enrolled in any Course
                </h5>
                @endforelse
            </div>
        </div>
    </div>

    @push("custom_scripts")
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/owl-carousel/1.3.3/owl.carousel.min.js"></script>

    <script>
        $(document).ready(function() {
            $("#news-slider").owlCarousel({
                items: 2,
                itemsDesktop: [1199, 2],
                itemsMobile: [600, 1],
                pagination: true,
                autoPlay: true
            });

            $("#news-slider2").owlCarousel({
                items: 3,
                itemsDesktop: [1199, 2],
                itemsDesktopSmall: [980, 2],
                itemsMobile: [600, 1],
                pagination: false,
                navigationText: false,
                autoPlay: true
            });

            $("#news-slider3").owlCarousel({
                items: 3,
                itemsDesktop: [1199, 2],
                itemsDesktopSmall: [1000, 2],
                itemsMobile: [700, 1],
                pagination: false,
                navigationText: false,
                autoPlay: true
            });

            $("#news-slider4").owlCarousel({
                items: 3,
                itemsDesktop: [1199, 3],
                itemsDesktopSmall: [1000, 2],
                itemsMobile: [600, 1],
                pagination: false,
                navigationText: false,
                autoPlay: true
            });

            $("#news-slider5").owlCarousel({
                items: 3,
                itemsDesktop: [1199, 3],
                itemsDesktopSmall: [1000, 2],
                itemsMobile: [650, 1],
                pagination: false,
                navigationText: false,
                autoPlay: true
            });

            $("#news-slider6").owlCarousel({
                items: 3,
                itemsDesktop: [1199, 3],
                itemsDesktopSmall: [980, 2],
                itemsMobile: [600, 1],
                pagination: false,
                navigationText: false
            });

            $("#news-slider7").owlCarousel({
                items: 3,
                itemsDesktop: [1199, 3],
                itemsDesktopSmall: [1000, 2],
                itemsMobile: [650, 1],
                pagination: false,
                autoPlay: true
            });

            $("#news-slider8").owlCarousel({
                items: 3,
                itemsDesktop: [1199, 3],
                itemsDesktopSmall: [980, 2],
                itemsMobile: [600, 1],
                autoPlay: true
            });

            $("#news-slider9").owlCarousel({
                items: 3,
                itemsDesktop: [1199, 2],
                itemsDesktopSmall: [980, 2],
                itemsTablet: [650, 1],
                pagination: false,
                navigation: true,
                navigationText: ["", ""]
            });

            $("#news-slider10").owlCarousel({
                items: 4,
                itemsDesktop: [1199, 3],
                itemsDesktopSmall: [980, 2],
                itemsMobile: [600, 1],
                navigation: true,
                navigationText: ["", ""],
                pagination: true,
                autoPlay: true
            });

            $("#news-slider11").owlCarousel({
                items: 4,
                itemsDesktop: [1199, 3],
                itemsDesktopSmall: [980, 2],
                itemsMobile: [600, 1],
                pagination: true,
                autoPlay: true
            });

            $("#news-slider12").owlCarousel({
                items: 2,
                itemsDesktop: [1199, 2],
                itemsDesktopSmall: [980, 1],
                itemsTablet: [600, 1],
                itemsMobile: [550, 1],
                pagination: true,
                autoPlay: true
            });

            $("#news-slider13").owlCarousel({
                navigation: false,
                pagination: true,
                items: 3,
                itemsDesktop: [1199, 3],
                itemsDesktopSmall: [980, 2],
                itemsMobile: [600, 1],
                navigationText: ["", ""]
            });

            $("#news-slider14").owlCarousel({
                items: 4,
                itemsDesktop: [1199, 3],
                itemsDesktopSmall: [980, 2],
                itemsMobile: [550, 1],
                pagination: false,
                autoPlay: true
            });
        });
    </script>
    @endpush
</x-dashboard>
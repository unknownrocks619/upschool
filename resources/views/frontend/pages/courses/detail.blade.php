@extends('themes.frontend.master')

@section("page_title")

{{ $course->title }}

@endsection

@section("content")
<section class="top-bg">
    <div class="row m-0">
        <div class="col-lg-7 col-sm-12 d-flex justify-content-center align-items-center p-0">
            <div class="w-75 banner-text">
                <p class="text-center text-white fs-1 fw-bold">{{ $course->title }}</p>
                <p class="text-center top-title details fw-bold mb-5"> {!! $course->banner_text ?? "You are in the right spot to learn something new" !!} .</p>
                <div class="text-center text-white top-details">

                </div>
            </div>
        </div>
        <div class="col-lg-5 col-sm-12 top-img p-0 banner-img">
            @if($course->images && isset($course->images->banner_featured_image))
            <img src="{{ asset($course->images->banner_featured_image->image->path) }}" class='img-fluid' alt=''>";
            @else
            <img src="{{ asset('upschool/frontend/images/course/rocket-hero.png') }}" class='img-fluid' alt=''>";
            @endif
        </div>
    </div>
</section>


<section class="container mt-5 mb-5">
    <div class="row gy-4">
        <div class="col-md-8">
            {!! $course->full_description !!}
        </div>
        <div class="col-md-4" style="position:relative;top:-75px">
            <div class="card">
                @if($course->images && isset( $course->images->intro_image ))
                <img src="{{ asset ($course->images->intro_image->image->path) }}" class="img-fluid" />
                @else
                <img src="https://upschool.co/wp-content/uploads/elementor/thumbs/2-3-pry7w01olj1k39rs7btrt5f7dug5g8bmxwr9mf1214.png" class="img-fluid" />
                @endif
                <div class="card-header p-0 m-0">
                    <h4 class="text-center">Navigate the Plathform</h4>
                    <div style="padding:56.25% 0 0 0;position:relative;"><iframe src="https://player.vimeo.com/video/701160845?h=e0b2b751ad" style="position:absolute;top:0;left:0;width:100%;height:100%;" frameborder="0" allow="autoplay; fullscreen; picture-in-picture" allowfullscreen></iframe></div>
                    <script src="https://player.vimeo.com/api/player.js"></script>
                </div>

                <div class="card-body">

                </div>

                <div class="footer pt-0 mt-0 ">
                    <div class="row text-center mt-0 pt-0">
                        <div class="col-md-12 text-center mb-1 pt-1">
                            <form action="{{ route('frontend.course.enroll',$course->id) }}" method="post">
                                @csrf
                                <button type="submit" class="btn btn-primary" style="background-color: #242254 ;">ENROLL NOW</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

@endsection
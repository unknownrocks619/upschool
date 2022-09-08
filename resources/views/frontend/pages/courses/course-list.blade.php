@push("custom_css")
<!-- google font link -->
<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Kumbh+Sans:wght@100;200;300;400;500;600;700;800;900&family=Lexend:wght@100;200;300;400;500;600;700;800;900&family=Nunito+Sans:wght@200;400;600;800;900&family=Playfair+Display:wght@600&family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,800;1,100&display=swap" rel="stylesheet">
<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Gaegu:wght@300;400;700&display=swap" rel="stylesheet">

@endpush

<!-- top section -->
<section class="top-bg">
    <div class="row m-0">
        <div class="col-lg-7 col-sm-12 d-flex justify-content-center align-items-center p-0">

            <div class="w-75 banner-text">
                <p class="text-center text-white fs-1 fw-bold">Courses</p>
                <p class="text-center top-title details fw-bold mb-5">You are in the right spot to learn something new.</p>
                <p class="text-center text-white top-details">Inside the walls of this virtual school are the tools and
                    inspiration to find your voice, engage in your passions (and discover new ones), learn
                    really cool new skills but most importantly, we want you to use all of this for good!</p>
                <p class="text-center text-white top-italic">Go out and change the world for the better you amazing human.
                    We’re counting on you!</p>
            </div>
        </div>
        <div class="col-lg-5 col-sm-12 top-img p-0 banner-img">
            <img src="{{ asset('upschool/frontend/images/course/rocket-hero.png') }}" class="img-fluid" alt="">

        </div>
    </div>
</section>

<!-- course section -->
<section class="container mt-5 mb-5">
    <div class="row gy-4">
        <?php
        $courses = \App\Models\Course::latest()->paginate(10);
        foreach ($courses as $course) :
        ?>
            <div class="col-lg-4 col-md-6 col-sm-12 ">
                <div class="card">
                    <div>
                        @if($course->images && $course->images->intro_image)
                        <img src="{{ asset($course->images->intro_image->image->path) }}" class="img-fluid" alt="">
                        @else
                        <img src="{{ asset('upschool/frontend/images/course/Course-Featured-Image-Graphics-1.jpg') }}" class="img-fluid" alt="">
                        @endif
                        <div class="ps-3 pe-3 pt-2">
                            <p class="course-title">{{ $course->title }}</p>
                            <p class="course-details details">
                                {!! $course->short_description !!}
                            </p>

                            <a href="{{ route('course.show',$course->alias_title) }}" class="button rounded-3 text-white" style="background-color: #242254;">
                                See More
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        <?php
        endforeach
        ?>
    </div>
</section>

@push("custom_scripts")

@endpush
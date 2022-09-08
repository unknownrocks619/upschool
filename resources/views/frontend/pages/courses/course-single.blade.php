@push("custom_css")
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/magnific-popup.js/1.1.0/magnific-popup.css" rel="stylesheet" />
<style>
    .image-source-link {
        color: #98C3D1;
    }

    .mfp-with-zoom .mfp-container,
    .mfp-with-zoom.mfp-bg {
        opacity: 0;
        -webkit-backface-visibility: hidden;
        /* ideally, transition speed should match zoom duration */
        -webkit-transition: all 0.3s ease-out;
        -moz-transition: all 0.3s ease-out;
        -o-transition: all 0.3s ease-out;
        transition: all 0.3s ease-out;
    }

    .mfp-with-zoom.mfp-ready .mfp-container {
        opacity: 1;
    }

    .mfp-with-zoom.mfp-ready.mfp-bg {
        opacity: 0.8;
    }

    .mfp-with-zoom.mfp-removing .mfp-container,
    .mfp-with-zoom.mfp-removing.mfp-bg {
        opacity: 0;
    }
</style>
@endpush

<!-- banner section -->
<section class="banner-section">
    <div class="row m-0">
        <div class="col-lg-7 col-sm-12 m-0 p-0" style="position: relative;">
            <div style="position: absolute; bottom: 7rem; left: 6rem">
                <p class="text-white free-program"><span class="yelloe-text-color">100% Free</span> Program</p>
                <p class="build-library yelloe-text-color">{{ $value->page_name }}</p>
                <p class="text-white yelloe-text-color banner-details">A beautiful program for empowering children to<br> make meaningful and tangible impact on a global<br>scale.</p>
                <p class="yelloe-text-color underline-text">* This unit is currently open to <span style="text-decoration: underline;">AUSTRALIAN</span> school *</p>

                <div class="heading-btn d-flex mb-3" id="banner-heading-btn">
                    <a href="{{ route('register') }}" class="d-flex align-items-center">Register <i class="fas fa-angle-right ps-2"></i></a>
                </div>
            </div>

        </div>
        <div class="col-lg-5 col-sm-12 m-0 p-0">
            <div class="row p-0 m-0">
                <div class="col-lg-6 col-sm-6 col-6 p-0 m-0">
                    <img src="{{ asset('upschool/frontend/images/build-a-library/build-banner-1.jpg') }}" class="img-fluid p-0" alt="">
                </div>
                <div class="col-lg-6 col-sm-6 col-6 p-0 m-0 box-img">
                    <div>

                    </div>
                </div>
            </div>
            <div class="row p-0 m-0">
                <div class="col-lg-6 col-sm-6 col-6 p-0 m-0">
                    <img src="{{ asset('upschool/frontend/images/build-a-library/build-banner-2.jpg') }}" width="100%" height="82%" alt="" style="object-fit: cover;">
                </div>
                <div class="col-lg-6 col-sm-6 col-6 p-0 m-0">
                    <img src="{{ asset('upschool/frontend/images/build-a-library/build-banner-3.jpg') }}" width="100%" height="82%" alt="" style="object-fit: cover;">
                </div>
            </div>
        </div>
    </div>
</section>






<!-- counter section -->
<div style=" margin-top: -5.42rem;">
    <section class="counter-section pt-4 pb-2">
        <div class="container">
            <div class="row">
                <div class="col-lg-3 col-md-3 col-sm-12 first-count">
                    <p class="text-center count-number count">0</p>
                    <p class="text-center count-title">Positions Left for Term 1, 2022</p>
                </div>
                <div class="col-lg-3 col-md-3 col-sm-12">
                    <p class="text-center count-number count">7</p>
                    <p class="text-center count-title">Positions Left for Term 2, 2022</p>
                </div>
                <div class="col-lg-3 col-md-3 col-sm-12">
                    <p class="text-center count-number count">9</p>
                    <p class="text-center count-title">Positions Left for Term 3, 2022</p>
                </div>
                <div class="col-lg-3 col-md-3 col-sm-12">
                    <p class="text-center count-number count">10</p>
                    <p class="text-center count-title">Positions Left for Term 4, 2022</p>
                </div>
            </div>
        </div>
    </section>
</div>


<!-- body title section -->
<section class="body-title-section mt-5">
    <h1 class="text-center heading-title">What's in the Program?</h1>
    <div class="heading-title-cover">
        <p class="text-center">Our 10-week program includes every resource required “out of the box” to take children on a journey to building a real library for a community in need somewhere in the world. There are lesson introduction videos, task cards and worksheets, lesson closure videos and extension activities. It’s fully differentiated for ages 5 to 18 years and comes with full curriculum documents and overviews aligned to Australian outcomes.</p>

        <p class="text-center" id="heading-title-part-1">Register and begin.</p>
        <p class="text-center" id="heading-title-part-1">This FREE program is strictly limited to 10 schools a term! Act Fast.</p>

    </div>

    <div class="heading-title-part-2">
        <p class="text-center">Together, we can bring educational equality to the world.</p>
    </div>
    <div class="heading-btn d-flex justify-content-center">
        <a href="" class="d-flex align-items-center">Limited Spots: Apply Now <i class="fas fa-angle-right ps-2"></i></a>
    </div>

</section>

<!-- video section -->

<section class="mt-5">
    <div id="video-info" class="vert-center-container">
        <div class="d-flex justify-content-center">
            <video autoplay muted loop id="myVideo" height="500" controls>
                <source src="https://www.w3schools.com/howto/rain.mp4" type="video/mp4" />
                Your browser does not support HTML5 video.
            </video>
        </div>

    </div>
</section>
<div class="mojaic"></div>

<!-- Discription -->
<section>
    <div class="discription">
        <p class="text-center">In this program, your school (led by the students) will be taken on a 10-week journey to raise the funds to build a library for a community in need, somewhere in the world. The end result is real-world, tangible change.</p>
    </div>
    <div class="mt-3 mb-5">
        <p class="text-center discription-text">* This unit is currently open to <span style="text-decoration: underline;">AUSTRALIAN</span> school *</p>
    </div>

    <div class="heading-btn d-flex justify-content-center mb-3">
        <a href="" class="d-flex align-items-center">Limited Spots: Apply Now <i class="fas fa-angle-right ps-2"></i></a>
    </div>

</section>

<!-- video section -->

<section class="mt-5">
    <div id="video-info" class="vert-center-container">
        <div class="d-flex justify-content-center">
            <video autoplay muted loop id="myVideo" height="500" controls class="mb-5">
                <source src="https://www.w3schools.com/howto/rain.mp4" type="video/mp4" />
                Your browser does not support HTML5 video.
            </video>
        </div>

    </div>
</section>
<div class="mojaic"></div>
<div class="discription-1 mb-5">
    <p id="video-above"><strong>Video Above:</strong> a model of the library your school will be building – a shipping container converted into a library. </p>
</div>

<!-- how it works section -->
<section>
    <h1 class="work-title text-center mb-5">How it Works</h1>
    <div class="steps-section">
        <!-- step 1 -->
        <div class="steps-divider">
        </div>
        <div class="step">
            <p class="step-details">
                <strong>Step 1:</strong> Children learn about their place in the world, they investigate famous change-makers and they explore different educational settings around the world. They begin to understand that they have the power to make a difference.
            </p>
        </div>

        <!-- step 2 -->
        <div class="steps-divider">
        </div>
        <div class="step">
            <p class="step-details">
                <strong>Step 2:</strong> Children go through an investigation on our platform and study communities across the globe that have limited educational resources. Everyone has a vote and the school then chooses which community they want to build the library for.
            </p>
        </div>

        <!-- step 3 -->
        <div class="steps-divider">
        </div>
        <div class="step">
            <p class="step-details">
                <strong>Step 3:</strong> Children then go on a journey and develop their entrepreneurial skills to find creative ways to raise the money required to build the library
            </p>
        </div>

        <!-- step 4 -->
        <div class="steps-divider">
        </div>
        <div class="step">
            <p class="step-details">
                <strong>Step 4:</strong> When the funds are raised, Upschool engages our construction partners in the region and the library is built. Books are donated and shipped in from all over the world to the region and the library is delivered to the community – full of books.
            </p>
        </div>

        <!-- step 5 -->
        <div class="steps-divider">
        </div>
        <div class="step">
            <p class="step-details">
                <strong>Step 5:</strong> The end result is that students have played a real part in doing something good for someone on the other side of the world who can never repay them. The feeling they get will hopefully set them up for life to want to continue to make real change in the world.
            </p>
        </div>
    </div>
    <div class="heading-btn d-flex justify-content-center" id="five-parts-top-btn">
        <a href="" class="d-flex align-items-center">Limited Spots: Apply Now <i class="fas fa-angle-right ps-2"></i></a>
    </div>
</section>

<!-- five parts section -->

<section class="container mt-5 mb-5">
    <div class="row m-0">
        <div class="col-lg-2 col-sm-12 pe-3">
            <div class="icon">
                <i class="fas fa-globe-americas px-2 py-2 text-white" style="background-color: #b81242;"></i>
            </div>
            <div class="five-parts mt-4 mb-3">
                <p class="mb-0 title">Real-World Learning</p>
            </div>
            <div class="five-parts-details">
                <p>
                    We take 'real-world' to the next level by designing projects with 'real' outcomes.
                </p>
            </div>
        </div>
        <div class="col-lg-3 col-sm-12">
            <div class="icon">
                <i class="far fa-lightbulb px-3 py-2 text-white" style="background-color: #fdcf60;"></i>
            </div>
            <div class="five-parts mt-4 mb-3">
                <p class="mb-0 title">Entrepreneurship With Purpose</p>
            </div>
            <div class="five-parts-details">
                <p>
                    We want to teach the entrepreneurs of tomorrow to operate with purpose and ethics.
                </p>
            </div>
        </div>
        <div class="col-lg-2 col-sm-12">
            <div class="icon">
                <i class="fas fa-cubes text-white px-2 py-2" style="background-color: #6ec1e4;"></i>
            </div>
            <div class="five-parts mt-4 mb-3">
                <p class="mb-0 title">Team Players & Collaborators</p>
            </div>
            <div class="five-parts-details">
                <p>
                    Our projects bring children, teachers and communities together to work towards a common goal.
                </p>
            </div>
        </div>
        <div class="col-lg-3 col-sm-12">
            <div class="icon">
                <i class="fas fa-parachute-box text-white px-2 py-2" style="background-color: #61ce70;"></i>
            </div>
            <div class="five-parts mt-4 mb-3">
                <p class="mb-0 title">Creativity & Problem Solving</p>
            </div>
            <div class="five-parts-details">
                <p>
                    We inspire creative thinking and dynamic problem solving. These are the skills for tomorrow.
                </p>
            </div>
        </div>
        <div class="col-lg-2 col-sm-12">
            <div class="icon">
                <i class="fas fa-laptop text-white px-2 py-2" style="background-color: #d58d63;"></i>
            </div>
            <div class="five-parts mt-4 mb-3">
                <p class="mb-0 title">Skill Based Learning</p>
            </div>
            <div class="five-parts-details">
                <p>
                    From graphic design & film making through to creative writing and storytelling (and everything in between)
                </p>
            </div>
        </div>
    </div>
</section>

<!-- points with video section -->

<section>
    <div class="row m-0 pointwith-video-section">
        <div class="col-lg-6 col-sm-12 p-0 m-0">

            <div class="d-flex justify-content-center">
                <video autoplay muted loop id="myPintsVideo" height="620" controls>
                    <source src="https://www.w3schools.com/howto/rain.mp4" type="video/mp4" />
                    Your browser does not support HTML5 video.
                </video>

            </div>
        </div>
        <div class="col-lg-6 col-sm-12 m-0 p-0" style="background-color: #b81242;">
            <div class="points">
                <div class="d-flex align-items-center points-icon">
                    <i class="fas fa-check text-white icon-font"></i>
                    <p class="points-title">Purpose & Intention</p>
                </div>

                <div class="d-flex align-items-center points-icon">
                    <i class="fas fa-check text-white icon-font"></i>
                    <p class="points-title">Global Perspective</p>
                </div>


                <div class="d-flex align-items-center points-icon">
                    <i class="fas fa-check text-white icon-font"></i>
                    <p class="points-title">Making A Real Difference</p>
                </div>

                <div class="d-flex align-items-center points-icon">
                    <i class="fas fa-check text-white icon-font"></i>
                    <p class="points-title">Curriculum Aligned</p>
                </div>
            </div>
        </div>
    </div>
    </div>
</section>
<!-- counter section -->
<section class="counter-section pt-4 pb-2" style="background-color: #b81242;">
    <div class="container">
        <div class="row">
            <div class="col-lg-3">
                <p class="text-center count-number count text-white">0</p>
                <p class="text-center count-title text-white">Positions Left for Term 1, 2022</p>
            </div>
            <div class="col-lg-3">
                <p class="text-center count-number count text-white">7</p>
                <p class="text-center count-title text-white">Positions Left for Term 2, 2022</p>
            </div>
            <div class="col-lg-3">
                <p class="text-center count-number count text-white">9</p>
                <p class="text-center count-title text-white">Positions Left for Term 3, 2022</p>
            </div>
            <div class="col-lg-3">
                <p class="text-center count-number count text-white">10</p>
                <p class="text-center count-title text-white">Positions Left for Term 4, 2022</p>
            </div>
        </div>
    </div>
</section>


<!-- Discription -->
<section class="principal-comments">
    <div class="discription">
        <p class="text-center">"This program is brilliant. It's literally transformed our school and the experience we offer our children. Whatever program Upschool produces in the future, we are in"</p>
    </div>
    <div class="mt-4 mb-2">
        <p class="identity text-center">Principal (Melbourne)</p>
    </div>

    <div class="heading-btn d-flex justify-content-center">
        <a href="" class="d-flex align-items-center">Limited Spots: Apply Now <i class="fas fa-angle-right ps-2"></i></a>
    </div>
    </div>
</section>

<!-- Resourse section -->

<section class="container experienced-school-builder-magnific">
    <div class="row gy-5">
        <div class="col-lg-4 col-sm-12 p-0">
            <a href="{{ asset('upschool/frontend/images/build-a-library/resource-1.jpg') }}">
                <img src="{{ asset('upschool/frontend/images/build-a-library/resource-1.jpg') }}" class="img-fluid" alt="">
            </a>
        </div>
        <div class="col-lg-4 col-sm-12 p-0 d-flex justify-content-center align-items-center">
            <div>
                <p class="resource-text text-center">All Resources Included...</p>
                <p class="click-img text-center">(click any image to expand)</p>
            </div>

        </div>
        <div class="col-lg-4 col-sm-12 p-0">
            <a href="{{ asset('upschool/frontend/images/build-a-library/resource-2.jpg') }}">
                <img src="{{ asset('upschool/frontend/images/build-a-library/resource-2.jpg') }}" class="img-fluid" alt="">
            </a>
        </div>
    </div>

    <div class="row">
        <div class="col-lg-4 col-sm-12 p-0 d-flex justify-content-center align-items-center bottom-testimonial">
            <div>

                <p class="testimonial-one-section click-img pe-5 testimonial">“Open the course, play the videos,<br> follow the instructions and watch your<br> children make global impact. It’s simple,<br> fun and purposeful. Couldn’t dream of a<br> better way of teaching children”</p>

                <p class="testimonial-one-section teacher-name pe-5 mt-3 testimonial"><strong>Paul Lowe (Assistant Principal,<br> Billanook Primary School)</strong></p>
            </div>

        </div>
        <div class="col-lg-4 col-sm-12 p-0">
            <a href="{{ asset('upschool/frontend/images/build-a-library/resource-3.jpg') }}">
                <img src="{{ asset('upschool/frontend/images/build-a-library/resource-3.jpg') }}" class="img-fluid" alt="">
            </a>
            <p class="click-img mt-5 testimonial">“This program is the dream of every principal,<br> teacher, parent and ultimately, student. Our<br> community is buzzing with excitement”</p>

            <p class="teacher-name mt-3 testimonial"><strong>David Pelosi (Principal)​</strong></p>
        </div>
        <div class="col-lg-4 col-sm-12 p-0 d-flex justify-content-center align-items-center bottom-testimonial">
            <div>

                <p class="testimonial click-img ps-5">“To say that we are impressed would be<br> an understatement! Everything looks<br> amazing, and I know that all teachers<br> will be thrilled to be working with the<br> content you have created”</p>

                <p class="testimonial teacher-name ps-5"><strong>Brianna Witte (Teacher, Haileybury<br> College)​</strong></p>
            </div>

        </div>
    </div>
</section>

<!-- sample program section -->
<div class="d-flex justify-content-center mt-5">
    <div class="sample-divider">
    </div>
</div>
<p class="sample-text text-center">Sample Program</p>
<p class="click-explain text-center">Click to expand</p>


<!-- Swiper section -->
<section>
    <div class="swiper mySwiper mb-5">
        <div class="swiper-wrapper mb-5">
            <div class="swiper-slide mb-4">
                <img src="{{ asset('upschool/frontend/images/build-a-library/swiper-1.jpg') }}" class="img-fluid" alt="">
            </div>
            <div class="swiper-slide mb-4">
                <img src="{{ asset('upschool/frontend/images/build-a-library/swiper-2.jpg') }}" class="img-fluid" alt="">
            </div>
            <div class="swiper-slide mb-4">
                <img src="{{ asset('upschool/frontend/images/build-a-library/swiper-3.jpg') }}" class="img-fluid" alt="">
            </div>
            <div class="swiper-slide mb-4">
                <img src="{{ asset('upschool/frontend/images/build-a-library/swiper-4.jpg') }}" class="img-fluid" alt="">
            </div>
            <div class="swiper-slide mb-4">
                <img src="{{ asset('upschool/frontend/images/build-a-library/swiper-5.jpg') }}" class="img-fluid" alt="">
            </div>
            <div class="swiper-slide mb-4">
                <img src="{{ asset('upschool/frontend/images/build-a-library/swiper-6.jpg') }}" class="img-fluid" alt="">
            </div>


        </div>
        <div class="swiper-button-next"></div>
        <div class="swiper-button-prev"></div>
        <div class="swiper-pagination"></div>
    </div>

    <div class="heading-btn d-flex justify-content-center" id="swiper-bottom">
        <a href="" class="d-flex align-items-center">Limited Spots: Apply Now <i class="fas fa-angle-right ps-2"></i></a>
    </div>
</section>

<!-- experienced school builders -->

<section class="container">
    <h1 class="sample-text mb-3">We're experienced school builders!</h1>
    <p class="click-explain mb-3">Join us on this program and help us scale the mission we have already begun. We have very deep roots in the regions that we are building schools and libraries in. The project your community takes on is in exceptionally safe hands. </p>

    <!-- Swiper -->
    <div class="swiper popUp container experienced-school-builder-magnific">
        <div class="swiper-wrapper">
            <div class="swiper-slide">
                <a href="{{ asset('upschool/frontend/images/build-a-library/experienced-1.jpg') }}">
                    <img src="{{ asset('upschool/frontend/images/build-a-library/experienced-1.jpg') }}" class="img-fluid mb-5" alt="">
                </a>
            </div>
            <div class="swiper-slide">
                <a href="{{ asset('upschool/frontend/images/build-a-library/experienced-2.jpg') }}">

                    <img src="{{ asset('upschool/frontend/images/build-a-library/experienced-2.jpg') }}" class="img-fluid mb-5" alt="">
                </a>
            </div>
            <div class="swiper-slide">
                <a href="{{ asset('upschool/frontend/images/build-a-library/experienced-3.jpg') }}">

                    <img src="{{ asset('upschool/frontend/images/build-a-library/experienced-3.jpg') }}" class="img-fluid mb-5" alt="">
                </a>
            </div>
            <div class="swiper-slide">
                <a href="{{ asset('upschool/frontend/images/build-a-library/experienced-4.jpg') }}">

                    <img src="{{ asset('upschool/frontend/images/build-a-library/experienced-4.jpg') }}" class="img-fluid mb-5" alt="">
                </a>
            </div>
            <div class="swiper-slide">
                <a href="{{ asset('upschool/frontend/images/build-a-library/experienced-5.jpg') }}">

                    <img src="{{ asset('upschool/frontend/images/build-a-library/experienced-5.jpg') }}" class="img-fluid mb-5" alt="">
                </a>
            </div>
            <div class="swiper-slide">
                <a href="{{ asset('upschool/frontend/images/build-a-library/experienced-6.jpg') }}">
                    <img src="{{ asset('upschool/frontend/images/build-a-library/experienced-6.jpg') }}" class="img-fluid mb-5" alt="">
                </a>
            </div>
            <div class="swiper-slide">
                <a href="{{ asset('upschool/frontend/images/build-a-library/experienced-7.jpg') }}">
                    <img src="{{ asset('upschool/frontend/images/build-a-library/experienced-7.jpg') }}" class="img-fluid mb-5" alt="">
                </a>

            </div>
        </div>
        <div class="swiper-button-next bg-white"></div>
        <div class="swiper-button-prev bg-white"></div>
        <div class="swiper-pagination"></div>
    </div>
</section>


<!-- some common question -->

<section class="mt-5 px-10">
    <div class="row p-0 m-0">
        <div class="col-lg-5 col-sm-12 col-12 col-md-5">
            <div class="d-flex flex-column align-items-left justify-content-center ">
                <h2 class="pt-2 ask-question">
                    Some Common Questions
                </h2>
                <p class="question-description mt-4">You probably have lots of questions!</p>
            </div>
            <div class="heading-btn d-flex justify-content-center mt-5">
                <a href="" class="d-flex align-items-center">Limited Spots: Apply Now <i class="fas fa-angle-right ps-2"></i></a>
            </div>
            <br /><br />
            <img src="{{ asset('frontend/images/build-a-library/questions.png') }}" alt="" class="img-fluid" />
        </div>
        <div class="col-lg-7 col-md-7 col-sm-12 col-12 ">
            <hr class="hr-3" />
            <div class="accordion accordion-flush" id="accordionFlushExample">
                <div class="accordion-item">
                    <h2 class="accordion-header" id="flush-headingOne">
                        <a class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapseOne" aria-expanded="false" aria-controls="flush-collapseOne">
                            Is The Program Really Free?
                        </a>
                    </h2>
                    <div id="flush-collapseOne" class="accordion-collapse collapse" aria-labelledby="flush-headingOne" data-bs-parent="#accordionFlushExample">
                        <div class="accordion-body build-a-library p-0">
                            It’s 100% free – yes. We have an e-commerce platform (kindbox.com) that supports this project. One of the ways you can raise money is by sending members of your community to Kindbox to purchase everyday products like toilet paper, hand soaps and more. Proceeds are directed into the project you are raising funds for upon checkout. We take a percentage of every sale. This is how we have managed to operate this educational service for free.
                        </div>
                    </div>
                </div>
                <div class="accordion-item">
                    <h2 class="accordion-header" id="flush-headingTwo">
                        <a class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapseTwo" aria-expanded="false" aria-controls="flush-collapseTwo">
                            What Ages Is The Program Suitable For?
                        </a>
                    </h2>
                    <div id="flush-collapseTwo" class="accordion-collapse collapse" aria-labelledby="flush-headingTwo" data-bs-parent="#accordionFlushExample">
                        <div class="accordion-body build-a-library p-0">
                            We have prep students (5-year-olds) right through to 17-year-old’s in our program. It’s differentiated and open to everyone.
                        </div>
                    </div>
                </div>
                <div class="accordion-item">
                    <h2 class="accordion-header" id="flush-headingThree">
                        <a class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapseThree" aria-expanded="false" aria-controls="flush-collapseThree">
                            Do Schools Run This As A Whole School Project Or Can It Be Done As A Class?
                        </a>
                    </h2>
                    <div id="flush-collapseThree" class="accordion-collapse collapse" aria-labelledby="flush-headingThree" data-bs-parent="#accordionFlushExample">
                        <div class="accordion-body build-a-library p-0">
                            Either. Whole school engagement is a key to the success, but it certainly can be led one year level for example.
                        </div>
                    </div>
                </div>
                <div class="accordion-item">
                    <h2 class="accordion-header" id="flush-headingFour">
                        <a class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapseFour" aria-expanded="false" aria-controls="flush-collapseFour">
                            How Is The Library Built?
                        </a>
                    </h2>
                    <div id="flush-collapseFour" class="accordion-collapse collapse" aria-labelledby="flush-headingFour" data-bs-parent="#accordionFlushExample">
                        <div class="accordion-body build-a-library p-0">
                            We have construction partners in the areas of your chosen project. We will manage the entire construction and logistics process. All you need to do is raise the funds and enjoy the impact you are making.
                        </div>
                    </div>
                </div>
                <div class="accordion-item">
                    <h2 class="accordion-header" id="flush-headingFive">
                        <a class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapseFive" aria-expanded="false" aria-controls="flush-collapseFive">
                            Can We Travel To The Region To See The Library?
                        </a>
                    </h2>
                    <div id="flush-collapseFive" class="accordion-collapse collapse" aria-labelledby="flush-headingFive" data-bs-parent="#accordionFlushExample">
                        <div class="accordion-body build-a-library p-0">
                            Absolutely. We want to take teachers on a tour to see the libraries that have been built (including your own). Tours will be run during the school holidays.
                        </div>
                    </div>
                </div>

            </div>
            <hr />
        </div>
    </div>
</section>





<!-- apply section -->
<section class="mt-5">
    <div class="row m-0">
        <div class="col-lg-5 col-sm-12 p-0 apply-img">

        </div>
        <div class="col-lg-7 col-sm-12 pe-0 ps-0 apply-section">

            <h1>Apply Now</h1>
            <p>Leave your details and we will be in contact with you to discuss a potential position in the program</p>

            <div class="apply-box" style="position: relative;">
                <h1 class="d-flex justify-content-center"><i class="fas fa-envelope text-white"></i></h1>
                <p class="text-center text-white ">Build a Library - Application</p>
                <p class="text-center text-white" id="join-text">If you would like to join this program, please fill out this form.</p>
                <p class="text-center text-white" id="question-text">6 Questions</p>
                <div class=" border-3 start-btn">
                    <p class="text-white text-center pb-2" style="font-size: 1.2em; cursor: pointer;">START <i class="fas fa-arrow-right"></i></p>
                </div>
            </div>

        </div>
    </div>
</section>

@push("custom_scripts")
<script src="https://cdnjs.cloudflare.com/ajax/libs/magnific-popup.js/1.1.0/jquery.magnific-popup.min.js"></script>
<script>
    var swiper = new Swiper(".popUp", {
        slidesPerView: 3,
        spaceBetween: 0,
        slidesPerGroup: 1,
        loop: true,
        loopFillGroupWithBlank: true,
        autoplay: {
            delay: 5000,
        },
        pagination: {
            el: ".swiper-pagination",
            clickable: true,
        },
        navigation: {
            nextEl: ".swiper-button-next",
            prevEl: ".swiper-button-prev",
        },
    });
</script>
<script>
    $(document).ready(function() {
        $('.experienced-school-builder-magnific').magnificPopup({
            delegate: 'a',
            type: 'image',
            closeOnContentClick: false,
            closeBtnInside: false,
            mainClass: 'mfp-with-zoom mfp-img-mobile',
            image: {
                verticalFit: true,
                titleSrc: function(item) {
                    return item.el.attr('title') + ' &middot; <a class="image-source-link" href="' + item.el.attr('data-source') + '" target="_blank">image source</a>';
                }
            },
            gallery: {
                enabled: true
            },
            zoom: {
                enabled: true,
                duration: 300, // don't foget to change the duration also in CSS
                opener: function(element) {
                    return element.find('img');
                }
            }
        });
    });
</script>
@endpush
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta name="csrf-token" content="{{ csrf_token() }}">


    <link rel="icon" href="https://upschool.co/wp-content/uploads/2022/03/cropped-Untitled-design7-32x32.png" type="image/x-icon" />
    <link rel="shortcut icon" href="https://upschool.co/wp-content/uploads/2022/03/cropped-Untitled-design7-32x32.png" type="image/x-icon" />
    <link rel="icon" href="https://upschool.co/wp-content/uploads/2022/03/cropped-Untitled-design7-32x32.png" sizes="32x32" />

    <!-- bootstrap link -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous" />
    <!-- google font link -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Kumbh+Sans:wght@100;200;300;400;500;600;700;800;900&family=Lexend:wght@100;200;300;400;500;600;700;800;900&family=Nunito+Sans:wght@200;400;600;800;900&family=Playfair+Display:wght@600&family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,800;1,100&display=swap" rel="stylesheet">


    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@200&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Lexend:wght@500&family=Nunito:wght@200&display=swap" rel="stylesheet">
    <style>
        p {
            font-family: 'Nunito', sans-serif !important;
        }

        .title {
            color: #242154 !important;
            font-family: 'Lexend', sans-serif !important;
        }

        h1,
        h2,
        h3,
        h4,
        h5 {
            color: #242154 !important;
            font-family: 'Lexend', sans-serif !important;

        }

        .banner-title {
            font-family: 'Lexend', sans-serif !important;
            color: #fff !important
        }

        .nav-text {
            padding: 13px 19px !important;
        }
    </style> <!-- Link Swiper's CSS -->
    <link rel="stylesheet" href="https://unpkg.com/swiper/swiper-bundle.min.css" />
    <!-- font icon -->
    <script src="https://kit.fontawesome.com/2f1f0451bd.js" crossorigin="anonymous"></script>
    <!-- custom css -->
    <link rel="stylesheet" href="{{ asset('upschool/frontend/css/main.css') }}" />

    @stack("custom_css")

    <title>Upschool @yield('page_title')</title>
</head>

<body>

    <!-- navbar -->
    @include("frontend.layouts.navigation")
    <!-- navbar -->
    <main style="background-color: #F4F4F4 !important;">
        {{-- back to top button --}}
        <x-back-to-top />
        {{-- back to top button --}}
        @yield('content')
        <!-- footer section -->
        @include('frontend.layouts.footer')
        <!-- footer section -->
    </main>
    <!-- bootsrtap script -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
    <!-- bootsrtap script -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script>
        function toggleFunc(x) {
            let even = 'block';
            let odd = 'none';
            let elements = $(x).parent("li").find("ul.dropdown-menu")
            console.log(elements);
            Array.prototype.forEach.call(elements, function(element) {

                element.style.display === even ? element.style.display = odd : element.style.display = even
            });
            $(x).parent("li").find("span.caret").toggleClass("fa-minus fa-plus");
        }
        /* navbar toggle */
        $(document).ready(function() {
            // jQuery code

            $('[data-trigger]').on('click', function(e) {
                e.preventDefault()
                e.stopPropagation()
                var offcanvas_id = $(this).attr('data-trigger')
                $(offcanvas_id).toggleClass('show')
                $('body').toggleClass('offcanvas-active')
                $('.screen-overlay').toggleClass('show')
            })


            // Close menu when pressing ESC
            $(document).on('keydown', function(event) {
                if (event.keyCode === 27) {
                    $('.mobile-offcanvas').removeClass('show')
                    $('body').removeClass('overlay-active')
                }
            })

            $('.btn-close, .screen-overlay').click(function(e) {
                $('.screen-overlay').removeClass('show')
                $('.mobile-offcanvas').removeClass('show')
                $('body').removeClass('offcanvas-active')
            })
        });
        /* navbar toggle */
        $(document).ready(function() {
            $("button#sideBtn").click(function() {
                $("#sidebar").addClass("slide_right");
                $("p.hint").addClass("highlight");
            });
            $("a.closeSidebar").click(function() {
                $("#sidebar").removeClass("slide_right");
                $("p.hint").removeClass("highlight");
            });
        });
    </script>
    @stack('custom_scripts')
</body>
<!--Start of Tawk.to Script-->
<!--Start of Tawk.to Script-->
<script type="text/javascript">
    var Tawk_API = Tawk_API || {},
        Tawk_LoadStart = new Date();
    (function() {
        var s1 = document.createElement("script"),
            s0 = document.getElementsByTagName("script")[0];
        s1.async = true;
        s1.src = 'https://embed.tawk.to/62653dbeb0d10b6f3e6f1969/1g1do4j59';
        s1.charset = 'UTF-8';
        s1.setAttribute('crossorigin', '*');
        s0.parentNode.insertBefore(s1, s0);
    })();
</script>
<!--End of Tawk.to Script-->
<!--End of Tawk.to Script-->

</html>
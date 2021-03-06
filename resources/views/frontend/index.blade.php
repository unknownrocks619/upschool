@extends("themes.frontend.master")


@section('content')
@endsection

@push("custom_scripts")
<!-- Swiper JS -->
<script src="https://unpkg.com/swiper/swiper-bundle.min.js"></script>
<!-- Swiper JS -->

<script>
    var swiper = new Swiper(".mySwiper", {
        cssMode: true,
        loop: true,
        slideToClickedSlide: true,
        autoplay: {
            delay: 5000,
        },
        navigation: {
            nextEl: ".swiper-button-next",
            prevEl: ".swiper-button-prev",
        },
        pagination: {
            el: ".swiper-pagination",
        },
        mousewheel: true,
        keyboard: true,
    });

    /* click to top */
    var mybutton = document.getElementById("myBtn");
    window.onscroll = function() {
        scrollFunction();
    };

    function scrollFunction() {
        if (document.body.scrollTop > 20 || document.documentElement.scrollTop > 20) {
            mybutton.style.display = "block";
        } else {
            mybutton.style.display = "none";
        }
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

    document.querySelector('iframe').onload = function() {
        $("#home_banner_iframe").closest("div").removeAttr("style");
    };
</script>
@endpush
@extends("themes.frontend.master")
<?php
$widgets = $page->widget;
?>

@section('content')
@include ("frontend.widgets.home",compact("widgets"))

<h3>WP Integration Failed. Unable to load data.
</h3>
@endsection

@push("custom_scripts")
<script src="https://cdn.plyr.io/3.7.2/plyr.js"></script>
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
<script type='text/javascript' src='https://upschool.co/wp-content/plugins/woocommerce/assets/js/frontend/add-to-cart.min.js?ver=6.7.0' id='wc-add-to-cart-js'></script>
<script type='text/javascript' src='https://upschool.co/wp-content/plugins/elementor-pro/assets/lib/smartmenus/jquery.smartmenus.min.js?ver=1.0.1' id='smartmenus-js'></script>
<script type='text/javascript' src='https://cdn.amcharts.com/lib/version/4.9.30/core.js?ver=1.5.6' id='interactive-geo-maps_amcharts_core-js'></script>
<script type='text/javascript' src='https://cdn.amcharts.com/lib/version/4.9.30/maps.js?ver=1.5.6' id='interactive-geo-maps_amcharts_maps-js'></script>
<script type='text/javascript' src='https://cdn.amcharts.com/lib/version/4.9.30/themes/animated.js?ver=1.5.6' id='interactive-geo-maps_amcharts_animated-js'></script>
<script type='text/javascript' src='https://cdn.amcharts.com/lib/4/geodata/worldHigh.js?ver=1.5.6' id='interactive-geo-maps_worldHigh-js'></script>
<script type='text/javascript' id='interactive-geo-maps_map_service-js-extra'>
    /* <![CDATA[ */
    var iMapsData = {
        "options": {
            "animations": true,
            "lazyLoad": true,
            "async": false,
            "hold": false,
            "locale": false
        },
        "data": [{
            "map": "worldHigh",
            "mapURL": "https:\/\/cdn.amcharts.com\/lib\/4\/geodata\/worldHigh.js",
            "usaWarning": "",
            "projection": "Mercator",
            "albersUsaWarning": "",
            "description": "Upschool User Map",
            "visual": {
                "backgroundColor": "#242254",
                "borderColor": "#242254",
                "borderWidth": "0.2",
                "paddingTop": "61",
                "paddingTopMobile": "",
                "maxWidth": "2000",
                "fontFamily": "inherit"
            },
            "goPro_visual": "",
            "regions_info": "",
            "regions": [{
                "name": "China",
                "id": "CN",
                "tooltipContent": "China",
                "content": "",
                "useDefaults": "1"
            }, {
                "name": "Australia",
                "id": "AU",
                "tooltipContent": "Australia",
                "content": "",
                "useDefaults": "1"
            }, {
                "name": "Aland Islands",
                "id": "AX",
                "tooltipContent": "Aland Islands",
                "content": "",
                "useDefaults": "1"
            }, {
                "name": "Azerbaijan",
                "id": "AZ",
                "tooltipContent": "Azerbaijan",
                "content": "",
                "useDefaults": "1"
            }, {
                "name": "Bahrain",
                "id": "BH",
                "tooltipContent": "Bahrain",
                "content": "",
                "useDefaults": "1"
            }, {
                "name": "Thailand",
                "id": "TH",
                "tooltipContent": "Thailand",
                "content": "",
                "useDefaults": "1"
            }, {
                "name": "Bangladesh",
                "id": "BD",
                "tooltipContent": "Bangladesh",
                "content": "",
                "useDefaults": "1"
            }, {
                "name": "Belgium",
                "id": "BE",
                "tooltipContent": "Belgium",
                "content": "",
                "useDefaults": "1"
            }, {
                "name": "Botswana",
                "id": "BW",
                "tooltipContent": "Botswana",
                "content": "",
                "useDefaults": "1"
            }, {
                "name": "Brazil",
                "id": "BR",
                "tooltipContent": "Brazil",
                "content": "",
                "useDefaults": "1"
            }, {
                "name": "Cambodia",
                "id": "KH",
                "tooltipContent": "Cambodia",
                "content": "",
                "useDefaults": "1"
            }, {
                "name": "Canada",
                "id": "CA",
                "tooltipContent": "Canada",
                "content": "",
                "useDefaults": "1"
            }, {
                "name": "Croatia",
                "id": "HR",
                "tooltipContent": "Croatia",
                "content": "",
                "useDefaults": "1"
            }, {
                "name": "Czech Republic",
                "id": "CZ",
                "tooltipContent": "Czech Republic",
                "content": "",
                "useDefaults": "1"
            }, {
                "name": "Egypt",
                "id": "EG",
                "tooltipContent": "Egypt",
                "content": "",
                "useDefaults": "1"
            }, {
                "name": "Estonia",
                "id": "EE",
                "tooltipContent": "Estonia",
                "content": "",
                "useDefaults": "1"
            }, {
                "name": "Finland",
                "id": "FI",
                "tooltipContent": "Finland",
                "content": "",
                "useDefaults": "1"
            }, {
                "name": "Germany",
                "id": "DE",
                "tooltipContent": "Germany",
                "content": "",
                "useDefaults": "1"
            }, {
                "name": "Greece",
                "id": "GR",
                "tooltipContent": "Greece",
                "content": "",
                "useDefaults": "1"
            }, {
                "name": "India",
                "id": "IN",
                "tooltipContent": "India",
                "content": "",
                "useDefaults": "1"
            }, {
                "name": "Indonesia",
                "id": "ID",
                "tooltipContent": "Indonesia",
                "content": "",
                "useDefaults": "1"
            }, {
                "name": "Iran",
                "id": "IR",
                "tooltipContent": "Iran",
                "content": "",
                "useDefaults": "1"
            }, {
                "name": "Ireland",
                "id": "IE",
                "tooltipContent": "Ireland",
                "content": "",
                "useDefaults": "1"
            }, {
                "name": "Israel",
                "id": "IL",
                "tooltipContent": "Israel",
                "content": "",
                "useDefaults": "1"
            }, {
                "name": "Italy",
                "id": "IT",
                "tooltipContent": "Italy",
                "content": "",
                "useDefaults": "1"
            }, {
                "name": "Japan",
                "id": "JP",
                "tooltipContent": "Japan",
                "content": "",
                "useDefaults": "1"
            }, {
                "name": "Kenya",
                "id": "KE",
                "tooltipContent": "Kenya",
                "content": "",
                "useDefaults": "1"
            }, {
                "name": "Kosovo",
                "id": "XK",
                "tooltipContent": "Kosovo",
                "content": "",
                "useDefaults": "1"
            }, {
                "name": "Kuwait",
                "id": "KW",
                "tooltipContent": "Kuwait",
                "content": "",
                "useDefaults": "1"
            }, {
                "name": "Libya",
                "id": "LY",
                "tooltipContent": "Libya",
                "content": "",
                "useDefaults": "1"
            }, {
                "name": "Luxembourg",
                "id": "LU",
                "tooltipContent": "Luxembourg",
                "content": "",
                "useDefaults": "1"
            }, {
                "name": "Malaysia",
                "id": "MY",
                "tooltipContent": "Malaysia",
                "content": "",
                "useDefaults": "1"
            }, {
                "name": "Maldives",
                "id": "MV",
                "tooltipContent": "Maldives",
                "content": "",
                "useDefaults": "1"
            }, {
                "name": "Mauritius",
                "id": "MU",
                "tooltipContent": "Mauritius",
                "content": "",
                "useDefaults": "1"
            }, {
                "name": "Mongolia",
                "id": "MN",
                "tooltipContent": "Mongolia",
                "content": "",
                "useDefaults": "1"
            }, {
                "name": "Morocco",
                "id": "MA",
                "tooltipContent": "Morocco",
                "content": "",
                "useDefaults": "1"
            }, {
                "name": "Myanmar",
                "id": "MM",
                "tooltipContent": "Myanmar",
                "content": "",
                "useDefaults": "1"
            }, {
                "name": "Nepal",
                "id": "NP",
                "tooltipContent": "Nepal",
                "content": "",
                "useDefaults": "1"
            }, {
                "name": "Netherlands",
                "id": "NL",
                "tooltipContent": "Netherlands",
                "content": "",
                "useDefaults": "1"
            }, {
                "name": "Nigeria",
                "id": "NG",
                "tooltipContent": "Nigeria",
                "content": "",
                "useDefaults": "1"
            }, {
                "name": "Oman",
                "id": "OM",
                "tooltipContent": "Oman",
                "content": "",
                "useDefaults": "1"
            }, {
                "name": "Pakistan",
                "id": "PK",
                "tooltipContent": "Pakistan",
                "content": "",
                "useDefaults": "1"
            }, {
                "name": "Palestinian Territories",
                "id": "PS",
                "tooltipContent": "Palestinian Territories",
                "content": "",
                "useDefaults": "1"
            }, {
                "name": "Panama",
                "id": "PA",
                "tooltipContent": "Panama",
                "content": "",
                "useDefaults": "1"
            }, {
                "name": "Papua New Guinea",
                "id": "PG",
                "tooltipContent": "Papua New Guinea",
                "content": "",
                "useDefaults": "1"
            }, {
                "name": "Philippines",
                "id": "PH",
                "tooltipContent": "Philippines",
                "content": "",
                "useDefaults": "1"
            }, {
                "name": "Poland",
                "id": "PL",
                "tooltipContent": "Poland",
                "content": "",
                "useDefaults": "1"
            }, {
                "name": "Qatar",
                "id": "QA",
                "tooltipContent": "Qatar",
                "content": "",
                "useDefaults": "1"
            }, {
                "name": "Rwanda",
                "id": "RW",
                "tooltipContent": "Rwanda",
                "content": "",
                "useDefaults": "1"
            }, {
                "name": "Saint Kitts and Nevis",
                "id": "KN",
                "tooltipContent": "Saint Kitts and Nevis",
                "content": "",
                "useDefaults": "1"
            }, {
                "name": "Saudi Arabia",
                "id": "SA",
                "tooltipContent": "Saudi Arabia",
                "content": "",
                "useDefaults": "1"
            }, {
                "name": "Singapore",
                "id": "SG",
                "tooltipContent": "Singapore",
                "content": "",
                "useDefaults": "1"
            }, {
                "name": "South Korea",
                "id": "KR",
                "tooltipContent": "South Korea",
                "content": "",
                "useDefaults": "1"
            }, {
                "name": "Spain",
                "id": "ES",
                "tooltipContent": "Spain",
                "content": "",
                "useDefaults": "1"
            }, {
                "name": "Sri Lanka",
                "id": "LK",
                "tooltipContent": "Sri Lanka",
                "content": "",
                "useDefaults": "1"
            }, {
                "name": "Tanzania",
                "id": "TZ",
                "tooltipContent": "Tanzania",
                "content": "",
                "useDefaults": "1"
            }, {
                "name": "Tunisia",
                "id": "TN",
                "tooltipContent": "Tunisia",
                "content": "",
                "useDefaults": "1"
            }, {
                "name": "Turkey",
                "id": "TR",
                "tooltipContent": "Turkey",
                "content": "",
                "useDefaults": "1"
            }, {
                "name": "Uganda",
                "id": "UG",
                "tooltipContent": "Uganda",
                "content": "",
                "useDefaults": "1"
            }, {
                "name": "United Arab Emirates",
                "id": "AE",
                "tooltipContent": "United Arab Emirates",
                "content": "",
                "useDefaults": "1"
            }, {
                "name": "United States Minor Outlying Islands",
                "id": "UM-JQ",
                "tooltipContent": "United States Minor Outlying Islands",
                "content": "",
                "useDefaults": "1"
            }, {
                "name": "United States",
                "id": "US",
                "tooltipContent": "United States",
                "content": "",
                "useDefaults": "1"
            }, {
                "name": "Uzbekistan",
                "id": "UZ",
                "tooltipContent": "Uzbekistan",
                "content": "",
                "useDefaults": "1"
            }, {
                "name": "Vietnam",
                "id": "VN",
                "tooltipContent": "Vietnam",
                "content": "",
                "useDefaults": "1"
            }, {
                "name": "Yemen",
                "id": "YE",
                "tooltipContent": "Yemen",
                "content": "",
                "useDefaults": "1"
            }, {
                "name": "Zambia",
                "id": "ZM",
                "tooltipContent": "Zambia",
                "content": "",
                "useDefaults": "1"
            }, {
                "name": "Afghanistan",
                "id": "AF",
                "tooltipContent": "Afghanistan",
                "content": "",
                "useDefaults": "1"
            }, {
                "name": "Albania",
                "id": "AL",
                "tooltipContent": "Albania",
                "content": "",
                "useDefaults": "1"
            }, {
                "name": "Algeria",
                "id": "DZ",
                "tooltipContent": "Algeria",
                "content": "",
                "useDefaults": "1"
            }, {
                "name": "Armenia",
                "id": "AM",
                "tooltipContent": "Armenia",
                "content": "",
                "useDefaults": "1"
            }, {
                "name": "Aruba",
                "id": "AW",
                "tooltipContent": "Aruba",
                "content": "",
                "useDefaults": "1"
            }, {
                "name": "Austria",
                "id": "AT",
                "tooltipContent": "Austria",
                "content": "",
                "useDefaults": "1"
            }, {
                "name": "Belarus",
                "id": "BY",
                "tooltipContent": "Belarus",
                "content": "",
                "useDefaults": "1"
            }, {
                "name": "Bosnia and Herzegovina",
                "id": "BA",
                "tooltipContent": "Bosnia and Herzegovina",
                "content": "",
                "useDefaults": "1"
            }, {
                "name": "Colombia",
                "id": "CO",
                "tooltipContent": "Colombia",
                "content": "",
                "useDefaults": "1"
            }, {
                "name": "Cyprus",
                "id": "CY",
                "tooltipContent": "Cyprus",
                "content": "",
                "useDefaults": "1"
            }, {
                "name": "Ethiopia",
                "id": "ET",
                "tooltipContent": "Ethiopia",
                "content": "",
                "useDefaults": "1"
            }, {
                "name": "France",
                "id": "FR",
                "tooltipContent": "France",
                "content": "",
                "useDefaults": "1"
            }, {
                "name": "Ghana",
                "id": "GH",
                "tooltipContent": "Ghana",
                "content": "",
                "useDefaults": "1"
            }, {
                "name": "Iraq",
                "id": "IQ",
                "tooltipContent": "Iraq",
                "content": "",
                "useDefaults": "1"
            }, {
                "name": "Jordan",
                "id": "JO",
                "tooltipContent": "Jordan",
                "content": "",
                "useDefaults": "1"
            }, {
                "name": "Lebanon",
                "id": "LB",
                "tooltipContent": "Lebanon",
                "content": "",
                "useDefaults": "1"
            }, {
                "name": "Mexico",
                "id": "MX",
                "tooltipContent": "Mexico",
                "content": "",
                "useDefaults": "1"
            }, {
                "name": "New Zealand",
                "id": "NZ",
                "tooltipContent": "New Zealand",
                "content": "",
                "useDefaults": "1"
            }, {
                "name": "Norway",
                "id": "NO",
                "tooltipContent": "Norway",
                "content": "",
                "useDefaults": "1"
            }, {
                "name": "Portugal",
                "id": "PT",
                "tooltipContent": "Portugal",
                "content": "",
                "useDefaults": "1"
            }, {
                "name": "Russia",
                "id": "RU",
                "tooltipContent": "Russia",
                "content": "",
                "useDefaults": "1"
            }, {
                "name": "Serbia",
                "id": "RS",
                "tooltipContent": "Serbia",
                "content": "",
                "useDefaults": "1"
            }, {
                "name": "Slovakia",
                "id": "SK",
                "tooltipContent": "Slovakia",
                "content": "",
                "useDefaults": "1"
            }, {
                "name": "Somalia",
                "id": "SO",
                "tooltipContent": "Somalia",
                "content": "",
                "useDefaults": "1"
            }, {
                "name": "South Africa",
                "id": "ZA",
                "tooltipContent": "South Africa",
                "content": "",
                "useDefaults": "1"
            }, {
                "name": "Sudan",
                "id": "SD",
                "tooltipContent": "Sudan",
                "content": "",
                "useDefaults": "1"
            }, {
                "name": "Sweden",
                "id": "SE",
                "tooltipContent": "Sweden",
                "content": "",
                "useDefaults": "1"
            }, {
                "name": "Syria",
                "id": "SY",
                "tooltipContent": "Syria",
                "content": "",
                "useDefaults": "1"
            }, {
                "name": "United Kingdom",
                "id": "GB",
                "tooltipContent": "United Kingdom",
                "content": "",
                "useDefaults": "1"
            }, {
                "name": "Argentina",
                "id": "AR",
                "tooltipContent": "Argentina",
                "content": "",
                "useDefaults": "1"
            }, {
                "name": "Benin",
                "id": "BJ",
                "tooltipContent": "Benin",
                "content": "",
                "useDefaults": "1"
            }, {
                "name": "Bahamas",
                "id": "BS",
                "tooltipContent": "Bahamas",
                "content": "",
                "useDefaults": "1"
            }, {
                "name": "Hong Kong",
                "id": "HK",
                "tooltipContent": "Hong Kong",
                "content": "",
                "useDefaults": "1"
            }, {
                "name": "Turkmenistan",
                "id": "TM",
                "tooltipContent": "Turkmenistan",
                "content": "",
                "useDefaults": "1"
            }, {
                "name": "Vatican City",
                "id": "VA",
                "tooltipContent": "Vatican City",
                "content": "",
                "useDefaults": "1"
            }, {
                "name": "Zimbabwe",
                "id": "ZW",
                "tooltipContent": "Zimbabwe",
                "content": "",
                "useDefaults": "1"
            }],
            "regionDefaults": {
                "fill": "#d69eb2",
                "hover": "#d6195f",
                "inactiveColor": "#e0e0e0",
                "action": "none",
                "customAction": ""
            },
            "onlyIncludeActive": "",
            "include": "",
            "exclude": "AQ",
            "roundMarkers_info": "",
            "roundMarkers": "",
            "markerDefaults": {
                "radius": "10",
                "fill": "#99d8c9",
                "hover": "#2ca25f",
                "action": "none"
            },
            "premium_info": "",
            "id": "7028",
            "container": "map_7028",
            "title": "Users",
            "urls": {
                "worldHigh": "https:\/\/cdn.amcharts.com\/lib\/4\/geodata\/worldHigh.js"
            },
            "performance": {
                "animations": true,
                "lazyLoad": true
            },
            "zoomMaster": false
        }],
        "async": [],
        "version": "1.5.6"
    };
    /* ]]> */
</script>
@endpush
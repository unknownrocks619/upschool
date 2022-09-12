<!DOCTYPE html>
<!--
Template Name: Upschool
Author: Upschool.Co
Website: https://www.upschool.co
-->
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="description" content="Responsive HTML Admin Dashboard Template based on Bootstrap 5">
    <meta name="author" content="NobleUI">
    <meta name="keywords" content="nobleui, bootstrap, bootstrap 5, bootstrap5, admin, dashboard, template, responsive, css, sass, html, theme, front-end, ui kit, web">
    <meta name="csrf-token" content="{{ csrf_token() }}">


    <title>
        Dashboard @yield("title")
    </title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@300;400;500;700;900&display=swap" rel="stylesheet">
        
    <!-- End fonts -->

    <!-- core:css -->
    <link rel="stylesheet" href="{{ asset ('admin/assets/vendors/core/core.css') }}">
    <!-- endinject -->

    @yield("plugins_css")
    @stack("plugin_css")
    @if(Session::has("success") || Session::has('error') )
    <link rel="stylesheet" href="{{ asset('admin/assets/vendors/sweetalert2/sweetalert2.min.css') }}">
    @endif
    <!-- inject:css -->
    <link rel="stylesheet" href="{{ asset ('admin/assets/fonts/feather-font/css/iconfont.css') }}">
    <link rel="stylesheet" href="{{ asset ('admin/assets/vendors/flag-icon-css/css/flag-icon.min.css') }} ">
    <!-- endinject -->

    <!-- Layout styles -->
    <link rel="stylesheet" href="{{ asset ('admin/assets/css/style.css') }}">
    <!-- End layout styles -->

</head>

<body>
    <div class="main-wrapper">
        @include("admin.layouts.sidebar")
        @include("admin.layouts.nav")



        <div class="page-wrapper">
            @include("admin.layouts.top")

            @yield("content")
            @yield("modal")
            <!-- partial:partials/_footer.html -->
            <footer class="footer d-flex flex-column flex-md-row align-items-center justify-content-between px-4 py-3 border-top small">
                <p class="text-muted mb-1 mb-md-0">Copyright © 2022 <a href="https://upschool.co" target="_blank">Upschool.Co</a>.</p>
                <p class="text-muted">Handcrafted With <i class="mb-1 text-primary ms-1 icon-sm" data-feather="heart"></i></p>
            </footer>
            <!-- partial -->

        </div>
    </div>

    <!-- core:js -->
    <script src="{{ asset ('admin/assets/vendors/core/core.js') }}"></script>
    <!-- endinject -->

    <!-- Plugin js for this page -->
    <script src="{{ asset ('admin/assets/vendors/chartjs/Chart.min.js') }}"></script>
    <script src="{{ asset ('admin/assets/vendors/jquery.flot/jquery.flot.js') }}"></script>
    <script src="{{ asset ('admin/assets/vendors/jquery.flot/jquery.flot.resize.js') }}"></script>
    <script src="{{ asset ('admin/assets/vendors/bootstrap-datepicker/bootstrap-datepicker.min.js') }}"></script>
    <script src="{{ asset ('admin/assets/vendors/apexcharts/apexcharts.min.js') }}"></script>
    <!-- End plugin js for this page -->

    <!-- inject:js -->
    <script src="{{ asset ('admin/assets/vendors/feather-icons/feather.min.js') }}"></script>
    <script src="{{ asset ('admin/assets/js/template.js') }}"></script>
    <!-- endinject -->

    @if(Session::has("error") || Session::has("success"))
    <script src="{{ asset ('admin/assets/vendors/sweetalert2/sweetalert2.min.js') }}"></script>
    <script>
        const Toast = Swal.mixin({
            toast: true,
            position: 'top-end',
            showConfirmButton: false,
            timer: 3000,
            timerProgressBar: true,
        });
        @if(Session::has('success'))
        Toast.fire({
            icon: "success",
            title: '{{ Session::get("success") }}'
        })
        @elseif(Session::has("error"))
        Toast.fire({
            icon: "error",
            title: '{{ Session::get("error") }}'
        })
        @endif
    </script>

    @endif


    @stack("custom_script")



</body>

</html>
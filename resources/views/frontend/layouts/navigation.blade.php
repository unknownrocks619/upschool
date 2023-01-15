<style>
    nav>div>div>ul>li>a.dropdown-toggle::after {
        display: none !important;
    }
</style>

<nav class="d-none d-lg-block navbar navbar-expand-lg navbar-light bg-danger ps-5 w-100" style="background: #b81242 !important;">
    <div class="collapse navbar-collapse ms-5 w-100" id="navbarSupportedContent">
        <ul class="navbar-nav mr-auto w-100" id="topNav">
            <li class="nav-item">
                <a class="nav-link text-white" href="https://upschool.co/partnerships/" style="font-weight: bold;font-size:15px;">
                    Become a Partner
                </a>
            </li>
            <li class="nav-item dropdown ps-4">
                <a style="font-weight: bold;font-size:16px;" class="nav-link dropdown-toggle  text-white" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    Products
                </a>
                <div class="dropdown-menu" aria-labelledby="navbarDropdown" style="z-index:9999">
                    <a class="dropdown-item py-2" href="https://upschool.co/impact-films/">Impacts Films </a>
                    <div class="dropdown-divider"></div>
                    <a class="dropdown-item py-2" href="https://upschool.co/impact-projects/">Impact Projects</a>
                </div>
            </li>
            <li class="nav-item  text-white px-4">
                <a class="nav-link  text-white" style="font-weight: bold;font-size:15px;" href="https://upschool.co/request-a-tour/">Request a Tour</a>
            </li>
            <li class="nav-item px-2">
                <a class="nav-link  text-white" style="font-weight: bold;font-size:15px;" href="https://upschool.co/bulk-enrolment/">Bulk Enrolment</a>
            </li>
        </ul>
    </div>
</nav>
<header class="header row">
    <!-- <div class=" d-flex justify-content-center align-items-center">
      <img src="{{ asset('frontend/images/global/logo.png') }}" width="150px" />
    </div> -->
    <div class="col-12 col-md-10">
        <nav class="navbar-mobile navbar d-lg-none navbar-expand-lg navbar-light">
            <div class="container p-0">
                <div class="header-left">
                    <div>
                        <a href="https://upschool.co{{-- route('frontend.home') --}}">
                            <img src="{{ asset(settings('logo')) }}" alt="{{ settings('website_name') }}" height="30" />
                        </a>
                    </div>
                </div>
                <div class="d-flex align-items-center">
                    <div>
                        <li class="nav-item dropdown" style="list-style: none;border-bottom:none">
                            <a class="nav-link dropdown-toggle text-white nav-text content-none" href="#" data-bs-toggle="dropdown"><i class="fas fa-user-circle" style="font-size: 1.5rem"></i>
                            </a>

                            <ul class="dropdown-menu">
                                <li>
                                    <a class="dropdown-item nav-text" href="https://upschool.co/signin">Sign In</a>
                                </li>
                                <li>
                                    <a class="dropdown-item nav-text" href="#">Register</a>
                                </li>
                            </ul>
                        </li>
                    </div>

                    <button data-trigger="#navbar_main" class="btn p-0" type="button">
                        <i class="fas fa-bars" style="font-size: 1.5rem"></i>
                    </button>
                </div>
            </div>
        </nav>

        <!-- d-lg-none {Mobile}-->
        <nav id="navbar_main" class="mobile-offcanvas navbar navbar-expand-lg navbar-light p-0 w-100">
            <div class="d-flex" style="width: 100%">
                <div class="nav-cont d-lg-flex" style="width: 100%">
                    <a class="navbar-text d-none d-lg-block" href="http://upschool.co{{-- route('frontend.home') --}}">
                        <img src="{{ asset(settings('logo')) }}" class="py-2" height="60" />
                    </a>
                    <div class="d-flex align-items-center justify-content-between" style="background-color: #f1f2f6">
                        <div class="small-img p-4">
                            <a class="navbar-brand" href="{{-- route('frontend.home') --}}">
                                <img src="{{ asset(settings('logo')) }}" alt="" height="30" />
                            </a>
                        </div>
                        <button class="navbar-toggler btn-close pe-5"></button>
                        <!-- <h5 class="py-2 mx-auto text-white d-inline mx-auto">Navbar</h5> -->
                    </div>
                    <ul class="navbar-nav align-items-center" style="flex-wrap: wrap;margin-left:10px;">
                        <x-top-nav />
                    </ul>
                </div>
            </div>
        </nav>
    </div>
    @guest
    @if(settings("login") || settings("signup"))
    <div class="col-6 col-md-2 mt-3">
        <div class="d-flex align-items-center justify-content-end me-5">
            <!-- <a href="#" class="control-search"><i class="fas fa-search"></i></a> -->
            <!-- <hr class="hr-1" /> -->
            <div class="login-register text-white">
                @if(settings("login"))
                <span class="box-icon">
                    <i class="icon fas fa-user" style="font-size:13px"></i>
                </span>
                <a href="https://upschool.co/dashboard" class="login-link"><span class="sign-in-text">Sign In</span></a>
                @endif
                @if(settings('signup'))

                <a href="{{ route('register') }}" class="register-link ms-2">
                    <span class="register-text">Register</span>
                </a>
                @endif
            </div>
        </div>
    </div>
    @endif
    @endguest
    @auth
    <div class=" col-md-2">
        <div class="d-flex align-items-center justify-content-end me-5 mt-3">
            <!-- <a href="#" class="control-search"><i class="fas fa-search"></i></a> -->
            <!-- <hr class="hr-1" /> -->
            <div class="login-register text-white">
                <form style="display:inline" method="post" action="{{ route('logout') }}">
                    @csrf
                    <button type="submit" class="btn btn-danger">
                        <span class="box-icon">
                            <!-- <i class="fa-solid fa-arrow-right-from-bracket"></i> -->
                            <i class="icon fas fa-wrench"></i>
                        </span>
                        <span class="sign-in-text">Logout</span>
                    </button>
                </form>
            </div>
        </div>
    </div>
    @endauth
</header>
<header class="header row sticky-top">
    <!-- <div class=" d-flex justify-content-center align-items-center">
      <img src="{{ asset('frontend/images/global/logo.png') }}" width="150px" />
    </div> -->
    <div class="col-6 col-md-9">
        <nav class="navbar-mobile navbar d-lg-none fixed-top navbar-expand-lg navbar-light">
            <div class="container p-0">
                <div class="header-left">
                    <div>
                        <a href="{{ route('frontend.home') }}">
                            <img src="{{ asset(settings('logo')) }}" alt="{{ settings('website_name') }}" height="30" />
                        </a>
                    </div>
                </div>
                <div class="d-flex align-items-center">
                    <div>
                        <li class="nav-item dropdown" style="list-style: none">
                            <a class="nav-link dropdown-toggle text-white nav-text content-none" href="#" data-bs-toggle="dropdown"><i class="fas fa-user-circle" style="font-size: 1.5rem"></i>
                            </a>

                            <ul class="dropdown-menu">
                                <li>
                                    <a class="dropdown-item nav-text" href="#">Sign In</a>
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

        <!-- d-lg-none -->

        <nav id="navbar_main" class="mobile-offcanvas navbar navbar-expand-lg navbar-light p-0">
            <div class="d-flex" style="width: 100%">
                <div class="nav-cont d-lg-flex" style="width: 100%">
                    <a class="navbar-text d-none d-lg-block" href="{{ route('frontend.home') }}">
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
                    <ul class="navbar-nav align-items-center">
                        <x-top-nav />
                    </ul>
                </div>
            </div>
        </nav>
    </div>
    @guest
    @if(settings("login") || settings("signup"))
    <div class="col-6 col-md-3">
        <div class="d-flex align-items-center justify-content-end me-5">
            <a href="#" class="control-search"><i class="fas fa-search"></i></a>
            <hr class="hr-1" />
            <div class="login-register text-white">
                @if(settings("login"))
                <span class="box-icon">
                    <i class="icon fas fa-user" aria-hidden="true"></i>
                </span>
                <a href="{{ route('login') }}" class="login-link"><span class="sign-in-text">Sign in</span></a>
                @endif
                @if(settings('signup'))
                /
                <a href="{{ route('register') }}" class="register-link">
                    <span class="register-text">Register</span>
                </a>
                @endif
            </div>
        </div>
    </div>
    @endif
    @endguest
    @auth
    <div class="col-6 col-md-3">
        <div class="d-flex align-items-center justify-content-end me-5">
            <a href="#" class="control-search"><i class="fas fa-search"></i></a>
            <hr class="hr-1" />
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
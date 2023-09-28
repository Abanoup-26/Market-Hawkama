<!doctype html>
<html class="no-js">

<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>جمعية دعم لرعاية الارامل والمطلقات وابنائهن</title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link rel="shortcut icon" type="image/x-icon" href="img/favicon.png">

    <!-- CSS here -->
    <link rel="stylesheet" href="{{ asset('frontend/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('frontend/css/animate.min.css') }}">
    <link rel="stylesheet" href="{{ asset('frontend/css/magnific-popup.css') }}">
    <link rel="stylesheet" href="{{ asset('frontend/css/fontawesome-all.min.css') }}">
    <link rel="stylesheet" href="{{ asset('frontend/css/bootstrap-datepicker.min.css') }}">
    <link rel="stylesheet" href="{{ asset('frontend/css/jquery-ui.css') }}">
    <link rel="stylesheet" href="{{ asset('frontend/css/flaticon.css') }}">
    <link rel="stylesheet" href="{{ asset('frontend/css/odometer.css') }}">
    <link rel="stylesheet" href="{{ asset('frontend/css/slick.css') }}">
    <link rel="stylesheet" href="{{ asset('frontend/css/default.css') }}">
    <link rel="stylesheet" href="{{ asset('frontend/css/style.css') }}">
    <link rel="stylesheet" href="{{ asset('frontend/css/responsive.css') }}">
    <link rel="stylesheet" href="{{ asset('frontend/css/bootstrap-a.min.css') }}">
    <link rel="stylesheet" href="{{ asset('frontend/css/style-ar.css') }}">
    <style>
        .cart-counter {
            height: 22px;
            width: 19px;
            background-color: #BA9a56;
            text-align: center;
            transform: translate(-4px, -45px);
            border-radius: 50%;
            line-height: 22px;
            color: black;
            font-weight: 900;
        }

        .supplierlogin a:hover {
            text-decoration: underline;
        }
    </style>
</head>

<body>

    <!-- preloader -->
    <div id="preloader">
        <div id="loading-center">
            <div class="loader">
                <div class="loader-outter"></div>
                <div class="loader-inner"></div>
            </div>
        </div>
    </div>
    <!-- preloader-end -->

    <!-- Scroll-top -->
    <button class="scroll-top scroll-to-target" data-target="html">
        <i class="fas fa-angle-up"></i>
    </button>
    <!-- Scroll-top-end-->

    <!-- header-area -->
    <header class="transparent-header header-style-two header-style-three inner-header">
        <div class="header-top-wrap">
            <div class="container custom-container">
                <div class="row align-items-center">
                    <div class="col-lg-4 col-sm-6 d-none d-sm-block">
                    </div> 
                    <div class="col-lg-4 d-none d-lg-block">
                        <div class="logo text-center">
                            <a href="{{ route('frontend.home') }}"><img
                                    src="{{ asset('frontend/img/logo/w_logo.png') }}" alt=""></a>
                        </div>
                    </div>
                    <div class="col-lg-2 col-sm-6">
                        <div class="text-end">
                            <div class="login"><a href="{{ route('frontend.cart.index') }}"><img
                                        src="{{ asset('frontend/img/shopping-cart.png') }}" alt="">
                                    <div class="cart-counter">{{ session('cart') ? count(session('cart')) : 0 }}</div>
                                </a>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-2 col-sm-6">
                        <div class="text-end">
                            @auth
                                <div class="row">
                                    <i class="c-sidebar-nav-icon fas fa-fw fa-user"></i>
                                    {{ auth()->user()->name }}
                                    <a href="#" class="c-sidebar-nav-link"
                                        onclick="event.preventDefault(); document.getElementById('logoutform').submit();">
                                        <i class="c-sidebar-nav-icon fas fa-fw fa-sign-out-alt">

                                        </i>
                                        Logout
                                    </a>
                                </div>
                            @else
                                <div class="supplierlogin"><a href="{{ route('supporter.login') }}">
                                        تسجيل الدخول
                                    </a>
                                </div>
                            @endauth

                        </div>
                    </div>
                </div>
            </div>
        </div>

    </header>
    <!-- header-area-end -->
    <!-- main-area -->
    <main>

        @yield('content')
        <!-- newsletter-area -->
        <section class="newsletter-area m-5">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="newsletter-wrap">
                            <div class="newsletter-content">
                                <div class="section-title">
                                    <span class="sub-title">القائمه البريدية</span>
                                    <h2 class="title">اشترك ليصلك جديدنا</h2>
                                </div>
                            </div>
                            <div class="newsletter-form">
                                <form action="#">
                                    <input type="text" placeholder="ضع ايميلك هنا">
                                    <button type="submit"><i class="far fa-envelope"></i> اشترك الان </button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- newsletter-area-end -->


    </main>
    <!-- main-area-end -->
    <!-- footer-area About -->
    <footer>
        <div class="footer-area">
            <div class="footer-top footer-bg">
                <div class="container">
                    <div class="row"> 
                        @php
                            $about = \App\Models\About::first();
                        @endphp
                        <div class="col-lg-6 col-md-6">
                            <div class="footer-widget wow fadeInUp" data-wow-delay=".2s">
                                <div class="fw-logo mb-30">
                                    <a href="{{ route('frontend.home') }}"><img src="{{ $about->logo ? $about->logo->getUrl() : '' }}"
                                            alt=""></a>
                                </div>
                                <div class="footer-contact-list mb-30">
                                    <ul>
                                        <li>
                                            <div class="icon">
                                                <img src="{{ asset('frontend/img/icon/f_contact_icon01.png') }}"
                                                    alt="">
                                            </div>
                                            <div class="content">
                                                <span>رقم الجوال</span>
                                                <a href="tel:{{ $about->phone }}">{{ $about->phone }} </a>
                                            </div>
                                        </li>
                                        <li>
                                            <div class="icon">
                                                <img src="{{ asset('frontend/img/icon/f_contact_icon02.png') }}"
                                                    alt="">
                                            </div>
                                            <div class="content">
                                                <span>البريد الالكترونى</span>
                                                <a href="mailto:{{ $about->email }}"> {{ $about->email }}</a>
                                            </div>
                                        </li>
                                        <li>
                                            <div class="icon">
                                                <img src="{{ asset('frontend/img/icon/f_contact_icon03.png') }}"
                                                    alt="">
                                            </div>
                                            <div class="content">
                                                <span> {{ $about->location }}</span>
                                            </div>
                                        </li>
                                    </ul>
                                </div>
                                <div class="footer-social">
                                    <ul>
                                        <li><a href="{{ $about->twitter }}"><i class="fab fa-twitter"></i></a></li>
                                        <li><a href="{{ $about->instagram }}"><i class="fab fa-instagram"></i></a>
                                        </li>
                                        <li><a href="{{ $about->whatsapp }}"><i class="fab fa-whatsapp"></i></a></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="footer-bottom">
                <div class="container">
                    <div class="row align-items-center">
                        <div class="col-lg-6 col-md-6">
                            <div class="copyright-text">
                                <p>جميع الحقوق محفوظة 2023</p>
                            </div>
                        </div>
                        <div class="col-lg-6 col-md-6">
                            <div class="footer-bottom-right">
                                <ul>
                                    <li> تصميم وبرمجة<a href="#"> تحالف الرؤى</a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </footer>
    <!-- footer-area-end -->

    <form id="logoutform" action="{{ route('logout') }}" method="POST" style="display: none;">
        {{ csrf_field() }}
    </form>

    @include('sweetalert::alert')
    <!-- JS here -->
    <script src="{{ asset('frontend/js/vendor/jquery-3.6.0.min.js') }}"></script>
    <script src="{{ asset('frontend/js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('frontend/js/bootstrap-datepicker.min.js') }}"></script>
    <script src="{{ asset('frontend/js/isotope.pkgd.min.js') }}"></script>
    <script src="{{ asset('frontend/js/imagesloaded.pkgd.min.js') }}"></script>
    <script src="{{ asset('frontend/js/jquery.magnific-popup.min.js') }}"></script>
    <script src="{{ asset('frontend/js/jquery.odometer.min.js') }}"></script>
    <script src="{{ asset('frontend/js/jquery.easypiechart.min.js') }}"></script>
    <script src="{{ asset('frontend/js/jquery-ui.min.js') }}"></script>
    <script src="{{ asset('frontend/js/jquery.inview.min.js') }}"></script>
    <script src="{{ asset('frontend/js/jquery.appear.js') }}"></script>
    <script src="{{ asset('frontend/js/slick.min.js') }}"></script>
    <script src="{{ asset('frontend/js/wow.min.js') }}"></script>
    <script src="{{ asset('frontend/js/main.js') }}"></script>


</body>

</html>

<!DOCTYPE html>
<html lang="en">
<head>
    @php
        session('lang') ?? session()->put('lang', app()->getLocale());
    @endphp

    <meta charset="utf-8">
    <!-- MOBILE SPECIFIC -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="keywords" content="{{ setting('meta_keywords') }}" />
    <meta name="author" content="{{ setting('meta_author') }}" />
    <meta name="description" content="{{ setting('meta_description') }}" />

    <!-- FAVICONS ICON -->
    <link rel="icon" type="image/png" href="{{ asset('site/img/favicon.png') }}">

    <!-- PAGE TITLE HERE -->
    <title> {{ setting('title') }} </title>



    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="{{ asset('site/css/bootstrap.min.css') }}">
    <!-- Owl Carousel CSS -->
    <link rel="stylesheet" href="{{ asset('site/css/owl.carousel.min.css') }}">
    <link rel="stylesheet" href="{{ asset('site/css/owl.theme.default.min.css') }}">
    <!-- Meanmenu CSS -->
    <link rel="stylesheet" href="{{ asset('site/css/meanmenu.css') }}">
    <!-- Icofonts CSS -->
    <link rel="stylesheet" href="{{ asset('site/css/icofont.min.css') }}">
    <!-- Slick Slider CSS -->
    <link rel="stylesheet" href="{{ asset('site/css/slick.min.css') }}">
    <link rel="stylesheet" href="{{ asset('site/css/slick-theme.css') }}">
    <!-- Magnific Popup -->
    <link rel="stylesheet" href="{{ asset('site/css/magnific-popup.css') }}">
    <!-- Wow CSS -->
    <link rel="stylesheet" href="{{ asset('site/css/animate.css') }}">
    <link rel="stylesheet" href="{{ asset('site/css/style.css') }}">

    @if(session('lang') == 'ar')
        <!-- RTL CSS -->
        <link rel="stylesheet" href="{{ asset('site/css/rtl.css') }}">
    @endif

    <!-- Responsive CSS -->
    <link rel="stylesheet" href="{{ asset('site/css/responsive.css') }}">
    @stack('styles')

</head>

<body>
    <!-- Preloader -->
    <div class="loader">
        <div class="d-table">
            <div class="d-table-cell">
                <div class="spinner">
                    <div class="double-bounce1"></div>
                    <div class="double-bounce2"></div>
                </div>
            </div>
        </div>
    </div>
    <!-- End Preloader -->

    @include('site.first.layouts.header')

    @yield('content')

    @include('site.first.layouts.footer')

    <!-- Essential JS -->
    <script src="{{ asset('site/js/jquery.min.js') }}"></script>
    <script src="{{ asset('site/js/popper.min.js') }}"></script>
    <script src="{{ asset('site/js/bootstrap.min.js') }}"></script>
    <!-- Owl Carousel JS -->
    <script src="{{ asset('site/js/owl.carousel.min.js') }}"></script>
    <!-- Meanmenu JS -->
    <script src="{{ asset('site/js/jquery.meanmenu.js') }}"></script>
    <!-- Counter JS -->
    <script src="{{ asset('site/js/jquery.counterup.min.js') }}"></script>
    <script src="{{ asset('site/js/waypoints.min.js') }}"></script>
    <!-- Slider Slider JS -->
    <script src="{{ asset('site/js/slick.min.js') }}"></script>
    <!-- Magnific Popup -->
    <script src="{{ asset('site/js/jquery.magnific-popup.min.js') }}"></script>
    <!-- Wow JS -->
    <script src="{{ asset('site/js/wow.min.js') }}"></script>
    <!-- Form Ajaxchimp JS -->
    <script src="{{ asset('site/js/jquery.ajaxchimp.min.js') }}"></script>
    <!-- Form Validator JS -->
    <script src="{{ asset('site/js/form-validator.min.js') }}"></script>
    <!-- Contact JS -->
    <script src="{{ asset('site/js/contact-form-script.js') }}"></script>
    <!-- Map JS -->
    <script src="{{ asset('site/js/map.js') }}"></script>
    <!-- Custom JS -->
    <script src="{{ asset('site/js/custom.js') }}"></script>


</body>
</html>

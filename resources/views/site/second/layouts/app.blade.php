<!DOCTYPE html>
<html lang="{{ session('lang') == 'ar' ? 'ar' : 'en' }}">
<head>
    @php
        session('lang') ?? session()->put('lang', app()->getLocale());
    @endphp
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="keywords" content="{{ setting('meta_keywords') }}" />
    <meta name="author" content="{{ setting('meta_author') }}" />
    <meta name="description" content="{{ setting('meta_description') }}" />
    <meta property="og:title" content="Industry - Factory & Industrial HTML Template" />
    <meta property="og:description" content="Industry - Factory & Industrial HTML Template" />
    <meta property="og:image" content="" />
    <meta name="format-detection" content="telephone=no">

    <!-- FAVICONS ICON -->
    <link rel="icon" href="{{ asset('site/images/favicon.ico') }}" type="image/x-icon" />
    <link rel="shortcut icon" type="image/x-icon" href="{{ asset('site/images/favicon.png') }}" />

    <!-- PAGE TITLE HERE -->
    <title> {{ setting('title') }} </title>

    <!-- MOBILE SPECIFIC -->
    <meta name="viewport" content="width=device-width, initial-scale=1">



    @if(session('lang') == 'ar')
        <link rel="stylesheet" type="text/css" href="{{ asset('site/css/plugins.min.css') }}">
        <link rel="stylesheet" type="text/css" href="{{ asset('site/plugins/fontawesome/css/font-awesome.min.css') }}">
        <link rel="stylesheet" type="text/css" href="{{ asset('site/plugins/line-awesome/css/line-awesome.min.css') }}">
        <link rel="stylesheet" type="text/css" href="{{ asset('site/plugins/flaticon/flaticon.css') }}">
        <link rel="stylesheet" type="text/css" href="{{ asset('site/css/style.min.css') }}">
        <link rel="stylesheet" type="text/css" href="{{ asset('site/css/templete.min.css') }}">
        <link rel="stylesheet" type="text/css" href="{{ asset('site/css/rtl.min.css') }}">
    @elseif(session('lang') == 'en')
        <link rel="stylesheet" type="text/css" href="{{ asset('site/css/plugins.min.css') }}">
        <link rel="stylesheet" type="text/css" href="{{ asset('site/plugins/fontawesome/css/font-awesome.min.css') }}">
        <link rel="stylesheet" type="text/css" href="{{ asset('site/plugins/line-awesome/css/line-awesome.min.css') }}">
        <link rel="stylesheet" type="text/css" href="{{ asset('site/plugins/flaticon/flaticon.css') }}">
        <link rel="stylesheet" type="text/css" href="{{ asset('site/css/style.min.css') }}">
        <link rel="stylesheet" type="text/css" href="{{ asset('site/css/templete.min.css') }}">
    @endif

    @php
        $colors = [
            'orange'        => 1,
            'red'           => 2,
            'yellow'        => 3,
            'blue'          => 4,
            'red_dark'      => 5,
            'green'         => 6,
            'sky'           => 7,
            'orange_dark'   => 8,
        ];
        $website_color = getColor();
    @endphp

    @foreach($colors as $color)
        @if($website_color == $color)
            <link class="skin" rel="stylesheet" type="text/css" href="{{ asset('site/css/skin/skin-'. $color .'.min.css') }}">
            @break
        @endif
    @endforeach

    @stack('styles')

    <!-- Google Font -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Montserrat:100,100i,200,200i,300,300i,400,400i,500,500i,600,600i,700,700i,800,800i,900,900i|Open+Sans:300,300i,400,400i,600,600i,700,700i,800,800i|Playfair+Display:400,400i,700,700i,900,900i|Poppins:100,100i,200,200i,300,300i,400,400i,500,500i,600,600i,700,700i,800,800i,900,900i|Raleway:100,100i,200,200i,300,300i,400,400i,500,500i,600,600i,700,700i,800,800i,900,900i|Roboto+Condensed:300,300i,400,400i,700,700i|Roboto:100,100i,300,300i,400,400i,500,500i,700,700i,900,900i&amp;display=swap">
    <link rel="stylesheet" type="text/css" href="{{ asset('site/plugins/revolution/revolution/css/revolution.min.css') }}">
</head>
<body id="bg">
<div class="page-wraper">
    <div id="loading-area"></div>

    @include('site.second.layouts.header')

    @yield('content')

    @include('site.second.layouts.footer')

    <button class="scroltop style1 radius white" type="button"><i class="fa fa-arrow-up"></i></button>
</div>

<!-- JAVASCRIPT FILES ========================================= -->
<script src="{{ asset('site/js/combining.js') }}"></script><!-- CONTACT JS  -->
<script src="{{ asset('site/js/jquery.lazy.min.js') }}"></script>

<script src="{{ asset('site/plugins/revolution/revolution/js/jquery.themepunch.tools.min.js') }}"></script>
<script src="{{ asset('site/plugins/revolution/revolution/js/jquery.themepunch.revolution.min.js') }}"></script>
<script src="{{ asset('site/js/rev.slider.js') }}"></script>
<!-- REVOLUTION JS FILES -->
<script type="text/javascript" src="{{ asset('site/plugins/revolution/revolution/js/extensions/revolution.extension.video.min.js') }}"></script>
<script type="text/javascript" src="{{ asset('site/plugins/revolution/revolution/js/extensions/revolution.extension.slideanims.min.js') }}"></script>
<script type="text/javascript" src="{{ asset('site/plugins/revolution/revolution/js/extensions/revolution.extension.layeranimation.min.js') }}"></script>
<script type="text/javascript" src="{{ asset('site/plugins/revolution/revolution/js/extensions/revolution.extension.navigation.min.js') }}"></script>
<script type="text/javascript" src="{{ asset('site/plugins/revolution/revolution/js/extensions/revolution.extension.navigation.min.js') }}"></script>
<script type="text/javascript" src="{{ asset('site/plugins/revolution/revolution/js/extensions/revolution.extension.parallax.min.js') }}"></script>


@stack('scripts')
<script>
    jQuery(document).ready(function() {
        'use strict';
        dz_rev_slider_5();
        $('.lazy').Lazy();
    });	/*ready*/
</script>

</body>
</html>

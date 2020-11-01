<!DOCTYPE html>
<html lang="en">
<head>
    @php
        session('lang') ?? session()->put('lang', app()->getLocale());
    @endphp
    <!-- Global site tag (gtag.js) - Google Analytics -->
        <script async src="https://www.googletagmanager.com/gtag/js?id={{ setting('google_analytics') }}"></script>
        <script>
            window.dataLayer = window.dataLayer || [];

            function gtag() {
                dataLayer.push(arguments);
            }
            gtag('js', new Date());

            gtag('config', '{{ setting('google_analytics') }}');
        </script>

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
    <link href="{{ asset('site/part2/css/bootstrap.css') }}" rel="stylesheet">

    <link href="{{ asset('site/part2/css/style.css') }}" rel="stylesheet">

    <link href="{{ asset('site/part2/css/responsive.css') }}" rel="stylesheet">

    <!--Color Themes-->
    @php
        $colors = [
            1 => 'blue' ,
            2 => 'green' ,
            3 => 'olive' ,
            4 => 'orange' ,
            5 => 'purple' ,
            6 => 'teal' ,
            7 => 'brown' ,
            8 => 'red' ,
        ];
        $website_color = getColor();
    @endphp
    @foreach($colors as $index => $color)
        @if($website_color == $index)
            <link id="theme-color-file" href="{{ asset('site/part2/css/color-themes/'. $color .'-theme.css') }}" rel="stylesheet">
            @break
        @endif
    @endforeach

    <!-- Responsive -->
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0">

    @if(session('lang') == 'ar')
        <!-- RTL CSS -->
    @endif

    <link href="{{ asset('dashboard/css/noty.css') }}" rel="stylesheet">
    <script src="{{ asset('dashboard/js/noty.js') }}" type="text/javascript"></script>

    @stack('styles')

</head>

<body>

    <div class="page-wrapper {{ session('lang') == 'ar' ? 'rtl' : '' }}">

    <!-- Preloader -->
    <div class="preloader"></div>
    <!-- End Preloader -->

    @include('site.seventh.layouts.header')

    @include('dashboard.partials.session')

    @yield('content')

    @include('site.seventh.layouts.footer')

    <!--Scroll to top-->
    <div class="scroll-to-top scroll-to-target" data-target="html"><span class="fa fa-angle-up"></span></div>

    <!-- sidebar cart item -->
    <div class="xs-sidebar-group info-group">
        <div class="xs-overlay xs-bg-black"></div>
        <div class="xs-sidebar-widget">
            <div class="sidebar-widget-container">
                <div class="widget-heading">
                    <a href="#" class="close-side-widget">
                        X
                    </a>
                </div>

                <div class="sidebar-textwidget">

                <!-- Sidebar Info Content -->
                <div class="sidebar-info-contents">
                    <div class="content-inner">
                        <div class="logo">
                            <a href="{{ url('/') }}"><img src="{{ getLogo() }}" alt="" /></a>
                        </div>

                        <div class="content-box">
                            <h2> {{ __('home.about_us') }} </h2>
                            @php
                                $desc = session('lang') . '_description';
                            @endphp
                            <p class="text"> {{ $about->$desc }} </p>
                            <a href="#" class="theme-btn btn-style-two"><span class="txt">Consultation</span></a>
                        </div>

                        <div class="contact-info">
                            <h2>{{ __('admin.contacts') }}</h2>
                            <ul class="list-style-two">
                                <li><span class="icon flaticon-map"></span>{{ setting(session('lang').'_address') }}</li>
                                <li><span class="icon flaticon-telephone"></span>{{ setting('phone') }}</li>
                                <li><span class="icon flaticon-message-1"></span>{{ setting('email') }}</li>
                            </ul>

                        </div>

                        <!-- Social Box -->

                        <ul class="social-box">
                            @php
                                $socialSites = ['facebook', 'twitter', 'instagram'];
                            @endphp
                            @for($i = 0; $i < count($socialSites); $i++)
                                @if(setting($socialSites[$i]) != '')
                                    <li>
                                        <a href="{{ setting($socialSites[$i]) }}">
                                            <span class="fab fa-{{ $socialSites[$i] }}"></span>
                                        </a>
                                    </li>
                                @endif
                            @endfor
                        </ul>
                    </div>
                </div>
                </div>
            </div>
        </div>
    </div>
    <!-- END sidebar widget item -->


    <!--Search Popup-->
    <div id="search-popup" class="search-popup">

        <div class="close-search theme-btn"><span class="fas fa-window-close"></span></div>

        <div class="popup-inner">

            <div class="overlay-layer"></div>

            <div class="search-form">

                <form method="post" action="https://expert-themes.com/html/meditech/index.html">

                    <div class="form-group">

                        <fieldset>

                            <input type="search" class="form-control" name="search-input" value="" placeholder="Search Here" required >

                            <input type="submit" value="Search Now!" class="theme-btn">

                        </fieldset>

                    </div>

                </form>
            </div>
        </div>

    </div>



    <script src="{{ asset('site/part2/js/jquery.js') }}"></script>

    <script src="{{ asset('site/part2/js/popper.min.js') }}"></script>

    <script src="{{ asset('site/part2/js/jquery-ui.js') }}"></script>

    <script src="{{ asset('site/part2/js/bootstrap.min.js') }}"></script>

    <script src="{{ asset('site/part2/js/jquery.fancybox.js') }}"></script>

    <script src="{{ asset('site/part2/js/parallax.min.js') }}"></script>

    <script src="{{ asset('site/part2/js/jquery.paroller.min.js') }}"></script>

    <script src="{{ asset('site/part2/js/owl.js') }}"></script>

    <script src="{{ asset('site/part2/js/wow.js') }}"></script>

    <script src="{{ asset('site/part2/js/nav-tool.js') }}"></script>

    <script src="{{ asset('site/part2/js/jquery.magnific-popup.min.js') }}"></script>

    <script src="{{ asset('site/part2/js/main.js') }}"></script>

    <script src="{{ asset('site/part2/js/swiper.min.js') }}"></script>

    <script src="{{ asset('site/part2/js/appear.js') }}"></script>

    <script src="{{ asset('site/part2/js/script.js') }}"></script>

    <script src="{{ asset('site/part2/js/color-settings.js') }}"></script>

    @stack('scripts')

</body>
</html>

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
    <link rel="stylesheet" type="text/css" href="{{ asset('site/css/templete.min.css') }}">

    @stack('styles')

    <!-- Google Font -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Montserrat:100,100i,200,200i,300,300i,400,400i,500,500i,600,600i,700,700i,800,800i,900,900i|Open+Sans:300,300i,400,400i,600,600i,700,700i,800,800i|Playfair+Display:400,400i,700,700i,900,900i|Poppins:100,100i,200,200i,300,300i,400,400i,500,500i,600,600i,700,700i,800,800i,900,900i|Raleway:100,100i,200,200i,300,300i,400,400i,500,500i,600,600i,700,700i,800,800i,900,900i|Roboto+Condensed:300,300i,400,400i,700,700i|Roboto:100,100i,300,300i,400,400i,500,500i,700,700i,900,900i&amp;display=swap">

    <!-- REVOLUTION SLIDER CSS -->
    <link rel="stylesheet" type="text/css" href="{{ asset('site/plugins/revolution/revolution/css/revolution.min.css') }}">
</head>
<body id="bg">
<div class="page-wraper">
    <div id="loading-area" class="solar-loading"></div>

    @if (request()->segment(1) == null)
    <!-- Slider -->
    <div class="main-slider style-two default-banner" id="home">
        <div class="tp-banner-container">
            <div class="tp-banner" >
                <div id="welcome_wrapper" class="rev_slider_wrapper fullscreen-container" data-alias="reveal-add-on36" data-source="gallery" style="background:#ffffff;padding:0px;">
                    <!-- START REVOLUTION SLIDER 5.4.7.2 fullscreen mode -->
                    <div id="welcome" class="rev_slider fullscreenbanner" style="display:none;" data-version="5.4.7.2">
                        <ul>
                        @foreach($sliders as $index => $slider)
                            <!-- SLIDE  -->
                                <li data-index="rs-{{ ($index+1)*100 }}" data-transition="slideoververtical" data-slotamount="default" data-hideafterloop="0" data-hideslideonmobile="off"  data-easein="default" data-easeout="default" data-masterspeed="default" data-thumb="" data-rotate="0" data-saveperformance="off" data-title="Slide" data-param1="" data-param2="" data-param3="" data-param4="" data-param5="" data-param6="" data-param7="" data-param8="" data-param9="" data-param10="" data-description="">
                                    <!-- MAIN IMAGE -->
                                    <img src="{{ $slider->slider_image }}"  alt=""  data-lazyload="{{ $slider->slider_image }}" data-bgposition="center center" data-kenburns="on" data-duration="4000" data-ease="Power3.easeInOut" data-scalestart="150" data-scaleend="100" data-rotatestart="0" data-rotateend="0" data-blurstart="0" data-blurend="0" data-offsetstart="0 0" data-offsetend="0 0" data-bgparallax="4" class="rev-slidebg" data-no-retina>
                                    <!-- LAYER NR. 1 -->
                                @php
                                    $title = session('lang') . '_title';
                                    $desc = session('lang') . '_description';
                                @endphp
                                <!-- LAYERS -->
                                    <div class="tp-caption tp-shape tp-shapewrapper " id="slide-100-layer"
                                         data-x="['center','center','center','center']"
                                         data-hoffset="['0','0','0','0']"
                                         data-y="['middle','middle','middle','middle']"
                                         data-voffset="['0','0','0','0']"
                                         data-width="full" data-height="full"
                                         data-whitespace="nowrap"
                                         data-type="shape"
                                         data-basealign="slide"
                                         data-responsive_offset="off"
                                         data-responsive="off"
                                         data-frames='[{"from":"opacity:0;","speed":1000,"to":"o:1;","delay":0,"ease":"Power4.easeOut"},{"delay":"wait","speed":1000,"to":"opacity:0;","ease":"Power4.easeOut"}]'
                                         data-textAlign="['left','left','left','left']"
                                         data-paddingtop="[0,0,0,0]"
                                         data-paddingright="[0,0,0,0]"
                                         data-paddingbottom="[0,0,0,0]"
                                         data-paddingleft="[0,0,0,0]"
                                         style="z-index: 2;background-color:rgba(0, 0, 0, 0.1);border-color:rgba(0, 0, 0, 0);border-width:0px; background-image:url({{ asset('site/images/overlay/rrdiagonal-line.png') }})"> </div>
                                    <!-- LAYER NR. 1 -->
                                    <!-- BACKGROUND VIDEO LAYER -->
                                    <div class="rs-background-video-layer"
                                         data-forcerewind="on"
                                         data-volume="mute"
                                         data-videowidth="100%"
                                         data-videoheight="100%"
                                         data-videomp4="{{ asset('site/images/background/bg-video.png') }}"
                                         data-videopreload="auto"
                                         data-videoloop="loop"
                                         data-aspectratio="16:9"
                                         data-autoplay="true"
                                         data-autoplayonlyfirsttime="false"
                                    ></div>

                                    <div class="tp-caption tp-shape tp-shapewrapper ov-tp "
                                         id="slide-{{ ($index+1)*100 }}-layer-1"
                                         data-x="['center','center','center','center']" data-hoffset="['0','0','0','0']"
                                         data-y="['middle','middle','middle','middle']" data-voffset="['0','0','0','0']"
                                         data-width="full"
                                         data-height="full"
                                         data-whitespace="nowrap"
                                         data-type="shape"
                                         data-basealign="slide"
                                         data-responsive_offset="off"
                                         data-responsive="off"
                                         data-frames='[{"delay":10,"speed":1000,"frame":"0","from":"opacity:0;","to":"o:1;","ease":"Power3.easeInOut"},{"delay":"wait","speed":1500,"frame":"999","to":"opacity:0;","ease":"Power4.easeIn"}]'
                                         data-textAlign="['inherit','inherit','inherit','inherit']"
                                         data-paddingtop="[0,0,0,0]"
                                         data-paddingright="[0,0,0,0]"
                                         data-paddingbottom="[0,0,0,0]"
                                         data-paddingleft="[0,0,0,0]"
                                         style="z-index: 5;">
                                    </div>
                                    <div class="tp-caption text-center"
                                         id="slide-{{ ($index+1)*100 }}-layer-3"
                                         data-x="['center','center','center','center']" data-hoffset="['-90','-150','0','0']"
                                         data-y="['middle','middle','middle','middle']" data-voffset="['-90','-100','-80','-90']"
                                         data-fontsize="['65','50','40','30']"
                                         data-lineheight="['75','60','50','40']"
                                         data-letterspacing="['2','2','2','2']"
                                         data-width="['1000','none','768','360']"
                                         data-height="none"
                                         data-whitespace="['normal','nowrap','normal','normal']"
                                         data-type="text"
                                         data-responsive_offset="off"
                                         data-responsive="off"
                                         data-frames='[{"delay":900,"speed":2000,"frame":"0","from":"z:0;rX:0;rY:0;rZ:0;sX:1.1;sY:1.1;skX:0;skY:0;opacity:0;","color":"#000000","to":"o:1;","ease":"Power3.easeInOut"},{"delay":"wait","speed":500,"frame":"999","color":"#000000","to":"opacity:0;","ease":"nothing"}]'
                                         data-textAlign="['left','left','center','center']"
                                         data-paddingtop="[0,0,0,0]"
                                         data-paddingright="[10,10,0,0]"
                                         data-paddingbottom="[0,0,0,0]"
                                         data-paddingleft="[0,0,0,0]"
                                         style="z-index: 6; min-width: 800px; max-width: 800px; font-weight: 600; white-space: normal; color: #fff; font-family: 'Poppins',sans-serif;">{!! $slider->$title !!}
                                    </div>
                                    <!-- LAYER NR. 3 -->
                                    <div class="tp-caption"
                                         id="slide-{{ ($index+1)*100 }}-layer-4"
                                         data-x="['center','center','center','center']" data-hoffset="['-265','-165','0','0']"
                                         data-y="['middle','middle','middle','middle']" data-voffset="['50','15','20','10']"
                                         data-fontsize="['18','16','14','14']"
                                         data-lineheight="['30','30','26','26']"
                                         data-width="['640','481','500','300']"
                                         data-height="none"
                                         data-whitespace="normal"
                                         data-type="text"
                                         data-responsive_offset="off"
                                         data-responsive="off"
                                         data-frames='[{"delay":900,"speed":2000,"frame":"0","from":"z:0;rX:0;rY:0;rZ:0;sX:1.1;sY:1.1;skX:0;skY:0;opacity:0;","color":"#000000","to":"o:1;","ease":"Power3.easeInOut"},{"delay":"wait","speed":500,"frame":"999","color":"#000000","to":"opacity:0;","ease":"nothing"}]'
                                         data-textAlign="['left','left','center','center']"
                                         data-paddingtop="[0,0,0,0]"
                                         data-paddingright="[0,0,0,0]"
                                         data-paddingbottom="[0,0,0,0]"
                                         data-paddingleft="[0,0,0,0]"
                                         style="z-index: 7; min-width: 640px; max-width: 640px; font-weight: 700; font-size: 18px; line-height: 30px; font-weight: 400; color: #fff; font-family: 'Poppins',sans-serif;">{!! $slider->$desc !!}
                                    </div>
                                    <!-- LAYER NR. 5 -->
                                    <a class="tp-caption rev-btn tc-btnshadow tp-rs-menulink bg-primary"
                                       href="{{ url('about') }}" target="_blank"
                                       id="slide-{{ ($index+1)*100 }}-layer-5"
                                       data-x="['center','center','center','center']" data-hoffset="['-515','-340','-85','-65']"
                                       data-y="['middle','middle','middle','middle']" data-voffset="['140','100','100','100']"
                                       data-lineheight="['18','18','18','18']"
                                       data-whitespace="nowrap"
                                       data-type="button"
                                       data-actions=''
                                       data-responsive_offset="off"
                                       data-responsive="off"
                                       data-frames='[{"delay":900,"speed":2000,"frame":"0","from":"x:-50px;z:0;rX:0;rY:0;rZ:0;sX:1.1;sY:1.1;skX:0;skY:0;opacity:0;fbr:100;","bgcolor":"#000000","to":"o:1;fbr:100;","ease":"Power3.easeInOut"},{"delay":"wait","speed":500,"frame":"999","bgcolor":"#000000","to":"opacity:0;fbr:100;","ease":"Power3.easeInOut"},{"frame":"hover","speed":"150","ease":"Power1.easeInOut","to":"o:1;rX:0;rY:0;rZ:0;z:0;fbr:90%;","style":"c:rgba(255,255,255,1);"}]'
                                       data-textAlign="['center','center','center','center']"
                                       data-paddingtop="[15,15,15,10]"
                                       data-paddingright="[30,30,30,20]"
                                       data-paddingbottom="[15,15,15,10]"
                                       data-paddingleft="[30,30,30,20]"
                                       style="z-index: 8;letter-spacing: 2px; white-space: nowrap; font-size: 12px; font-weight: 600; color: rgba(255,255,255,1);  text-transform: uppercase;"> {{ __('home.about_us') }}
                                    </a>
                                    <!-- LAYER NR. 5 -->
                                    <a class="tp-caption rev-btn tc-btnshadow tp-rs-menulink bg-primary"
                                       href="{{ url('services') }}" target="_blank"
                                       id="slide-100-layer-6"
                                       data-x="['center','center','center','center']" data-hoffset="['-360','-180','70','65']"
                                       data-y="['middle','middle','middle','middle']" data-voffset="['140','100','100','100']"
                                       data-lineheight="['18','18','18','18']"
                                       data-whitespace="nowrap"
                                       data-type="button"
                                       data-actions=''
                                       data-responsive_offset="off"
                                       data-responsive="off"
                                       data-frames='[{"delay":900,"speed":2000,"frame":"0","from":"x:-50px;z:0;rX:0;rY:0;rZ:0;sX:1.1;sY:1.1;skX:0;skY:0;opacity:0;fbr:100;","bgcolor":"#000000","to":"o:1;fbr:100;","ease":"Power3.easeInOut"},{"delay":"wait","speed":500,"frame":"999","bgcolor":"#000000","to":"opacity:0;fbr:100;","ease":"Power3.easeInOut"},{"frame":"hover","speed":"150","ease":"Power1.easeInOut","to":"o:1;rX:0;rY:0;rZ:0;z:0;fbr:90%;","style":"c:rgba(255,255,255,1);"}]'
                                       data-textAlign="['center','center','center','center']"
                                       data-paddingtop="[15,15,15,10]"
                                       data-paddingright="[30,30,30,20]"
                                       data-paddingbottom="[15,15,15,10]"
                                       data-paddingleft="[30,30,30,20]"
                                       style="z-index: 8;letter-spacing: 2px; white-space: nowrap; font-size: 12px; font-weight: 600; color: rgba(255,255,255,1);  text-transform: uppercase;"> {{ __('admin.services') }}
                                    </a>
                                </li>
                                @if ($index == 2)
                                    @break
                                @endif
                            @endforeach
                        </ul>
                        <div class="tp-bannertimer tp-bottom" style="visibility: hidden !important;"></div>
                    </div>
                </div>
                <!-- END REVOLUTION SLIDER -->
            </div>
        </div>
    </div>
    <!-- Slider END -->
    @endif


    @include('site.third.layouts.header')

    @yield('content')

    @include('site.third.layouts.footer')

    <button class="scroltop style2 radius" type="button"><i class="fa fa-arrow-up"></i></button>
</div>

<!-- JAVASCRIPT FILES ========================================= -->
<script src="{{ asset('site/js/combining.js') }}"></script><!-- CONTACT JS  -->
<script src="{{ asset('site/js/jquery.lazy.min.js') }}"></script>

<script src="{{ asset('site/plugins/revolution/revolution/js/jquery.themepunch.tools.min.js') }}"></script>
<script src="{{ asset('site/plugins/revolution/revolution/js/jquery.themepunch.revolution.min.js') }}"></script>
<!-- REVOLUTION JS FILES -->
<script type="text/javascript" src="{{ asset('site/plugins/revolution/revolution/js/extensions/revolution.extension.video.min.js') }}"></script>
<script type="text/javascript" src="{{ asset('site/plugins/revolution/revolution/js/extensions/revolution.extension.slideanims.min.js') }}"></script>
<script type="text/javascript" src="{{ asset('site/plugins/revolution/revolution/js/extensions/revolution.extension.actions.min.js') }}"></script>
<script type="text/javascript" src="{{ asset('site/plugins/revolution/revolution/js/extensions/revolution.extension.layeranimation.min.js') }}"></script>
<script type="text/javascript" src="{{ asset('site/plugins/revolution/revolution/js/extensions/revolution.extension.kenburn.min.js') }}"></script>
<script type="text/javascript" src="{{ asset('site/plugins/revolution/revolution/js/extensions/revolution.extension.navigation.min.js') }}"></script>
<script type="text/javascript" src="{{ asset('site/plugins/revolution/revolution/js/extensions/revolution.extension.parallax.min.js') }}"></script>
<script src="{{ asset('site/js/rev.slider.js') }}"></script>

@stack('scripts')
<script>
    jQuery(document).ready(function() {
        'use strict';
        dz_rev_slider_1();
        $('.lazy').Lazy();
    });	/*ready*/
</script>

</body>
</html>

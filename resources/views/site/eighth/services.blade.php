@extends('site.fifth.layouts.app')

@section('content')

<!--Page Title-->

<section class="page-title" style="background-image:url(images/background/7.jpg);">
    <div class="auto-container">
        <h1>{{ __('home.our_services') }}</h1>
        <div class="text">What We Actually Do?</div>
        <ul class="bread-crumb clearfix">
            <li><a href="{{ url('/') }}"><span class="fas fa-home"></span> {{ __('home.home') }} </a></li>
            <li>{{ __('home.services') }}</li>
        </ul>
    </div>
</section>
<!--End Page Title-->

<!-- Services Section -->
<section class="services-section">
    <div class="auto-container">

        <!-- Sec Title -->
        <div class="sec-title centered">
            <h2>Best Health Services</h2>
            <div class="separator"></div>
        </div>
        <div class="row clearfix">
            <!-- Left Column -->
            <div class="left-column pull-left col-lg-4 col-md-12 col-sm-12">
                <div class="inner-column">
                    <!-- Service Block -->
                    @foreach ($services as $index => $service)
                        <div class="service-block">
                            @php
                                $title = session('lang') . '_title';
                                $desc = session('lang') . '_description';
                            @endphp
                            <div class="inner-box wow fadeInLeft" data-wow-delay="250ms" data-wow-duration="1500ms">
                                <div class="icon-box">
                                    <span class="icon flaticon-operating-room"></span>
                                </div>
                                <h3>
                                    <a href="#">
                                        {{ $service->$title }}
                                    </a>
                                </h3>
                                <div class="text">
                                    {{ $service->$desc }}
                                </div>
                            </div>
                        </div>
                        @if ($index == 2)
                            @break
                        @endif
                    @endforeach
                </div>

            </div>

            <!-- Circles Column -->
            <div class="circles-column col-lg-4 col-md-12 col-sm-12">
                <div class="inner-column">
                    <div class="circles">
                        <div class="circle-one"></div>
                        <div class="circle-two"></div>
                        <div class="circle-three"></div>
                    </div>
                </div>
            </div>

            <!-- Right Column -->
            <div class="right-column pull-right col-lg-4 col-md-12 col-sm-12">
                <div class="inner-column">
                    @foreach ($services as $index => $service)
                    @if ($index > 2)
                    <!-- Service Block -->
                    @php
                        $title = session('lang') . '_title';
                        $desc = session('lang') . '_description';
                    @endphp
                    <div class="service-block-two">
                        <div class="inner-box wow fadeInRight" data-wow-delay="250ms" data-wow-duration="1500ms">
                            <div class="icon-box">
                                <span class="icon flaticon-pharmacy"></span>
                            </div>
                            <h3>
                                <a href="#">
                                    {{ $service->$title }}
                                </a>
                            </h3>
                            <div class="text">
                                {{ $service->$desc }}
                            </div>
                        </div>
                    </div>
                    @if ($index == 5)
                        @break
                    @endif
                    @endif
                    @endforeach

                </div>
            </div>
        </div>
    </div>

</section>


<!-- Fluid Section One -->
<section class="fluid-section-one">
    <div class="outer-section clearfix">

       <!--Image Column-->
        <div class="image-column" style="background-image: url({{ asset('site/part2/images/resource/image-1.jpg') }})">
            <div class="image">
                <img src="{{ asset('site/part2/images/resource/image-1.jpg') }}" alt="">
            </div>
        </div>

        <!--End Image Column-->



        <!--Content Column-->

        <div class="content-column">

            <div class="content-box">

                <div class="sec-title">

                    <h2>{{ __('home.about_us') }}</h2>

                    <div class="separator style-two"></div>

                </div>

                <div class="text">

                    <p>Our main long-term goal is always achieving complex results for your dental health.  But in the process, we also keep the focus on giving you the best customer service. We're always making our dental office as safe place as possible!</p>

                    <p>Nulla auctor neque non tortor tincidunt fringilla. Nam in condimentum orci. Integer ac pellentesque sem. Nulla fringilla dui id metus viverra interdum.</p>

                </div>

                <div class="row clearfix">
                    <div class="column col-lg-6 col-md-6 col-sm-12">
                        <ul class="list-style-one">
                            @foreach ($services as $index => $service)
                            @php
                                $title = session('lang') . '_title';
                            @endphp
                            <li><span class="icon flaticon-medical-stethoscope-variant"></span>{{ $service->$title }}</li>
                                @if($index == 1)
                                    @break
                                @endif
                            @endforeach
                        </ul>
                    </div>

                    <div class="column col-lg-6 col-md-6 col-sm-12">
                        <ul class="list-style-one">
                            @foreach ($services as $index => $service)
                            @if ($index > 1 && $index < 4)
                            @php
                            $title = session('lang') . '_title';
                            @endphp
                            <li>
                                <span class="icon flaticon-ambulance-side-view"></span>
                                {{ $service->$title }}
                            </li>
                            @endif
                            @endforeach
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>



<!-- Services Section Two -->
<section class="services-section-two style-two">

    <div class="auto-container">

        <!-- Sec Title -->
        <div class="sec-title centered">
            <h2> {{ __('home.our_services') }} </h2>
            <div class="separator"></div>
        </div>
        <div class="row clearfix">

            <!-- Services Block Three -->
            @foreach ($services as $index => $service)
            <div class="service-block-three col-lg-4 col-md-6 col-sm-12">
                <div class="inner-box wow fadeInDown" data-wow-delay="0ms" data-wow-duration="1500ms">
                    <div class="border-one"></div>
                    <div class="border-two"></div>
                    <div class="icon-box">
                        <span class="icon flaticon-operating-room"></span>
                    </div>
                    @php
                        $title = session('lang') . '_title';
                        $desc = session('lang') . '_description';
                    @endphp
                    <h3>
                        <a href="#">
                            {{ $service->$title }}
                        </a>
                    </h3>
                    <div class="text">
                        {{ $service->$desc }}
                    </div>
                </div>
            </div>
            @if ($index == 6)
                @break
            @endif
            @endforeach
        </div>

    </div>

</section>
<!-- End Services Section Two -->

@endsection

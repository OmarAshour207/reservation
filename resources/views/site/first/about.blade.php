@extends('site.first.layouts.app')

@section('content')
    <!-- Content -->
    <div class="page-content bg-white">
        <!-- inner page banner -->
        <div class="dlab-bnr-inr overlay-black-middle text-center bg-pt" style="background-image:url({{ asset('site/images/banner/bnr3.jpg') }});">
            <div class="container">
                <div class="dlab-bnr-inr-entry align-m text-center">
                    <h1 class="text-white">{{ __('home.about_us') }}</h1>
                    <!-- Breadcrumb row -->
                    <div class="breadcrumb-row">
                        <ul class="list-inline">
                            <li><a href="{{ url('/') }}">{{ __('home.home') }}</a></li>
                            <li>{{ __('home.about_us') }}</li>
                        </ul>
                    </div>
                    <!-- Breadcrumb row END -->
                </div>
            </div>
        </div>
        <!-- inner page banner END -->
        <!-- contact area -->
        <div class="content-block">
            <!-- About Services info -->
            <div class="section-full content-inner bg-white video-section" style="background-image:url({{ asset('site/images/background/bg-video.png') }});">
                <div class="container">
                    <div class="section-content">
                        <div class="row d-flex">
                            <div class="col-lg-6 col-md-12 m-b30">
                                <div class="video-bx">
                                    <img src="{{ $about->about_image ?? '' }}" alt="About Image">
                                </div>
                            </div>
                            <div class="col-lg-6 col-md-12 m-b30 align-self-center video-infobx">
                                <div class="content-bx1">
                                    @php $desc = session('lang') . '_description'; @endphp
                                    <h2 class="m-b15 title">{{ $about->$desc ?? '' }}</h2>
                                    <p class="m-b30">{{ trans('home.lorem_ipsum') }}</p>
                                    <img src="{{ asset('site/images/sign.png') }}" width="200" alt=""/>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- About Services info END -->
            <!-- Counter -->
            <div class="section-full content-inner overlay-black-dark bg-img-fix" style="background-image:url({{ asset('site/images/background/bg1.jpg') }});">
                <div class="container">
                    <div class="section-content text-center text-white">
                        <div class="row">
                            <div class="col-lg-3 col-md-6 col-sm-6 col-6 m-b30">
                                <div class="counter-style-5">
                                    <div class="">
                                        <span class="counter">6810</span>
                                    </div>
                                    <span class="counter-text">Passionate Employee</span>
                                </div>
                            </div>
                            <div class="col-lg-3 col-md-6 col-sm-6 col-6 m-b30">
                                <div class="counter-style-5">
                                    <div class="">
                                        <span class="counter">4060</span>
                                    </div>
                                    <span class="counter-text">Modern Factory</span>
                                </div>
                            </div>
                            <div class="col-lg-3 col-md-6 col-sm-6 col-6 m-b30">
                                <div class="counter-style-5">
                                    <div class="">
                                        <span class="counter">3164</span>
                                    </div>
                                    <span class="counter-text">Factory in Worldwide</span>
                                </div>
                            </div>
                            <div class="col-lg-3 col-md-6 col-sm-6 col-6 m-b30">
                                <div class="counter-style-5">
                                    <div class="">
                                        <span class="counter">1852</span>
                                    </div>
                                    <span class="counter-text">International Awards</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Counter END -->
            <!-- Team Section -->
            <div class="section-full text-center bg-gray content-inner">
                <div class="container">
                    <div class="section-head text-black text-center">
                        <h2 class="title">{{ trans('home.meet_team') }}</h2>
                        <p>{{ __('home.lorem_ipsum') }}</p>
                    </div>
                    <div class="row">
                        @if($teamMembers->count() > 0)
                            @foreach($teamMembers as $teamMember)
                            @php
                            $name = session('lang') . '_name';
                            $title = session('lang') . '_title';
                            @endphp
                            <div class="col-lg-3 col-md-6 col-sm-6">
                            <div class="dlab-box m-b30 dlab-team1">
                                <div class="dlab-media">
                                    <img width="358" height="460" alt="" src="{{ $teamMember->member_image }}">
                                </div>
                                <div class="dlab-info">
                                    <h4 class="dlab-title">{{ $teamMember->$name }}</h4>
                                    <span class="dlab-position">{{ $teamMember->$title }}</span>
                                    <ul class="dlab-social-icon dez-border">
                                        <li></li>
                                        <li></li>
                                        <li></li>
                                        <li></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        @endforeach
                        @endif
                    </div>
                </div>
            </div>
            <!-- Team Section END -->

            <!-- Testimonials -->
            <div class="section-full content-inner-2 bg-gray">
                <div class="container">
                    <div class="section-head text-black text-center">
                        <h2 class="title">{{ trans('home.happy_client') }}</h2>
                        <p>{{ trans('home.lorem_ipsum') }}</p>
                    </div>
                    <div class="testimonial-six owl-loaded owl-theme owl-carousel owl-none dots-style-2">
                        @foreach($testimonials as $testimonial)
                        <div class="item">
                            @php
                            $name = session('lang') . '_name';
                            $title = session('lang') . '_title';
                            $desc = session('lang') . '_description';
                            @endphp
                            <div class="testimonial-8">
                                <div class="testimonial-text">
                                    <p>{{ $testimonial->$desc }}</p>
                                </div>
                                <div class="testimonial-detail clearfix">
                                    <div class="testimonial-pic radius shadow">
                                        <img src="{{ $testimonial->testimonial_image }}" width="100" height="100" alt="">
                                    </div>
                                    <h5 class="testimonial-name m-t0 m-b5">
                                        {{ $testimonial->$name }}
                                    </h5>
                                    <span class="testimonial-position">{{ $testimonial->$title }}</span>
                                </div>
                            </div>
                        </div>
                        @endforeach
                    </div>
                </div>
            </div>
            <!-- Testimonials END -->
        </div>
        <!-- contact area END -->
    </div>
    <!-- Content END -->
@endsection

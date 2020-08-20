@extends('site.first.layouts.app')

@section('content')
    <!-- Home Slider -->
    <div class="home-slider owl-theme owl-carousel">
        @foreach($sliders as $index => $slider)
            <div class="slider-item slider-item-img">
            <div class="d-table">
                <div class="d-table-cell">
                    <div class="container">
                        <div class="slider-text">
                            @php
                                $numbers = ['', 'two', 'three']
                            @endphp
                            <div class="slider-shape{{ $numbers[$index] == '' ? '' : '-' . $numbers[$index] }}">
                                <img src="{{ $slider->slider_image }}" alt="Shape">
                            </div>
                            @php
                                $title = session('lang') . '_title';
                                $desc = session('lang') . '_description';
                            @endphp
                                <h1 style="{{ session('lang') == 'ar' ? 'margin-left:auto' : '' }}">
                                    {{ $slider->$title }}
                                </h1>
                                <p style="{{ session('lang') == 'ar' ? 'margin-left:auto' : '' }}">
                                    {{ $slider->$desc }}
                                </p>
                            <div class="common-btn" style="z-index: 100">
                                <a href="appointment.html"> {{ __('home.get_appointment') }}</a>
                                <a class="cmn-btn-right" href="{{ url('about') }}">{{ __('home.learn_more') }}</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        @endforeach
    </div>
    <!-- End Home Slider -->

    <!-- Counter -->
    <div class="counter-area">
        <div class="container">
            <div class="row counter-bg">
                <div class="col-sm-6 col-md-3 col-lg-3">
                    <div class="counter-item">
                        <i class="icofont-patient-bed"></i>
                        <h3 class="counter">850</h3>
                        <p>Patients Beds</p>
                    </div>
                </div>
                <div class="col-sm-6 col-md-3 col-lg-3">
                    <div class="counter-item">
                        <i class="icofont-people"></i>
                        <h3><span class="counter">25000</span>+</h3>
                        <p>Happy Patients</p>
                    </div>
                </div>
                <div class="col-sm-6 col-md-3 col-lg-3">
                    <div class="counter-item">
                        <i class="icofont-doctor-alt"></i>
                        <h3 class="counter">750</h3>
                        <p>Doctors  & Nurse</p>
                    </div>
                </div>
                <div class="col-sm-6 col-md-3 col-lg-3">
                    <div class="counter-item">
                        <i class="icofont-badge"></i>
                        <h3 class="counter">18</h3>
                        <p>Year Experience</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- End Counter -->


    <!-- About -->
    <div class="about-area pt-100 pb-70">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-6">
                    <div class="about-item">
                        <div class="about-left">
                            <img src="{{ $aboutUs->about_image }}" alt="About">
                        </div>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="about-item about-right">
                        <img src="{{ asset('site/img/home-one/5.png') }}" alt="About">
                        <h2>{{ __('home.about_us') }}</h2>
                        @php
                            $desc = session('lang') . '_description';
                        @endphp
                        <p> {{ $aboutUs->$desc }} </p>
                        <ul>
                            <li>
                                <i class="icofont-check-circled"></i>
                                {{ __('home.browse_website') }}
                            </li>
                            <li>
                                <i class="icofont-check-circled"></i>
                                {{ __('home.choose_service') }}
                            </li>
                            <li>
                                <i class="icofont-check-circled"></i>
                                {{ __('home.send') }} {{ __('home.message') }}
                            </li>
                        </ul>
                        <a href="{{ url('about') }}">{{ __('home.learn_more') }}</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- End About -->

    <!-- Services -->
    <section class="services-area pb-70">
        <div class="container">
            <div class="section-title">
                <h2>{{ __('home.our_services') }}</h2>
            </div>
            <div class="row">
                @foreach($services as $service)
                    <div class="col-sm-6 col-lg-3 wow fadeInUp" data-wow-delay=".5s">
                    <div class="service-item">
                        @php
                            $title = session('lang') . '_title';
                            $desc = session('lang') . '_description';
                        @endphp
                        <div class="service-front">
                            <i class="icofont-prescription"></i>
                            <h3>{{ $service->$title }}</h3>
                            <p>{{ $service->$desc }}</p>
                        </div>
                        <div class="service-end">
                            <i class="icofont-prescription"></i>
                            <h3>{{ $service->$title }}</h3>
                            <p>{{ $service->$desc }}</p>
                            <a href="{{ route('service.show', ['id' => $service->id, 'title' => $service->$title]) }}">{{ __('home.read_more') }}</a>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </section>
    <!-- End Services -->

    @php
        $title = session('lang') . '_title';
    @endphp
    <!-- Video -->
    <div class="video-wrap">
        <div class="container-fluid p-0">
            <div class="tab-content" id="pills-tabContent">
                @foreach($projects as $index => $project)
                    @php
                    $title = session('lang') . '_title';
                    $desc = session('lang') . '_description';
                    @endphp
                <div class="tab-pane fade show {{ $index == 0 ? 'active' : '' }}" id="pills-{{ $index }}" role="tabpanel" aria-labelledby="pills-{{ $index }}-tab">
                    <div class="video-area">
                        <div class="d-table">
                            <div class="d-table-cell">
                                <div class="container">
                                    <div class="video-item">
                                        <a href="http://www.youtube.com/watch?v=0O2aH4XLbto" class="popup-youtube">
                                            <i class="icofont-ui-play"></i>
                                        </a>
                                        <div class="video-content">
                                            <h3>{{ $project->$title }}</h3>
                                            <p> {{ $project->$desc }} </p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
        </div>

        <div class="container">
            <ul class="video-nav nav nav-pills" id="pills-tab" role="tablist">
                @foreach($projects as $index => $project)
                    @php
                        $title = session('lang') . '_title';
                    @endphp
                    <li class="nav-item video-nav-item">
                        <a class="nav-link {{ $index == 0 ? 'active' : '' }}" id="pills-{{ $index }}-tab" data-toggle="pill" href="#pills-{{ $index }}" role="tab" aria-controls="pills-{{ $index }}" aria-selected="true">{{ $project->$title }}</a>
                    </li>
                @endforeach
            </ul>
        </div>
    </div>
    <!-- End Video -->

    <!-- Expertise -->
    <section class="expertise-area pb-70">
        <div class="container">
            <div class="section-title">
                <h2>Our Expertise</h2>
            </div>
            <div class="row align-items-center">
                <div class="col-lg-6">
                    <div class="expertise-item">
                        <div class="row">
                            <div class="col-sm-6 col-lg-6 wow fadeInUp" data-wow-delay=".3s">
                                <a href="blog-details.html">
                                    <div class="expertise-inner">
                                        <i class="icofont-doctor-alt"></i>
                                        <h3>Certified Doctors</h3>
                                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p>
                                    </div>
                                </a>
                            </div>
                            <div class="col-sm-6 col-lg-6 wow fadeInUp" data-wow-delay=".5s">
                                <a href="blog-details.html">
                                    <div class="expertise-inner">
                                        <i class="icofont-stretcher"></i>
                                        <h3>Emergency</h3>
                                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p>
                                    </div>
                                </a>
                            </div>
                            <div class="col-sm-6 col-lg-6 wow fadeInUp" data-wow-delay=".3s">
                                <a href="blog-details.html">
                                    <div class="expertise-inner">
                                        <i class="icofont-network"></i>
                                        <h3>Teachnology</h3>
                                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p>
                                    </div>
                                </a>
                            </div>
                            <div class="col-sm-6 col-lg-6 wow fadeInUp" data-wow-delay=".5s">
                                <a href="blog-details.html">
                                    <div class="expertise-inner">
                                        <i class="icofont-ambulance-cross"></i>
                                        <h3>Ambulance</h3>
                                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p>
                                    </div>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="expertise-item">
                        <div class="expertise-right">
                            <img src="{{ asset('site//img/home-one/6.jpg') }}" alt="Expertise">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- End Expertise -->

    <!-- Team Members -->
    <section class="doctors-area ptb-100">
        <div class="container">
            <div class="section-title">
                <h2>{{ __('home.meet_team') }}</h2>
            </div>
            <div class="row">
                @foreach($teamMembers as $teamMember)
                    <div class="col-sm-6 col-lg-4 wow fadeInUp" data-wow-delay=".5s">
                        <div class="doctor-item">
                            <div class="doctor-top">
                                <img src="{{ $teamMember->member_image }}" alt="Doctor">
                                <a href="javascript:void(0);">{{ __('home.get_appointment') }}</a>
                            </div>
                            <div class="doctor-bottom">
                                <h3>
                                    <a href="javascript:void(0);"> {{ $teamMember->role == 1 ? 'Dr' : 'Nur' }}  </a>
                                </h3>
                                @php $name = session('lang') . '_name'; @endphp
                                <span>{{ $teamMember->$name }}</span>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
            <div class="doctor-btn">
                <a href="doctor.html">See All</a>
            </div>
        </div>
    </section>
    <!-- End Team Members -->

    <!-- Blog -->
    <section class="blog-area pt-100 pb-70">
        <div class="container">
            <div class="section-title">
                <h2>{{ __('home.latest_blog') }}</h2>
            </div>
            <div class="row">
                @foreach($blogs as $blog)
                    <div class="col-sm-6 col-lg-4 wow fadeInUp" data-wow-delay=".5s">
                        <div class="blog-item">
                            @php
                                $title = session('lang') . '_title';
                                $content = session('lang') . '_content';
                            @endphp
                            <div class="blog-top">
                                <a href="{{ route('blog.show', ['id' => $blog->id, 'title' => $blog->$title]) }}">
                                    <img src="{{ $blog->blog_image }}" alt="Blog">
                                </a>
                            </div>
                            <div class="blog-bottom">
                                <h3>
                                    <a href="{{ route('blog.show', ['id' => $blog->id, 'title' => $blog->$title]) }}"> {{ $blog->$title }} </a>
                                </h3>
                                <p>{!! substr($blog->content, 0, 50) !!} </p>
                                <ul>
                                    <li>
                                        <a href="{{ route('blog.show', ['id' => $blog->id, 'title' => $blog->$title]) }}">
                                            {{ __('home.read_more') }}
                                            <i class="icofont-long-arrow-right"></i>
                                        </a>
                                    </li>
                                    <li>
                                        <i class="icofont-calendar"></i>
                                        {{ $blog->created_at->format('d M Y') }}
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </section>
    <!-- End Blog -->

@endsection

@push('scripts')
    <script type="text/javascript">
        $(document).ready(function () {
            $('a').on('click', function(e) {
                if (!$(this).hasClass('allowedLink')) {
                    e.preventDefault();
                }
            });
        });
    </script>
@endpush

@extends('site.first.layouts.app')

@section('content')
    <!-- Page Title -->
    <div class="page-title-area page-title-four">
        <div class="d-table">
            <div class="d-table-cell">
                <div class="page-title-item">
                    <h2>About</h2>
                    <ul>
                        <li>
                            <a href="index.html">Home</a>
                        </li>
                        <li>
                            <i class="icofont-simple-right"></i>
                        </li>
                        <li>About</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
    <!-- End Page Title -->

    <!-- About -->
    <div class="about-area pt-100 pb-70">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-6">
                    <div class="about-item">
                        <div class="about-left">
                            <img src="{{ $about->about_image }}" alt="About">
                        </div>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="about-item about-right">
                        <img src="{{ asset('site/img/home-one/5.png') }}" alt="About">
                        <h2> {{ __('home.about_us') }} </h2>
                        @php
                            $desc = session('lang') . '_description';
                        @endphp
                        <p> {{ $about->$desc }} </p>
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
                        <a href="about.html">{{ __('home.learn_more') }}</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- End About -->

    <!-- Services -->
    <section class="services-area pb-70">
        <div class="container">
            <div class="section-title-two">
                <span>{{ __('admin.services') }}</span>
                <h2> {{ __('home.our_hospital_services') }} </h2>
            </div>
            <div class="row">
                @foreach($services as $service)
                    <div class="col-sm-6 col-lg-3 wow fadeInUp" data-wow-delay=".5s">
                    <div class="service-item">
                        @php
                            $title = session('lang') . '_title';
                            $desc = session('lang') . '_description';
                        @endphp
                        <div class="d-table">
                            <div class="d-table-cell">
                                <div class="service-front">
                                    <i class="icofont-prescription"></i>
                                    <h3>{{ $service->$title }}</h3>
                                    <p> {{ $service->$desc }} </p>
                                </div>
                                <div class="service-end">
                                    <i class="icofont-prescription"></i>
                                    <h3>{{ $service->$title }}</h3>
                                    <p>{{ $service->$desc }}</p>
                                    <a href="{{ route('service.show', ['id' => $service->id, 'title' => $service->$title]) }}">{{ __('home.read_more') }}</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </section>
    <!-- End Services -->

    <!-- Testimonials -->
    <section class="testimonial-area ptb-100">
        <div class="container">
            <div class="testimonial-wrap">
                <h2>{{ __('home.what_patients_say') }}</h2>

                <div class="testimonial-slider owl-theme owl-carousel">
                    @foreach($testimonials as $testimonial)
                        <div class="testimonial-item">
                            @php
                                $name = session('lang') . '_name';
                                $desc = session('lang') . '_description';
                            @endphp
                            <img src="{{ $testimonial->testimonial_image }}" alt="Testimonial">
                            <h3>{{ $testimonial->$name }}</h3>
                            <p> {{ $testimonial->$desc }} </p>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </section>
    <!-- End Testimonials -->
<br>
<br>
<br>
<br>
<br>
<br>
@endsection

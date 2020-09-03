@extends('site.third.layouts.app')

@section('content')

    <!-- Banner -->
    <div class="banner-area">
        <div class="d-table">
            <div class="d-table-cell">
                <div class="container">
                    <div class="banner-item">
                        @foreach ($sliders as $index => $slider)
                            @php
                                $title = session('lang') . '_title';
                                $desc = session('lang') . '_description';
                            @endphp
                            <h1>{{ $slider->$title }}</h1>
                            <p> {{ $slider->$desc }} </p>

                            @if($index == 0)
                                @break
                            @endif
                        @endforeach
                        <div class="common-btn-two">
                            <a href="{{ url('appointments') }}">{{ __('home.get_appointment') }}</a>
                            <a class="cmn-btn-right-two" href="{{ url('about') }}">{{ __('home.learn_more') }}</a>
                        </div>
                        <div class="banner-right">
                            @foreach ($sliders as $index => $slider)
                                <img src="{{ $slider->slider_image }}" alt="Banner">
                                @if($index == 2)
                                    @break
                                @endif
                            @endforeach
                            <img src="{{ asset('site/img/home-one/5.png') }}" alt="Banner">
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="heart-shape">
            <img src="{{ asset('site/img/home-three/3.png') }}" alt="Banner">
        </div>
    </div>
    <!-- End Banner -->


    @if ($page_filter != null)

        <!-- Speciality -->
        <section class="speciality-area pb-100">
            <div class="container-fluid p-0">
                <div class="row m-0">
                    <div class="col-lg-7">
                        <div class="speciality-left">
                            <div class="section-title-two">
                                <span>Speciality</span>
                                <h2>Our Expertise</h2>
                            </div>
                            <div class="speciality-item">
                                <div class="row m-0">
                                    @foreach($services as $index => $service)
                                        <div class="col-sm-6 col-lg-6 wow fadeInUp" data-wow-delay=".5s">
                                            <div class="speciality-inner">
                                                <i class="icofont-check-circled"></i>
                                                @php
                                                    $title = session('lang') . '_title';
                                                    $desc = session('lang') . '_description';
                                                @endphp
                                                <h3> {{ $service->$title }} </h3>
                                                <p>{{ substr($service->$desc, 0, 20) }}</p>
                                            </div>
                                        </div>
                                        @if($index == 3)
                                            @break
                                        @endif
                                    @endforeach
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-5 pr-0">
                        <div class="speciality-item speciality-right speciality-right-two">
                            <img src="{{ asset('site/img/home-two/4.jpg') }}" alt="Speciality">
                            <div class="speciality-emergency">
                                <div class="speciality-icon">
                                    <i class="icofont-ui-call"></i>
                                </div>
                                <h3>{{ __('home.emergency_call') }}</h3>
                                <p> {{ setting('phone') }} </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- End Speciality -->


        @if (in_array('our_services', $page_filter))
            <!-- Services -->
            <section class="services-area pb-70">
                <div class="container">
                    <div class="section-title">
                        <h2>{{ __('home.our_services') }}</h2>
                    </div>
                    <div class="row">
                        @foreach($services as $index => $service)
                            <div class="col-sm-6 col-lg-3 wow fadeInUp" data-wow-delay=".5s">
                            <div class="service-item">
                                @php
                                    $title = session('lang') . '_title';
                                    $desc = session('lang') . '_description';
                                @endphp
                                <div class="service-front">
                                    <i class="icofont-prescription"></i>
                                    <h3>{{ $service->$title }}</h3>
                                    <p>{{ substr($service->$desc, 0, 71) }}</p>
                                </div>
                                <div class="service-end">
                                    <i class="icofont-prescription"></i>
                                    <h3>{{ $service->$title }}</h3>
                                    <p>{{ substr($service->$desc, 0, 71) }}</p>
                                    <a href="{{ route('service.show', ['id' => $service->id, 'title' => $service->$title]) }}">{{ __('home.read_more') }}</a>
                                </div>
                            </div>
                        </div>
                            @if($index == 7)
                                @break
                            @endif
                        @endforeach
                    </div>
                </div>
            </section>
            <!-- End Services -->
        @endif

        @if (in_array('about', $page_filter))
            <!-- About -->
            <section class="welcome-area ptb-100">
                <div class="container-fluid p-0">
                    <div class="row m-0">
                        <div class="col-lg-6 p-0">
                            <div class="welcome-item welcome-left" style="background-image: url('{{ $aboutUs->about_image }}') !important">
                                <img src="{{ $aboutUs->about_image }}" alt="image">
                            </div>
                        </div>
                        <div class="col-lg-6 p-0">
                            <div class="welcome-item welcome-right">
                                <div class="section-title-two">
                                    <span> {{ __('home.about_us') }} </span>
                                    @php
                                        $desc = session('lang') . '_description';
                                    @endphp
                                    <h2>{{ $aboutUs->$desc }}</h2>
                                </div>
                                <ul>
                                    @foreach ($services as $index => $service)
                                        <li class="wow fadeInUp" data-wow-delay=".5s">
                                            <i class="icofont-stretcher"></i>
                                            <div class="welcome-inner">
                                                @php
                                                    $title = session('lang') . '_title';
                                                    $desc = session('lang') . '_description';
                                                @endphp
                                                <h3> {{ $service->$title }} </h3>
                                                <p> {{ $service->$desc}} </p>
                                            </div>
                                        </li>
                                        @if ($index == 3)
                                            @break
                                        @endif
                                    @endforeach
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
            <!-- End About -->
        @endif

        @if (in_array('our_projects', $page_filter))
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
                            @if($index == 7)
                                @break
                            @endif
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
        @endif

        @if (in_array('team_members', $page_filter))
            <!-- Team Members -->
            <section class="doctors-area ptb-100">
                <div class="container">
                    <div class="section-title">
                        <h2>{{ __('home.meet_team') }}</h2>
                    </div>
                    <div class="row">
                        @foreach($teamMembers as $index => $teamMember)
                            <div class="col-sm-6 col-lg-4 wow fadeInUp" data-wow-delay=".5s">
                                <div class="doctor-item">
                                    <div class="doctor-top">
                                        <img src="{{ $teamMember->member_image }}" alt="Doctor">
                                        <a href="javascript:void(0);">{{ __('home.get_appointment') }}</a>
                                    </div>
                                    <div class="doctor-bottom">
                                        <h3>
                                            <a href="javascript:void(0);"> {{ $teamMember->role == 1 ? __('home.doctor') : __('home.nursery') }}  </a>
                                        </h3>
                                        @php $name = session('lang') . '_name'; @endphp
                                        <span>{{ $teamMember->$name }}</span>
                                    </div>
                                </div>
                            </div>
                            @if($index == 2)
                                @break
                            @endif
                        @endforeach
                    </div>
                    <div class="doctor-btn">
                        <a href="{{ url('appointments') }}"> {{ __('home.see_all') }} </a>
                    </div>
                </div>
            </section>
            <!-- End Team Members -->
        @endif
        <br>
        <br>
        <br>
        <!-- Counter -->
        <div class="counter-area">
            <div class="container">
                <div class="row counter-bg">
                    <div class="col-sm-6 col-md-3 col-lg-4">
                        <div class="counter-item">
                            <i class="icofont-people"></i>
                            <h3><span class="counter">{{ $all_patients }}</span>+</h3>
                            <p> {{ __('home.happy_client') }} </p>
                        </div>
                    </div>
                    <div class="col-sm-6 col-md-3 col-lg-4">
                        <div class="counter-item">
                            <i class="icofont-doctor-alt"></i>
                            <h3 class="counter">{{ $all_doctors }}</h3>
                            <p> {{ __('home.doctor_and_nursery') }} </p>
                        </div>
                    </div>
                    <div class="col-sm-12 col-md-3 col-lg-4">
                        <div class="counter-item">
                            <i class="icofont-badge"></i>
                            <h3 class="counter">{{ $success_mission }} </h3>
                            <p> {{ __('home.success_missions') }} </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- End Counter -->

        @if(in_array('testimonials', $page_filter))
            <!-- Review Slider -->
            <section class="review-area pb-100">
                <div class="container">
                    <div class="main">
                        <div class="slider-nav">
                            @php
                                $desc = [];
                            @endphp
                            @foreach ($testimonials as $testimonial)
                                <div>
                                    <div class="review-img">
                                        <img src="{{ $testimonial->testimonial_image }}" alt="Feedback">
                                    </div>
                                    <div class="review-details">
                                        @php
                                            $name = session('lang') . '_name';
                                            $title = session('lang') . '_title';
                                            $desc1 = session('lang') . '_description';
                                            array_push($desc, $testimonial->$desc1);
                                        @endphp
                                        <h3>{{ $testimonial->$name }}</h3>
                                        <span>{{ $testimonial->$title }}</span>
                                    </div>
                                </div>
                            @endforeach
                        </div>

                        <div class="slider-for">
                            @for ($i = 0; $i < count($desc); $i++)
                                <div>
                                    <p>{{ $desc[$i] }}</p>
                                </div>
                            @endfor
                        </div>
                    </div>
                </div>
            </section>
            <!-- End Review Slider -->
        @endif

        @if (in_array('latest_blog', $page_filter))
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
        @endif

    @endif

@endsection

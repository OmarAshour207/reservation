@extends('site.second.layouts.app')

@section('content')
    <!-- Home Slider -->
    <div class="home-slider home-slider-two owl-theme owl-carousel">
        @php
            $numbers = ['two', 'three', 'four'];
        @endphp
        @foreach ($sliders as $index => $slider)
        <div class="slider-item slider-item-img-{{ $numbers[$index] }}" style="background-image: url('{{ $slider->slider_image }}') !important">
                <div class="d-table">
                    <div class="d-table-cell">
                        <div class="container">
                            <div class="slider-text">
                                <div class="slider-shape">
                                    <img src="{{ asset('site/img/home-one/5.png') }}" alt="Shape">
                                </div>
                                @php
                                    $title = session('lang') . '_title';
                                    $desc = session('lang') . '_description';
                                @endphp
                                <h1>{{ $slider->$title }}</h1>
                                <p> {{ $slider->$desc }} </p>
                                <div class="common-btn">
                                    <a href="{{ url('appointments') }}"> {{ __('home.get_appointment') }} </a>
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

    <!-- Emergency -->
    <div class="emergency-area">
        <div class="container">
            <div class="row emergency-bg">
                <div class="col-sm-6 col-lg-4">
                    <div class="emergency-item">
                        <i class="icofont-ui-call"></i>
                        <div class="emergency-inner">
                            <h3>{{ __('home.emergency_call') }}</h3>
                            <p> {{ setting('phone') }} </p>
                        </div>
                    </div>
                </div>
                <div class="col-sm-6 col-lg-4">
                    <div class="emergency-item">
                        <i class="icofont-location-pin"></i>
                        <div class="emergency-inner">
                            <h3>{{ __('admin.address') }}</h3>
                            <p>{{ setting(session('lang') . '_address') }}</p>
                        </div>
                    </div>
                </div>
                <div class="col-sm-6 offset-sm-3 offset-lg-0 col-lg-4">
                    <div class="emergency-item">
                        <i class="icofont-ambulance-crescent"></i>
                        <div class="emergency-inner">
                            <h3>{{ __('home.ambulance') }}</h3>
                            <p> {{ setting('phone') }} </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- End Emergency -->

    @if ($page_filter != null)
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
                                @foreach ($blogs as $index => $blog)
                                <div class="col-sm-6 col-lg-6 wow fadeInUp" data-wow-delay=".5s">
                                    <a href="{{ route('blog.show', ['id' => $blog->id, 'title' => $blog->$title]) }}">
                                        <div class="expertise-inner">
                                            <i class="icofont-stretcher"></i>
                                            @php
                                                $title = session('lang') . '_title';
                                                $content = session('lang') . '_content';
                                            @endphp
                                            <h3> {{ $blog->$title }} </h3>
                                            <p>{!! substr($blog->$content, 0, 50) !!}</p>
                                        </div>
                                    </a>
                                </div>
                                @if ($index == 3)
                                    @break
                                @endif
                                @endforeach
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
                            @if($index == 7)
                                @break
                            @endif
                        @endforeach
                    </div>
                </div>
            </section>
            <!-- End Services -->
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

@extends('site.second.layouts.app')

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
            <!-- About Us -->
            <div class="section-full content-inner bg-white">
                <div class="container">
                    <div class="row align-items-center">
                        <div class="col-lg-6 col-md-12 m-b30">
                            <div class="our-story">
                                <span> {{ __('home.about_us') }} </span>
                                @php $desc = session('lang') . '_description'; @endphp
                                <h4 class="title"> {{ $about->$desc ?? '' }} </h4>
                                <p>{{ trans('home.lorem_ipsum') }}</p>
                            </div>
                        </div>
                        <div class="col-lg-6 col-md-12 m-b30 our-story-thum">
                            <img src="{{ $about->about_image ?? '' }}" class="radius-sm" alt="">
                        </div>
                    </div>
                </div>
            </div>
            <!-- About Us End -->
            <!-- Abouts -->
            <div class="section-full box-about-list">
                <div class="row spno">
                    <div class="col-lg-6 col-md-12">
                        <img src="{{ asset('site/images/about/pic3.jpg') }}" alt="" class="img-cover"/>
                    </div>
                    <div class="col-lg-6 col-md-12 bg-primary">
                        <div class="max-w700 m-auto p-tb50 p-lr20">
                            <div class="text-white">
                                <h2>{{ __('home.our_services') }}</h2>
                            </div>
                            @foreach($services as $index => $service)
                                @php
                                    $title = session('lang') . '_title';
                                    $desc = session('lang') . '_description';
                                @endphp
                                <div class="icon-bx-wraper m-b30 left">
                                <div class="icon-md">
                                    <a href="{{ route('service.show', ['id'=> $service->id, 'title'=> $service->$title]) }}" class="icon-cell text-white">
                                        <i class="flaticon-factory"></i>
                                    </a>
                                </div>
                                <div class="icon-content">
                                    <h4 class="dlab-tilte">{{ $service->$title }}</h4>
                                    <p>{{ $service->$desc }}</p>
                                </div>
                            </div>
                            @if ($index == 3)
                                @break
                            @endif
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
            <!-- Abouts END -->
            <!-- Our Services -->
            <div class="section-full bg-gray content-inner">
                <div class="container">
                    <div class="section-head text-center">
                        <h2 class="title"> {{ __('home.our_services') }}</h2>
                    </div>
                    <div class="section-content row">
                        @foreach($services as $index => $service)
                            @php
                                $title = session('lang') . '_title';
                                $desc = session('lang') . '_description';
                            @endphp
                            <div class="col-xl-4 col-md-6 col-sm-12 service-box style3">
                                <div class="icon-bx-wraper" data-name="0{{ $index+1 }}">
                                    <div class="icon-lg">
                                        <a href="{{ route('service.show', ['id'=> $service->id, 'title'=> $service->$title]) }}" class="icon-cell"><i class="flaticon-robot-arm"></i></a>
                                    </div>
                                    <div class="icon-content">
                                        <h2 class="dlab-tilte">{{ $service->$title }}</h2>
                                        <p>{{ $service->$desc }}</p>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
            <!-- Our Services End -->
        </div>
        <!-- contact area END -->
    </div>
    <!-- Content END -->
@endsection

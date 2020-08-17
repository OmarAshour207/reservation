@extends('site.second.layouts.app')

@section('content')
    <!-- Content -->
    <div class="page-content bg-white">
        <!-- inner page banner -->
        <div class="dlab-bnr-inr overlay-black-middle bg-pt" style="background-image:url({{ asset('site/images/banner/bnr1.jpg') }});">
            <div class="container">
                <div class="dlab-bnr-inr-entry">
                    <h1 class="text-white"> {{ __('home.service_details') }} </h1>
                    <!-- Breadcrumb row -->
                    <div class="breadcrumb-row">
                        <ul class="list-inline">
                            <li><a href="{{ url('/') }}"> {{ __('home.home') }} </a></li>
                            <li>{{ __('admin.service_details') }}</li>
                        </ul>
                    </div>
                    <!-- Breadcrumb row END -->
                </div>
            </div>
        </div>
        <!-- inner page banner END -->
        <!-- contact area -->
        <div class="content-area">
            <div class="container max-w900">
                <div class="blog-post blog-single">
                    <div class="dlab-post-meta m-b20">
                        <ul>
                            <li class="post-date">
                                <strong>{{ $service->created_at->format('d M') }}</strong>
                                <span> {{ $service->created_at->format('Y') }}</span>
                            </li>
                        </ul>
                    </div>
                    <div class="dlab-post-title">
                        @php
                            $title = session('lang') . '_title';
                            $desc = session('lang') . '_description';
                        @endphp
                        <h4 class="post-title m-t0">{{ $service->$title }}</h4>
                    </div>
                    <div class="dlab-post-media dlab-img-effect zoom-slow">
                        <img src="{{ $service->service_image }}" alt="">
                    </div>
                    <div class="dlab-post-text">
                        {{ $service->$desc }}
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Content END-->
@endsection

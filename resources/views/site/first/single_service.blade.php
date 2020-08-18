@extends('site.first.layouts.app')

@section('content')
    <!-- Page Title -->
    <div class="page-title-area page-title-four">
        <div class="d-table">
            <div class="d-table-cell">
                <div class="page-title-item">
                    <h2>{{ __('home.our_services') }}</h2>
                    <ul>
                        <li>
                            <a href="{{ url('/') }}">{{ __('home.home') }}</a>
                        </li>
                        <li>
                            <i class="icofont-simple-right"></i>
                        </li>
                        @php $title = session('lang') . '_title'; @endphp
                        <li>{{ __('home.services') }} / {{ $service->$title }}</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
    <!-- End Page Title -->

    <!-- Service Details -->
    <div class="service-details-area ptb-100">
        <div class="container">
            @php
                $title = session('lang') . '_title';
                $desc = session('lang') . '_description';
            @endphp
            <div class="services-details-img">
                <img src="{{ $service->service_image }}" alt="Service Details">
                <h2>{{ $service->$title }}</h2>
                <p> {{ $service->$desc }} </p>
            </div>
        </div>
    </div>
    <!-- End Service Details -->

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
                                    <a href="{{ route('blog.show', ['id' => $blog->id, 'title' => $blog->$title]) }}">
                                        {{ $blog->$title }}
                                    </a>
                                </h3>
                                <p>{!! substr($blog->$content, 0, 50) !!} </p>
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

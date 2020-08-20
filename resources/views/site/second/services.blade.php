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
                        <li>{{ __('home.services') }}</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
    <!-- End Page Title -->

    <!-- Services -->
    <section class="services-area pt-100 pb-70">
        <div class="container">
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

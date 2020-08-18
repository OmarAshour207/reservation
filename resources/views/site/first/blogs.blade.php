@extends('site.first.layouts.app')

@section('content')
    <!-- Page Title -->
    <div class="page-title-area page-title-four">
        <div class="d-table">
            <div class="d-table-cell">
                <div class="page-title-item">
                    <h2>{{ __('home.latest_blog') }}</h2>
                    <ul>
                        <li>
                            <a href="{{ url('/') }}">{{ __('home.home') }}</a>
                        </li>
                        <li>
                            <i class="icofont-simple-right"></i>
                        </li>
                        <li>{{ __('home.blogs') }}</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
    <!-- End Page Title -->

    <!-- Blog -->
    <section class="blog-area-two pt-100">
        <div class="container">
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
                                <a href="{{ route('blog.show', ['id' => $blog->id, 'title' => $blog->$title]) }}">World AIDS Day, designated on 1 December.</a>
                            </h3>
                            <p>{!! substr($blog->content, 0, 50) !!}</p>
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

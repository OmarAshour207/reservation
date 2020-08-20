@extends('site.first.layouts.app')

@section('content')
    <!-- Page Title -->
    <div class="page-title-area page-title-four">
        <div class="d-table">
            <div class="d-table-cell">
                <div class="page-title-item">
                    <h2>Blog Details</h2>
                    <ul>
                        <li>
                            <a href="index.html">Home</a>
                        </li>
                        <li>
                            <i class="icofont-simple-right"></i>
                        </li>
                        <li>Blog Details</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
    <!-- End Page Title -->

    <!-- Blog Details -->
    <div class="blog-details-area pt-100">
        <div class="container">
            <div class="row">
                <div class="col-lg-8">
                    <div class="blog-details-item">
                        @php
                            $title = session('lang') . '_title';
                            $content = session('lang') . '_content';
                            $author = session('lang') . '_author';
                        @endphp
                        <div class="blog-details-img">
                            <img src="{{ $blog->blog_image }}" alt="Blog">
                            <h2>{{ $blog->$title }}</h2>
                            <ul>
                                <li>
                                    <a href="#">
                                        <i class="icofont-businessman"></i>
                                        {{ $blog->$author }}
                                    </a>
                                </li>
                                <li>
                                    <i class="icofont-calendar"></i>
                                    {{ $blog->created_at->format('d M Y') }}
                                </li>
                            </ul>
                            {!! $blog->$content !!}
                        </div>
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="blog-details-item">
                        <div class="blog-details-recent">
                            <h3>{{ __('home.recent_blogs') }}</h3>
                            <ul>
                                @foreach($blogs as $blog)
                                <li>
                                    @php
                                        $title = session('lang') . '_title';
                                        $author = session('lang') . '_author';
                                    @endphp
                                    <img src="{{ $blog->blog_image }}" alt="Recent">
                                    <a href="{{ route('blog.show', ['id' => $blog->id, 'title' => $blog->$title]) }}">
                                        {{ $blog->$title }}
                                    </a>
                                    <ul>
                                        <li>
                                            <a href="#">
                                                <i class="icofont-businessman"></i>
                                                {{ $blog->$author }}
                                            </a>
                                        </li>
                                        <li>
                                            <i class="icofont-calendar"></i>
                                            {{ $blog->created_at->format('d M Y') }}
                                        </li>
                                    </ul>
                                </li>
                                @endforeach
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- End Blog Details -->

    <!-- Blog -->
    <section class="blog-area-two">
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

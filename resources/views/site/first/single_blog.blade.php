@extends('site.first.layouts.app')

@section('content')
    <!-- Content -->
    <div class="page-content bg-white">
        <!-- inner page banner -->
        <div class="dlab-bnr-inr overlay-black-middle bg-pt" style="background-image:url({{ asset('site/images/banner/bnr1.jpg') }});">
            <div class="container">
                <div class="dlab-bnr-inr-entry">
                    <h1 class="text-white"> {{ $blog->title }} </h1>
                    <!-- Breadcrumb row -->
                    <div class="breadcrumb-row">
                        <ul class="list-inline">
                            <li><a href="{{ url('/') }}"> {{ __('home.home') }} </a></li>
                            <li> {{ __('home.blogs') }} </li>
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
                <!-- blog start -->
                <div class="blog-post blog-single">
                    <div class="dlab-post-meta m-b20">
                        @php
                            $title = session('lang') . '_title';
                            $author = session('lang') . '_author';
                            $content = session('lang') . '_content';
                        @endphp
                        <ul>
                            <li class="post-date">
                                <strong>{{ $blog->created_at->format('d M') }}</strong>
                                <span> {{ $blog->created_at->format('Y') }}</span>
                            </li>
                            <li class="post-author">
                                {{ __('home.by') }} {{ $blog->$author }}
                        </ul>
                    </div>
                    <div class="dlab-post-title">
                        <h4 class="post-title m-t0">
                            {{ $blog->$title }}
                        </h4>
                    </div>
                    <div class="dlab-post-media dlab-img-effect zoom-slow">
                        <img src="{{ $blog->blog_image }}" alt="">
                    </div>
                    <div class="dlab-post-text">
                        {!! $blog->$content !!}
                    </div>
                    <div class="dlab-post-tags clear">
                        <div class="post-tags">  </div>
                    </div>
                </div>
                <!-- blog END -->
            </div>
        </div>
    </div>
    <!-- Content END-->
@endsection

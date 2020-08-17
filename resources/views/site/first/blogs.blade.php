@extends('site.first.layouts.app')

@section('content')
    <!-- Content -->
    <div class="page-content bg-white">
        <!-- inner page banner -->
        <div class="dlab-bnr-inr overlay-black-middle bg-pt" style="background-image:url({{ asset('site/images/banner/bnr1.jpg') }});">
            <div class="container">
                <div class="dlab-bnr-inr-entry">
                    <h1 class="text-white"> {{ __('home.blogs') }} </h1>
                    <!-- Breadcrumb row -->
                    <div class="breadcrumb-row">
                        <ul class="list-inline">
                            <li><a href="{{ url('/') }}">{{ __('home.home') }}</a></li>
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
            <div class="container">
                @foreach($blogs as $blog)
                <div class="blog-post blog-md clearfix">
                    @php
                        $title = session('lang') . '_title';
                        $author = session('lang') . '_author';
                        $content = session('lang') . '_content';
                    @endphp
                    <div class="dlab-post-media dlab-img-effect zoom-slow">
                        <a href="{{ url('blogs/' . $blog->id . '/' . $blog->$title) }}">
                            <img src="{{ $blog->blog_image }}" alt="">
                        </a>
                    </div>
                    <div class="dlab-post-info">
                        <div class="dlab-post-meta">
                            <ul>
                                <li class="post-date">
                                    <strong>{{ $blog->created_at->format('d M') }}</strong>
                                    <span> {{ $blog->created_at->format('Y') }} </span>
                                </li>
                                <li class="post-author"> {{ __('home.by') }}> {{ $blog->$author }} </li>
                            </ul>
                        </div>
                        <div class="dlab-post-title">
                            <h4 class="post-title">
                                <a href="{{ route('blog.show', ['id' => $blog->id, 'title' => $blog->$title]) }}">
                                    {{ $blog->$title }}
                                </a>
                            </h4>
                        </div>
                        <div class="dlab-post-text">
                            <p> {!! substr($blog->$content, 0, 30)  !!} ...</p>
                        </div>
                        <div class="dlab-post-readmore">
                            <a href="{{ route('blog.show', ['id' => $blog->id, 'title' => $blog->$title]) }}" title="{{ __('home.read_more') }}" rel="bookmark" class="site-button">
                                {{ __('home.read_more') }}
                                <i class="ti-arrow-right"></i>
                            </a>
                        </div>
                    </div>
                </div>
                @endforeach

                <!-- Pagination  -->
                <div class="pagination-bx clearfix text-center">
                    <ul class="pagination">
                        {{ $blogs->appends(request()->query())->links() }}
                    </ul>
                </div>
                <!-- Pagination END -->
            </div>
        </div>
    </div>
    <!-- Content END-->
@endsection

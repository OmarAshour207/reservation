@extends('site.fifth.layouts.app')

@section('content')
	<!--Page Title-->

    <section class="page-title" style="background-image:url({{ asset('site/part2/images/background/7.jpg') }});">

        <div class="auto-container">

            <h1>{{ __('home.latest_blog') }}</h1>

			<ul class="bread-crumb clearfix">

				<li><a href="{{ url('/') }}"><span class="fas fa-home"></span> {{ __('home.home') }} </a></li>

                <li>{{ __('home.latest_blog') }} {{ $blog->en_title }}</li>

			</ul>

        </div>

    </section>

    <!--End Page Title-->

	<!--Sidebar Page Container-->

    <div class="sidebar-page-container">
    	<div class="auto-container">
        	<div class="row clearfix">
                <!--Content Side-->
                @php
                    $title = session('lang') . '_title';
                    $content = session('lang') . '_content';
                    $author = session('lang') . '_author';
                @endphp
                <div class="content-side col-lg-8 col-md-12 col-sm-12">
					<div class="news-detail">
						<div class="inner-box">
							<div class="image">
								<img src="{{ $blog->blog_image }}" alt="" />
							</div>
							<div class="lower-content">
								<div class="content">
									<ul class="post-meta">
										<li> {{ $blog->created_at->format('d M Y') }} </li>
    									<li>{{ __('home.by') }} : {{ $blog->$author }}</li>
									</ul>
									<h3>{{ $blog->$title }}</h3>
									<div class="text">
                                        {!! $blog->$content !!}
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>



				<!--Sidebar Side-->

                <div class="sidebar-side col-lg-4 col-md-12 col-sm-12">
                	<aside class="sidebar">
						<!-- Popular Posts -->
                        <div class="sidebar-widget popular-posts">
                        	<div class="sidebar-title">
                            	<h2> {{ __('home.recent_blogs') }} </h2>
								<div class="separator"></div>
                            </div>

							<div class="widget-content">
                                @foreach ($blogs as $blog)
                                @php
                                    $title = session('lang') . '_title';
                                @endphp
                                <article class="post">

                                    <div class="post-thumb">
                                        <a href="{{ route('blog.show', ['id' => $blog->id, 'title' => $blog->$title]) }}">
                                            <img src="{{ $blog->blog_image }}" alt="">
                                        </a>
                                    </div>

                                    <h3>
                                        <a href="{{ route('blog.show', ['id' => $blog->id, 'title' => $blog->$title]) }}">
                                            {{ $blog->$title }}
                                        </a>
                                    </h3>

                                    <span class="date">{{ $blog->created_at->format('d M Y') }}</span>

                                </article>
                                @endforeach
							</div>

						</div>

					</aside>

				</div>

			</div>

		</div>

	</div>


@endsection

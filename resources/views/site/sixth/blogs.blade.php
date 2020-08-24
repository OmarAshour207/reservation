@extends('site.fifth.layouts.app')

@section('content')

	<!--Page Title-->

    <section class="page-title" style="background-image:url({{ asset('site/part2/images/background/7.jpg') }})">

        <div class="auto-container">

            <h1>{{ __('home.latest_blog') }}</h1>

			<ul class="bread-crumb clearfix">

				<li><a href="{{ url('/') }}"><span class="fas fa-home"></span> {{ __('home.home') }} </a></li>

				<li>{{ __('home.latest_blog') }}</li>

			</ul>

        </div>

    </section>

    <!--End Page Title-->



	<!-- Blog Page Section -->

	<section class="blog-page-section">

		<div class="auto-container">

			<div class="row clearfix">
                @foreach ($blogs as $blog)
                @php
                    $title = session('lang') . '_title';
                    $content = session('lang') . '_content';
                    $author = session('lang') . '_author';
                @endphp
				<!-- News Block Two -->
				<div class="news-block-two col-lg-6 col-md-12 col-sm-12">
					<div class="inner-box">
						<div class="image">
							<a href="{{ route('blog.show', ['id' => $blog->id, 'title' => $blog->$title]) }}">
                                <img src="{{ $blog->blog_image }}" alt="" />
                            </a>
						</div>
						<div class="lower-content">
							<div class="content">
								<ul class="post-meta">
									<li> {{ $blog->created_at->format('d M Y') }} </li>
									<li>{{ __('home.by') }} : {{ $blog->$author }}</li>

								</ul>

								<h3>
                                    <a href="{{ route('blog.show', ['id' => $blog->id, 'title' => $blog->$title]) }}">
                                        {{ $blog->$title }}
                                   </a>
                                </h3>

								<div class="text">
                                    {!! substr($blog->$content, 0, 100) !!}
                                </div>

                                <a href="{{ route('blog.show', ['id' => $blog->id, 'title' => $blog->$title]) }}" class="theme-btn btn-style-five">
                                    <span class="txt">{{ __('home.read_more') }}</span>
                                </a>

							</div>

						</div>

					</div>

				</div>
                @endforeach
			</div>



			<!-- Styled Pagination -->

            <div class="styled-pagination text-center">

				<ul class="inner-container clearfix">
                    {{ $blogs->appends(request()->query())->links() }}
                </ul>

            </div>



		</div>

	</section>

	<!-- End Portfolio Page Section -->
@endsection

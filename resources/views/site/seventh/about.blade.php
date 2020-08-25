@extends('site.seventh.layouts.app')

@section('content')
	<!--Page Title-->

    <section class="page-title" style="background-image:url(images/background/7.jpg);">

        <div class="auto-container">

            <h1>{{ __('home.about_us') }}</h1>

			<div class="text">What We Actually Do?</div>

			<ul class="bread-crumb clearfix">

				<li><a href="{{ url('/') }}"><span class="fas fa-home"></span> {{ __('home.home') }} </a></li>

                <li>{{ __('home.about_us') }}</li>

			</ul>

        </div>

    </section>

    <!--End Page Title-->



	<!-- Health Section -->

	<section class="health-section">
		<div class="auto-container">
			<div class="inner-container">
				<div class="row clearfix">
					<!-- Content Column -->
					<div class="content-column col-lg-7 col-md-12 col-sm-12">
						<div class="inner-column">
							<div class="border-line"></div>
                            <!-- Sec Title -->
                            @php
                                $title = session('lang') . '_title';
                                $desc = session('lang') . '_description';
                            @endphp
							<div class="sec-title">
								<h2>{{ __('home.about_us') }}</h2>
								<div class="separator"></div>
							</div>
							<div class="text">
                                {{ $about->$desc }}
                            </div>

                            <a href="{{ url('about') }}" class="theme-btn btn-style-one">
                                <span class="txt">{{ __('home.read_more') }}</span>
                            </a>

						</div>

					</div>



					<!-- Image Column -->

					<div class="image-column col-lg-5 col-md-12 col-sm-12">
						<div class="inner-column wow fadeInRight" data-wow-delay="0ms" data-wow-duration="1500ms">
							<div class="image">
								<img src="{{ $about->about_image }}" alt="" />
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</section>

	<!-- End Health Section -->

	<!-- Featured Section -->
	<section class="featured-section">

		<div class="auto-container">

			<div class="row clearfix">
                @foreach ($services as $index => $service)
                <!-- Feature Block -->
                @php
                    $title = session('lang') . '_title';
                    $desc = session('lang') . '_description';
                @endphp
				<div class="feature-block col-lg-3 col-md-6 col-sm-12">
					<div class="inner-box wow fadeInLeft" data-wow-delay="0ms" data-wow-duration="1500ms">
						<div class="upper-box">
							<div class="icon flaticon-doctor-stethoscope"></div>
							<h3>
                                <a href="{{ route('service.show', ['id' => $service->id, 'title' => $service->$title]) }}">
                                    {{ $service->$title }}
                                </a>
                            </h3>
						</div>
						<div class="text">
                            {{ $service->$desc }}
                        </div>
					</div>
                </div>

                @if($index == 3)
                    @break
                @endif

                @endforeach
			</div>

		</div>

	</section>
	<!-- End Featured Section -->

	<!-- Counter Section -->
	<section class="counter-section style-two" style="background-image: url(images/background/pattern-3.png)">
		<div class="auto-container">
			<!-- Fact Counter -->
			<div class="fact-counter style-two">

				<div class="row clearfix">
					<!--Column-->
					<div class="column counter-column col-lg-4 col-md-6 col-sm-12">

						<div class="inner wow fadeInLeft" data-wow-delay="0ms" data-wow-duration="1500ms">

							<div class="content">

								<div class="icon flaticon-logout"></div>

								<div class="count-outer count-box">

									<span class="count-text" data-speed="2500" data-stop="2350">0</span>

								</div>

								<h4 class="counter-title">Satisfied Patients</h4>

							</div>

						</div>

					</div>

					<!--Column-->
					<div class="column counter-column col-lg-4 col-md-6 col-sm-12">

						<div class="inner wow fadeInLeft" data-wow-delay="300ms" data-wow-duration="1500ms">

							<div class="content">

								<div class="icon flaticon-logout"></div>

								<div class="count-outer count-box alternate">

									+<span class="count-text" data-speed="3000" data-stop="350">0</span>

								</div>

								<h4 class="counter-title">Doctor’s Team</h4>

							</div>

						</div>

					</div>

					<!--Column-->
					<div class="column counter-column col-lg-4 col-md-6 col-sm-12">

						<div class="inner wow fadeInLeft" data-wow-delay="600ms" data-wow-duration="1500ms">

							<div class="content">

								<div class="icon flaticon-logout"></div>

								<div class="count-outer count-box">

									<span class="count-text" data-speed="3000" data-stop="2150">0</span>

								</div>

								<h4 class="counter-title">Success Mission</h4>

							</div>

						</div>

					</div>
				</div>
			</div>
		</div>

	</section>
	<!-- End Counter Section -->

	<!-- Team Section -->
    <section class="team-section">
        <div class="auto-container">
            <!-- Sec Title -->
            <div class="sec-title centered">
                <h2> {{ __('home.meet_team') }} </h2>
                <div class="separator"></div>
            </div>
            <div class="row clearfix">
                @foreach ($teamMembers as $index => $teamMember)
                <div class="team-block col-lg-3 col-md-6 col-sm-6 col-xs-12">
                    <div class="inner-box wow fadeInUp" data-wow-delay="0ms" data-wow-duration="1500ms">
                        <div class="image">
                            <img src="{{ $teamMember->member_image }}" alt="" />
                            <div class="overlay-box">
                                <ul class="social-icons">
                                    <li></li>
                                    <li></li>
                                    <li></li>
                                    <li></li>
                                    <li></li>
                                </ul>
                                <a href="javascript:void(0);" class="appointment">{{ __('home.get_appointment') }}</a>
                            </div>
                        </div>
                        <div class="lower-content">
                            <h3>
                                @php
                                    $name = session('lang') . '_name';
                                    $title = session('lang') . '_title';
                                @endphp
                                <a href="javascript:void(0);">
                                    {{ $teamMember->role == 1 ? 'Dr' : 'Nur' }}. {{ $teamMember->$name }}
                                </a>
                            </h3>
                            <div class="designation"> {{ $teamMember->$title }} </div>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>

        </div>

    </section>
    <!-- End Team Section -->

	<!-- Testimonial Section -->
    <section class="testimonial-section style-two">
    	<div class="auto-container">
			<!-- Sec Title -->
			<div class="sec-title centered">
				<h2>{{ __('home.happy_customers_said') }}</h2>
				<div class="separator"></div>
			</div>

        	<div class="testimonial-outer" style="background-image: url({{ asset('site/part2/images/background/pattern-4.png') }})">

            	<!--Client Testimonial Carousel-->
                <div class="client-testimonial-carousel owl-carousel owl-theme">
                    @foreach ($testimonials as $index => $testimonial)
                        <!--Testimonial Block -->
                        <div class="testimonial-block">
                            <div class="inner-box">
                                <div class="quote-icon flaticon-quote"></div>
                                <div class="text">
                                    @php
                                        $desc = session('lang') . '_description';
                                    @endphp
                                    {{ $testimonial->$desc }}
                                </div>
                            </div>
                        </div>
                    @if (@index == 5)
                        @break
                    @endif
                    @endforeach
                </div>

				<div class="client-thumb-outer">
                    <div class="client-thumbs-carousel owl-carousel owl-theme">
                        @foreach ($testimonials as $index => $testimonial)
                        <div class="thumb-item">
                            <figure class="thumb-box">
                                <img src="{{ $testimonial->testimonial_image }}" alt="">
                            </figure>
                            <div class="author-info">
                                @php
                                    $name = session('lang') . '_name';
                                    $title = session('lang') . '_title';
                                @endphp
                                <div class="author-name">{{ $testimonial->$name }}</div>
                                <div class="designation">{{ $testimonial->$title }}</div>
                            </div>

                        </div>
                        @if (@index == 5)
                            @break
                        @endif
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- End Testimonial Section Two -->


@endsection

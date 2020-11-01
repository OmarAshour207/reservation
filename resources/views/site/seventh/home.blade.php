@extends('site.seventh.layouts.app')

@section('content')

	<!-- Main Slider Three -->
	<section class="main-slider-three">

		<div class="banner-carousel">

			<!-- Swiper -->

			<div class="swiper-wrapper">
                @foreach ($sliders as $index => $slider)
                <div class="swiper-slide slide">
					<div class="auto-container">
						<div class="row clearfix">
							<!-- Content Column -->
							<div class="content-column col-lg-6 col-md-12 col-sm-12">
								<div class="inner-column">
                                    @php
                                        $title = session('lang') . '_title';
                                        $desc = session('lang') . '_description';
                                    @endphp
									<h2>{{ $slider->$title }}</h2>
                                    <div class="text">{{ $slider->$desc }} </div>
									<div class="btn-box">
                                        <a href="{{ url('appointments') }}" class="theme-btn appointment-btn">
                                            <span class="txt">{{ __('home.get_appointment') }}</span>
                                        </a>
										<a href="{{ url('services') }}" class="theme-btn services-btn">
                                            {{ __('home.services') }}
                                        </a>
									</div>
								</div>
							</div>

							<!-- Image Column -->
							<div class="image-column col-lg-6 col-md-12 col-sm-12">
								<div class="inner-column">
									<div class="image">
										<img src="{{ $slider->slider_image }}" alt="" />
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
                @endforeach
			</div>
			<!-- Add Arrows -->
			<div class="swiper-button-next"></div>
			<div class="swiper-button-prev"></div>
		</div>
	</section>
	<!-- End Main Slider -->


    @if($page_filter != null)

    @if (in_array('about', $page_filter))
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
							<div class="sec-title">
								<h2>{{ __('home.about_us') }}</h2>
								<div class="separator"></div>
							</div>
                            @php
                                $desc = session('lang') . '_description';
                            @endphp
							<div class="text">
                                {{ $aboutUs->$desc }}
                            </div>

                            <a href="{{ url('about') }}" class="theme-btn btn-style-one">
                                <span class="txt"> {{ __('home.about_us') }} </span>
                            </a>
						</div>
					</div>

					<!-- Image Column -->
					<div class="image-column col-lg-5 col-md-12 col-sm-12">
						<div class="inner-column wow fadeInRight" data-wow-delay="0ms" data-wow-duration="1500ms">
							<div class="image">
								<img src="{{ $aboutUs->about_image }}" alt="" />
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</section>
	<!-- End Health Section -->
    @endif

    @if (in_array('our_services', $page_filter))
        <!-- Services Section -->
        <section class="featured-section">
            <div class="auto-container">
                <div class="row clearfix">
                    <!-- Feature Block -->
                    @foreach ($services as $index => $service)
                    <div class="feature-block col-lg-3 col-md-6 col-sm-12">
                        <div class="inner-box wow fadeInLeft" data-wow-delay="0ms" data-wow-duration="1500ms">
                            @php
                                $title = session('lang') . '_title';
                                $desc = session('lang') . '_description';
                            @endphp
                            <div class="upper-box">
                                <div class="icon flaticon-doctor-stethoscope"></div>
                                <h3>
                                    <a href="#">{{ $service->$title }}</a>
                                </h3>
                            </div>
                            <div class="text">{{ substr($service->$desc, 0, 70) }}</div>
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
    @endif


    @if (in_array('team_members', $page_filter))
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

    @endif

    @if (in_array('testimonials', $page_filter))

    <!-- Testimonial Section Two -->
	<section class="testimonial-section-two">
		<div class="auto-container">
			<!-- Sec Title -->
			<div class="sec-title centered">
				<h2>{{ __('home.what_patients_say') }}</h2>
				<div class="separator"></div>
			</div>
			<div class="testimonial-carousel owl-carousel owl-theme">

                @foreach ($testimonials as $index => $testimonial)
                <!-- Tesimonial Block Two -->
				<div class="testimonial-block-two">
					<div class="inner-box">
						<div class="image">
							<img src="{{ $testimonial->testimonial_image }}" alt="" />
						</div>

						<div class="text"> {{ $testimonial->$desc }} </div>
						<div class="lower-box">
							<div class="clearfix">
								<div class="pull-left">
									<div class="quote-icon flaticon-quote"></div>
								</div>
								<div class="pull-right">
									<div class="author-info">
										<h3>{{ $testimonial->$name }}</h3>
										<div class="author">{{ $testimonial->$title }}</div>
									</div>
								</div>
							</div>
						</div>
					</div>
                </div>
                @if ($index == 2)
                    @break
                @endif
                @endforeach

			</div>
		</div>
	</section>
	<!-- End Testimonial Section Two -->

    @endif

	<!-- Counter Section -->

	<section class="counter-section style-two" style="background-image: url({{ asset('site/part2/images/background/pattern-3.png') }})">
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
									<span class="count-text" data-speed="2500" data-stop="{{ $all_patients }}">0</span>
								</div>
								<h4 class="counter-title">{{ __('home.happy_client') }}</h4>
							</div>
						</div>
					</div>

					<!--Column-->
					<div class="column counter-column col-lg-4 col-md-6 col-sm-12">
						<div class="inner wow fadeInLeft" data-wow-delay="300ms" data-wow-duration="1500ms">
							<div class="content">
								<div class="icon flaticon-logout"></div>
								<div class="count-outer count-box alternate">
									+<span class="count-text" data-speed="3000" data-stop="{{ $all_doctors }}">0</span>
								</div>
                                <h4 class="counter-title">{{ __('home.team_clinic') }}</h4>
							</div>
						</div>
					</div>

					<!--Column-->
					<div class="column counter-column col-lg-4 col-md-6 col-sm-12">
						<div class="inner wow fadeInLeft" data-wow-delay="600ms" data-wow-duration="1500ms">
							<div class="content">
								<div class="icon flaticon-logout"></div>
								<div class="count-outer count-box">
									<span class="count-text" data-speed="3000" data-stop="{{ $success_mission }}">0</span>
								</div>
								<h4 class="counter-title">{{ __('home.success_missions') }}</h4>
							</div>
						</div>
					</div>

				</div>
			</div>
		</div>
	</section>
    <!-- End Counter Section -->

	<!-- Doctor Info Section -->
	<section class="doctor-info-section">
		<div class="auto-container">
			<div class="inner-container">
				<div class="row clearfix">
					<!-- Doctor Block -->
					<div class="doctor-block col-lg-6 col-md-6 col-sm-12">
						<div class="inner-box wow fadeInLeft" data-wow-delay="0ms" data-wow-duration="1500ms">
							<h3>{{ __('home.office_hours') }}</h3>
							<ul class="doctor-time-list">
                                @foreach ($times as $time)
                                    <li> {{ date('d M', strtotime($time->day)) }}
                                        <span> {{ date('g:i A', strtotime($time->start_time)) }} – {{ date('g:i A', strtotime($time->end_time)) }} </span>
                                    </li>
                                @endforeach
							</ul>
							<h4> {{ __('home.phone') }} </h4>
							<div class="phone">{{ __('home.call') }} <strong>{{ setting('phone') }}</strong></div>
						</div>
					</div>

					<!-- Doctor Block -->
					<div class="doctor-block col-lg-6 col-md-6 col-sm-12">
						<div class="inner-box wow fadeInRight" data-wow-delay="0ms" data-wow-duration="1500ms">
                            <h3>{{ __('home.about_us') }}</h3>
                            @php
                                $desc = session('lang') . '_description';
                            @endphp
							<div class="text"> {{ $aboutUs->$desc }} </div>
							<a href="{{ url('contact-us') }}" class="detail">{{ __('home.contact_us') }}</a>
						</div>
					</div>
				</div>

			</div>

		</div>

	</section>
	<!-- End Doctor Info Section -->


    @if (in_array('latest_blog', $page_filter))
    <!-- News Section Two -->
    <section class="news-section-two">
    	<div class="auto-container">
			<!-- Sec Title -->
			<div class="sec-title centered">
				<h2>{{ __('home.latest_blog') }}</h2>
				<div class="separator style-three"></div>
			</div>

			<div class="row clearfix">
                @foreach ($blogs as $index => $blog)
                <!-- News Block Two -->
				<div class="news-block-two col-lg-6 col-md-12 col-sm-12">
					<div class="inner-box">
						<div class="image">
							<a href="{{ route('blog.show', ['id' => $blog->id, 'title' => $blog->$title]) }}">
                                <img src="{{ $blog->blog_image }}" alt="" />
                            </a>
						</div>
						<div class="lower-content">
                            @php
                                $title = session('lang') . '_title';
                                $content = session('lang') . '_content';
                                $author = session('lang') . '_author';
                            @endphp
							<div class="content">
								<ul class="post-meta">
                                    <li>{{ $blog->created_at->format('d M Y') }}</li>
									<li>{{ __('home.by') }} : {{ $blog->$author }}</li>
								</ul>
								<h3>
                                    <a href="{{ route('blog.show', ['id' => $blog->id, 'title' => $blog->$title]) }}">
                                       {{ $blog->$title }}
                                    </a>
                                </h3>
								<div class="text">
                                    {!! substr($blog->$content, 0, 50) !!}
                                </div>
								<a href="{{ route('blog.show', ['id' => $blog->id, 'title' => $blog->$title]) }}" class="theme-btn btn-style-five">
                                    <span class="txt">{{ __('home.read_more') }}</span>
                                </a>
							</div>
						</div>
					</div>
                </div>
                @if ($index == 1)
                    @break
                @endif
                @endforeach
			</div>
		</div>

	</section>
    @endif


    	<!--Clients Section-->
        <section class="clients-section">
            <div class="outer-container">
                <div class="sponsors-outer">
                    <!--Sponsors Carousel-->
                    <ul class="sponsors-carousel owl-carousel owl-theme">
                        <li class="slide-item">
                            <figure class="image-box">
                                <a href="#">
                                    <img src="{{ asset('site/part2/images/clients/1.png') }} " alt="">
                                </a>
                            </figure>
                        </li>

                        <li class="slide-item"><figure class="image-box"><a href="#"><img src="{{ asset('site/part2/images/clients/2.png') }} " alt=""></a></figure></li>

                        <li class="slide-item"><figure class="image-box"><a href="#"><img src="{{ asset('site/part2/images/clients/3.png') }} " alt=""></a></figure></li>

                        <li class="slide-item"><figure class="image-box"><a href="#"><img src="{{ asset('site/part2/images/clients/4.png') }} " alt=""></a></figure></li>

                        <li class="slide-item"><figure class="image-box"><a href="#"><img src="{{ asset('site/part2/images/clients/5.png') }} " alt=""></a></figure></li>

                        <li class="slide-item"><figure class="image-box"><a href="#"><img src="{{ asset('site/part2/images/clients/1.png') }} " alt=""></a></figure></li>

                        <li class="slide-item"><figure class="image-box"><a href="#"><img src="{{ asset('site/part2/images/clients/2.png') }} " alt=""></a></figure></li>

                    </ul>
                </div>
            </div>
        </section>
        <!--End Clients Section-->

        <!-- Newsletter Section -->
        <section class="newsletter-section">

            <div class="auto-container">

                <div class="row clearfix">

                    <!-- Title Column -->
                    <div class="title-column col-lg-6 col-md-12 col-sm-12">
                        <div class="inner-column">
                            <h2>{{ __('home.subscribe_newsletter') }}</h2>
                            <div class="text">{{ __('home.to_receive_newsletter') }}</div>
                        </div>
                    </div>
                    <!-- Form Column -->
                    <div class="form-column col-lg-6 col-md-12 col-sm-12">
                        <div class="inner-column">
                            <!-- Subscribe Form -->
                            <div class="subscribe-form">
                                <form method="post" action="#">
                                    @csrf
                                    <div class="form-group">
                                        <input type="email" name="email" value="" placeholder="{{ __('home.email_contact') }}" required>
                                        <button type="submit" class="theme-btn btn-style-two"><span class="txt">{{ __('home.subscribe') }}</span></button>
                                    </div>
                                </form>
                            </div>
                        </div>

                    </div>

                </div>

            </div>

        </section>
        <!-- End Newsletter Section -->
    @endif
@endsection

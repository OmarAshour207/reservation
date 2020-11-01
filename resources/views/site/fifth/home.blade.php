@extends('site.fifth.layouts.app')

@section('content')

	<!-- Main Slider -->
	<section class="main-slider">

		<div class="banner-carousel">
            <!-- Swiper -->
			<div class="swiper-wrapper">
                @foreach ($sliders as $slider)
				<div class="swiper-slide slide" style="background-image:url('{{ $slider->slider_image }}')">
					<div class="auto-container">
						<div class="content clearfix">
                            @php
                                $title = session('lang') . '_title';
                                $desc = session('lang') . '_description';
                            @endphp
							<div class="title">{{ $slider->$title }}</div>
							<div class="text">
                                {{ $slider->$desc }}
                            </div>
							<div class="btn-box clearfix">
                                <a href="{{ url('services') }}" class="theme-btn btn-style-two">
                                    <span class="txt">{{ __('home.our_services') }}</span>
                                </a>
                                <a href="{{ url('contact-us') }}" class="theme-btn phone-btn">
                                    <span class="icon flaticon-call"></span>{{ setting('phone') }}
                                </a>
							</div>
						</div>
					</div>
				</div>
                @endforeach
            </div>
			<!-- Add Pagination -->

			<div class="swiper-pagination"></div>

			<!-- Add Arrows -->

			<div class="swiper-button-next"></div>

			<div class="swiper-button-prev"></div>

		</div>

	</section>
	<!-- End Main Slider -->


    @if($page_filter != null)

    @if (in_array('about', $page_filter))
        <!-- Fluid Section One -->
        <section class="fluid-section-one">
            <div class="outer-section clearfix">
            <!--Image Column-->
                <div class="image-column" style="background-image: url('{{ $aboutUs->about_image }}')">
                    <div class="image">
                        <img src="{{ $aboutUs->about_image }}" alt="">
                    </div>
                </div>
                <!--End Image Column-->

                <!--Content Column-->
                <div class="content-column">
                    <div class="content-box">
                        <div class="sec-title">
                            <h2>Pioneering in Health.</h2>
                            <div class="separator style-two"></div>
                        </div>
                        <div class="text">
                            @php
                                $desc = session('lang') . '_description';
                            @endphp
                            <p> {{ $aboutUs->$desc }} </p>
                        </div>
                        <div class="row clearfix">
                            <div class="column col-lg-6 col-md-6 col-sm-12">
                                <ul class="list-style-one">
                                    @foreach ($services as $index => $service)
                                    <li>
                                        <span class="icon flaticon-medical-stethoscope-variant"></span>
                                        @php
                                            $title = session('lang') . '_title';
                                        @endphp
                                        {{ $service->$title }}
                                    </li>
                                    @if ($index == 3)
                                        @break;
                                    @endif
                                    @endforeach
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </section>
    @endif


    @if (in_array('our_services', $page_filter))
        <!-- Services Section -->
        <section class="services-section">
            <div class="auto-container">
                <!-- Sec Title -->
                <div class="sec-title centered">
                    <h2>{{ __('home.our_services') }}</h2>
                    <div class="separator"></div>
                </div>
                <div class="row clearfix">
                    <!-- Left Column -->
                    <div class="left-column pull-left col-lg-4 col-md-12 col-sm-12">
                        <div class="inner-column">
                            @foreach ($services as $index => $service)
                                <!-- Service Block -->
                                <div class="service-block">
                                    @php
                                        $title = session('lang') . '_title';
                                        $desc = session('lang') . '_description';
                                    @endphp
                                    <div class="inner-box wow fadeInLeft" data-wow-delay="250ms" data-wow-duration="1500ms">
                                        <div class="icon-box">
                                            <span class="icon flaticon-operating-room"></span>
                                        </div>
                                        <h3>
                                            <a href="#">
                                                {{ $service->$title }}
                                            </a>
                                        </h3>
                                        <div class="text">
                                            {{ $service->$desc }}
                                        </div>
                                    </div>
                                </div>
                                @if ($index == 2)
                                    @break
                                @endif
                            @endforeach
                        </div>
                    </div>

                    <!-- Circles Column -->
                    <div class="circles-column col-lg-4 col-md-12 col-sm-12">
                        <div class="inner-column">
                            <div class="circles">
                                <div class="circle-one"></div>
                                <div class="circle-two"></div>
                                <div class="circle-three"></div>
                            </div>
                        </div>
                    </div>

                    <!-- Right Column -->
                    <div class="right-column pull-right col-lg-4 col-md-12 col-sm-12">
                        <div class="inner-column">
                            @foreach ($services as $index => $service)
                                @if ($index > 2)
                                <!-- Service Block -->
                                @php
                                    $title = session('lang') . '_title';
                                    $desc = session('lang') . '_description';
                                @endphp
                                <div class="service-block-two">
                                    <div class="inner-box wow fadeInRight" data-wow-delay="250ms" data-wow-duration="1500ms">
                                        <div class="icon-box">
                                            <span class="icon flaticon-pharmacy"></span>
                                        </div>
                                        <h3>
                                            <a href="{{ route('service.show', ['id' => $service->id, 'title' => $service->$title]) }}">
                                                {{ $service->$title }}
                                            </a>
                                        </h3>
                                        <div class="text">
                                            {{ $service->$desc }}
                                        </div>
                                    </div>
                                </div>
                                @if ($index == 5)
                                    @break
                                @endif
                                @endif
                            @endforeach


                        </div>

                    </div>
                </div>



            </div>

        </section>
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

        <!-- FullWidth Section -->
        <section class="fullwidth-section">
            <div class="outer-container">
                <div class="clearfix">
                    <!-- Left Column -->
                    <div class="left-column" style="background-image: url({{ asset('site/part2/images/background/1.jpg') }})">
                        <div class="inner-column clearfix">
                            <div class="content">
                                <div class="icon-box">
                                    <span class="icon flaticon-contract-1"></span>
                                </div>
                                <div class="title">{{ __('home.need_doctor') }}</div>

                                <h2> {{ __('home.just_make_appointment') }} </h2>

                                <a href="{{ url('appointments') }}" class="theme-btn btn-style-two">
                                    <span class="txt">{{ __('home.get_appointment') }}</span>
                                </a>
                            </div>
                        </div>
                    </div>
                    <!-- Right Column -->
                    <div class="right-column">
                        <div class="inner-column">
                            <!-- Upper Box -->
                            <div class="upper-box">
                                <div class="icon flaticon-alarm-clock"></div>
                                <h3> {{ __('home.office_hours') }} </h3>
                            </div>
                            <ul class="time-list">
                                <li class="clearfix"><span class="left-span pull-left">Monday - Friday</span><span class="right-span pull-right">08:00am - 10:00pm</span></li>
                                <li class="clearfix"><span class="left-span pull-left">Saturday - Sunday</span><span class="right-span pull-right">09:00am - 06:00pm</span></li>
                                <li class="clearfix"><span class="left-span pull-left">Emergency Services</span><span class="right-span pull-right">24 hours Open</span></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- End FullWidth Section -->

    @if (in_array('testimonials', $page_filter))
        <!-- Testimonial Section -->
        <section class="testimonial-section">
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

                    <!--Product Thumbs Carousel-->
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
    @endif

    @if (in_array('latest_blog', $page_filter))
        <!-- News Section -->
        <section class="news-section">
            <div class="auto-container">
                <!-- Sec Title -->
                <div class="sec-title centered">
                    <h2>{{ __('home.latest_blog') }}</h2>
                    <div class="separator style-three"></div>
                </div>
                <div class="row clearfix">
                    @foreach ($blogs as $blog)
                    <!-- News Block -->
                    <div class="news-block col-lg-4 col-md-6 col-sm-12">
                        <div class="inner-box wow fadeInLeft" data-wow-delay="300ms" data-wow-duration="1500ms">
                            <div class="image">
                                @php
                                    $title = session('lang') . '_title';
                                    $content = session('lang') . '_content';
                                @endphp
                                <div class="category">{{ __('home.article') }}</div>
                                <a href="{{ route('blog.show', ['id' => $blog->id, 'title' => $blog->$title]) }}">
                                    <img src="{{ $blog->blog_image }}" alt="" />
                                </a>
                            </div>
                            <div class="lower-content">
                                <ul class="post-meta">
                                    <li>
                                        <a href="{{ route('blog.show', ['id' => $blog->id, 'title' => $blog->$title]) }}">
                                            {{ $blog->created_at->format('d M Y') }}
                                        </a>
                                    </li>
                                </ul>
                                <h3>
                                    <a href="{{ route('blog.show', ['id' => $blog->id, 'title' => $blog->$title]) }}">
                                        {{ $blog->$title }}
                                    </a>
                                </h3>

                                <div class="text">
                                    {!! substr($blog->$content, 0, 50) !!}
                                </div>

                                <a href="{{ route('blog.show', ['id' => $blog->id, 'title' => $blog->$title]) }}" class="read-more">
                                    {{ __('home.read_more') }}
                                </a>

                            </div>
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>

        </section>
        <!-- End News Section -->
    @endif

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

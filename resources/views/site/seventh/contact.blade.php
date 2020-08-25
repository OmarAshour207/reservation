@extends('site.seventh.layouts.app')

@section('content')

	<!--Page Title-->

    <section class="page-title" style="background-image:url({{ asset('site/part2/images/background/7.jpg') }})">

        <div class="auto-container">

            <h1>{{ __('home.contact_us') }}</h1>

			<ul class="bread-crumb clearfix">

				<li><a href="{{ url('/') }}"><span class="fas fa-home"></span> {{ __('home.home') }} </a></li>

				<li>{{ __('home.contact_us') }}</li>

			</ul>

        </div>

    </section>

    <!--End Page Title-->

	<!-- Contact Page Section -->
	<section class="contact-page-section">
		<div class="auto-container">
			<div class="sec-title centered">
				<h2>{{ __('home.contact_us') }}</h2>
				<div class="separator"></div>
			</div>

			<!-- Contact Form -->
			<div class="contact-form">

				<!--Contact Form-->
                <form method="post" action="{{ route('send.contact') }}">
                    @csrf
					<div class="row clearfix">

						<div class="col-lg-6 col-md-6 col-sm-12 form-group">
							<input type="text" name="name" placeholder="{{ __('home.full_name') }}" required>
						</div>

						<div class="col-lg-6 col-md-6 col-sm-12 form-group">
							<input type="email" name="email" placeholder="{{ __('home.email') }}" required>
						</div>

						<div class="col-lg-6 col-md-6 col-sm-12 form-group">
							<input type="text" name="phone" placeholder="{{ __('home.phone') . ' ' .__('home.optional')}}">
                        </div>

						<div class="col-lg-12 col-md-12 col-sm-12 form-group">
							<textarea name="message" placeholder="{{ __('home.drop_your_message') }}"></textarea>
						</div>

						<div class="col-lg-12 col-md-12 col-sm-12 text-center form-group">
							<button class="theme-btn btn-style-two" type="submit" name="submit-form">
                                <span class="txt">{{ __('home.contact_us') }}</span>
                            </button>
						</div>

					</div>
				</form>

				<!--End Contact Form -->

		</div>
	</section>
	<!-- End Contact Page Section -->

@endsection

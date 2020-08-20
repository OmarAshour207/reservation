<!-- Footer -->
<footer class="pb-70">

    @if (request()->segment(1) != 'login' && request()->segment(1) != 'register')
        <!-- Newsletter -->
        <div class="newsletter-area">
            <div class="container">
                <div class="row newsletter-wrap align-items-center">
                    <div class="col-lg-6">
                        <div class="newsletter-item">
                            <h2> {{ __('home.join_newsletter') }} </h2>
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="newsletter-item">
                            <div class="newsletter-form">
                                <form class="newsletter-form" data-toggle="validator">
                                    <input type="email" class="form-control" placeholder="{{ __('home.email_contact') }}" name="email" required autocomplete="off">

                                    <button class="btn newsletter-btn" type="submit">
                                        {{ __('home.subscribe') }}
                                    </button>

                                    <div id="validator-newsletter" class="form-result"></div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- End Newsletter -->
    @endif

    <div class="container">
        <div class="row">
            <div class="col-sm-6 col-lg-4">
                <div class="footer-item">
                    <div class="footer-contact">
                        <h3>Contact Us</h3>
                        <ul>
                            <li>
                                <i class="icofont-ui-message"></i>
                                <a href="mailto:{{ setting('email') }}">{{ setting('email') }}</a>
                            </li>
                            <li>
                                <i class="icofont-stock-mobile"></i>
                                <a href="tel:+236256256365">{{ __('home.call') }}: {{ setting('phone') }}</a>
                            </li>
                            <li>
                                <i class="icofont-location-pin"></i>
                                {{ setting(session('lang') . '_address') }}
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="col-sm-6 col-lg-2">
                <div class="footer-item">
                    <div class="footer-quick">
                        <h3> {{ __('home.useful_links') }} </h3>
                        <ul>
                            <li>
                                <a href="{{ url('about') }}"> {{ __('home.about_us') }} </a>
                            </li>
                            <li>
                                <a href="{{ url('blog') }}">{{ __('admin.blogs') }}</a>
                            </li>
                            <li>
                                <a href="{{ url('contact-us') }}">{{ __('home.contact_us') }}</a>
                            </li>
                            <li>
                                <a href="{{ url('projects') }}"> {{ __('home.our_projects') }} </a>
                            </li>
                            <li>
                                <a href="{{ url('services') }}">{{ __('home.our_services') }}</a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="col-sm-6 col-lg-3">
                <div class="footer-item">
                    <div class="footer-quick">
                        <h3> {{ __('home.our_services') }} </h3>
                        <ul>
                            @foreach($services as $service)
                            <li>
                                @php
                                    $title = session('lang')  . '_title';
                                @endphp
                                <a href="{{ route('service.show', ['id' => $service->id, 'title' => $service->$title]) }}"> {{ $service->$title }} </a>
                            </li>
                            @endforeach
                        </ul>
                    </div>
                </div>
            </div>
            <div class="col-sm-6 col-lg-3">
                <div class="footer-item">
                    <div class="footer-feedback">
                        <h3>{{ __('home.feedback') }}</h3>
                        <form>
                            <div class="form-group">
                                <input type="text" class="form-control" placeholder="{{ __('home.full_name') }}">
                            </div>
                            <div class="form-group">
                                <input type="text" class="form-control" placeholder="{{ __('home.phone') }}">
                            </div>
                            <div class="form-group">
                                <textarea class="form-control" id="your_message" rows="5" placeholder="{{ __('home.message') }}"></textarea>
                            </div>
                            <div class="text-left">
                                <button type="submit" class="btn feedback-btn">{{ __('home.send') }}</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</footer>
<!-- End Footer -->

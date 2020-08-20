<!-- Header Top -->
<div class="header-top">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-sm-9 col-lg-9">
                <div class="header-top-item">
                    <div class="header-top-left">
                        <ul>
                            <li>
                                <a href="tel:+07554332322">
                                    <i class="icofont-ui-call"></i>
                                    {{ __('home.call') }} : {{ setting('phone') }}
                                </a>
                            </li>
                            <li>
                                <a href="mailto:hello@medsev.com">
                                    <i class="icofont-ui-message"></i>
                                    {{ setting('email') }}
                                </a>
                            </li>
                            <li>
                                <i class="icofont-location-pin"></i>
                                {{ setting(session('lang') . '_address') }}
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="col-sm-3 col-lg-3">
                <div class="header-top-item">
                    <div class="header-top-right">
                        <ul>
                            @php
                                $socialSites = ['facebook', 'twitter', 'instagram'];
                            @endphp
                            @for($i = 0; $i < count($socialSites); $i++)
                                @if(setting($socialSites[$i]) != '')
                                    <li>
                                        <a href="{{ setting($socialSites[$i]) }}">
                                            <i class="icofont-{{ $socialSites[$i] }}"></i>
                                        </a>
                                    </li>
                                @endif
                            @endfor
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- End Header Top -->

<!-- Start Navbar Area -->
<div class="navbar-area sticky-top">
    <!-- Menu For Mobile Device -->
    <div class="mobile-nav">
        <a href="{{ url('/') }}" class="logo">
            <img src="{{ asset('site/img/logo-two.png') }}" alt="Logo">
        </a>
    </div>

    <!-- Menu For Desktop Device -->
    <div class="main-nav">
        <div class="container">
            <nav class="navbar navbar-expand-md navbar-light">
                <a class="navbar-brand" href="{{ url('/') }}">
                    <img src="{{ getLogo() }}" alt="Logo">
                </a>
                <div class="collapse navbar-collapse mean-menu" id="navbarSupportedContent">
                    <ul class="navbar-nav">
                        <li class="nav-item">
                            <a href="{{ url('/') }}" class="nav-link {{ setActiveHome('') }}">
                                <i class="icofont-home"></i> {{ __('home.home') }}
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ url('/appointments') }}" class="nav-link {{ setActiveHome('appointments') }}">
                                <i class="icofont-clock-time"></i> {{ __('home.appointments') }}
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ url('about') }}" class="nav-link {{ setActive('about') }}">
                                <i class="icofont-info-circle"></i>{{ __('home.about_us') }}
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ url('services') }}" class="nav-link {{ setActive('services') }}">
                                <i class="icofont-papers"></i> {{ __('home.services') }}
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ url('team') }}" class="nav-link {{ setActive('team') }}">
                                <i class="icofont-users"></i>{{ __('home.team') }}
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ url('blogs') }}" class="nav-link">
                                <i class="icofont-book"></i>{{ __('home.blogs') }}
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ url('contact-us') }}" class="nav-link">
                                <i class="icofont-phone"></i> {{ __('home.contact_us') }}
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="#" class="nav-link dropdown-toggle">
                                <i class="icofont-globe"></i>
                            </a>
                            <ul class="dropdown-menu">
                                <li class="nav-item">
                                    <a href="{{ url('lang/ar') }}" class="nav-link allowedLink"><i class="icofont-flag"></i> {{ __('home.arabic') }}</a>
                                </li>
                                <li class="nav-item">
                                    <a href="{{ url('lang/en') }}" class="nav-link allowedLink"><i class="icofont-flag"></i> {{ __('home.english') }}</a>
                                </li>
                            </ul>
                        </li>
                        @if (auth()->check())
                            <li class="nav-item">
                                <a href="#" class="nav-link dropdown-toggle"> <i class="icofont-ui-user"></i></a>
                                <ul class="dropdown-menu">
                                    <li class="nav-item">
                                    <a href="{{ route('show.profile', ['id' => auth()->user()->id]) }}" class="nav-link"> <i class="icofont-edit"></i> {{ __('home.edit_profile') }}</a>
                                    </li>
                                    <li class="nav-item">
                                        <a href="{{ route('logout') }}" onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();"
                                           class="nav-link"><i class="icofont-logout"></i>{{ __('home.logout') }}
                                        </a>
                                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                            @csrf
                                        </form>
                                    </li>
                                </ul>
                            </li>
                        @else
                            <li class="nav-item">
                                <a href="{{ url('login') }}" class="nav-link"> <i class="icofont-login"></i> {{ __('home.login') }}</a>
                            </li>
                        @endif
                    </ul>
                    <div class="nav-srh">
                        <div class="search-toggle">
                            <button class="search-icon icon-search"><i class="icofont-search-1"></i></button>
                            <button class="search-icon icon-close"><i class="icofont-close"></i></button>
                        </div>
                        <div class="search-area">
                            <form>
                                <input type="text" class="src-input" id="search-terms" placeholder="{{ __('home.search_here') }}" />
                                <button type="submit" name="submit" value="Go" class="search-icon"><i class="icofont-search-1"></i></button>
                            </form>
                        </div>
                    </div>
                </div>
            </nav>
        </div>
    </div>
</div>
<!-- End Navbar Area -->

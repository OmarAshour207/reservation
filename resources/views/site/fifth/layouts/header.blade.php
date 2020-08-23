<header class="main-header">

    <!--Header Top-->

    <div class="header-top">

        <div class="auto-container clearfix">

            <div class="top-left clearfix">

                <ul class="list">
                    <li>
                        <span class="icon fas fa-envelope"></span>
                        {{ setting(session('lang'). '_address') }}
                    </li>

                    <li><span class="icon fas fa-phone"></span>
                        <a href="tel:{{ setting('phone') }}">
                            {{ setting('phone') }}
                        </a>
                    </li>
                </ul>
            </div>

            <div class="top-right clearfix">
                <ul class="social-icons">
                    @php
                        $socialSites = ['facebook', 'twitter', 'instagram'];
                    @endphp
                    @for($i = 0; $i < count($socialSites); $i++)
                        @if(setting($socialSites[$i]) != '')
                            <li>
                                <a href="{{ setting($socialSites[$i]) }}">
                                    <span class="fab fa-{{ setting($socialSites[$i]) }}"></span>
                                </a>
                            </li>
                        @endif
                    @endfor
                </ul>
            </div>

        </div>

    </div>

    <!-- End Header Top -->

    <!-- Header Upper -->

    <div class="header-upper">

        <div class="inner-container">

            <div class="auto-container clearfix">

                <!--Info-->

                <div class="logo-outer">
                    <div class="logo">
                        <a href="{{ url('/') }}">
                            <img src="{{ asset('site/part2/images/logo.png') }}" alt="" title="">
                        </a>
                    </div>
                </div>



                <!--Nav Box-->

                <div class="nav-outer clearfix">

                    <!--Mobile Navigation Toggler For Mobile--><div class="mobile-nav-toggler"><span class="icon flaticon-menu"></span></div>

                    <nav class="main-menu navbar-expand-md navbar-light">

                        <div class="navbar-header">
                            <!-- Togg le Button -->
                            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                                <span class="icon flaticon-menu"></span>
                            </button>
                        </div>

                        <div class="collapse navbar-collapse clearfix" id="navbarSupportedContent">
                            <ul class="navigation clearfix">
                                <li class="{{ setCurrent('') }}">
                                    <a href="{{ url('/') }}"> {{ __('home.home') }} </a>
                                </li>

                                <li class="{{ setCurrent('about') }}">
                                    <a href="{{ url('about') }}"> {{ __('home.about_us') }} </a>
                                </li>

                                <li class="{{ setCurrent('service') }}">
                                    <a href="{{ url('services') }}">{{ __('home.services') }}</a>
                                </li>

                                <li class="{{ setCurrent('team') }}">
                                    <a href="{{ url('team') }}">{{ __('home.team') }}</a>
                                </li>

                                <li class="{{ setCurrent('blogs') }}">
                                    <a href="{{ url('blogs') }}">{{ __('home.blogs') }}</a>
                                </li>

                                <li class="{{ setCurrent('contact-us') }}">
                                    <a href="{{ url('contact-us') }}">{{ __('home.contact_us') }}</a>
                                </li>

                                <li class="dropdown">
                                    <a href="#"><i class="fa fa-globe"></i> </a>
                                    <ul>
                                        <li>
                                            <a href="{{ url('lang/ar') }}" class="allowedLink"> {{ __('home.arabic') }} </a>
                                        </li>
                                        <li>
                                            <a href="{{ url('lang/en') }}" class="allowedLink"> {{ __('home.english') }} </a>
                                        </li>
                                    </ul>
                                </li>
                                <li class="dropdown">
                                    <a href="#"> <i class="fa fa-user"></i> </a>
                                    @if (auth()->check())
                                    <ul>
                                        <li>
                                            <a href="{{ route('show.profile', ['id' => auth()->user()->id]) }}">
                                                <i class="fa fa-edit"></i> {{ __('home.edit_profile') }}
                                            </a>
                                        </li>
                                        <li>
                                            <a href="{{ route('logout') }}" onclick="event.preventDefault();
                                                        document.getElementById('logout-form').submit();"
                                            class="nav-link">
                                            <i class="fa fa-logout"></i> {{ __('home.logout') }}
                                            </a>
                                            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                                @csrf
                                            </form>
                                        </li>
                                    </ul>
                                    @else
                                    <ul>
                                        <li>
                                            <a href="{{ route('login') }}">
                                                <i class="fa fa-login"></i> {{ __('home.login') }}
                                            </a>
                                        </li>
                                    </ul>
                                    @endif
                                </li>

                            </ul>

                        </div>

                    </nav>

                    <!-- Main Menu End-->



                    <!-- Main Menu End-->

                    <div class="outer-box clearfix">

                        <!-- Search Btn -->

                        <div class="search-box-btn"><span class="icon flaticon-search"></span></div>

                        <!-- Button Box -->

                        <div class="btn-box">

                            <a href="{{ url('appointments') }}" class="theme-btn btn-style-one">
                                <span class="txt"> {{ __('home.get_appointment') }} </span>
                            </a>

                        </div>

                    </div>

                </div>

            </div>

        </div>

    </div>

    <!--End Header Upper-->

    <!--Sticky Header-->

    <div class="sticky-header">

        <div class="auto-container clearfix">
            <!--Logo-->
            <div class="logo pull-left">
                <a href="{{ url('/') }}" class="img-responsive">
                    <img src="{{ asset('site/part2/images/logo-small.png') }}" alt="" title="">
                </a>
            </div>

            <!--Right Col-->
            <div class="right-col pull-right">
                <!-- Main Menu -->
                <nav class="main-menu navbar-expand-md">
                    <!--Mobile Navigation Toggler For Mobile--><div class="mobile-nav-toggler"><span class="icon flaticon-menu"></span></div>
                    <div class="navbar-collapse collapse clearfix" id="navbarSupportedContent1">
                        <ul class="navigation clearfix"><!--Keep This Empty / Menu will come through Javascript--></ul>
                    </div>
                </nav><!-- Main Menu End-->
            </div>
        </div>
    </div>

    <!--End Sticky Header-->

    <!-- Mobile Menu  -->

    <div class="mobile-menu">

        <div class="menu-backdrop"></div>
        <div class="close-btn"><span class="icon far fa-window-close"></span></div>
        <!--Here Menu Will Come Automatically Via Javascript / Same Menu as in Header-->
        <nav class="menu-box">
            <div class="nav-logo">
                <a href="{{ url('/') }}">
                    <img src="{{ asset('site/part2/images/nav-logo.png') }}" alt="" title="">
                </a>
            </div>
            <ul class="navigation clearfix"><!--Keep This Empty / Menu will come through Javascript--></ul>

        </nav>

    </div><!-- End Mobile Menu -->

</header>

<!-- End Main Header -->

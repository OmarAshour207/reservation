@extends('site.first.layouts.app')

@section('content')
    <!-- Page Title -->
    <div class="page-title-area page-title-one">
        <div class="d-table">
            <div class="d-table-cell">
                <div class="page-title-item">
                    <h2> {{ __('home.meet_team') }} </h2>
                    <ul>
                        <li>
                            <a href="{{ url('/') }}">{{ __('home.home') }}</a>
                        </li>
                        <li>
                            <i class="icofont-simple-right"></i>
                        </li>
                        <li>{{ __('home.team_clinic') }}</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
    <!-- End Page Title -->

    <!-- Doctor Search -->
    <div class="doctor-search-area">
        <div class="container">
            <form>
                <div class="row doctor-search-wrap">
                    <div class="col-sm-12 col-lg-12">
                        <div class="doctor-search-item">
                            <div class="form-group">
                                <i class="icofont-doctor-alt"></i>
                                <label>{{ __('home.search_here') }}</label>
                                <input type="text" class="form-control" name="search" value="{{ request('search') }}" placeholder="{{ __('admin.doctor_name') }}">
                            </div>
                            <button type="submit" class="btn doctor-search-btn">
                                <i class="icofont-search-1"></i>
                            </button>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
    <!-- End Doctor Search -->

    <!-- Doctors -->
    <section class="doctors-area doctors-area-two pt-100">
        <div class="doctor-shape">
            <img src="{{ asset('site/img/doctor/2.png') }}" alt="Shape">
        </div>
        <div class="container">
            <div class="row">
                @foreach($teamMembers as $teamMember)
                    <div class="col-sm-6 col-lg-4 wow fadeInUp" data-wow-delay=".5s">
                    <div class="doctor-item">
                        <div class="doctor-top">
                            <img src="{{ $teamMember->member_image }}" alt="Doctor">
                            <a href="appointment.html">{{ __('home.get_appointment') }}</a>
                        </div>
                        <div class="doctor-bottom">
                            @php
                                $name = session('lang') . '_name';
                                $title = session('lang') . '_title';
                            @endphp
                            <h3>
                                <a href="#"> {{ $teamMember->role == 1 ? 'Dr' : 'Nur' }}  {{ $teamMember->$name }}</a>
                            </h3>
                            <span>{{ $teamMember->$title }}</span>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </section>
    <!-- End Doctors -->

@endsection

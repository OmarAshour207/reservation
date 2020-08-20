@extends('site.first.layouts.app')

@push('scripts')

<script>
    $(document).ready(function(){
        $(document).on('change', '.doctor_id' , function(){
            var doctor_id = $('.doctor_id option:selected').val();
            if(doctor_id > 0) {
                $.ajax({
                    url: '{{ url("appointments/days") }}',
                    method: 'get',
                    data_type: 'html',
                    data: {
                        _token: '{{ csrf_token() }}',
                        doctor_id: doctor_id
                    }, success: function(data) {
                        $('.days').html(data);
                    },
                });
            } else {
                $('.days').html('');
            }
        });

        $(document).on('change', '.days', function(){
            var doctor_id = $('.doctor_id option:selected').val();
            var day = $('.days option:selected').val();
            $.ajax({
                url: '{{ url("appointments/times") }}',
                method: 'get',
                data_type: 'html',
                data: {
                    _token: '{{ csrf_token() }}',
                    doctor_id: doctor_id,
                    day: day
                }, success: function(data) {
                    $('.times').html(data);
                }
            });
        });
    });
</script>
@endpush

@section('content')
    <!-- Page Title -->
    <div class="page-title-area page-title-two">
        <div class="d-table">
            <div class="d-table-cell">
                <div class="page-title-item">
                <h2>{{ __('home.get_appointment') }}</h2>
                    <ul>
                        <li>
                            <a href="{{ url('/') }}">{{ __('home.home') }}</a>
                        </li>
                        <li>
                            <i class="icofont-simple-right"></i>
                        </li>
                        <li>{{ __('home.appointment') }}</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
    <!-- End Page Title -->

    <!-- Appointment -->
    <section class="appointment-area-two">
        <div class="container">
            <div class="row align-items-center appointment-wrap-two">
                <div class="col-lg-7 wow fadeInUp" data-wow-delay=".3s">
                    <div class="appointment-item appointment-item-two">
                        <div class="appointment-shape">
                        <img src="{{ asset('site/img/appointment/3.png') }}" alt="Shape">
                        </div>
                        <h2> {{ __('home.book_appointment') }} </h2>
                        <span> {{ __('home.confirm_through_hours') }} </span>
                        <div class="appointment-form">
                            <form method='post' action = "{{ url('book/appointment') }}">
                                @csrf
                                <div class="row">
                                    <div class="col-lg-12">
                                        <div class="form-group">
                                            <i class="icofont-doctor"></i>
                                            <label> {{ __('home.doctor') }} </label>
                                            <select class="form-control doctor_id" id="exampleFormControlSelect1" name="doctor_id">
                                                <option> {{ __('home.choose_doctor') }} </option>
                                                @foreach ($doctors as $doctor)
                                                    <option value="{{ $doctor->id }}"> {{ $doctor->name }} </option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="form-group">
                                            <i class="icofont-calendar"></i>
                                            <label> {{ __('home.day') }} </label>
                                            <select class="form-control days" id="exampleFormControlSelect1" name="day">

                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="form-group">
                                            <i class="icofont-wall-clock"></i>
                                            <label> {{ __('home.appointment') }} </label>
                                            <select class="form-control times" id="exampleFormControlSelect1" name="appointment">

                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <div class="text-center">
                                    <button type="submit" class="btn appointment-btn">{{ __('home.book') }}</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
                <div class="col-lg-5 wow fadeInUp" data-wow-delay=".5s">
                    <div class="appointment-item-two-right">
                        <div class="appointment-item-content">
                        <h2>{{ __('home.working_hours') }}</h2>
                            <div class="content-one">
                                <ul>
                                    <li>Monday</li>
                                    <li>Tuesday</li>
                                    <li>Wednesday</li>
                                    <li>Thursday</li>
                                    <li>Friday</li>
                                    <li>Saturday</li>
                                </ul>
                            </div>
                            <div class="content-two">
                                <ul>
                                    <li></li>
                                    <li></li>
                                    <li></li>
                                    <li></li>
                                    <li></li>
                                    <li></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- End Appointment -->

@endsection

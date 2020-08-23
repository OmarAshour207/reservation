@extends('site.first.layouts.app')

@push('scripts')

<script>
    $(document).ready(function(){

        $(document).on('change', '.days', function(){
            var doctor_id = '{{ $doctor->id }}';
            var day = $('.days option:selected').val();
            var price = $('.days option:selected').data('price');
            $.ajax({
                url: '{{ url("appointments/times") }}',
                method: 'post',
                data_type: 'html',
                data: {
                    _token: '{{ csrf_token() }}',
                    doctor_id: doctor_id,
                    day: day
                }, success: function(data) {
                    $('.times').html(data);
                    $('.modal-body').html('');
                    $('.modal-body').append('{{ __('home.price') }} : ' + price + '<br>');
                    $('.price').val(price);
                }
            });
        });

        $(document).on('change', '.times', function(){
            var doctor = '{{ $doctor->name }}';
            var day = $('.days option:selected').text();
            var time = $('.times option:selected').text();
            var price = $(this).data('price');
            var data = '{{ __('home.doctor_name') }} : ' + doctor + '<br>'
                + '{{ __('home.day') }} : ' + day + '<br>'
                + '{{ __('home.time') }} : ' + time + '<br>';
            $('.modal-body').append(data);
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
                                <input type="hidden" name="price" class="price">
                                <div class="row">
                                    <input type="hidden" name="doctor_id" value="{{ request()->route('id') }}">
                                    <div class="col-lg-12">
                                        <div class="form-group">
                                            <i class="icofont-calendar"></i>
                                            <label> {{ __('home.day') }} </label>
                                            <select class="form-control days" id="exampleFormControlSelect1" name="day">
                                                <option> {{ __('home.choose_day') }} </option>
                                                @foreach ($reservations as $reservation)
                                                    <option value="{{ $reservation->day }}" data-price="{{ $reservation->price }}"> {{ $reservation->day }} </option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-lg-12">
                                        <div class="form-group">
                                            <i class="icofont-wall-clock"></i>
                                            <label> {{ __('home.appointment') }} </label>
                                            <select class="form-control times" id="exampleFormControlSelect1" name="appointment">
                                                <option> {{ __('home.choose_appointment') }} </option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <div class="text-center">
                                    <!-- Button trigger modal -->
                                    <button type="button" class="btn appointment-btn" data-toggle="modal" data-target="#exampleModalCenter">
                                        {{ __('home.book') }}
                                    </button>

                                    <!-- Modal -->
                                    <div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                                        <div class="modal-dialog modal-dialog-centered" role="document">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                <h5 class="modal-title" id="exampleModalLongTitle">
                                                    {{ __('home.confirm_booking') }}
                                                </h5>
                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                                </div>
                                                <div class="modal-body">
                                                </div>
                                                <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary" data-dismiss="modal">{{ __('home.close') }}</button>
                                                <button type="button" class="btn btn-primary btn_appointment">{{ __('home.confirm_booking') }}</button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
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
                                    @foreach ($reservations as $reservation)
                                        <li> {{ date('M d', strtotime($reservation->day)) }} </li>
                                    @endforeach
                                </ul>
                            </div>
                            <div class="content-two">
                                <ul>
                                    @foreach ($reservations as $reservation)
                                        <li>
                                            {{ date('g:i A', strtotime($reservation->start_time)) . ' ' . __('home.to')  . ' ' . date('g:i A', strtotime($reservation->end_time)) }}
                                        </li>
                                    @endforeach
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

@push('scripts')
    <script>
        $(document).on('click', '.btn_appointment', function(e) {
            e.preventDefault();
            $(this).closest('form').submit();
        });
    </script>
@endpush

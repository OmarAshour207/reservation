@extends('site.fifth.layouts.app')

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

	<!--Page Title-->

    <section class="page-title" style="background-image:url({{ asset('site/part2/images/background/7.jpg') }});">

        <div class="auto-container">

            <h1>{{ __('home.get_appointment') }}</h1>

			<ul class="bread-crumb clearfix">

				<li><a href="{{ url('/') }}"><span class="fas fa-home"></span> {{ __('home.home') }} </a></li>

				<li> {{ __('home.appointments') }} </li>

			</ul>

        </div>

    </section>

    <!--End Page Title-->


    <!-- Doctor Detail Section -->
    <section class="doctor-detail">
        <div class="auto-container">
            <!-- Upper Box -->
            <div class="upper-box">
                <div class="row clearfix">
                    <div class="form-column col-lg-8 col-md-12 col-sm-12">
                        <div class="inner-box">
                            <div class="appointment-form">
                                <div class="sec-title centered">
                                    <h2>  {{ __('home.doctor') }} {{ $doctor->name }} </h2>
                                    <h2> {{ __('home.book_appointment') }} </h2>
                                    <p>{{ __('home.confirm_through_hours') }}</p>
                                </div>

                                <form method="post" action="{{ url('book/appointment') }}">
                                    @csrf
                                    <div class="row clearfix">

                                        <input type="hidden" name="price" class="price">

                                        <input type="hidden" name="doctor_id" value="{{ request()->route('id') }}">

                                        <div class="col-md-6 col-sm-12 col-xs-12 form-group">
                                            <i class="fa fa-calendar"></i>
                                            <label> {{ __('home.day') }} </label>
                                            <select class="days" name="day">
                                                <option> {{ __('home.choose_day') }} </option>
                                                @foreach ($reservations as $reservation)
                                                    <option value="{{ $reservation->day }}" data-price="{{ $reservation->price }}"> {{ $reservation->day }} </option>
                                                @endforeach
                                            </select>
                                        </div>

                                        <div class="col-md-6 col-sm-12 col-xs-12">
                                            <div class="form-group">
                                                <i class="fa fa-clock"></i>
                                                <label> {{ __('home.appointment') }} </label>
                                                <select class="times" name="appointment">
                                                    <option> {{ __('home.choose_appointment') }} </option>
                                                </select>
                                            </div>
                                        </div>

                                        <div class="col-md-12 col-sm-12 col-xs-12 form-group text-center">

                                            <button class="theme-btn btn-style-two" type="button" data-toggle="modal" data-target="#exampleModalCenter">
                                                <span class="txt"> {{ __('home.book') }} </span>
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
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                    <div class="image-box col-lg-4 col-md-12 col-sm-12">
                        <div class="image"><a href="{{ $doctor->admin_image }}" class="lightbox-image">
                            <img src="{{ $doctor->admin_image }}" alt=""></a>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Lower Content -->
            <div class="lower-content">
                <div class="row clearfix">

                    <!-- Info Column -->
                    <div class="info-column col-lg-6 col-md-12 col-sm-12">
                        <div class="inner-box">
                            <div class="timetable">
                                <h3><small>Check Our</small> Weekly Timetable</h3>
                                <ul>
                                    @foreach ($reservations as $reservation)
                                        <li>
                                            {{ date('M d', strtotime($reservation->day)) }}
                                            <span> {{ date('g:i A', strtotime($reservation->start_time)) . ' - ' . date('g:i A', strtotime($reservation->end_time)) }} </span>
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
    <!-- End Doctor Detail Section -->

@endsection

@push('scripts')
    <script>
        $(document).on('click', '.btn_appointment', function(e) {
            e.preventDefault();
            $(this).closest('form').submit();
        });
    </script>
@endpush

@push('styles')
<style>
    .modal-backdrop {
        z-index: 1 !important;
    }
</style>
@endpush

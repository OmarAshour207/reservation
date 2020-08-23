@extends('dashboard.layouts.app')

@push('admin_scripts')

<script>
    $(document).ready(function(){
        $(document).on('change', '.doctor_id' , function(){
            var doctor_id = $('.doctor_id option:selected').val();
            if(doctor_id > 0) {
                $.ajax({
                    url: '{{ url("appointments/days") }}',
                    method: 'post',
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
            var price = $('.days option:selected').data('price');
            console.log($('.days option:selected').data('price'));
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
                    $('.price').val(price);
                }
            });
        });
    });
</script>

@endpush


@section('content')
    <div class="mdk-drawer-layout__content page">
        <div class="container-fluid page__heading-container">
            <div class="page__heading d-flex align-items-center">
                <div class="flex">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb mb-0">
                            <li class="breadcrumb-item"><a href="{{ url('admin/dashboard') }}"><i class="material-icons icon-20pt">home</i> {{ trans('admin.home') }} </a></li>
                            <li class="breadcrumb-item active" aria-current="page">{{ trans('admin.create') }}</li>
                        </ol>
                    </nav>
                    <h1 class="m-0"> {{ trans('admin.clients_appointments') }} </h1>
                </div>
            </div>
        </div>

        <div class="container-fluid page__container">

            <div class="card card-form__body card-body">
                <form method="post" action="{{ route('appointments.store') }}">
                    @csrf
                    @include('dashboard.partials._errors')

                    <div class="form-group">
                        <label for="user_id"> {{ trans('admin.clients_appointments') }} / {{ trans('admin.choose_client') }}</label> <br>
                        <select id="user_id" name="user_id" data-toggle="select" class="form-control select2">
                            <option value="" selected> {{ __('admin.choose_client') }} </option>
                            @foreach($users as $user)
                                <option value="{{ $user->id }}"> {{ $user->name }} </option>
                            @endforeach
                        </select>
                    </div>

                    <div class="form-group">
                        <label for="doctor_id"> {{ trans('admin.clients_appointments') }} / {{ trans('admin.choose_doctor') }}</label> <br>
                        <select id="doctor_id" name="doctor_id" data-toggle="select" class="form-control select2 doctor_id">
                            <option value="" selected> {{ __('admin.choose_doctor') }} </option>
                            @foreach($doctors as $doctor)
                                <option value="{{ $doctor->id }}"> {{ $doctor->name }} </option>
                            @endforeach
                        </select>
                    </div>

                    <div class="form-group">
                        <label for="day"> {{ trans('admin.clients_appointments') }} / {{ trans('admin.day') }}</label>
                        <select id="day" name="day" data-toggle="select" class="form-control select2 days">
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="time"> {{ trans('admin.clients_appointments') }} / {{ trans('admin.time') }}</label>
                        <select id="time" name="appointment" data-toggle="select" class="form-control select2 times">
                        </select>
                    </div>

                    <input type="hidden" name="price" value="" class="price">

                    <div class="form-group">
                        <label for="status"> {{ trans('admin.clients_appointments') }} / {{ trans('admin.choose_status') }}</label> <br>
                        <select id="status" name="status" data-toggle="select" class="form-control select2">
                            <option value="" selected> {{ __('admin.choose_status') }} </option>
                            <option value="0"> {{ __('admin.rejected') }} </option>
                            <option value="1"> {{ __('admin.approved') }} </option>
                            <option value="2"> {{ __('admin.pending') }} </option>
                        </select>
                    </div>

                    <div class="text-right mb-5">
                        <input type="submit" name="add" class="btn btn-success" value="{{ trans('admin.add') }}">
                    </div>
                </form>
            </div>
        </div>
        <!-- // END drawer-layout__content -->
    </div>
@endsection

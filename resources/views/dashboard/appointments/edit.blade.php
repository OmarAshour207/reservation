@push('admin_scripts')

<script>
    $(document).ready(function(){
        @if($appointment->doctor_id)
            $.ajax({
                url: '{{ url("appointments/days") }}',
                method: 'get',
                data_type: 'html',
                data: {
                    _token: '{{ csrf_token() }}',
                    doctor_id: doctor_id,
                    day: {{ $appointment->day }}
                }, success: function(data) {
                    $('.days').html(data);
                },
            });
        @endif

        @if($appointment->doctor_id)
            $.ajax({
                url: '{{ url("appointments/times") }}',
                method: 'get',
                data_type: 'html',
                data: {
                    _token: '{{ csrf_token() }}',
                    doctor_id: '{{ $appointment->doctor_id }}',
                    day: '{{ $appointment->day }}',
                    time: '{{ $appointment->time }}'
                }, success: function(data) {
                    $('.times').html(data);
                },
            });
        @endif

    });
</script>

@endpush


@extends('dashboard.layouts.app')

@section('content')
    <div class="mdk-drawer-layout__content page">
        <div class="container-fluid page__heading-container">
            <div class="page__heading d-flex align-items-center">
                <div class="flex">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb mb-0">
                            <li class="breadcrumb-item"><a href="{{ url('admin/dashboard') }}"><i class="material-icons icon-20pt">home</i> {{ trans('admin.home') }} </a></li>
                            <li class="breadcrumb-item active" aria-current="page">{{ trans('admin.edit') }}</li>
                        </ol>
                    </nav>
                    <h1 class="m-0"> {{ trans('admin.clients_appointments') }} </h1>
                </div>
            </div>
        </div>

        <div class="container-fluid page__container">

            <div class="card card-form__body card-body">
                <form method="post" action="{{ route('appointments.update', $appointment->id) }}">
                    @csrf

                    @method('put')
                    @include('dashboard.partials._errors')

                    <div class="form-group">
                        <label for="doctor_id"> {{ trans('admin.clients_appointments') }} / {{ trans('admin.choose_doctor') }}</label> <br>
                        <select id="doctor_id" name="doctor_id" data-toggle="select" class="form-control select2 doctor_id">
                            <option value="" selected> {{ __('admin.choose_doctor') }} </option>
                            @foreach($doctors as $doctor)
                                <option value="{{ $doctor->id }}" {{ $doctor->id == $appointment->doctor_id ? 'selected' : '' }}> {{ $doctor->name }} </option>
                            @endforeach
                        </select>
                    </div>

                    <div class="form-group">
                        <label for="user_id"> {{ trans('admin.clients_appointments') }} / {{ trans('admin.choose_client') }}</label> <br>
                        <select id="user_id" name="user_id" data-toggle="select" class="form-control select2">
                            <option value="" selected> {{ __('admin.choose_client') }} </option>
                            @foreach($users as $user)
                                <option value="{{ $user->id }}" {{ $user->id == $appointment->user_id ? 'selected' : '' }}> {{ $user->name }} </option>
                            @endforeach
                        </select>
                    </div>


                    <div class="form-group">
                        <label for="day"> {{ trans('admin.clients_appointments') }} / {{ trans('admin.day') }}</label>
                        <select id="day" class="form-control select2 days" data-toggle="select" name="day">
                        </select>
                    </div>

                    <div class="form-group">
                        <label for="time"> {{ trans('admin.clients_appointments') }} / {{ trans('admin.time') }}</label>
                        <select id="time" class="form-control select2 times" data-toggle="select" name="time">
                        </select>
                    </div>

                    <div class="form-group">
                        <label for="status"> {{ trans('admin.clients_appointments') }} / {{ trans('admin.status') }}</label>
                        <select id="status" class="form-control select2" data-toggle="select" name="status">
                        @php
                            $buttons = ['rejected', 'approved', 'pending'];
                        @endphp
                        @for ($i = 0; $i < count($buttons); $i++)
                            <option value="{{ $i }}" {{ $i == $appointment->status ? 'selected' : '' }} > {{ $buttons[$i] }} </option>
                        @endfor
                        </select>
                    </div>

                    <div class="text-right mb-5">
                        <input type="submit" name="add" class="btn btn-success" value="{{ trans('admin.update') }}">
                    </div>
                </form>
            </div>
        </div>
        <!-- // END drawer-layout__content -->
    </div>
@endsection

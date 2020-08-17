@extends('dashboard.layouts.app')

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
                    <h1 class="m-0"> {{ trans('admin.reservations') }} </h1>
                </div>
            </div>
        </div>

        <div class="container-fluid page__container">

            <div class="card card-form__body card-body">
                <form method="post" action="{{ route('reservations.store') }}">
                    @csrf
                    @include('dashboard.partials._errors')

                    <div class="form-group">
                        <label for="doctor_id"> {{ trans('admin.reservations') }} / {{ trans('admin.choose_doctor') }}</label> <br>
                        <select id="doctor_id" name="doctor_id" data-toggle="select" class="form-control select2">
                            <option value="" selected> {{ __('admin.choose_doctor') }} </option>
                            @foreach($doctors as $doctor)
                                <option value="{{ $doctor->id }}"> {{ $doctor->name }} </option>
                            @endforeach
                        </select>
                    </div>

                    <input type="hidden" name="creator" value="{{ admin()->user()->name }}">

                    <div class="form-group">
                        <label for="day"> {{ trans('admin.reservations') }} / {{ trans('admin.day') }}</label>
                        <input id="day" name="day" type="date" class="form-control" placeholder="{{ __('admin.day') }}" value="{{ old('day') }}">
                    </div>
                    <div class="form-group">
                        <label for="start_time"> {{ trans('admin.reservations') }} / {{ trans('admin.start_time') }}</label>
                        <input id="start_time" name="start_time" type="time" class="form-control" placeholder="{{ __('admin.start_time') }}" value="{{ old('start_time') }}">
                    </div>

                    <div class="form-group">
                        <label for="end_time"> {{ trans('admin.reservations') }} / {{ trans('admin.end_time') }}</label>
                        <input id="end_time" name="end_time" type="time" class="form-control" placeholder="{{ __('admin.end_time') }}" value="{{ old('end_time') }}">
                    </div>

                    <div class="form-group">
                        <label for="waiting_time"> {{ trans('admin.reservations') }} / {{ trans('admin.waiting_time') }}</label>
                        <input id="waiting_time" name="waiting_time" type="number" class="form-control" placeholder="{{ __('admin.waiting_time') }}" value="{{ old('waiting_time') }}">
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

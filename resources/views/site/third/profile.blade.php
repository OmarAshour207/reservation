@extends('site.first.layouts.app')

@section('content')

    <!-- Page Title -->
    <div class="page-title-area page-title-three">
        <div class="d-table">
            <div class="d-table-cell">
                <div class="page-title-item-two">
                    <h2>{{ $user->name}}</h2>
                    <p> {{ $user->email }} </p>
                </div>
            </div>
        </div>
    </div>
    <!-- End Page Title -->

    <!-- Doctor Details -->
    <div class="doctor-details-area pb-70">
        <div class="container">
            <div class="row">
                <div class="col-lg-5">
                    <div class="doctor-details-item doctor-details-left">
                    <img src="{{ getLogo() }}" alt="Profile">
                        <div class="doctor-details-contact">
                            <h3>Contact info</h3>
                            <ul>
                                <li>
                                    <i class="icofont-ui-call"></i>
                                    {{ $user->phone }}
                                </li>
                                <li>
                                    <i class="icofont-ui-message"></i>
                                    {{ $user->email }}
                                </li>
                            </ul>
                        </div>
                        <div class="doctor-details-work">
                            {{-- <h3>{{ __('home.appointments') }}</h3> --}}
                            <div class="appointment-item-two-right">
                                <div class="appointment-item-content">
                                    <div class="content-one">
                                        <ul>
                                        </ul>
                                    </div>
                                    <div class="content-two">
                                        <ul>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-7">
                    <div class="doctor-details-item">
                        <div class="doctor-details-right">
                            <div class="doctor-details-biography">
                                <h3>{{ __('home.update_information') }}</h3>
                                <div class="signup-form">
                                    <form method="post" action="{{ url('edit/profile/' . request()->id) }}">
                                        @csrf
                                        <div class="row">
                                            <div class="col-lg-12">
                                                <div class="form-group">
                                                    <input type="name" name="name" class="form-control @error('name') is-invalid @enderror" placeholder="{{ __('home.name') }}" value="{{ old('name', $user->name) }}">
                                                    @error('name')
                                                        <span class="invalid-feedback" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="col-lg-12">
                                                <div class="form-group">
                                                    <input type="password" name="old_password" class="form-control @error('old_password') is-invalid @enderror" placeholder="{{ __('home.old_password') }}">
                                                    @error('old_password')
                                                    <span class="invalid-feedback" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                    @enderror
                                                </div>
                                            </div>

                                            <div class="col-lg-6">
                                                <div class="form-group">
                                                    <input type="password" name="password" class="form-control @error('password') is-invalid @enderror" placeholder="{{ __('home.password') }}">
                                                    @error('password')
                                                    <span class="invalid-feedback" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                    @enderror
                                                </div>
                                            </div>

                                            <div class="col-lg-6">
                                                <div class="form-group">
                                                    <input type="password" name="password_confirmation" class="form-control @error('password_confirmation') is-invalid @enderror" placeholder="{{ __('home.password_confirmation') }}">
                                                    @error('password_confirmation')
                                                    <span class="invalid-feedback" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                    @enderror
                                                </div>
                                            </div>

                                            <div class="col-lg-12">
                                                <div class="text-{{ session('lang') == 'ar' ? 'right' : 'left' }}">
                                                    <button type="submit" class="btn btn-success">{{ __('home.update') }}</button>
                                                </div>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-lg-12">
                    <h3 style="font-weight: 600;color: #2f60bd;margin-bottom:25px">{{ __('home.appointments') }}</h3>
                    <table class="table table-striped">
                        <thead>
                          <tr>
                            <th scope="col">#</th>
                            <th scope="col"> {{ __('home.day') }} </th>
                            <th scope="col"> {{ __('home.time') }} </th>
                            <th scope="col"> {{ __('home.doctor_name') }} </th>
                            <th scope="col"> {{ __('home.status') }} </th>
                          </tr>
                        </thead>
                        <tbody>
                            @foreach ($appointments as $index => $appointment)
                            <tr>
                                <th scope="row"> {{ $index+1 }} </th>
                                <td> {{ date('d M', strtotime($appointment->day)) }} </td>
                                <td> {{ date('g:i A', strtotime($appointment->time)) }} </td>
                                <td> {{ $appointment->doctor->name }} </td>
                                <td>
                                    @php
                                        $buttons = ['rejected', 'success', 'warning'];
                                    @endphp
                                    <button class="btn btn-{{ $buttons[$appointment->status] }} text-white">
                                        @if($appointment->status == 2)
                                            {{ __('home.pending') }}
                                        @elseif($appointment->status == 1)
                                            {{ __('home.approved') }}
                                        @else
                                            {{ __('home.rejected') }}
                                        @endif
                                    </button>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                      </table>
                </div>
            </div>
            <br>
            <hr>

            <div class="row">
                <div class="col-lg-12">
                    <h3 style="font-weight: 600;color: #2f60bd;margin-bottom:25px">{{ __('home.client_history') }}</h3>
                    <table class="table table-striped">
                        <thead>
                          <tr>
                            <th scope="col">#</th>
                            <th scope="col"> {{ __('home.case_name') }} </th>
                            <th scope="col"> {{ __('home.case_description') }} </th>
                            <th scope="col"> {{ __('home.doctor_name') }} </th>
                            <th scope="col"> {{ __('home.history') }} </th>
                            <th scope="col"> {{ __('home.view') }} </th>
                          </tr>
                        </thead>
                        <tbody>
                            @foreach ($histories as $index => $history)
                            <tr>
                                @php
                                    $case = session('lang') . '_case';
                                    $desc = session('lang') . '_description';
                                @endphp
                                <th scope="row"> {{ $index+1 }} </th>
                                <td> {{ $history->$case }} </td>
                                <td> {{ substr($history->$desc, 0, 20) }} </td>
                                <td> {{ $history->doctor->name }} </td>
                                <td> {{ $history->created_at->format('d M Y') }} </td>
                                <td>
                                    <!-- Large modal -->
                                    <button type="button" class="btn btn-primary" data-toggle="modal" data-target=".bd-example-modal-lg">
                                        <i class="icofont-eye"></i>  {{ __('home.view') }}
                                    </button>

                                    <div class="modal fade bd-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
                                    <div class="modal-dialog modal-lg">
                                        <div class="modal-content">
                                            <div class="container">
                                                <div class="row">
                                                    <div class="col-lg-12">
                                                        <h5> {{ __('home.case_name') }} </h5>
                                                        <h1> {{ $history->$case }} </h1>
                                                    </div>
                                                </div>
                                                <hr>
                                                <div class="row">
                                                    <div class="col-lg-12">
                                                        <h5> {{ __('home.case_description') }} </h5>
                                                        <h1> {{ $history->$desc }} </h1>
                                                    </div>
                                                </div>
                                                <hr>
                                                <div class="row">
                                                    <div class="col-lg-12">
                                                        <h5> {{ __('home.doctor_name') }} </h5>
                                                        <h1> {{ $history->doctor->name }} </h1>
                                                    </div>
                                                </div>
                                                <hr>
                                                <div class="row">
                                                    <div class="col-lg-12">
                                                        <h5> {{ __('home.image') }} </h5>
                                                        <img src="{{ $history->history_image }}">
                                                    </div>
                                                </div>
                                                <hr>
                                            </div>
                                        </div>
                                    </div>
                                    </div>
                                </td>
                              </tr>
                            @endforeach
                        </tbody>
                      </table>
                </div>
            </div>
        </div>
    </div>
    <!-- End Doctor Details -->
<br>
<br>
<br>
<br>
<br>
@endsection

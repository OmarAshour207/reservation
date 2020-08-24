@extends('dashboard.layouts.app')

@section('content')
    <div class="mdk-drawer-layout__content page">
        <div class="container-fluid page__heading-container">
            <div class="page__heading d-flex align-items-center">
                <div class="flex">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb mb-0">
                            <li class="breadcrumb-item"><a href="{{ url('admin/dashboard') }}"><i class="material-icons icon-20pt">home</i> {{ trans('admin.home') }} </a></li>
                            <li class="breadcrumb-item active" aria-current="page">{{ trans('admin.appointments') }}</li>
                        </ol>
                    </nav>
                    <h1 class="m-0"> {{ __('admin.clients_appointments') }} </h1>
                </div>
                <a href="{{ route('appointments.create') }}" class="btn btn-success ml-3">{{ trans('admin.create') }} <i class="material-icons">add</i></a>
            </div>
        </div>

        <div class="container-fluid page__container">

            <div class="card">
                <div class="table-responsive" data-toggle="lists" data-lists-values='["js-lists-values-employee-name"]'>

                    <table class="table mb-0 thead-border-top-0 table-striped">
                        <thead>
                            <tr>

                            <th style="width: 18px;">
                                <div class="custom-control custom-checkbox">
                                    <input type="checkbox" class="custom-control-input js-toggle-check-all" data-target="#companies" id="customCheckAll">
                                    <label class="custom-control-label" for="customCheckAll"><span class="text-hide">Toggle all</span></label>
                                </div>
                            </th>

                            <th style="width: 30px;" > {{ trans('admin.id') }} </th>
                            <th style="width: 40px;"> {{ trans('admin.client_name') }} </th>
                            <th style="width: 40px;"> {{ trans('admin.doctor_name') }} </th>
                            <th style="width: 40px;"> {{ trans('admin.day') }} </th>
                            <th style="width: 40px;"> {{ trans('admin.time') }} </th>
                            <th style="width: 40px;"> {{ trans('admin.price') }} </th>
                            <th style="width: 40px;"> {{ trans('admin.status') }} </th>
                            <th style="width: 40px;"> {{ trans('admin.change_status') }} </th>
                            <th style="width: 30px;" > {{ trans('admin.action') }} </th>
                        </tr>
                        </thead>
                        <tbody class="list" id="companies">
                        @if($appointments->count() > 0)
                            @foreach($appointments as $index => $appointment)
                        <tr>
                            <td class="text-left">
                                <div class="custom-control custom-checkbox">
                                    <input type="checkbox" class="custom-control-input js-check-selected-row" id="customCheck1_20">
                                    <label class="custom-control-label" for="customCheck1_20"><span class="text-hide">Check</span></label>
                                </div>
                            </td>
                            <td style="width: 30px;">
                                <div class="badge badge-soft-dark"> {{ $index+1 }} </div>
                            </td>

                            <td style="width: 40px;">
                                <div class="d-flex align-items-center">
                                    <div class="d-flex align-items-center">
                                        <a href="{{ url('admin/client/doctors/'. $appointment->user->id) }}">
                                            {{ ucfirst($appointment->user->name) }}
                                        </a>
                                    </div>
                                </div>
                            </td>
                            <td style="width: 40px;">
                                <div class="d-flex align-items-center">
                                    <div class="d-flex align-items-center">
                                        {{ ucfirst($appointment->doctor->name) }}
                                    </div>
                                </div>
                            </td>

                            <td style="width: 40px;">
                                <div class="d-flex align-items-center">
                                    <div class="d-flex align-items-center">
                                        {{ date('d M', strtotime($appointment->day)) }}
                                    </div>
                                </div>
                            </td>
                            <td style="width: 40px;">
                                <div class="d-flex align-items-center">
                                    <div class="d-flex align-items-center">
                                        {{ date('g:i A', strtotime($appointment->appointment)) }}
                                    </div>
                                </div>
                            </td>

                            <td style="width: 40px;">
                                <div class="d-flex align-items-center">
                                    <div class="d-flex align-items-center">
                                        {{ $appointment->price }}
                                    </div>
                                </div>
                            </td>

                            <td style="width: 40px">
                                <div class="d-flex align-items-center">
                                    @php
                                        $buttons = ['danger', 'success', 'warning'];
                                    @endphp
                                    <div class="d-flex align-items-center btn btn-{{ $buttons[$appointment->status] }}">
                                        @if($appointment->status == 2)
                                            {{ __('home.pending') }}
                                        @elseif($appointment->status == 1)
                                            {{ __('home.approved') }}
                                        @else
                                            {{ __('home.rejected') }}
                                        @endif
                                    </div>
                                </div>
                            </td>

                            <td style="width: 40px;">
                                <div class="d-flex align-items-center">
                                    @if ($appointment->status == 2)
                                    <div class="d-flex align-items-center">
                                        <a href="#" class="btn btn-sm btn-link status"
                                        data-id="{{ $appointment->id }}"
                                        data-status= "0"
                                        data-url="{{ route('change.status') }}">
                                            <button class="btn btn-danger">
                                                {{ __('admin.reject') }}
                                            </button>
                                        </a>
                                        <a href="#" class="btn btn-sm btn-link status"
                                        data-id="{{ $appointment->id }}"
                                        data-status= "1"
                                        data-url="{{ route('change.status') }}">
                                            <button class="btn btn-success">
                                                {{ __('admin.approve') }}
                                            </button>
                                        </a>
                                    </div>
                                    @endif
                                </div>
                            </td>

                            <td style="width: 30px;">
                                <form action="{{ route('appointments.destroy', $appointment->id) }}" method="post" style="display: inline-block">
                                    @csrf
                                    @method('delete')

                                    <button type="submit" class="btn btn-danger btn-sm delete"><i class="fa fa-trash"></i> </button>
                                </form>
                            </td>
                        </tr>
                        @endforeach
                            {{ $appointments->appends(request()->query())->links() }}
                        @else
                            <h1> {{ trans('admin.no_records') }} </h1>
                        @endif
                        </tbody>
                    </table>
                </div>

            </div>
        </div>
        <!-- // END drawer-layout__content -->
    </div>
@endsection

@push('admin_scripts')
    <script>
        $(document).ready(function(){
            $(document).on('click', '.status',function(e){
                e.preventDefault();
                url = $(this).data('url');
                id = $(this).data('id');
                status = $(this).data('status');
                $.ajax({
                    url: url,
                    method: 'POST',
                    data: {
                        _token: '{{ csrf_token() }}',
                        id: id,
                        status:status
                    }, success: function() {
                        window.location.reload();
                    }
                });
            });
        });
    </script>
@endpush

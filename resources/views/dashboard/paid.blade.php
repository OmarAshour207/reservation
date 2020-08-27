@extends('dashboard.layouts.app')

@section('content')
<div class="mdk-drawer-layout__content page">
    <div class="container-fluid page__heading-container">
        <div class="page__heading d-flex align-items-center">
            <div class="flex">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb mb-0">
                        <li class="breadcrumb-item"><a href="{{ url('admin/dashboard') }}"><i class="material-icons icon-20pt">home</i> {{ trans('admin.home') }} </a></li>
                        <li class="breadcrumb-item active" aria-current="page">{{ trans('admin.total_paid') }}</li>
                    </ol>
                </nav>
                <h1 class="m-0"> {{ trans('admin.total_paid') }}  -  {{ $total_paids . __('admin.le') }} </h1>
            </div>
            <form>
                <div class="row mb-2">
                    <input class="form-control col mr-2" type="date" name="from" placeholder="{{__('home.from') }}" value="{{ request('from') }}">
                    <input class="form-control col mr-2" type="date" name="to" placeholder="{{__('home.to') }}" value="{{ request('to') }}">
                    <button type="submit" class="btn btn-success col"> {{ __('admin.search') }} </button>
                </div>
            </form>
        </div>
    </div>

    <div class="container-fluid page__container">
        <a href="{{ url('admin/export/all') }}" class="btn btn-success mb-2"> <i class="fa fa-file-export"></i> {{ __('admin.export_all') }} </a>
        <a href="{{ url('admin/export/view') }}" class="btn btn-success mb-2"> <i class="fa fa-file-export"></i> {{ __('admin.export_view') }} </a>
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

                        <th style="width: 30px;"> {{ __('admin.id') }} </th>
                        <th style="width: 40px;"> {{ __('admin.client_name') }} </th>
                        <th style="width: 40px;"> {{ __('admin.responsible_doctor') }} </th>
                        <th style="width: 40px;"> {{ __('admin.price') }}</th>
                        <th style="width: 30px;"> {{ __('admin.action') }} </th>
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
                                    <a href="{{ url('admin/client/doctors/' . $appointment->user->id) }}">
                                        {{ $appointment->user->name }}
                                    </a>
                                </div>
                            </div>
                        </td>

                        <td style="width: 40px;">
                            <div class="d-flex align-items-center">
                                <div class="d-flex align-items-center">
                                    <a href="{{ route('accounts.show', $appointment->doctor->id) }}">
                                        {{ $appointment->doctor->name }}
                                    </a>
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

                        <td>
                            <a href="{{ route('appointments.edit', $appointment->id) }}" class="btn btn-sm btn-link">
                                <i class="fa fa-edit fa-2x"></i>
                            </a>
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

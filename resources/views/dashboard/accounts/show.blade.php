@extends('dashboard.layouts.app')

@section('content')
    <div class="mdk-drawer-layout__content page">
        <div class="container-fluid page__heading-container">
            <div class="page__heading d-flex align-items-center">
                <div class="flex">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb mb-0">
                            <li class="breadcrumb-item"><a href="{{ url('admin/dashboard') }}"><i class="material-icons icon-20pt">home</i> {{ trans('admin.home') }} </a></li>
                            <li class="breadcrumb-item active" aria-current="page">{{ trans('admin.team_members') }}</li>
                        </ol>
                    </nav>
                    <h1 class="m-0"> {{ trans('admin.accounts') }} </h1>
                </div>
                <a href="{{ route('accounts.create') }}" class="btn btn-success ml-3">{{ trans('admin.create') }} <i class="material-icons">add</i></a>
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
                            <th style="width: 40px;"> {{ trans('admin.doctor_name') }} </th>
                            <th style="width: 40px;"> {{ trans('admin.name') }} </th>
                            <th style="width: 40px;"> {{ trans('admin.case') }} </th>
                            <th style="width: 40px;"> {{ trans('admin.description') }} </th>
                        </tr>
                        </thead>
                        <tbody class="list" id="companies">
                        @if($clients->count() > 0)
                            @foreach($clients as $index => $client)
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
                                    <div class="d-flex align-items-center btn btn-success">
                                        {{ $account->name }}
                                    </div>
                                </div>
                            </td>

                            <td style="width: 40px;">
                                <div class="d-flex align-items-center">
                                    <div class="d-flex align-items-center">
                                        {{ $client->user->name }}
                                    </div>
                                </div>
                            </td>

                            @php
                                $case = session('lang') . '_case';
                                $desc = session('lang') . '_description';
                            @endphp

                            <td style="width:40px" class="text-center">
                                <div class="d-flex align-items-center">
                                    <div class="d-flex align-items-center">
                                        {{ $client->$case }}
                                    </div>
                                </div>
                            </td>

                            <td style="width:40px" class="text-center">
                                <div class="d-flex align-items-center">
                                    <div class="d-flex align-items-center">
                                        {{ substr($client->$desc, 0, 40) }}
                                    </div>
                                </div>
                            </td>

                        </tr>
                        @endforeach
                            {{ $clients->appends(request()->query())->links() }}
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

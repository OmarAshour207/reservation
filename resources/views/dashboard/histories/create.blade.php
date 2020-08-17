@push('admin_scripts')
    <script type="text/javascript">
        Dropzone.autoDiscover = false;
        $(document).ready(function () {
            $('#mainphoto').dropzone({
                url: '{{ route('upload.image') }}',
                paramName:'image',
                autoDiscover: false,
                uploadMultiple: false,
                maxFiles: 1,
                acceptedFiles: 'image/*',
                dictDefaultMessage: '{{ __('admin.upload_photo') }}',
                dictRemoveFile: '<button class="btn btn-danger"> <i class="fa fa-trash center"></i></button>',
                params: {
                    _token: '{{ csrf_token() }}',
                    path: 'clients-histories',
                    width: 100,
                    height: 100
                },
                addRemoveLinks: true,
                removedfile:function (file) {
                    var imageName = $('.image_name').val();
                    $.ajax({
                        dataType: 'json',
                        type: 'POST',
                        url: '{{ route('remove.image') }}',
                        data: {
                            _token: '{{ csrf_token() }}',
                            image: imageName,
                            path: 'clients-histories'
                        }
                    });
                    var fmock;
                    return (fmock = file.previewElement) != null ? fmock.parentNode.removeChild(file.previewElement): void 0;
                },
                init: function () {
                    this.on("success", function (file, image) {
                        $('.image_name').val(image);
                    })
                }
            });
        });
    </script>
    <style type="text/css">

        .dropzone {
            width: 200px;
            height: 90px;
            min-height: 0px !important;
            background-color: #1C2260;
            border: #1C2260;
        }
    </style>
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
                            <li class="breadcrumb-item active" aria-current="page">{{ trans('admin.create') }}</li>
                        </ol>
                    </nav>
                    <h1 class="m-0"> {{ __('admin.client_history') }} </h1>
                </div>
            </div>
        </div>

        <div class="container-fluid page__container">

            <div class="card card-form__body card-body">
                <form method="post" action="{{ route('clients-histories.store') }}" enctype="multipart/form-data">
                    @csrf
                    @include('dashboard.partials._errors')

                    <div class="form-group">
                        <label for="ar_case"> {{ trans('admin.client_history') }} / {{ trans('admin.ar_case') }}</label>
                        <input id="ar_case" name="ar_case" type="text" class="form-control" placeholder="{{ __('admin.ar_case') }}" value="{{ old('ar_case') }}">
                    </div>
                    <div class="form-group">
                        <label for="en_case"> {{ trans('admin.client_history') }} / {{ trans('admin.en_case') }}</label>
                        <input id="en_case" name="en_case" type="text" class="form-control" placeholder="{{ __('admin.en_case') }}" value="{{ old('en_case') }}">
                    </div>

                    <div class="form-group">
                        <label for="ar_desc"> {{ trans('admin.client_history') }} / {{ trans('admin.ar_description') }}</label>
                        <textarea id="ar_desc" name="ar_description" rows="4" class="form-control" placeholder="{{ trans('admin.client_history') }} / {{ trans('admin.ar_description') }}...">{{ old('ar_description') }}</textarea>
                    </div>
                    <div class="form-group">
                        <label for="en_desc"> {{ trans('admin.client_history') }} / {{ trans('admin.en_description') }}</label>
                        <textarea id="en_desc" name="en_description" rows="4" class="form-control" placeholder="{{ trans('admin.client_history') }} / {{ trans('admin.en_description') }}...">{{ old('en_description') }}</textarea>
                    </div>

                    <div class="form-group">
                        <label for="user_id"> {{ trans('admin.client_history') }} / {{ trans('admin.name') }}</label> <br>
                        <select id="user_id" name="user_id" data-toggle="select" class="form-control select2">
                            <option value="" selected> {{ __('admin.choose_client') }} </option>
                            @foreach($users as $user)
                                <option value="{{ $user->id }}"> {{ $user->name }} </option>
                            @endforeach
                        </select>
                    </div>

                    @if (admin()->user()->role == 0)
                        <div class="form-group">
                            <label for="role"> {{ trans('admin.client_history') }} / {{ trans('admin.responsible_doctor') }}</label> <br>
                            <select id="role" name="doctor_id" data-toggle="select" class="form-control select2">
                                <option value="" selected> {{ __('admin.responsible_doctor') }} </option>
                                @if ($doctors->count() > 0)
                                    @foreach($doctors as $doctor)
                                        <option value="{{ $doctor->id }}"> {{ $doctor->name }} </option>
                                    @endforeach
                                @endif
                            </select>
                        </div>
                    @endif

                    <div class="form-group">
                        <input class="image_name" type="hidden" name="image" value="">
                    </div>
                    <div class="form-group">
                        <label> {{ __('admin.photo') }} </label>
                        <div class="dropzone" id="mainphoto"></div>
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

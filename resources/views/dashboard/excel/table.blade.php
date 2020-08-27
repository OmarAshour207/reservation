<table class="table mb-0 thead-border-top-0 table-striped">
    <thead>
        <tr>


        <th style="width: 30px;"> {{ __('admin.id') }} </th>
        <th style="width: 40px;"> {{ __('admin.client_name') }} </th>
        <th style="width: 40px;"> {{ __('admin.responsible_doctor') }} </th>
        <th style="width: 40px;"> {{ __('admin.price') }}</th>
        <th style="width: 40px;"> {{ __('admin.total_paid') }}</th>
    </tr>
    </thead>
    <tbody class="list" id="companies">
    @if($appointments->count() > 0)
        @foreach($appointments as $index => $appointment)
    <tr>
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

        <td style="width: 40px;">
            <div class="d-flex align-items-center">
                <div class="d-flex align-items-center">
                    @php
                        $total = 0;
                    @endphp
                    {{ $total += $appointment->price }}
                </div>
            </div>
        </td>

    </tr>
    @endforeach
    @else
        <h1> {{ trans('admin.no_records') }} </h1>
    @endif
    </tbody>
</table>

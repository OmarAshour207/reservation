<option> {{ __('home.choose_appointment') }} </option>
@foreach ($slots as $slot)
    <option value="{{ $slot }}"> {{ date('g:i A', strtotime($slot))  }} </option>
@endforeach

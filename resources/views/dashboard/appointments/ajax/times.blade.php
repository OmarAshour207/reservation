<option> {{ __('home.choose_appointment') }} </option>
@foreach ($slots as $slot)
    <option value="{{ $slot }}" {{ $slot == $choosen_time ? 'selected' : '' }}>
        {{ date('g:i A', strtotime($slot)) }}
    </option>
@endforeach

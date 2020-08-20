<option> {{ __('home.choose_day') }} </option>
@foreach ($days as $day)
    <option value="{{ $day->day }}" {{ $day->day == $choosen_day ? 'selected' : '' }}> {{ $day->day }} </option>
@endforeach

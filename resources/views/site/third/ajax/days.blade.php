<option> {{ __('home.choose_day') }} </option>
@foreach ($days as $day)
    <option value="{{ $day->day }}"> {{ $day->day }} </option>
@endforeach

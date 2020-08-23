<option value=""> {{ __('home.choose_day') }} </option>
@foreach ($reservations as $reservation)
    <option value="{{ $reservation->day }}" data-price={{ $reservation->price }}> {{ $reservation->day }} </option>
@endforeach

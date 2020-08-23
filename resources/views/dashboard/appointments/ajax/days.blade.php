<option> {{ __('home.choose_day') }} </option>
@foreach ($reservations as $reservation)
    <option value="{{ $reservation->day }}" {{ $reservation->day == $choosen_day ? 'selected' : '' }} data-price="{{ $reservation->price }}">
        {{ $reservation->day }}
    </option>
@endforeach

<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Admin;
use App\Reservation;
use Illuminate\Http\Request;

class ReservationController extends Controller
{
    public function index()
    {
        $reservations = Reservation::with('doctor')->orderBy('id', 'desc')->paginate(10);
        return view('dashboard.reservations.index', compact('reservations'));
    }

    public function create()
    {
        $doctors = Admin::where('role', '!=', '0')->get();
        return view('dashboard.reservations.create', compact('doctors'));
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'doctor_id'         => 'required|numeric',
            'creator'           => 'required|string',
            'day'               => 'required|date',
            'start_time'        => 'required|date_format:H:i',
            'end_time'          => 'required|date_format:H:i|after:start_time',
            'waiting_time'      => 'required|numeric',
            'price'             => 'required|numeric'
        ]);
        Reservation::create($data);
        session()->flash('success', __('admin.added_successfully'));
        return redirect()->route('reservations.index');
    }

    public function edit(Reservation $reservation)
    {
        $doctors = Admin::where('role', '!=', '0')->get();
        return view('dashboard.reservations.edit', compact('reservation', 'doctors'));
    }

    public function update(Request $request, Reservation $reservation)
    {
        $data = $request->validate([
            'doctor_id'         => 'required|numeric',
            'creator'           => 'required|string',
            'day'               => 'required|date',
            'start_time'        => 'required',
            'end_time'          => 'required|after:start_time',
            'waiting_time'      => 'required|numeric',
            'price'             => 'required|numeric'
        ]);
        $reservation->update($data);
        session()->flash('success', __('admin.updated_successfully'));
        return redirect()->route('reservations.index');
    }

    public function destroy(Reservation $reservation)
    {
        $reservation->delete();
        session()->flash('success', __('admin.deleted_successfully'));
        return redirect()->route('reservations.index');
    }
}

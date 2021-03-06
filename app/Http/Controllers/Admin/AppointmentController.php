<?php

namespace App\Http\Controllers\Admin;

use App\Admin;
use App\Appointment;
use App\AppointmentNotification;
use App\Http\Controllers\Controller;
use App\Reservation;
use App\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;

class AppointmentController extends Controller
{
    public function index()
    {
        $appointments = Appointment::with('doctor', 'user')->orderBy('created_at', 'desc')->paginate(20);
        return view('dashboard.appointments.index', compact('appointments'));
    }

    public function create()
    {
        $doctors = Admin::where('role', '!=', '0')->get();
        $users = User::all();

        return view('dashboard.appointments.create',
            ['doctors' => $doctors, 'users' => $users]);
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'doctor_id'     => 'required|numeric',
            'day'           => 'required|date',
            'appointment'   => 'required|date_format:H:i:s',
            'user_id'       => 'required|numeric',
            'price'         => 'required|numeric'
        ]);
        $appointment = Appointment::create($data);

        $user = User::findOrFail($data['user_id']);
        AppointmentNotification::create([
            'user_id'   => $appointment->user_id,
            'content'   => ' ' . __('admin.make_an_appointment_at') . ' ' . date('g:i A', strtotime($appointment->appointment)),
            'status'    => 0
        ]);

        session()->flash('success', __('home.booked_successfully'));
        return redirect()->route('appointments.index');
    }

    public function changeStatus(Request $request)
    {
        $appointment = Appointment::findOrFail($request->id);
        $appointment->update([
            'status'    => $request->status
        ]);
    }

    public function destroy(Appointment $appointment)
    {
        $appointment->delete();
        session()->flash('success', __('home.deleted_successfully'));
        return redirect()->route('appointments.index');
    }

}

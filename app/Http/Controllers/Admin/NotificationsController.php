<?php

namespace App\Http\Controllers\Admin;

use App\AppointmentNotification;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;

class NotificationsController extends Controller
{
    public function clearAll()
    {
        DB::table('appointment_notifications')
                ->where('status', '=', 0)
                ->update(array('status' => 1));

        session()->flash( __('admin.updated_successfully') );
        return redirect()->back();
    }

    public function viewAll()
    {
        $notifications = AppointmentNotification::with('user')
                ->orderBy('id', 'desc')
                ->paginate(10);
        return view('dashboard.appointments.notification', compact('notifications'));
    }
}

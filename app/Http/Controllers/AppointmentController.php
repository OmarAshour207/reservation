<?php

namespace App\Http\Controllers;

use App\Admin;
use App\Appointment;
use App\Reservation;
use App\Service;
use App\Visitor;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AppointmentController extends Controller
{
    public function bookAppointment(Request $request)
    {
        $data = $request->validate([
            'doctor_id'     => 'required|numeric',
            'day'           => 'required|date',
            'appointment'   => 'required|date_format:H:i:s'
        ]);
        $data['user_id'] = auth()->user()->id;
        Appointment::create($data);
        session()->flash('success', __('home.booked_successfully'));
        return redirect('/');
    }

    public function showPage()
    {
        $this->checkVisitor();
        $services = Service::orderBy('id', 'desc')->limit('6')->get();
        $doctors = Admin::where('role', '!=', '0')->get();
        return view('site.first.appointment',
            ['services' => $services, 'doctors' => $doctors]);
    }

    public function showDays(Request $request)
    {
        if ($request->ajax()) {
            $days = Reservation::select('day', 'doctor_id')->where('doctor_id', $request->doctor_id)->get();
            return view('site.first.ajax.days', compact('days'));
        }
    }

    public function showTimes(Request $request)
    {
        if ($request->ajax()) {
            $times = Reservation::where('doctor_id', $request->doctor_id)
                    ->where('day', $request->day)
                    ->orderBy('start_time')
                    ->get();

            $all_slots = $this->makeTimes($times);
            $reserved_slots = Appointment::where('doctor_id', $request->doctor_id)->whereIn('appointment', $all_slots)->get()->toArray();
            $removed_slots = [];
            for ($i = 0; $i < count($reserved_slots); $i++) {
                array_push($removed_slots, $reserved_slots[$i]['appointment']);
            }
            $slots = array_diff($all_slots, $removed_slots);
            return view('site.first.ajax.times', compact('slots'));
        }
    }

    public function makeTimes($times)
    {
        $data = [];
        foreach($times as $index => $time) {
            $start_str = strtotime($time->start_time);
            $end_str = strtotime($time->end_time);

            while ($start_str < $end_str) {
                array_push($data, date('H:i:s', $start_str));
                $start_str = strtotime(date('H:i:s', $start_str + $time->waiting_time * 60));
            }
        }
        return $data;
    }

    public function checkVisitor()
    {
        $ip = $_SERVER['REMOTE_ADDR'];
        $page = \Request::segment(1) ?? 'home';

        $visitors = DB::table('visitors')
                ->where('ip', $ip)
                ->where('page', $page)
                ->latest()
                ->first();

        if($visitors != null) {
            $created = Carbon::parse($visitors->created_at);

            if(!$created->isCurrentDay()) {
                $this->createVisitor($ip, $page);
            }
        }else {
            $this->createVisitor($ip, $page);
        }
    }

    protected function createVisitor($ip, $page)
    {
        Visitor::create([
            'ip'    => $ip,
            'page'  => $page
        ]);
    }


}

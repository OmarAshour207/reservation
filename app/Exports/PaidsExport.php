<?php

namespace App\Exports;

use App\Appointment;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;

class PaidsExport implements FromView
{

    public function view() : View
    {
        $appointments = Appointment::where('status', 1)->with('doctor', 'user')->get();

        return view('dashboard.excel.table', compact('appointments'));
    }
}

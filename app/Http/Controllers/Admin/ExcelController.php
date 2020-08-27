<?php

namespace App\Http\Controllers\Admin;

use App\Appointment;
use App\Exports\PaidsExport;
use App\Exports\PaidsExportView;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;

class ExcelController extends Controller
{
    public function export()
    {
        return Excel::download(new PaidsExport, 'paids.xlsx');
    }

    public function exportView()
    {
        return Excel::download(new PaidsExportView, 'paids-view.xlsx');
    }
}

<?php

namespace App\Http\Controllers;

use App\Models\Complaint;
use Illuminate\Http\Request;

class DashboardComplaintController extends Controller
{
    public function index()
    {
        return view('dashboard.index', [
            'title' => 'Pengaduan',
            'active' => 'pengaduan',
            'complaints' => Complaint::where('status', '0')->get()
        ]);
    }

    public function onProcess()
    {
        return view('dashboard.index', [
            'title' => 'Pengaduan dalam proses',
            'active' => 'proses',
            'complaints' => Complaint::where('status', 'process')->get()
        ]);
    }

    public function done()
    {
        return view('dashboard.index', [
            'title' => 'Pengaduan selesai',
            'active' => 'selesai',
            'complaints' => Complaint::where('status', 'done')->get()
        ]);
    }
}

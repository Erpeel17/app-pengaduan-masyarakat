<?php

namespace App\Http\Controllers;

use App\Models\Complaint;
use App\Models\Response;
use Illuminate\Http\Request;

class adminController extends Controller
{
    public function index()
    {
        return view('dashboard.index', [
            'title' => 'Pengaduan',
            'active' => 'pengaduan',
            'complaints' => Complaint::where('status', '0')->get()
        ]);
    }
}

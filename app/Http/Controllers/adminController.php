<?php

namespace App\Http\Controllers;

use App\Models\Complaint;
use Illuminate\Http\Request;

class adminController extends Controller
{
    public function index()
    {
        if (auth()->user()->role == 'user') {
            return redirect('/');
        }

        return view('dashboard.index', [
            'title' => 'dashboard',
            'active' => 'pengaduan',
            'complaints' => Complaint::all()->where('status', '0')
        ]);
    }

    public function onProcess()
    {
        if (auth()->user()->role == 'user') {
            return redirect('/');
        }

        return view('dashboard.process', [
            'title' => 'dashboard',
            'active' => 'proses',
            'complaints' => Complaint::all()->where('status', 'process')
        ]);
    }

    public function done()
    {
        if (auth()->user()->role == 'user') {
            return redirect('/');
        }

        return view('dashboard.done', [
            'title' => 'dashboard',
            'active' => 'selesai',
            'complaints' => Complaint::all()->where('status', 'done')
        ]);
    }
}

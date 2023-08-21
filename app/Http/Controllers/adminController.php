<?php

namespace App\Http\Controllers;

use App\Models\Complaint;
use App\Models\Response;
use App\Models\User;
use Illuminate\Http\Request;

class adminController extends Controller
{
    public function index()
    {
        return view('dashboard.users', [
            'title' => 'admin dan petugas',
            'active' => 'officers',
            'users' => User::where('role', 'admin')->orWhere('role', 'officer')->get()
        ]);
    }

    public function create()
    {
    }

    public function users()
    {
        return view('dashboard.users', [
            'title' => 'Semua Pengguna',
            'active' => 'allUsers',
            'users' => User::where('role', 'user')->get()
        ]);
    }
}

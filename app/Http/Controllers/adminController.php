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
            'title' => 'Admin dan petugas',
            'active' => 'officers',
            'users' => User::where('role', 'admin')->orWhere('role', 'officer')->get()
        ]);
    }

    public function create()
    {
        return view('dashboard.createOfficer', [
            'title' => 'Buat admin atau petugas',
            'active' => 'createOfficer',
            'users' => User::where('role', 'admin')->orWhere('role', 'officer')->get()
        ]);
    }

    public function users()
    {
        return view('dashboard.users', [
            'title' => 'Semua pengguna',
            'active' => 'allUsers',
            'users' => User::where('role', 'user')->get()
        ]);
    }

    public function user(User $user)
    {
        return view('dashboard.user', [
            'title' => 'Halaman pengguna',
            'user' => $user,
            'complaints' => $user->complaints
        ]);
    }
}

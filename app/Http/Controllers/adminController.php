<?php

namespace App\Http\Controllers;

use App\Models\Complaint;
use App\Models\Response;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rule;

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
        if (auth()->user()->role != 'admin') {
            return redirect('/dashboard');
        }

        return view('dashboard.createOfficer', [
            'title' => 'Buat admin atau petugas',
            'active' => 'createOfficer',
            'users' => User::where('role', 'admin')->orWhere('role', 'officer')->get()
        ]);
    }

    public function users()
    {
        return view('dashboard.users', [
            'title' => 'Semua Pengguna',
            'active' => 'allUsers',
            'users' => User::where('role', 'user')->get()
        ]);
    }

    public function store(Request $request)
    {
        if (auth()->user()->role != 'admin') {
            return redirect('/dashboard');
        }

        $messages = [
            'username.not_regex' => 'Username cannot contain spaces.',
        ];

        $validated = $request->validate([
            'nik' => 'required|numeric',
            'name' => 'required|min:2|max:50',
            'username' => 'required|min:2|max:50|unique:users,name|not_regex:/\s/',
            'role' => ['required', Rule::in(['officer', 'admin'])],
            'password' => 'required|min:6|max:255'
        ], $messages);

        $validated['password'] = Hash::make($validated['password']);

        User::create($validated);

        return redirect()->intended('/dashboard/officers');
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

<?php

namespace App\Http\Controllers;

use App\Models\Complaint;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ComplaintController extends Controller
{
    public function index()
    {
        return view('index', [
            "title" => "pengaduan masyarakat",
            "user" => auth()->user(),
            "complaints" => auth()->user()->complaints
        ]);
    }

    public function create()
    {
        return view('create', [
            "title" => "buat pengaduan",
            "message" => "ini adalah halaman untuk membuat pengaduan"
        ]);
    }
}

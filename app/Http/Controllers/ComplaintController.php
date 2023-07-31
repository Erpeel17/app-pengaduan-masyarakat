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
            "user" => Auth::user()
        ]);
    }

    public function create()
    {
        return view('create');
    }
}

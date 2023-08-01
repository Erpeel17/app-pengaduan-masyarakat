<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class adminController extends Controller
{
    public function index()
    {
        if (auth()->user()->role == 'user') {
            return redirect('/');
        }

        return view('dashboard.index', [
            'title' => 'dashboard'
        ]);
    }
}

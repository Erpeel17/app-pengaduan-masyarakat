<?php

namespace App\Http\Controllers;

use App\Models\Complaint;
use App\Models\Response;
use Illuminate\Http\Request;

class adminController extends Controller
{
    public function index()
    {
        if (auth()->user()->role == 'user') {
            return redirect('/');
        }

        return view('dashboard.index', [
            'title' => 'Pengaduan',
            'active' => 'pengaduan',
            'complaints' => Complaint::where('status', '0')->get()
        ]);
    }

    public function onProcess()
    {
        if (auth()->user()->role == 'user') {
            return redirect('/');
        }

        return view('dashboard.index', [
            'title' => 'Pengaduan dalam proses',
            'active' => 'proses',
            'complaints' => Complaint::where('status', 'process')->get()
        ]);
    }

    public function done()
    {
        if (auth()->user()->role == 'user') {
            return redirect('/');
        }

        return view('dashboard.index', [
            'title' => 'Pengaduan selesai',
            'active' => 'selesai',
            'complaints' => Complaint::where('status', 'done')->get()
        ]);
    }

    public function response(Complaint $complaint)
    {
        if (auth()->user()->role == 'user') {
            return redirect('/');
        }

        if ($complaint->status == 'process') {
            $active = 'proses';
        } else if ($complaint->status == 'done') {
            $active = 'selesai';
        } else {
            $active = 'pengaduan';
        }

        return view('dashboard.response', [
            'title' => 'dashboard',
            'active' => $active,
            'complaint' => $complaint
        ]);
    }

    public function storeResponse(Request $request)
    {
        if (auth()->user()->role == 'user') {
            return redirect('/');
        }

        $validated = $request->validate([
            'complaint_id' => 'required',
            'content' => 'required',
        ]);

        $validated['user_id'] = auth()->user()->id;

        Complaint::find($request->complaint_id)->update(['status' => $request->status]);
        Response::create($validated);
        return redirect('/dashboard');
    }
}

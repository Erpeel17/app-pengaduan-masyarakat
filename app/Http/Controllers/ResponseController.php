<?php

namespace App\Http\Controllers;

use App\Models\Complaint;
use App\Models\Response;
use Illuminate\Http\Request;

class ResponseController extends Controller
{
    public function create(Complaint $complaint)
    {
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

    public function store(Request $request)
    {
        $validated = $request->validate([
            'complaint_id' => 'required',
            'content' => 'required',
        ]);

        $validated['user_id'] = auth()->user()->id;

        Complaint::find($request->complaint_id)->update(['status' => $request->status]);
        Response::create($validated);

        if ($request->status == 'process') {
            return redirect('/dashboard/process');
        } else if ($request->status == 'done') {
            return redirect('/dashboard/done');
        }
        return redirect('/dashboard');
    }
}

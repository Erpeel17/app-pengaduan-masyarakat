<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class registerController extends Controller
{
    public function index()
    {
        return view('register', [
            "title" => "register"
        ]);
    }

    public function store(Request $request)
    {
        $messages = [
            'username.not_regex' => 'Username cannot contain spaces.',
        ];

        $validated = $request->validate([
            'nik' => 'required|numeric',
            'name' => 'required|min:2|max:50',
            'username' => 'required|min:2|max:50|unique:users|not_regex:/\s/',
            'password' => 'required|min:6|max:255'
        ], $messages);

        $validated['password'] = Hash::make($validated['password']);

        User::create($validated);

        return redirect()->intended('/');
    }
}

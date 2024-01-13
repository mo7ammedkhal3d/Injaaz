<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class AccountSettingsController extends Controller
{
    public function index()
{
    $user = auth()->user();
    return view('account.settings', compact('user'));
}

public function update(Request $request)
{
    $user = auth()->user();

    $request->validate([
        'name' => 'required|string|max:255',
        'phone' => ['required', 'string', 'min:9', 'max:9', 'regex:/^7[73810][0-9]{7}$/'],
        'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
        'password' => 'nullable|string|min:8|confirmed',
        'bio' => 'nullable|string',
    ]);

    $user->name = $request->input('name');
    $user->phone = $request->input('phone');
    $user->email = $request->input('email');
    $user->bio = $request->input('bio');

    if ($request->filled('password')) {
        $user->password = bcrypt($request->input('password'));
    }

    $user->save();

    return redirect()->route('account.settings')->with('success', 'Account settings updated successfully.');
}
}

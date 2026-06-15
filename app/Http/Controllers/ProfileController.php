<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ProfileController extends Controller
{
    public function edit()
{
    $user = Auth::user();

    return view('profile.edit', compact('user'));
}

    public function update(Request $request)
    {
        $user = Auth::user();

        $request->validate([
            'name' => 'required',
            'email' => 'required|email',
        ]);

        $user->name = $request->name;
        $user->email = $request->email;

        $user->save();

        return redirect()
            ->route('profile.edit')
            ->with('success', 'Profile berhasil diperbarui');
    }

    public function destroy()
    {
        return redirect()
            ->route('dashboard');
    }
}
<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Redirect;

class ProfileController extends Controller
{
    public function show_profile()
    {
        $user = Auth::user();
        return view('profile.show', compact('user'));
    }

    public function edit_profile(Request $request)
    {
        $request->validate([
            'name' => 'required|max:20',
            'password' => 'required|confirmed'
        ]);
        $user = Auth::user();
        $user->update([
            'name' => $request->name,
            'password' => Hash::make($request->password),
        ]);
        return Redirect::route('show_profile');
    }
}

<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserAccountController extends Controller
{
    public function create()
    {
        return inertia('UserAccount/Create');
    }

    public function store(Request $request)
    {
        $user = User::create($request->validate([
           'email' => 'required|email|unique:users',
           'name' => 'required',
           'password' => 'required|min:8|confirmed'
        ]));
        Auth::login($user);
        event(new Registered($user));

        return redirect()->route('listing.index')->with('success', 'Account created!');
    }
}

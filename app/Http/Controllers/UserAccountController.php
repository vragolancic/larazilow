<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

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

        return redirect()->route('listing.index')->with('success', 'Account created!');
    }
}

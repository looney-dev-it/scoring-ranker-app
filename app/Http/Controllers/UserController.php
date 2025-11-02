<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class UserController extends Controller
{
    //

    public function showProfile()
    {
        $user = auth()->user();
        $profile = $user->profile;

        return view('profile.show', compact('user', 'profile'));
    }

    public function show($id)
    {
        $user = User::findOrFail($id);
        $profile = $user->profile;

        return view('user.show', compact('user', 'profile'));
    }

    public function myprofile()
    {
        return view('user.myprofile');
    }

    public function edit($id)
    {
        $user = User::findOrFail($id);
        return view('user.edit', compact('user'));
    }
}

<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules\Password;

class Register extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(Request $request)
    {
        // Validate the input
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => [
                'required',
                'confirmed',
                Password::min(8)
                    ->mixedCase()
                    ->numbers()
                    ->symbols()
                    ->uncompromised(),
            ],
        ], [
            'password.letters' => 'Your password must be : 8 char min, mixedCase, and at least one number & one symbol!',
            'password.mixed' => 'Your password must be : 8 char min, mixedCase, and at least one number & one symbol!',
            'password.numbers' => 'Your password must be : 8 char min, mixedCase, and at least one number & one symbol!',
            'password.symbols' => 'Your password must be : 8 char min, mixedCase, and at least one number & one symbol!',
            'password.uncompromised' => 'Your password is compromised! Please choose another one.',
        ]);
        
        // Create the user
        $user = User::create([
            'name' => $validated['name'],
            'email' => $validated['email'],
            'password' => Hash::make($validated['password']),
        ]);

        // Log them in
        Auth::login($user);

        // Redirect to home
        return redirect('/')->with('success', 'Welcome to Scoring Ranker!');
    }
}

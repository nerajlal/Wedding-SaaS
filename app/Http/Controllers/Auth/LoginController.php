<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;

class LoginController extends Controller
{
    /**
     * Handle the email-based login flow.
     */
    public function login(Request $request)
    {
        $request->validate([
            'email' => 'required|email'
        ]);

        $email = $request->input('email');

        // Find the user by email or create a new one
        $user = User::firstOrCreate(
            ['email' => $email],
            [
                'name' => explode('@', $email)[0], // Use part of email as name
                'password' => bcrypt(Str::random(16)), // Use a random password to prevent non-nullable database constraints
            ]
        );

        // Log the user in
        Auth::login($user, true); // true for "remember me"

        // Redirect to the intended page or wedding details
        return redirect()->intended(route('wedding.details.create'));
    }
}

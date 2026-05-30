<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class LoginController extends Controller
{
    /**
     * Handle the email + password login flow.
     */
    public function login(Request $request)
    {
        $request->validate([
            'email'    => 'required|email',
            'password' => 'required|string',
        ]);

        $email    = $request->input('email');
        $password = $request->input('password');

        // ── Hardcoded admin credentials (temporary) ──────────────────────────
        // TODO: Remove this block and integrate proper auth later.
        if ($email === 'admin@gmail.com' && $password === 'password') {
            $user = User::firstOrCreate(
                ['email' => $email],
                [
                    'name'     => 'Admin',
                    'password' => bcrypt('password'),
                ]
            );
            Auth::login($user, true);

            // If the user selected a template before logging in, save it
            if ($request->filled('selected_template')) {
                session(['wedding_template' => $request->input('selected_template')]);
            }

            return redirect()->intended(route('wedding.entry'));
        }
        // ─────────────────────────────────────────────────────────────────────

        // Return to home page with an error — modal will auto-open via @if($errors->any())
        return redirect('/')->withErrors([
            'email' => 'Invalid email or password. Please try again.',
        ])->withInput($request->only('email'));
    }
}

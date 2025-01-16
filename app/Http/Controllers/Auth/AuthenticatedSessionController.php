<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\LoginRequest;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;

class AuthenticatedSessionController extends Controller
{
    /**
     * Display the login view.
     */
    public function create(): View
    {
        return view('auth.login');
    }

    /**
     * Handle an incoming authentication request.
     */
    public function store(Request $request)
    {
        $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required'],
        ]);

        // Probeer de gebruiker in te loggen
        if (
            Auth::attempt([
                'email' => $request->email,
                'password' => $request->password,
            ], $request->remember)
        ) {
            $request->session()->regenerate();

            // Check of de gebruiker een admin is
            if (Auth::user()->is_admin) {
                return redirect()->route('admin.dashboard'); // Als admin, stuur door naar admin-dashboard
            }

            // Anders, doorverwijzen naar de normale dashboard
            return redirect()->route('dashboard');
        }

        // Foutmelding als inloggen niet lukt
        return back()->withErrors([
            'email' => __('De opgegeven gegevens komen niet overeen met onze records.'),
        ]);
    }

    public function destroy(Request $request)
    {
        Auth::logout(); // Log out de gebruiker
        $request->session()->invalidate(); // Vernietig de sessie
        $request->session()->regenerateToken(); // Genereer een nieuwe CSRF-token voor beveiliging

        return redirect('/'); // Redirect naar de homepage of loginpagina
    }

}

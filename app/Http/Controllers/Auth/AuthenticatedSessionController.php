<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\LoginRequest;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\ValidationException; // Toegevoegde import
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
    Log::info('Store functie aangeroepen voor inloggen.');

    $request->validate([
        'email' => ['required', 'email'],
        'password' => ['required'],
    ]);

    if (Auth::attempt([
        'email' => $request->email,
        'password' => $request->password,
    ], $request->remember)) {
        $request->session()->regenerate();

        Log::info('Ingelogd als gebruiker', [
            'user_id' => Auth::user()->id,
            'user_email' => Auth::user()->email,
        ]);

        if (Auth::user()->is_admin) {
            Log::info('Admin gebruiker ingelogd, doorverwijzen naar admin-dashboard');
            return redirect()->route('admin.dashboard');
        }

        return redirect()->route('dashboard');
    }

    throw ValidationException::withMessages([
        'email' => __('De opgegeven gegevens komen niet overeen met onze records.'),
    ]);
}

    /**
     * Destroy an authenticated session.
     */
    public function destroy(Request $request)
    {
        Auth::guard('web')->logout();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect('/');
    }
}

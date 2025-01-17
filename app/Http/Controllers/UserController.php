<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class UserController extends Controller
{
    // Toon de lijst van alle gebruikers
    public function index()
    {
        $users = User::all();
        return view('users.index', compact('users'));
    }

    // Wijzig de admin status van de gebruiker
    public function updateAdminStatus(Request $request, User $user)
    {
        // Valideer de admin status (zorg ervoor dat de waarde 0 of 1 is)
        $request->validate([
            'is_admin' => ['required', 'boolean'],
        ]);

        // Log de huidige status voordat we de wijziging doorvoeren
        Log::info('Admin status wijzigen', [
            'user_id' => $user->id,
            'current_is_admin' => $user->is_admin,
            'new_is_admin' => $request->input('is_admin'),
        ]);

        // Werk de is_admin status bij
        $user->is_admin = $request->input('is_admin');
        $user->save();

        // Log de wijziging na de update
        Log::info('Admin status succesvol opgeslagen', [
            'user_id' => $user->id,
            'new_is_admin' => $user->is_admin,
        ]);

        // Redirect terug naar de gebruikerslijst
        return redirect()->route('users.index')->with('status', 'Admin status succesvol bijgewerkt!');
    }

    // Verwijder de gebruiker
    public function destroy(User $user)
    {
        // Controleer of de ingelogde gebruiker admin is en of de gebruiker niet zichzelf verwijdert
        if (auth()->user()->is_admin && auth()->user()->id !== $user->id) {
            $user->delete();
        }

        return redirect()->route('users.index');
    }
}

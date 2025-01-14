<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;
use App\Models\User;

class ProfileController extends Controller
{
    /**
     * Display the user's profile form.
     */
    public function edit(Request $request): View
    {
        return view('profile.edit', [
            'user' => $request->user(),
        ]);
    }

    /**
     * Update the user's profile information.
     */
    public function update(Request $request): RedirectResponse
{
    // Validatie van de inkomende data
    $request->validate([
        'username' => ['required', 'string', 'max:255', 'unique:users,username,' . Auth::id()],
        'name' => ['required', 'string', 'max:255'],
        'email' => ['required', 'email', 'max:255', 'unique:users,email,' . Auth::id()],
        'about_me' => ['nullable', 'string'],
        'birthday' => ['nullable', 'date'],
        'profile_photo' => ['nullable', 'image', 'mimes:jpg,png,jpeg', 'max:2048'],
    ]);

    $user = $request->user();

    // Update de naam en e-mail
    $user->name = $request->input('name');
    $user->email = $request->input('email');

    // Update de basis gebruikersinformatie
    $user->username = $request->input('username');
    $user->about_me = $request->input('about_me');
    $user->birthday = $request->input('birthday');

    // Handle de profielfoto upload
    if ($request->hasFile('profile_photo')) {
        // Verwijder de oude profielfoto als die bestaat
        if ($user->profile_photo_path) {
            Storage::delete('public/' . $user->profile_photo_path);
        }

        // Sla de nieuwe profielfoto op
        $photoPath = $request->file('profile_photo')->store('profile_photos', 'public');
        $user->profile_photo_path = $photoPath;
    }

    // Sla de wijzigingen op
    $user->save();

    // Redirect naar de profielpagina met een succesmelding
    return Redirect::route('profile.edit')->with('status', 'Profiel succesvol bijgewerkt!');
}


    /**
     * Delete the user's account.
     */
    public function destroy(Request $request): RedirectResponse
    {
        $request->validateWithBag('userDeletion', [
            'password' => ['required', 'current_password'],
        ]);

        $user = $request->user();

        // Logout de gebruiker
        Auth::logout();

        // Verwijder de gebruiker
        $user->delete();

        // Invalidate en regenereer de sessie token
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return Redirect::to('/');
    }
}

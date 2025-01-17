<!DOCTYPE html>
<html lang="nl">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard - Brewtopia</title>
    @vite('resources/css/app.css')
</head>

<body class="bg-gray-50 font-sans text-gray-900">

    <div class="min-h-screen flex flex-col">
        <!-- Navbar -->
        <header class="bg-yellow-500 shadow-lg">
            <nav class="max-w-7xl mx-auto px-6 py-4 flex justify-between items-center">
                <a href="/"
                    class="text-3xl font-semibold text-white hover:text-yellow-100 transition-colors">Brewtopia</a>
                <div class="space-x-6 flex items-center">
                    <a href="{{ route('admin.dashboard') }}"
                        class="text-white hover:text-yellow-100 transition-colors">Admin Dashboard</a>

                    <!-- Dropdown voor profiel -->
                    <div class="relative">
                        <button id="profileDropdownButton"
                            class="flex items-center text-white hover:text-yellow-100 transition-colors">
                            @if (Auth::user()->profile_photo_path)
                                <img src="{{ Storage::url(Auth::user()->profile_photo_path) }}" alt="Profielfoto"
                                    class="w-8 h-8 rounded-full mr-2">
                            @else
                                <img src="https://www.gravatar.com/avatar/{{ md5(strtolower(Auth::user()->email)) }}"
                                    alt="Profielfoto" class="w-8 h-8 rounded-full mr-2">
                            @endif
                            {{ Auth::user()->name }}
                            <svg class="w-4 h-4 ml-1" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                                xmlns="http://www.w3.org/2000/svg">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M19 9l-7 7-7-7"></path>
                            </svg>
                        </button>
                        <div id="profileDropdown"
                            class="absolute right-0 mt-2 w-48 bg-white border border-gray-200 rounded-lg shadow-lg z-10 hidden">
                            <a href="{{ route('profile.edit') }}"
                                class="block px-4 py-2 text-gray-800 hover:bg-gray-100">Profiel bewerken</a>
                            <a href="{{ route('settings') }}"
                                class="block px-4 py-2 text-gray-800 hover:bg-gray-100">Instellingen</a>
                            <a href="{{ route('logout') }}"
                                onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                                Uitloggen
                            </a>
                            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                @csrf
                            </form>
                        </div>
                    </div>
                </div>
            </nav>
        </header>

        <!-- Dashboard Content -->
        <main class="flex-grow">
            <div class="max-w-7xl mx-auto px-6 py-12">
                <h1 class="text-4xl font-bold text-gray-800 mb-8">Welkom op het Admin Dashboard,
                    {{ Auth::user()->name }}!
                </h1>

                <!-- Dashboard Grid -->
                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
                    <!-- Gebruikers Overzicht -->
                    <div class="bg-white shadow-lg rounded-lg p-6 flex flex-col justify-between h-full">
                        <h2 class="text-xl font-bold text-gray-800 mb-4">Overzicht van Gebruikers</h2>
                        <p class="text-gray-600 mb-4">Bekijk het aantal geregistreerde gebruikers en hun status.</p>

                        <div>
                            <p class="text-lg text-gray-800 font-semibold">Aantal Gebruikers:</p>
                            <p class="text-2xl font-bold text-yellow-600">{{ \App\Models\User::count() }}</p>
                        </div>

                        <div class="mt-6">
                            <p class="text-lg text-gray-800 font-semibold mb-2">Recentste Gebruikers:</p>
                            <ul class="space-y-2">
                                @foreach (\App\Models\User::latest()->take(6)->get() as $user)
                                    <li class="flex items-center justify-between text-gray-700">
                                        <span>{{ $user->name }}</span>
                                        <span class="text-sm text-gray-400">{{ $user->created_at->format('d M Y') }}</span>
                                    </li>
                                @endforeach
                            </ul>
                        </div>

                        <div class="mt-6 text-center">
                            <a href="{{ route('users.index') }}"
                                class="text-yellow-600 hover:text-yellow-700 font-medium">Bekijk Meer &rarr;</a>
                        </div>
                    </div>

                    <!-- Nieuwe Gebruiker Toevoegen -->
                    <div class="bg-white shadow-lg rounded-lg p-6 col-span-2">
                        <h2 class="text-xl font-bold text-gray-800 mb-4">Nieuwe Gebruiker Toevoegen</h2>
                        <p class="text-gray-600 mb-4">Voeg een nieuwe gebruiker toe aan de website.</p>
                        <form method="POST" action="{{ route('users.store') }}">
                            @csrf
                            <div class="mb-4">
                                <label for="name" class="block text-gray-800 font-medium mb-2">Naam</label>
                                <input type="text" name="name" id="name" required
                                    class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-yellow-500 focus:border-yellow-500">
                            </div>

                            <div class="mb-4">
                                <label for="email" class="block text-gray-800 font-medium mb-2">E-mail</label>
                                <input type="email" name="email" id="email" required
                                    class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-yellow-500 focus:border-yellow-500">
                            </div>

                            <div class="mb-4">
                                <label for="password" class="block text-gray-800 font-medium mb-2">Wachtwoord</label>
                                <input type="password" name="password" id="password" required
                                    class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-yellow-500 focus:border-yellow-500">
                            </div>

                            <div class="mb-4">
                                <label for="password_confirmation" class="block text-gray-800 font-medium mb-2">Bevestig
                                    Wachtwoord</label>
                                <input type="password" name="password_confirmation" id="password_confirmation" required
                                    class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-yellow-500 focus:border-yellow-500">
                            </div>

                            <div class="mb-4">
                                <label for="is_admin" class="block text-gray-800 font-medium mb-2">Admin Status</label>
                                <select name="is_admin" id="is_admin"
                                    class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-yellow-500 focus:border-yellow-500">
                                    <option value="1">Admin</option>
                                    <option value="0">Geen Admin</option>
                                </select>
                            </div>

                            <button type="submit"
                                class="w-full bg-yellow-600 hover:bg-yellow-700 text-white py-2 px-4 rounded-lg transition-colors">Maak
                                Gebruiker Aan</button>
                        </form>
                    </div>



                    <!-- Nieuwsartikel Toevoegen -->
                    <div class="bg-white shadow-lg rounded-lg p-6">
                        <h2 class="text-xl font-bold text-gray-800 mb-4">Nieuwsartikel Toevoegen</h2>
                        <p class="text-gray-600 mb-4">Voeg een nieuw nieuwsartikel toe aan de website voor de gebruikers
                            om te lezen.</p>
                        <a href="{{ route('articles.create') }}"
                            class="text-yellow-600 hover:text-yellow-700 font-medium">Voeg Nieuwsartikel toe &rarr;</a>
                    </div>

                    <!-- Nieuwsartikelen Beheren -->
                    <div class="bg-white shadow-lg rounded-lg p-6">
                        <h2 class="text-xl font-bold text-gray-800 mb-4">Nieuwsartikelen Beheren</h2>
                        <p class="text-gray-600 mb-4">Bekijk, bewerk en verwijder nieuwsartikelen.</p>

                        <!-- Lijst van nieuwsartikelen -->
                        <ul class="space-y-2">
                            @foreach (\App\Models\Article::latest()->take(3)->get() as $article)
                                <li class="flex justify-between items-center text-gray-700">
                                    <div>
                                        <p class="font-semibold">{{ $article->title }}</p>
                                        <p class="text-sm text-gray-400">{{ $article->published_at->format('d M Y') }}</p>
                                        </div>

                                    <!-- Bewerken en Verwijderen Knoppen -->
                                    <div class="space-x-2">
                                        <a href="{{ route('articles.edit', $article->id) }}"
                                            class="text-yellow-600 hover:text-yellow-700 font-medium">Bewerken</a>

                                        <form action="{{ route('articles.destroy', $article->id) }}" method="POST"
                                            style="display: inline;">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit"
                                                class="text-red-600 hover:text-red-700 font-medium">Verwijderen</button>
                                        </form>
                                    </div>
                                </li>
                            @endforeach
                        </ul>

                        <!-- Bekijk Meer Knop -->
                        <div class="mt-6 text-center">
                            <a href="{{ route('articles.index') }}"
                                class="text-yellow-600 hover:text-yellow-700 font-medium">Bekijk Meer &rarr;</a>
                        </div>
                    </div>


                    <!-- Nieuw Bier Toevoegen -->
                    <div class="bg-white shadow-lg rounded-lg p-6">
                        <h2 class="text-xl font-bold text-gray-800 mb-4">Nieuw Bier Toevoegen</h2>
                        <p class="text-gray-600 mb-4">Voeg een nieuw bier toe aan de database voor andere gebruikers om
                            te recenseren.</p>
                        <a href="{{ route('beers.create') }}"
                            class="text-yellow-600 hover:text-yellow-700 font-medium">Voeg Bier toe &rarr;</a>
                    </div>

                    <!-- Beheer van Bieren -->
                    <div class="bg-white shadow-lg rounded-lg p-6">
                        <h2 class="text-xl font-bold text-gray-800 mb-4">Beheer van Bieren</h2>
                        <p class="text-gray-600 mb-4">Bekijk en beheer alle bieren in de database, inclusief het
                            bewerken en verwijderen van bestaande bieren.</p>
                        <a href="{{ route('beers.list') }}"
                            class="text-yellow-600 hover:text-yellow-700 font-medium">Bekijk Bieren &rarr;</a>
                    </div>

                    <!-- Instellingen -->
                    <div class="bg-white shadow-lg rounded-lg p-6">
                        <h2 class="text-xl font-bold text-gray-800 mb-4">Instellingen</h2>
                        <p class="text-gray-600 mb-4">Beheer de algemene instellingen van de website.</p>
                        <a href="{{ route('settings') }}"
                            class="text-yellow-600 hover:text-yellow-700 font-medium">Bewerk Instellingen &rarr;</a>
                    </div>
                </div>
            </div>
        </main>

        <!-- Footer -->
        <footer class="bg-yellow-500 text-white text-center py-6">
            <p>&copy; {{ date('Y') }} Brewtopia. Alle rechten voorbehouden.</p>
        </footer>
    </div>

    <script>
        // Toggle dropdown visibility
        const dropdownButton = document.getElementById('profileDropdownButton');
        const dropdownMenu = document.getElementById('profileDropdown');

        dropdownButton.addEventListener('click', () => {
            dropdownMenu.classList.toggle('hidden');
        });
    </script>
</body>

</html>
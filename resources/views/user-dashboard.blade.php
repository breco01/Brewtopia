<!DOCTYPE html>
<html lang="nl">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard - Brewtopia</title>
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
                    <a href="{{ route('dashboard') }}"
                        class="text-white hover:text-yellow-100 transition-colors">Dashboard</a>

                    <!-- Dropdown voor profiel -->
                    <div class="relative">
                        <button id="profileDropdownButton"
                            class="flex items-center text-white hover:text-yellow-100 transition-colors">
                            @if (Auth::user()->profile_photo_path)
                                <!-- Als de profielfoto bestaat, toon deze -->
                                <img src="{{ Storage::url(Auth::user()->profile_photo_path) }}" alt="Profielfoto"
                                    class="w-8 h-8 rounded-full mr-2">
                            @else
                                <!-- Anders toon de Gravatar afbeelding -->
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
                        <!-- Dropdown Menu -->
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
                <h1 class="text-4xl font-bold text-gray-800 mb-8">Welkom op je dashboard, {{ Auth::user()->name }}!</h1>

                <!-- Dashboard Grid -->
                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
                    <!-- Mijn Bier Recensies -->
                    <div class="bg-white shadow-lg rounded-lg p-6">
                        <h2 class="text-xl font-bold text-gray-800 mb-4">Mijn Bier Recensies</h2>
                        <p class="text-gray-600 mb-4">Bekijk en bewerk recensies die je hebt geschreven voor
                            verschillende bieren.</p>
                        <a href="{{ route('reviews.index') }}"
                            class="text-yellow-600 hover:text-yellow-700 font-medium">Beheer Recensies &rarr;</a>
                    </div>

                    <!-- Voeg een Bier toe -->
                    <div class="bg-white shadow-lg rounded-lg p-6">
                        <h2 class="text-xl font-bold text-gray-800 mb-4">Voeg een Nieuw Bier toe</h2>
                        <p class="text-gray-600 mb-4">Draag bij aan de database door een nieuw bier toe te voegen voor
                            anderen om te recenseren.</p>
                        <a href="{{ route('beers.create') }}"
                            class="text-yellow-600 hover:text-yellow-700 font-medium">Voeg Bier toe &rarr;</a>
                    </div>

                    <!-- Mijn Bier Lijst -->
                    <div class="bg-white shadow-lg rounded-lg p-6">
                        <h2 class="text-xl font-bold text-gray-800 mb-4">Mijn Bier Lijst</h2>
                        <p class="text-gray-600 mb-4">Houd bij welke bieren je hebt geproefd of die je in de toekomst
                            wilt proberen.</p>
                        <a href="{{ route('beers.list') }}"
                            class="text-yellow-600 hover:text-yellow-700 font-medium">Bekijk Mijn Lijst &rarr;</a>
                    </div>

                    <!-- Hoogst Beoordeelde Bieren -->
                    <div class="bg-white shadow-lg rounded-lg p-6">
                        <h2 class="text-xl font-bold text-gray-800 mb-4">Hoogst Beoordeelde Bieren</h2>
                        <p class="text-gray-600 mb-4">Bekijk de hoogst beoordeelde bieren uit de Brewtopia gemeenschap.
                        </p>
                        <a href="{{ route('beers.top') }}"
                            class="text-yellow-600 hover:text-yellow-700 font-medium">Verken Hoogst Beoordeelde Bieren
                            &rarr;</a>
                    </div>

                    <!-- Gemeenschap -->
                    <div class="bg-white shadow-lg rounded-lg p-6">
                        <h2 class="text-xl font-bold text-gray-800 mb-4">Gemeenschap</h2>
                        <p class="text-gray-600 mb-4">Verbonden raken met andere bierliefhebbers en je ervaringen delen.
                        </p>
                        <a href="{{ route('community.index') }}"
                            class="text-yellow-600 hover:text-yellow-700 font-medium">Word Lid van de Gemeente
                            &rarr;</a>
                    </div>

                    <!-- Instellingen -->
                    <div class="bg-white shadow-lg rounded-lg p-6">
                        <h2 class="text-xl font-bold text-gray-800 mb-4">Instellingen</h2>
                        <p class="text-gray-600 mb-4">Beheer je accountvoorkeuren en profielinformatie.</p>
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
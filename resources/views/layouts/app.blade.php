<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Brewtopia') }}</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

        <!-- Scripts -->
        @vite(['resources/css/app.css', 'resources/js/app.js'])
    </head>
    <body class="bg-gray-50 font-sans text-gray-900">

        <div class="min-h-screen flex flex-col">
            <!-- Navbar -->
            <header class="bg-yellow-500 shadow-lg">
                <nav class="max-w-7xl mx-auto px-6 py-4 flex justify-between items-center">
                    <a href="/" class="text-3xl font-semibold text-white hover:text-yellow-100 transition-colors">Brewtopia</a>
                    <div class="space-x-6 flex items-center">
                        <a href="{{ route('dashboard') }}" class="text-white hover:text-yellow-100 transition-colors">Dashboard</a>

                        <!-- Dropdown voor profiel -->
                        <div class="relative">
                            <button id="profileDropdownButton" class="flex items-center text-white hover:text-yellow-100 transition-colors">
                                <img src="https://www.gravatar.com/avatar/{{ md5(strtolower(Auth::user()->email)) }}" alt="Profielfoto" class="w-8 h-8 rounded-full mr-2">
                                {{ Auth::user()->name }}
                                <svg class="w-4 h-4 ml-1" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path></svg>
                            </button>
                            <!-- Dropdown Menu -->
                            <div id="profileDropdown" class="absolute right-0 mt-2 w-48 bg-white border border-gray-200 rounded-lg shadow-lg z-10 hidden">
                                <a href="{{ route('profile.edit') }}" class="block px-4 py-2 text-gray-800 hover:bg-gray-100">Profiel bewerken</a>
                                <a href="{{ route('settings') }}" class="block px-4 py-2 text-gray-800 hover:bg-gray-100">Instellingen</a>
                                <a href="{{ route('logout') }}" class="block px-4 py-2 text-gray-800 hover:bg-gray-100">Uitloggen</a>
                            </div>
                        </div>
                    </div>
                </nav>
            </header>

            <!-- Page Heading -->
            @isset($header)
                <header class="bg-white shadow">
                    <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
                        {{ $header }}
                    </div>
                </header>
            @endisset

            <!-- Page Content -->
            <main>
                {{ $slot }}
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

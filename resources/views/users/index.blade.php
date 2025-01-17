<!DOCTYPE html>
<html lang="nl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gebruikers Overzicht - Brewtopia</title>
    @vite('resources/css/app.css')
</head>
<body class="bg-gray-50 font-sans text-gray-900">

    <div class="min-h-screen flex flex-col">
        <!-- Navbar -->
        <header class="bg-yellow-500 shadow-lg">
            <nav class="max-w-7xl mx-auto px-6 py-4 flex justify-between items-center">
                <a href="/" class="text-3xl font-semibold text-white hover:text-yellow-100 transition-colors">Brewtopia</a>
                <div class="space-x-6 flex items-center">
                    <a href="{{ route('admin.dashboard') }}" class="text-white hover:text-yellow-100 transition-colors">Admin Dashboard</a>
                </div>
            </nav>
        </header>

        <!-- Users List -->
        <main class="flex-grow">
            <div class="max-w-7xl mx-auto px-6 py-12">
                <h1 class="text-4xl font-bold text-gray-800 mb-8">Overzicht van Gebruikers</h1>

                <!-- Bevestigingstekst -->
                @if (session('status'))
                    <div id="status-message" class="bg-green-500 text-white p-2 rounded mb-4">
                        {{ session('status') }}
                    </div>
                @endif

                <div class="bg-white shadow-lg rounded-lg p-6">
                    <h2 class="text-xl font-bold text-gray-800 mb-4">Alle Gebruikers</h2>

                    <table class="min-w-full table-auto">
                        <thead>
                            <tr class="border-b">
                                <th class="px-4 py-2 text-left">Profielfoto</th>
                                <th class="px-4 py-2 text-left">Naam</th>
                                <th class="px-4 py-2 text-left">E-mail</th>
                                <th class="px-4 py-2 text-left">Admin Status</th>
                                <th class="px-4 py-2 text-left">Acties</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($users as $user)
                                <tr class="border-b">
                                    <td class="px-4 py-2">
                                        <!-- Profielfoto weergeven -->
                                        @if ($user->profile_photo_path)
                                            <img src="{{ Storage::url($user->profile_photo_path) }}" alt="Profielfoto" class="w-10 h-10 rounded-full">
                                        @else
                                            <img src="https://www.gravatar.com/avatar/{{ md5(strtolower($user->email)) }}" alt="Profielfoto" class="w-10 h-10 rounded-full">
                                        @endif
                                    </td>
                                    <td class="px-4 py-2">{{ $user->name }}</td>
                                    <td class="px-4 py-2">{{ $user->email }}</td>
                                    <td class="px-4 py-2">
                                        <!-- Admin status formulier -->
                                        <form action="{{ route('users.updateAdminStatus', $user) }}" method="POST" class="inline-block">
                                            @csrf
                                            @method('PUT')
                                            <select name="is_admin" id="is_admin-{{ $user->id }}" class="form-select">
                                                <option value="1" {{ $user->is_admin ? 'selected' : '' }}>Admin</option>
                                                <option value="0" {{ !$user->is_admin ? 'selected' : '' }}>Geen Admin</option>
                                            </select>
                                            <button type="submit" class="bg-yellow-500 text-white py-2 px-4 rounded-full hover:bg-yellow-600 mt-2">
                                                Opslaan
                                            </button>
                                        </form>
                                    </td>
                                    <td class="px-4 py-2">
                                        <!-- Verwijderknop -->
                                        <form action="{{ route('users.destroy', $user) }}" method="POST" class="inline-block">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="bg-red-500 text-white py-2 px-4 rounded-full hover:bg-red-600 focus:outline-none">
                                                Verwijder
                                            </button>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>

                </div>
            </div>
        </main>

        <footer class="bg-yellow-500 text-white text-center py-6">
            <p>&copy; {{ date('Y') }} Brewtopia. Alle rechten voorbehouden.</p>
        </footer>
    </div>

    <script>
        setTimeout(function() {
            const statusMessage = document.getElementById('status-message');
            if (statusMessage) {
                statusMessage.style.display = 'none';
            }
        }, 5000);
    </script>
</body>
</html>

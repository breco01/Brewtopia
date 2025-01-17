<!DOCTYPE html>
<html lang="nl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Nieuwsartikel Toevoegen - Brewtopia</title>
    @vite('resources/css/app.css')
</head>
<body class="bg-gray-50 font-sans text-gray-900">

    <div class="min-h-screen flex flex-col">
        <header class="bg-yellow-500 shadow-lg">
            <nav class="max-w-7xl mx-auto px-6 py-4 flex justify-between items-center">
                <a href="/" class="text-3xl font-semibold text-white hover:text-yellow-100 transition-colors">Brewtopia</a>
                <div class="space-x-6 flex items-center">
                    <a href="{{ route('admin.dashboard') }}" class="text-white hover:text-yellow-100 transition-colors">Admin Dashboard</a>
                </div>
            </nav>
        </header>

        <!-- Nieuwsartikel Formulier -->
        <main class="flex-grow">
            <div class="max-w-7xl mx-auto px-6 py-12">
                <h1 class="text-4xl font-bold text-gray-800 mb-8">Voeg een nieuw Nieuwsartikel toe</h1>

                <form method="POST" action="{{ route('articles.store') }}">
                    @csrf
                    <!-- Voeg hier je formulier voor het toevoegen van een nieuwsartikel toe -->
                    <div class="mb-6">
                        <label for="title" class="block text-gray-700">Titel</label>
                        <input type="text" id="title" name="title" class="mt-1 block w-full" required />
                    </div>

                    <div class="mb-6">
                        <label for="content" class="block text-gray-700">Inhoud</label>
                        <textarea id="content" name="content" class="mt-1 block w-full" required></textarea>
                    </div>

                    <button type="submit" class="bg-yellow-500 text-white px-6 py-3 rounded-full hover:bg-yellow-600">Publiceer Artikel</button>
                </form>
            </div>
        </main>

        <footer class="bg-yellow-500 text-white text-center py-6">
            <p>&copy; {{ date('Y') }} Brewtopia. Alle rechten voorbehouden.</p>
        </footer>
    </div>

</body>
</html>

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
        <!-- Navbar -->
        <header class="bg-yellow-500 shadow-lg">
            <nav class="max-w-7xl mx-auto px-6 py-4 flex justify-between items-center">
                <a href="{{ route('admin.dashboard') }}" class="text-3xl font-semibold text-white hover:text-yellow-100 transition-colors">Brewtopia</a>
            </nav>
        </header>

        <div class="mb-4 text-center">
            <a href="{{ route('admin.dashboard') }}"
                class="text-yellow-500 hover:text-yellow-600 font-semibold text-lg">
                ← Terug naar Admin Dashboard
            </a>
        </div>

        <!-- News Article Form -->
        <main class="flex-grow flex items-center justify-center">
            <div class="bg-white p-8 rounded-lg shadow-lg max-w-4xl w-full">
                <h2 class="text-3xl font-bold text-center text-gray-800 mb-6">Nieuwsartikel Toevoegen</h2>

                <form method="POST" action="{{ route('articles.store') }}" enctype="multipart/form-data">
                    @csrf

                    <div class="mb-6">
                        <label for="title" class="block text-gray-800 font-medium mb-2">Titel</label>
                        <input type="text" name="title" id="title" required class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-yellow-500 focus:border-yellow-500" />
                    </div>

                    <div class="mb-6">
                        <label for="content" class="block text-gray-800 font-medium mb-2">Inhoud</label>
                        <textarea name="content" id="content" rows="4" required class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-yellow-500 focus:border-yellow-500"></textarea>
                    </div>

                    <div class="mb-6">
                        <label for="image" class="block text-gray-800 font-medium mb-2">Afbeelding (optioneel)</label>
                        <input type="file" name="image" id="image" accept="image/*" class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-yellow-500 focus:border-yellow-500" />
                    </div>

                    <div>
                        <button type="submit" class="w-full bg-yellow-600 hover:bg-yellow-700 text-white py-2 px-4 rounded-lg transition-colors">Artikel Toevoegen</button>
                    </div>
                </form>
            </div>
        </main>

        <footer class="bg-yellow-500 text-white text-center py-6">
            <p>&copy; {{ date('Y') }} Brewtopia. Alle rechten voorbehouden.</p>
        </footer>
    </div>

</body>
</html>

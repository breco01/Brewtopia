<!DOCTYPE html>
<html lang="nl">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Beheer FAQ's - Brewtopia</title>
    @vite('resources/css/app.css')
</head>

<body class="bg-gray-50 font-sans text-gray-900">

    <div class="min-h-screen flex flex-col">
        <!-- Navbar -->
        <header class="bg-yellow-500 shadow-lg">
            <nav class="max-w-7xl mx-auto px-6 py-4 flex justify-between items-center">
                <a href="{{ route('admin.dashboard') }}"
                    class="text-3xl font-semibold text-white hover:text-yellow-100 transition-colors">Brewtopia</a>
            </nav>
        </header>

        <div class="mb-4 text-center">
            <a href="{{ route('admin.dashboard') }}"
                class="text-yellow-500 hover:text-yellow-600 font-semibold text-lg">
                ← Terug naar Admin Dashboard
            </a>
        </div>

        <!-- Dashboard Content -->
        <main class="flex-grow">
            <div class="max-w-7xl mx-auto px-6 py-12">
                <h1 class="text-4xl font-bold text-gray-800 mb-8">Beheer FAQ's</h1>

                <!-- Lijst van FAQ's -->
                <div class="bg-white shadow-lg rounded-lg p-6">
                    <ul class="space-y-4">
                        @foreach ($faqs as $faq)
                        <li class="flex justify-between items-center text-gray-700">
                            <div>
                                <p class="font-semibold">{{ $faq->question }}</p>
                                <p class="text-sm text-gray-400">{{ Str::limit($faq->answer, 100) }}</p>
                            </div>

                            <!-- Bewerken en Verwijderen Knoppen -->
                            <div class="space-x-2">
                                <a href="{{ route('faqs.edit', $faq->id) }}"
                                    class="text-yellow-600 hover:text-yellow-700 font-medium">Bewerken</a>

                                <form action="{{ route('faqs.destroy', $faq->id) }}" method="POST"
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
                </div>

                <!-- Voeg nieuwe FAQ toe -->
                <div class="mt-8 text-center">
                    <a href="{{ route('faqs.create') }}"
                        class="bg-yellow-600 text-white py-2 px-4 rounded-lg hover:bg-yellow-700">Voeg Nieuwe FAQ Toe</a>
                </div>
            </div>
        </main>

        <!-- Footer -->
        <footer class="bg-yellow-500 text-white text-center py-6">
            <p>&copy; {{ date('Y') }} Brewtopia. Alle rechten voorbehouden.</p>
        </footer>
    </div>

</body>

</html>

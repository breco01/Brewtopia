<!DOCTYPE html>
<html lang="nl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>FAQ's - Brewtopia</title>
    @vite('resources/css/app.css')
</head>
<body class="bg-gray-50 font-sans text-gray-900">
    <div class="min-h-screen flex flex-col">
        <!-- Navbar -->
        <header class="bg-yellow-500 shadow-lg">
            <nav class="max-w-7xl mx-auto px-6 py-4 flex justify-between items-center">
                <a href="/" class="text-3xl font-semibold text-white hover:text-yellow-100 transition-colors">Brewtopia</a>
                <div class="space-x-6 flex items-center">
                    <a href="{{ route('faqs.index') }}" class="text-white hover:text-yellow-100 transition-colors">FAQ</a>
                    <a href="{{ route('login') }}" class="text-white hover:bg-yellow-600 px-4 py-2 rounded-full transition-colors">Login</a>
                    <a href="{{ route('register') }}" class="bg-yellow-600 hover:bg-yellow-700 text-white px-4 py-2 rounded-full transition-colors">Register</a>
                </div>
            </nav>
        </header>

        <!-- FAQ Section -->
        <main class="flex-grow">
            <div class="max-w-7xl mx-auto px-6 py-12">
                <h1 class="text-4xl font-bold text-gray-800 mb-8">Veelgestelde Vragen</h1>
                <div class="space-y-8">
                    @foreach ($faqs as $faq)
                        <div class="bg-white p-6 rounded-lg shadow-lg">
                            <h3 class="text-2xl font-semibold text-gray-800 mb-4">{{ $faq->question }}</h3>
                            <p class="text-gray-600">{{ $faq->answer }}</p>
                        </div>
                    @endforeach
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

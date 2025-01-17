<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Brewtopia</title>
    @vite('resources/css/app.css')
</head>

<body class="bg-gray-50 font-sans text-gray-900">

    <div class="min-h-screen flex flex-col">
        <!-- Navbar -->
        <header class="bg-yellow-500 shadow-lg">
            <nav class="max-w-7xl mx-auto px-6 py-4 flex justify-between items-center">
                <a href="/"
                    class="text-3xl font-semibold text-white hover:text-yellow-100 transition-colors">Brewtopia</a>
                <div class="space-x-6">
                    <a href="#" class="text-white hover:text-yellow-100 transition-colors">Home</a>
                    <a href="#" class="text-white hover:text-yellow-100 transition-colors">About</a>
                    <a href="#" class="text-white hover:text-yellow-100 transition-colors">Contact</a>

                    <!-- Login and Register Buttons -->
                    <a href="{{ route('login') }}"
                        class="text-white hover:bg-yellow-600 px-4 py-2 rounded-full transition-colors">Login</a>
                    <a href="{{ route('register') }}"
                        class="bg-yellow-600 hover:bg-yellow-700 text-white px-4 py-2 rounded-full transition-colors">Register</a>
                </div>
            </nav>
        </header>

        <!-- Hero Section -->
        <main class="flex-grow">
            <div class="relative bg-yellow-500 py-24">
                <div class="max-w-7xl mx-auto px-6 text-center text-white">
                    <h1 class="text-5xl font-extrabold leading-tight mb-6">Welcome to Brewtopia</h1>
                    <p class="text-xl mb-8">Discover, review, and share your love for craft beers with the Brewtopia
                        community.</p>
                    <a href="#"
                        class="bg-yellow-600 hover:bg-yellow-700 text-white py-3 px-8 rounded-full text-lg font-semibold transition-colors shadow-lg">Get
                        Started</a>
                </div>
            </div>
        </main>

        <!-- Features Section -->
        <section class="py-16 bg-gray-100">
            <div class="max-w-7xl mx-auto px-6 text-center">
                <h2 class="text-3xl font-bold text-gray-800 mb-6">What is Brewtopia?</h2>
                <p class="text-lg text-gray-600 mb-10">Brewtopia is your personal platform for discovering new beers,
                    sharing your thoughts, and exploring recommendations from the community.</p>
                <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-8">
                    <div class="bg-white p-6 rounded-lg shadow-lg">
                        <h3 class="text-xl font-semibold text-gray-800 mb-3">Discover Beers</h3>
                        <p class="text-gray-600">Explore a curated selection of the best craft beers from around the
                            world.</p>
                    </div>
                    <div class="bg-white p-6 rounded-lg shadow-lg">
                        <h3 class="text-xl font-semibold text-gray-800 mb-3">Rate & Review</h3>
                        <p class="text-gray-600">Share your thoughts on the beers you've tried and read reviews from
                            others.</p>
                    </div>
                    <div class="bg-white p-6 rounded-lg shadow-lg">
                        <h3 class="text-xl font-semibold text-gray-800 mb-3">Connect with Friends</h3>
                        <p class="text-gray-600">Follow your friends, share your favorite beers, and enjoy tasting
                            experiences together.</p>
                    </div>
                </div>
            </div>
        </section>

        <section class="py-16 bg-gray-100">
            <div class="max-w-7xl mx-auto px-6 text-center">
                <h2 class="text-3xl font-bold text-gray-800 mb-6">Nieuwsartikelen</h2>

                <div class="space-y-8">
                    @foreach($articles as $article)
                        <div class="bg-white p-6 rounded-lg shadow-lg">
                            <h3 class="text-2xl font-semibold text-gray-800 mb-4">{{ $article->title }}</h3>
                            <img src="{{ Storage::url($article->image_path) }}" alt="Article Image"
                                class="w-full h-60 object-cover mb-4">
                                <p class="text-gray-600">{{ $article->content }}</p>
                                <p class="text-gray-400 text-sm mt-4">Gepubliceerd op
                                {{ \Carbon\Carbon::parse($article->published_at)->format('d M Y') }}
                            </p>

                        </div>
                    @endforeach
                </div>
            </div>
        </section>




        <!-- Footer -->
        <footer class="bg-yellow-500 text-white text-center py-6">
            <p>&copy; {{ date('Y') }} Brewtopia. All rights reserved.</p>
        </footer>
    </div>

</body>

</html>
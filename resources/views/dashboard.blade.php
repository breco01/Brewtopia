<!DOCTYPE html>
<html lang="en">
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
                <a href="/" class="text-3xl font-semibold text-white hover:text-yellow-100 transition-colors">Brewtopia</a>
                <div class="space-x-6">
                    <a href="{{ route('dashboard') }}" class="text-white hover:text-yellow-100 transition-colors">Dashboard</a>
                    <a href="{{ route('logout') }}" class="bg-yellow-600 hover:bg-yellow-700 text-white px-4 py-2 rounded-full transition-colors">Logout</a>
                </div>
            </nav>
        </header>

        <!-- Dashboard Content -->
        <main class="flex-grow">
            <div class="max-w-7xl mx-auto px-6 py-12">
                <h1 class="text-4xl font-bold text-gray-800 mb-8">Welcome to Your Dashboard, {{ Auth::user()->name }}!</h1>
                
                <!-- Dashboard Grid -->
                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
                    <!-- My Beer Reviews -->
                    <div class="bg-white shadow-lg rounded-lg p-6">
                        <h2 class="text-xl font-bold text-gray-800 mb-4">My Beer Reviews</h2>
                        <p class="text-gray-600 mb-4">View and edit reviews you've written for different beers.</p>
                        <a href="{{ route('reviews.index') }}" class="text-yellow-600 hover:text-yellow-700 font-medium">Manage Reviews &rarr;</a>
                    </div>

                    <!-- Add a Beer -->
                    <div class="bg-white shadow-lg rounded-lg p-6">
                        <h2 class="text-xl font-bold text-gray-800 mb-4">Add a New Beer</h2>
                        <p class="text-gray-600 mb-4">Contribute to the database by adding a new beer for others to review.</p>
                        <a href="{{ route('beers.create') }}" class="text-yellow-600 hover:text-yellow-700 font-medium">Add Beer &rarr;</a>
                    </div>

                    <!-- My Beer List -->
                    <div class="bg-white shadow-lg rounded-lg p-6">
                        <h2 class="text-xl font-bold text-gray-800 mb-4">My Beer List</h2>
                        <p class="text-gray-600 mb-4">Keep track of the beers you’ve tasted or want to try in the future.</p>
                        <a href="{{ route('beers.list') }}" class="text-yellow-600 hover:text-yellow-700 font-medium">View My List &rarr;</a>
                    </div>

                    <!-- Top Rated Beers -->
                    <div class="bg-white shadow-lg rounded-lg p-6">
                        <h2 class="text-xl font-bold text-gray-800 mb-4">Top Rated Beers</h2>
                        <p class="text-gray-600 mb-4">Check out the most highly-rated beers from the Brewtopia community.</p>
                        <a href="{{ route('beers.top') }}" class="text-yellow-600 hover:text-yellow-700 font-medium">Explore Top Beers &rarr;</a>
                    </div>

                    <!-- Community -->
                    <div class="bg-white shadow-lg rounded-lg p-6">
                        <h2 class="text-xl font-bold text-gray-800 mb-4">Community</h2>
                        <p class="text-gray-600 mb-4">Connect with fellow beer enthusiasts and share your experiences.</p>
                        <a href="{{ route('community.index') }}" class="text-yellow-600 hover:text-yellow-700 font-medium">Join the Community &rarr;</a>
                    </div>

                    <!-- Settings -->
                    <div class="bg-white shadow-lg rounded-lg p-6">
                        <h2 class="text-xl font-bold text-gray-800 mb-4">Settings</h2>
                        <p class="text-gray-600 mb-4">Manage your account preferences and profile information.</p>
                        <a href="{{ route('settings') }}" class="text-yellow-600 hover:text-yellow-700 font-medium">Edit Settings &rarr;</a>
                    </div>
                </div>
            </div>
        </main>

        <!-- Footer -->
        <footer class="bg-yellow-500 text-white text-center py-6">
            <p>&copy; {{ date('Y') }} Brewtopia. All rights reserved.</p>
        </footer>
    </div>

</body>
</html>

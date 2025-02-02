<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>@yield('title', 'Daily Notes')</title>
    <!-- Tailwind CSS -->
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
    <!-- Font Awesome untuk ikon -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet">
</head>
<body class="bg-gray-100 font-sans">
    <!-- Sidebar dan Main Content Wrapper -->
    <div class="flex min-h-screen">
        <!-- Sidebar -->
        <aside class="w-64 bg-gradient-to-b from-blue-600 to-blue-800 shadow-lg transform transition-transform duration-300 ease-in-out fixed h-full">
            <div class="p-6">
                <!-- Logo atau Nama Aplikasi -->
                <div class="text-white text-2xl font-bold mb-8">
                    <i class="fas fa-rocket mr-2"></i> Daily Notes
                </div>

                <!-- Menu Navigasi -->
                <nav class="space-y-2">
                    <a href="/dashboard" class="flex items-center p-2 text-white hover:bg-blue-700 rounded-lg transition-all duration-300">
                        <i class="fas fa-home mr-3"></i> Dashboard
                    </a>
                    <a href="/profile" class="flex items-center p-2 text-white hover:bg-blue-700 rounded-lg transition-all duration-300">
                        <i class="fas fa-cog mr-3"></i> Settings
                    </a>
                </nav>
            </div>
        </aside>

        <!-- Main Content -->
        <div class="flex-1 ml-64">
            <!-- Navbar -->
            <nav class="bg-white shadow-md">
                <div class="container mx-auto px-6 py-4 flex justify-between items-center">
                    <!-- Search Bar -->
                    <div class="flex items-center">
                        <input type="text" placeholder="Hallo..." class="px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500">
                    </div>

                    <!-- User Menu -->
                    <div class="flex items-center space-x-4">
                        <a href="#" class="text-gray-800 hover:text-blue-500">
                            <i class="fas fa-bell"></i>
                        </a>
                        <div class="relative">
                            <button class="flex items-center focus:outline-none">
                            <span class="ml-2 text-gray-800">{{ Auth::user()->name }}</span>
                                <i class="fas fa-chevron-down ml-2"></i>
                            </button>
                            <!-- Dropdown Menu -->
                            <div class="absolute right-0 mt-2 w-48 bg-white shadow-lg rounded-lg py-2 hidden">
                                <form method="POST" action="{{ route('logout') }}">
                                    @csrf
                                    <button type="submit" class="block w-full text-left px-4 py-2 text-gray-800 hover:bg-gray-100">Logout</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </nav>

            <!-- Konten Utama -->
            <main class="container mx-auto px-6 py-8">
                @yield('content')
            </main>

            <!-- Footer -->
            <footer class="bg-white shadow-md mt-8">
                <div class="container mx-auto px-6 py-4 text-center text-gray-600">
                    &copy; 2023 MyApp. All rights reserved.
                </div>
            </footer>
        </div>
    </div>

    <!-- Script untuk Dropdown Menu -->
    <script>
        document.addEventListener('DOMContentLoaded', function () {
            const userMenuButton = document.querySelector('.relative button');
            const userMenuDropdown = document.querySelector('.relative .hidden');

            userMenuButton.addEventListener('click', function () {
                userMenuDropdown.classList.toggle('hidden');
            });

            // Tutup dropdown saat klik di luar
            document.addEventListener('click', function (event) {
                if (!userMenuButton.contains(event.target) && !userMenuDropdown.contains(event.target)) {
                    userMenuDropdown.classList.add('hidden');
                }
            });
        });
    </script>
</body>
</html>
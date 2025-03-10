<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body>
    <!-- Header Section -->
    <header class="bg-blue-900 text-white">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-5">
            <div class="flex items-center justify-between">
                <!-- Logo Section -->
                <div class="flex-shrink-0">
                    <a href="#" class="text-2xl font-bold">Mini Instagram </a>
                </div>

                <!-- Navigation Menu -->
                <nav class="hidden md:flex space-x-10 text-lg">
                    <a href="/fotos" class="block text-lg hover:text-gray-300 transition-all">Home</a>
                    <a href="{{ route('fotos.create') }}"class="block text-lg hover:text-gray-300 transition-all">Subir foto</a>
                    <a href="{{ route('logout') }}" class="block text-lg hover:text-gray-300 transition-all">LOGOUT</a>
                </nav>

                <!-- Call-to-Action Button -->
                <div class="hidden md:block">
                    <a href="#contact" class="bg-yellow-500 hover:bg-yellow-400 text-black py-2 px-6 rounded-full text-lg transition-all">
                     @yield('name')
                    </a>
                </div>

                <!-- Mobile Menu Button (for smaller screens) -->
                <div class="md:hidden flex items-center">
                    <button id="menu-button" class="text-white focus:outline-none">
                        <svg class="h-6 w-6" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"></path>
                        </svg>
                    </button>
                </div>
            </div>

            <!-- Mobile Navigation Menu -->
            <div id="mobile-menu" class="md:hidden mt-5 hidden space-y-4">
                <a href="/fotos" class="block text-lg hover:text-gray-300 transition-all">Home</a>
                <a href="{{ route('fotos.create') }}"class="block text-lg hover:text-gray-300 transition-all">Subir foto</a>
                <a href="{{ route('logout') }}" class="block text-lg hover:text-gray-300 transition-all">LOGOUT</a>
               
                
            </div>
        </div>
    </header>

    <script>
        // Mobile Menu Toggle
        const menuButton = document.getElementById('menu-button');
        const mobileMenu = document.getElementById('mobile-menu');

        menuButton.addEventListener('click', () => {
            mobileMenu.classList.toggle('hidden');
        });
    </script>
    @yield('content')
</body>
</html>
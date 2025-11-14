<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SolveIt Navbar</title>
</head>

<body class="bg-gray-50">
    <!-- Navbar -->
    <nav class="bg-white shadow-md">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex justify-between items-center h-16">
                <!-- Logo/Title - Kiri -->
                <div class="shrink-0">
                    <a href="{{ route('home') }}" class="text-2xl font-bold text-indigo-600">SolveIt</a>
                </div>

                <!-- Desktop Menu - Kanan -->
                <div class="hidden md:flex items-center space-x-8">
                    <!-- Section 1: Navigasi Menu -->
                    <div class="flex items-center space-x-6">
                        <a href="{{ route('home') }}"
                            class="{{ request()->routeIs('home') ? 'text-indigo-600' : 'text-gray-700' }} hover:text-indigo-600 transition duration-200 font-medium">Beranda</a>
                        @auth
                            <a href="{{ route('categories.index') }}"
                                class="{{ request()->routeIs('categories.*') ? 'text-indigo-600' : 'text-gray-700' }} hover:text-indigo-600 transition duration-200 font-medium">Kategori</a>
                            <a href="{{ route('profile.index') }}"
                                class="{{ request()->routeIs('profile.*') ? 'text-indigo-600' : 'text-gray-700' }} hover:text-indigo-600 transition duration-200 font-medium">Profil</a>
                        @endauth
                    </div>

                    <!-- Section 2: User Info & Login -->
                    <div class="flex items-center space-x-4 pl-6 border-l border-gray-300">
                        @auth
                            <span class="text-gray-600">Halo, <span
                                    class="font-semibold text-gray-800">{{ Auth::user()->name }}</span></span>
                            <form id="logout-form" method="POST" action="{{ route('logout') }}">
                                @csrf
                                <button type="submit"
                                    class="bg-indigo-600 hover:bg-indigo-700 px-5 py-2 rounded-lg text-white font-medium transition duration-200 cursor-pointer">
                                    Logout
                                </button>
                            </form>
                        @else
                            <a href="{{ route('login') }}"
                                class="bg-indigo-600 hover:bg-indigo-700 px-5 py-2 rounded-lg text-white font-medium transition duration-200">
                                Login
                            </a>
                            <a href="{{ route('register') }}"
                                class="bg-indigo-600 hover:bg-indigo-700 px-5 py-2 rounded-lg text-white font-medium transition duration-200">
                                Register
                            </a>
                        @endauth
                    </div>
                </div>

                <!-- Mobile Menu Button -->
                <div class="md:hidden">
                    <button id="mobile-menu-button" class="text-gray-700 hover:text-indigo-600 focus:outline-none">
                        <svg class="h-6 w-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path id="menu-icon" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M4 6h16M4 12h16M4 18h16" />
                            <path id="close-icon" class="hidden" stroke-linecap="round" stroke-linejoin="round"
                                stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                        </svg>
                    </button>
                </div>
            </div>
        </div>

        <!-- Mobile Menu -->
        <div id="mobile-menu" class="hidden md:hidden border-t border-gray-200">
            <div class="px-4 pt-2 pb-4 space-y-3">
                <!-- Navigasi Menu Mobile -->
                <a href="{{ route('home') }}"
                    class="{{ request()->routeIs('home') ? 'text-indigo-600' : 'text-gray-700' }} block px-3 py-2 rounded-md hover:bg-indigo-600 hover:text-white transition duration-200 font-medium">Beranda</a>
                @auth
                    <a href="{{ route('categories.index') }}"
                        class="{{ request()->routeIs('categories.*') ? 'text-indigo-600' : 'text-gray-700' }} block px-3 py-2 rounded-md hover:bg-indigo-600 hover:text-white transition duration-200 font-medium">Kategori</a>
                    <a href="{{ route('profile.index') }}"
                        class="{{ request()->routeIs('profile.*') ? 'text-indigo-600' : 'text-gray-700' }} block px-3 py-2 rounded-md hover:bg-indigo-600 hover:text-white transition duration-200 font-medium">Profil</a>
                @endauth

                <!-- User Info & Login Mobile -->
                <div class="pt-3 border-t border-gray-200 space-y-3">
                    @auth
                        <div class="px-3 py-2 text-gray-600">
                            Halo, <span class="font-semibold text-gray-800">{{ Auth::user()->name }}</span>
                        </div>
                        <form id="logout-form" method="POST" action="{{ route('logout') }}">
                            @csrf
                            <button type="submit"
                                class="w-full bg-indigo-600 hover:bg-indigo-700 px-4 py-2 rounded-lg text-white font-medium transition duration-200 cursor-pointer">
                                Logout
                            </button>
                        </form>
                    @else
                        <a href="{{ route('login') }}"
                            class="mr-2 w-full bg-indigo-600 hover:bg-indigo-700 px-4 py-2 rounded-lg text-white font-medium transition duration-200">
                            Login
                        </a>
                        <a href="{{ route('register') }}"
                            class="w-full bg-indigo-600 hover:bg-indigo-700 px-4 py-2 rounded-lg text-white font-medium transition duration-200">
                            Register
                        </a>
                    @endauth
                </div>
            </div>
        </div>
    </nav>

    <script>
        // Toggle Mobile Menu
        const mobileMenuButton = document.getElementById('mobile-menu-button');
        const mobileMenu = document.getElementById('mobile-menu');
        const menuIcon = document.getElementById('menu-icon');
        const closeIcon = document.getElementById('close-icon');

        mobileMenuButton.addEventListener('click', () => {
            mobileMenu.classList.toggle('hidden');
            menuIcon.classList.toggle('hidden');
            closeIcon.classList.toggle('hidden');
        });
    </script>
</body>

</html>

    <!DOCTYPE html>
    <html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
        <head>
            <meta charset="utf-8">
            <meta name="viewport" content="width=device-width, initial-scale=1">
            <meta name="csrf-token" content="{{ csrf_token() }}">

            <title>Maba Store</title>

            <!-- Favicon -->
            <link rel="icon" href="{{ asset('images/ITS.svg') }}" type="image/png">

            <!-- Fonts -->
            <link rel="preconnect" href="https://fonts.bunny.net">
            <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

            <!-- Scripts -->
            @vite(['resources/css/app.css', 'resources/js/app.js'])
            <!-- Hide development toolbar -->
            <style>
                #vite-dev-overlay {
                    display: none !important;
                }
            </style>
        </head>
        <body class="font-sans antialiased bg-yellow-50">
            <div class="min-h-screen bg-yellow-50">
                <!-- Bagian Navbar -->
                <nav class="relative h-16 shadow-sm border-b border-gray-100 bg-cover bg-center">
                <div class="relative w-full h-full">
                    {{-- Background --}}
                    <img src="{{ asset('images/Navbar.svg') }}" class="absolute inset-0 w-full h-full object-cover pointer-events-none select-none" alt="Navbar Background">
                    <div class="absolute inset-0 border-gray-100"></div> {{-- overlay opsional --}}

                {{-- Konten Navbar --}}
                <div class="relative max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 flex justify-between items-center h-16">
                <!-- Logo dan Link -->
                <div class="flex">
                    <div class="shrink-0 flex items-center">
                        <a href="/" class="text-xl font-bold text-white">MABA STORE</a>
                    </div>
                    <div class="hidden space-x-8 sm:-my-px sm:ml-10 sm:flex">
                        <a href="/" class="inline-flex items-center px-1 pt-1 border-b-2 {{ request()->routeIs('home') ? 'border-indigo-400' : 'border-transparent' }} text-sm font-medium leading-5 text-white">Products</a>
                        <a href="{{ route('cart.index') }}" class="inline-flex items-center px-1 pt-1 border-b-2 {{ request()->routeIs('cart.index') ? 'border-indigo-400' : 'border-transparent' }} text-sm font-medium leading-5 text-white hover:text-gray-200 hover:border-gray-300">Cart</a>
                    </div>
                </div>

                            <!-- Tombol Login/Register atau Menu Pengguna -->
                            <div class="hidden sm:flex sm:items-center sm:ml-6">
                                @auth
                                    <!-- Jika Pengguna Sudah Login -->
                                    <x-dropdown align="right" width="48">
                                        <x-slot name="trigger">
                                            <button class="inline-flex items-center px-3 py-2 border border-transparent text-sm leading-4 font-medium rounded-md text-gray-500 bg-white hover:text-gray-700 focus:outline-none transition ease-in-out duration-150">
                                                <div>{{ Auth::user()->name }}</div>
                                                <div class="ml-1">
                                                    <svg class="fill-current h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                                                        <path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd" />
                                                    </svg>
                                                </div>
                                            </button>
                                        </x-slot>
                                        <x-slot name="content">
                                            <x-dropdown-link :href="route('dashboard')">Dashboard</x-dropdown-link>
                                            <x-dropdown-link :href="route('profile.edit')">Profile</x-dropdown-link>
                                            <form method="POST" action="{{ route('logout') }}">
                                                @csrf
                                                <x-dropdown-link :href="route('logout')" onclick="event.preventDefault(); this.closest('form').submit();">
                                                    Log Out
                                                </x-dropdown-link>
                                            </form>
                                        </x-slot>
                                    </x-dropdown>
                                @else
                                    <!-- Jika Pengguna Belum Login (Tamu) -->
                                    <span class="inline-block px-3 py-1 rounded-md border border-blue-900 bg-blue-900 hover:bg-blue-800 hover:border-blue-800">
                                        <a href="{{ route('login') }}" class="text-sm text-white">Log in</a>
                                    </span>
                                    <span class="ml-4 inline-block px-3 py-1 rounded-md border border-blue-900 bg-blue-900 hover:bg-blue-800 hover:border-blue-800">
                                        <a href="{{ route('register') }}" class="text-sm text-white">Register</a>
                                    </span>
                                @endauth
                            </div>
                        </div>
                    </div>
                </nav>

                <!-- Konten Halaman Utama -->
                <main>
                    {{ $slot }}
                </main>
            </div>
        </body>
    </html>
    

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Guestbook | {{ $title }}</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body>
    <nav x-data="{ mobileMenuIsOpen: false }" class="bg-gray-900 flex">
        <!-- Hamburger Button -->
        <button
            @click="mobileMenuIsOpen = !mobileMenuIsOpen"
            class="p-4 md:hidden justify-end"
            aria-label="Toggle menu"
        >
            <svg
                class="h-6 w-6 text-white"
                viewBox="0 0 24 24"
                fill="none"
                stroke="currentColor"
                stroke-width="2"
            >
                <path
                    x-show="!mobileMenuIsOpen"
                    d="M4 6h16M4 12h16M4 18h16"
                />
                <path
                    x-show="mobileMenuIsOpen"
                    d="M6 18L18 6M6 6l12 12"
                />
            </svg>
        </button>

        <!-- Mobile Menu -->
        <div
            x-show="mobileMenuIsOpen"
            @click.away="mobileMenuIsOpen = false"
            class="fixed inset-0 bg-gray-900 md:hidden transition-transform duration-300"
            :class="{ 'translate-x-0': mobileMenuIsOpen, '-translate-x-full': !mobileMenuIsOpen }"
        >
            <div class="flex justify-between p-4">
                <div class="text-white text-xl font-bold">
                    <a href="/">Guestbook</a>
                </div>
                <button
                    @click="mobileMenuIsOpen = false"
                    class="text-white text-2xl"
                    aria-label="Close menu"
                >
                    ×
                </button>
            </div>
            <ul class="flex flex-col p-4 space-y-2">
                <li><a class="text-white hover:text-gray-300" href="{{ route('messages') }}">Messages</a></li>
                <li><a class="text-white hover:text-gray-300" href="{{ route('about') }}">About</a></li>
                <li><a class="text-white hover:text-gray-300" href="{{ route('contact.show') }}">Write a message</a></li>
                @auth
                    <li><a class="text-white hover:text-gray-300" href="{{ route('dashboard') }}">Dashboard</a></li>
                    <li>
                        <form method="POST" action="{{ route('logout') }}">
                            @csrf
                            <button type="submit" class="text-white hover:text-gray-300">
                                {{ __('Log Out') }}
                            </button>
                        </form>
                    </li>
                @else
                    <li><a class="text-white hover:text-gray-300" href="{{ route('login') }}">Login</a></li>
                    @if (Route::has('register'))
                        <li><a class="text-white hover:text-gray-300" href="{{ route('register') }}">Register</a></li>
                    @endif
                @endauth
            </ul>
        </div>

        <!-- Desktop Menu -->
        <div class="w-full mx-auto px-4 py-4 flex justify-between items-center max-w-7xl sm:px-6 lg:px-8">
        <div class="text-white text-2xl font-bold pr-8">
                <a href="/">Guestbook</a>
            </div>
            <ul class="hidden md:flex space-x-4">
                <li><a class="text-white hover:text-gray-300" href="{{ route('messages') }}">Messages</a></li>
                <li><a class="text-white hover:text-gray-300" href="{{ route('about') }}">About</a></li>
                <li><a class="text-white hover:text-gray-300" href="{{ route('contact.show') }}">Write a message</a></li>
                @auth
                    <li><a class="text-white hover:text-gray-300" href="{{ route('dashboard') }}">Dashboard</a></li>
                    <li>
                        <form method="POST" action="{{ route('logout') }}">
                            @csrf
                            <button type="submit" class="text-white hover:text-gray-300">
                                {{ __('Log Out') }}
                            </button>
                        </form>
                    </li>
                @else
                    <li><a class="text-white hover:text-gray-300" href="{{ route('login') }}">Login</a></li>
                    @if (Route::has('register'))
                        <li><a class="text-white hover:text-gray-300" href="{{ route('register') }}">Register</a></li>
                    @endif
                @endauth
            </ul>
        </div>
    </nav>

    <div class="min-h-screen flex justify-center bg-gray-800 py-12 px-4 sm:px-6 lg:px-8">
        <div class="max-w-md w-full space-y-8">
            <div>
                <h2 class="mt-6 text-center text-3xl font-extrabold text-gray-200">
                    {{ $title }}
                </h2>
            </div>
            {{ $slot }}
        </div>
    </div>
</body>
</html>

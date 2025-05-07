<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Laracasts: {{ $title }}</title>    
    @vite('resources/css/app.css')
</head>
<body>
    <nav class="bg-gray-900">
      <div class="max-w-6xl mx-auto px-4">
        <div class="flex justify-between">
          <div class="block p-4 text-white text-3xl font-bold">
            <a href="/">Message Website</a></div>
          <div class="hidden md:flex items-center">
            <nav class="ml-auto">
              <ul class="list-reset items-center hidden md:flex">
                @auth
                  <li class="mr-3"><a class="inline-block py-2 px-4 border-2 border-gray-900 rounded hover:border-gray-600 text-white no-underline transition-colors" href="{{ route('messages') }}">Messages</a></li>
                @endauth
                <li class="mr-3"><a class="inline-block py-2 px-4 border-2 border-gray-900 rounded hover:border-gray-600 text-white no-underline transition-colors" href="{{ route('about') }}">About</a></li>
                <li class="mr-3"><a class="inline-block py-2 px-4 border-2 border-gray-900 rounded hover:border-gray-600 text-white no-underline transition-colors" href="{{ route('contact.show') }}">Contact</a></li>
                @auth
                  <li class="mr-3"><a class="inline-block py-2 px-4 border-2 border-gray-900 rounded hover:border-gray-600 text-white no-underline transition-colors" href="{{ route('dashboard') }}">Dashboard</a></li>
                @else
                  <li class="mr-3"><a class="inline-block py-2 px-4 border-2 border-gray-900 rounded hover:border-gray-600 text-white no-underline transition-colors" href="{{ route('login') }}">Login</a></li>

                  @if (Route::has('register'))
                      <a
                          href="{{ route('register') }}"
                          class="inline-block py-2 px-4 border-2 border-gray-900 rounded hover:border-gray-600 text-white no-underline transition-colors">
                          Register
                      </a>
                  @endif

                @endauth
              </ul>
            </nav>
          </div>
        </div>
      </div>
    </nav>
    <div class="min-h-screen flex items justify-center bg-gray-800 py-12 px-4 sm:px-6 lg:px-8">
        <div class="max-w-md w-full space-y-8">
          <div>
            <h2
              class="mt-6 text-center text-3xl font-extrabold text-gray-200"
            >{{ $title }}</h2>
          </div>
          {{ $slot }}
        </div>
      </div>
</body>
</html>

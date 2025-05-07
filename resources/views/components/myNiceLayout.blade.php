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
                <li class="mr-3"><a class="inline-block py-2 px-4 text-white no-underline" href="/messages">Messages</a></li>
                <li class="mr-3"><a class="inline-block py-2 px-4 text-white no-underline" href="/about">About</a></li>
                <li class="mr-3"><a class="inline-block py-2 px-4 text-white no-underline" href="/contact">Contact</a></li>
                @auth
                  <li class="mr-3"><a class="inline-block py-2 px-4 text-white no-underline" href="/dashboard">Dashboard</a></li>
                @else
                  <li class="mr-3"><a class="inline-block py-2 px-4 text-white no-underline" href="/login">Login</a></li>

                  @if (Route::has('register'))
                      <a
                          href="{{ route('register') }}"
                          class="inline-block px-5 py-1.5 dark:text-[#EDEDEC] border-[#19140035] hover:border-[#1915014a] border text-[#1b1b18] dark:border-[#3E3E3A] dark:hover:border-[#62605b] rounded-sm text-sm leading-normal">
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

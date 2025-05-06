<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contact me</title>    
    @vite('resources/css/app.css')
</head>
<body>
    <div class="min-h-screen flex items justify-center bg-gray-800 py-12 px-4 sm:px-6 lg:px-8">
        <div class="max-w-md w-full space-y-8">
          <div>
            <h2 class="mt-6 text-center text-3xl font-extrabold text-gray-200">Contact Us</h2>
          </div>
          <form class="mt-8 space-y-6" action="/contact" method="POST" novalidate>
            @csrf
            @if($errors->any())
              <div class="m-2 p-2 border-2 border-rose-500 rounded">
                <ul>
                  @foreach($errors->all() as $error)
                    <li class=" text-gray-200">
                      {{ $error }}
                    </li>
                  @endforeach
                </ul>
              </div>
            @endif
            <div class="rounded-md shadow-sm -space-y-px">
              <div>
                <label for="name" class="sr-only">Name</label>
                <input id="name" name="name" type="text" value="{{ old("name") }}" required class="appearance-none rounded relative block w-full px-3 py-2 border border-gray-300 placeholder-gray-400 text-gray-400 rounded-t-md focus:outline-none focus:ring-green-500 focus:border-green-500 focus:z-10 sm:text-sm mb-4" placeholder="Full Name">
              </div>
              <div>
                <label for="email" class="sr-only">Email address</label>
                <input id="email" name="email" type="email" value="{{ old("email") }}" required class="appearance-none rounded relative block w-full px-3 py-2 border border-gray-300 placeholder-gray-400 text-gray-400 focus:outline-none focus:ring-green-500 focus:border-green-500 focus:z-10 sm:text-sm mb-4" placeholder="Email address">
              </div>
              <div>
                <label for="message" class="sr-only">Message</label>
                <textarea id="message" name="message" required class="appearance-none rounded relative block w-full px-3 py-2 border border-gray-300 placeholder-gray-400 text-gray-400 rounded focus:outline-none focus:ring-green-500 focus:border-green-500 focus:z-10 sm:text-sm" placeholder="Your message" rows="4">{{ old("message") }}</textarea>
              </div>
            </div>
      
            <div>
              <button type="submit" class="cursor-pointer group relative w-full flex justify-center py-2 px-4 border border-transparent text-sm font-medium rounded text-white bg-green-700 hover:bg-green-800 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-green-500">
                Send Message
              </button>
            </div>
          </form>
        </div>
      </div>
</body>
</html>

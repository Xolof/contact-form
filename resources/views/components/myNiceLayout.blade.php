<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Laracasts: {{ $title }}</title>    
    @vite('resources/css/app.css')
</head>
<body>
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

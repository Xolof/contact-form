<x-myNiceLayout>

  <x-slot:title>Write a message</x-slot:title>
  
  <form class="mt-8 space-y-6" action="/add-message" method="POST" novalidate>
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
        <input id="name" name="name" type="text" value="{{ old("name") }}" required class="border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 focus:border-indigo-500 dark:focus:border-indigo-600 focus:ring-indigo-500 dark:focus:ring-indigo-600 rounded-md shadow-sm block mb-4 w-full" placeholder="Full Name">
      </div>
      <div>
        <label for="email" class="sr-only">Email address</label>
        <input id="email" name="email" type="email" value="{{ old("email") }}" required class="border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 focus:border-indigo-500 dark:focus:border-indigo-600 focus:ring-indigo-500 dark:focus:ring-indigo-600 rounded-md shadow-sm block mb-4 w-full" placeholder="Email address">
      </div>
      <div>
        <label for="message" class="sr-only">Message</label>
        <textarea id="message" name="message" required class="border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 focus:border-indigo-500 dark:focus:border-indigo-600 focus:ring-indigo-500 dark:focus:ring-indigo-600 rounded-md shadow-sm block mb-4 w-full" placeholder="Your message" rows="4">{{ old("message") }}</textarea>
      </div>
    </div>

    <div>
      <button type="submit" class="justify-center w-full inline-flex items-center px-4 py-2 bg-gray-800 dark:bg-gray-200 border border-transparent rounded-md font-semibold text-xs text-white dark:text-gray-800 uppercase tracking-widest hover:bg-gray-700 dark:hover:bg-white focus:bg-gray-700 dark:focus:bg-white active:bg-gray-900 dark:active:bg-gray-300 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 dark:focus:ring-offset-gray-800 transition ease-in-out duration-150">
        Send
      </button>
    </div>
  </form>

</x-myNiceLayout>

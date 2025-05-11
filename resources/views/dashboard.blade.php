<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="pt-2 pb-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    @if($errors->any())
                        <div class="m-2 p-2 border-2 border-rose-500 rounded text-center">
                            <ul>
                            @foreach($errors->all() as $error)
                                <li>
                                {{ $error }}
                                </li>
                            @endforeach
                            </ul>
                        </div>
                    @endif
                    @foreach($messages as $message)
                        <div class="py-4">
                            <p>{{ $message["created_at"] }}</p>
                            <p>{{ $message["sender_name"] }}</p>
                            <p>{{ $message["sender_email"] }}</p>
                            <p class="mb-2"> {{ $message["message"] }}</p>
                            <form method="POST" action="{{ route('delete-message') }}">
                            @csrf
                                <input type="hidden" id="messageId" name="messageId" value="{{ $message["id"] }}"/>
                                <input type="submit" id="delete" name="delete" value="Delete" class="cursor-pointer justify-center max-w-lg inline-flex items-center px-4 py-2 bg-red-500 dark:bg-red-400 border border-transparent rounded-md font-semibold text-xs text-white dark:text-red-800 uppercase tracking-widest hover:bg-red-700 dark:hover:bg-white focus:bg-red-700 dark:focus:bg-white active:bg-red-900 dark:active:bg-red-300 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 dark:focus:ring-offset-red-800 transition ease-in-out duration-150"/>
                            </form>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</x-app-layout>

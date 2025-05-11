<x-myNiceLayout>
  <x-slot:title>Messages</x-slot:title>
  @foreach($messages->all() as $message)
    <div class="m-2 p-2 rounded bg-gray-900 text-gray-200 shadow-lg">
      <p>{{ $message["created_at"] }}</p>
      <p>Name: {{ $message["sender_name"] }}</p>
      <p class="mb-2">Email: {{ $message["sender_email"] }}</p>
      <p>{{ $message["message"] }}</p>
    </div>
  @endforeach
</x-myNiceLayout>
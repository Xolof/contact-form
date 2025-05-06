<x-myNiceLayout>
  <x-slot:title>Messages</x-slot:title>
  @foreach($messages->all() as $message)
    <div class="m-2 p-2 border-2 border-blue-300 rounded text-gray-200">
      <p>Name: {{ $message["sender_name"] }}</p>
      <p>Email: {{ $message["sender_email"] }}</p>
      <p>Message {{ $message["message"] }}</p>
    </div>
  @endforeach
</x-myNiceLayout>
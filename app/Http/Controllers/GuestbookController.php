<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreMessageRequest;
use App\Models\Message;
use Illuminate\Http\Request;

class GuestbookController extends Controller
{
    public function showMessages()
    {
        $messages = Message::orderBy('created_at', 'desc')->get();

        return view('messages', ['messages' => $messages]);
    }

    public function showForm()
    {
        return view('contact');
    }

    public function storeMessage(StoreMessageRequest $request)
    {

        // using class Request
        // $validated = $request->validate([
        //     "name" => "required",
        //     "email" => "required|email",
        //     "message" => "required|min:8|max:1000"
        // ]);
        // Message::create([
        //     "sender_name" => $validated["name"],
        //     "sender_email" => $validated["email"],
        //     "message" => $validated["message"]
        // ]);

        Message::create([
            'sender_name' => $request->input('name'),
            'sender_email' => $request->input('email'),
            'message' => $request->input('message'),
        ]);

        return redirect('/messages');
    }
}

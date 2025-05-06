<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Message;
use App\Http\Requests\StoreMessageRequest;

class ContactController extends Controller
{
    public function showMessages() {
        return view("messages", ["messages" => Message::all()]);
    }

    public function showForm() {
        return view("contact");
    }

    public function storeMessage(StoreMessageRequest $request) {
        
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
            "sender_name" => $request->input("name"),
            "sender_email" => $request->input("email"),
            "message" => $request->input("message")
        ]);
    
        return redirect("/messages");
    }
}

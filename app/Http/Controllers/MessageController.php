<?php

namespace App\Http\Controllers;

use App\Models\Message;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;

class MessageController extends Controller
{
    /**
     * Delete the message.
     */
    public function destroy(Request $request): RedirectResponse
    {
        $validated = $request->validate([
            'messageId' => 'required|int',
        ]);

        $message = Message::find($validated['messageId']);

        if (! $message) {
            $request->session()->flash('flashMessage', 'No such message.');

            return Redirect::to('/dashboard');
        }

        $message->delete();

        $request->session()->flash('flashMessage', 'Message deleted.');

        return Redirect::to('/dashboard');
    }
}

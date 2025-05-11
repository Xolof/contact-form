<?php

use App\Models\Message;
use App\Models\User;

test('users can add messages', function () {
    $user = User::factory()->create();

    $countMessages = count(Message::all());
    $this->assertSame($countMessages, 0);

    $response = $this->actingAs($user)->post('/add-message', [
        'name' => 'Grodan Boll',
        'email' => 'grodan@boll.se',
        'message' => 'Hej, hej! Det är jag, Grodan Boll, din glada gröna vän! Hoppas du har en boll-igt rolig dag! // Grodan Boll',
    ]);

    $response->assertStatus(302);

    $countMessages = count(Message::all());
    $this->assertSame($countMessages, 1);
});

test('users can not add invalid messages', function () {
    $user = User::factory()->create();

    $countMessages = count(Message::all());
    $this->assertSame($countMessages, 0);

    $response = $this->actingAs($user)->post('/add-message', [
        'name' => 'Grodan Boll',
        'email' => 'grodan@boll.se',
    ]);

    $response->assertStatus(302);

    $countMessages = count(Message::all());
    $this->assertSame($countMessages, 0);
});

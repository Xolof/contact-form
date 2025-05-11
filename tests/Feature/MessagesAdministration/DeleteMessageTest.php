<?php

use App\Models\Message;
use App\Models\User;

test('users can delete messages', function () {
    $user = User::factory()->create();

    Message::factory()->create();

    $countMessages = count(Message::all());
    $this->assertSame($countMessages, 1);

    $response = $this->actingAs($user)->post('/delete-message', ['messageId' => 1]);

    $response->assertStatus(302);

    $response->assertRedirect(route('dashboard', absolute: false));

    $countMessages = count(Message::all());
    $this->assertSame($countMessages, 0);
});

test('users can not delete invalid messages', function () {
    $user = User::factory()->create();

    Message::factory()->create();

    $countMessages = count(Message::all());
    $this->assertSame($countMessages, 1);

    $response = $this->actingAs($user)->post('/delete-message', ['messageId' => 500]);
    $response->assertStatus(302);

    $this->assertSame(session('flashMessage'), 'No such message.');

    $response = $this->actingAs($user)->post('/delete-message', ['messageId' => 'this is a string but we expect an integer']);
    $response->assertStatus(302);

    $this->assertSame(session('errors')->all()[0], 'The message id field must be an integer.');

    $countMessages = count(Message::all());
    $this->assertSame($countMessages, 1);
});

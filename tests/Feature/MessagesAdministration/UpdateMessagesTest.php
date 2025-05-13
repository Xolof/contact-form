<?php

use App\Models\Message;
use App\Models\User;

test('users can publish and unpublish messages', function () {
    $user = User::factory()->create();

    Message::factory()->create();

    $message = Message::first();
    $this->assertSame($message['published'], 0);

    $response = $this->actingAs($user)->post('/update-message', [
        'messageId' => 1,
        'published' => true,
    ]);

    $response->assertStatus(302);

    $message = Message::first();
    $this->assertSame($message['published'], 1);

    $response = $this->actingAs($user)->post('/update-message', [
        'messageId' => 1,
        'published' => false,
    ]);

    $response->assertStatus(302);

    $message = Message::first();
    $this->assertSame($message['published'], 0);
});

test('invalid data when updating messages is handled', function () {
    $user = User::factory()->create();

    Message::factory()->create();

    $message = Message::first();
    $publishedBefore = $message['published'];

    $response = $this->actingAs($user)->post('/update-message', [
        'messageId' => 1,
        'published' => 'some invalid input',
    ]);

    $response->assertSessionHasErrors([
        'published' => 'The published field must be true or false.',
    ]);

    $message = Message::first();
    $publishedAfter = $message['published'];

    $this->assertSame($publishedBefore, $publishedAfter);
});

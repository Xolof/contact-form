<?php

test('the application returns a successful response', function () {
    $response = $this->get('/');

    $response->assertStatus(200);
});

test('the contact page returns a successful response', function () {
    $response = $this->get('/contact');

    $response->assertStatus(200);
});

test('the Not Found page returns a 404 response', function () {
    $response = $this->get('/non-existing-url');

    $response->assertStatus(404);
});

<?php

it('returns successful response for home page', function () {
    $response = $this->get('/');

    $response->assertStatus(200);
});

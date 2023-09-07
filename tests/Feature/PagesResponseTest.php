<?php

use Illuminate\Foundation\Testing\RefreshDatabase;

use function Pest\Laravel\get;

uses(RefreshDatabase::class);

it('returns successful response for home page', function () {
    // Act & assert
    get(route('home'))
        ->assertOk();
});

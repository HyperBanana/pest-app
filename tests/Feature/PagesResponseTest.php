<?php

use App\Models\Course;
use Illuminate\Foundation\Testing\RefreshDatabase;

use function Pest\Laravel\get;

uses(RefreshDatabase::class);

it('returns successful response for home page', function () {
    // Act & assert
    get(route('home'))
        ->assertOk();
});

it('returns successful response for course details page', function () {
    // Arrange
    $course = Course::factory()->create();

    // Act & assert
    get(route('course-details', $course))
        ->assertOk();
});
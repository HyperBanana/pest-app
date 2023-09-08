<?php

use App\Models\Course;
use App\Models\Video;
use Illuminate\Foundation\Testing\RefreshDatabase;
use function Pest\Laravel\get;

uses(RefreshDatabase::class);

it('shows course details', function () {
    // Arrange
    $course = Course::factory()->create([
        'tagline' => 'Learn to code real apps',
        'image' => 'image.png',
        'lessons' => [
            'Learn Laravel routes',
            'Learn Laravel views',
            'Learn Laravel commands',
        ]
    ]);

    // Act & assert
    get(route('course-details', $course))
        ->assertOk()
        ->assertSeeText([
            'Learn to code real apps',
            'Learn Laravel routes',
            'Learn Laravel views',
            'Learn Laravel commands',
        ])
        ->assertSee('image.png');
});

it('shows course video count', function () {
    // Arrange
    $course  = Course::factory()->create();
    Video::factory()->count(3)->create([
        'course_id' => $course->id,
    ]);

    // Act & assert
    get(route('course-details', $course))
        ->assertOk()
        ->assertSeeText('3 videos');
});


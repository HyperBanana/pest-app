<?php

use App\Models\Course;
use App\Models\Video;
use Illuminate\Foundation\Testing\RefreshDatabase;

uses(RefreshDatabase::class);

it('only returns released courses for released scope', function () {
    Course::factory()->released()->create();
    Course::factory()->create();

    expect(Course::released()->get())
        ->toHaveCount(1)
        ->first()->id->toEqual(1);
});

it('has videos', function () {
    // Arrange
    $course  = Course::factory()->create();
    Video::factory()->count(3)->create([
        'course_id' => $course->id,
    ]);

    // Act & assert
    expect($course->videos)
        ->toHaveCount(3)
        ->each->toBeInstanceOf(Video::class);
});

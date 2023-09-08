<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Carbon;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Course>
 */
class CourseFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'slug' => $this->faker->slug,
            'title' => $this->faker->sentence,
            'tagline' => $this->faker->sentence,
            'image' => 'image.png',
            'description' => $this->faker->paragraph,
            'lessons' => [
                'Lesson A',
                'Lesson B',
                'Lesson C',
            ],
        ];
    }

    public function released(Carbon $date = null): CourseFactory
    {
        return $this->state(
            fn (array $attributes) => [
                'released_at' => $date ?? Carbon::now(),
            ]
        );
    }
}

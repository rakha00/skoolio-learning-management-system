<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Lesson>
 */
class LessonFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $title = $this->faker->unique()->sentence(rand(3, 6));

        return [
            'title' => $title,
            'slug' => Str::slug($title),
            'content' => $this->faker->paragraphs(5, true),
            'duration_in_minutes' => $this->faker->numberBetween(5, 30),
        ];
    }
}

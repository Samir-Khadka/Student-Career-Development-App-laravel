<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Student>
 */
class StudentFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'university' => fake()->randomElement(['Tribhuvan University', 'Kathmandu University', 'Pokhara University']),
            'course' => fake()->randomElement(['BSc. CSIT', 'BIM', 'BCA', 'Computer Engineering']),
            'graduation_year' => fake()->numberBetween(2023, 2027),
            'bio' => fake()->paragraph(),
            'location' => fake()->city(),
            'career_goals' => fake()->sentence(),
        ];
    }
}

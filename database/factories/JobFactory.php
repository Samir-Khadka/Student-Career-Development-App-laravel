<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Job>
 */
class JobFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'title' => fake()->jobTitle(),
            'description' => fake()->paragraph(),
            'requirements' => fake()->paragraph(),
            'salary' => 'NRs. ' . fake()->numberBetween(20, 100) . ',000',
            'location' => fake()->city(),
            'job_type' => fake()->randomElement(['FULL_TIME', 'PART_TIME', 'INTERNSHIP', 'CONTRACT', 'FREELANCE']),
            'is_active' => true,
        ];
    }
}

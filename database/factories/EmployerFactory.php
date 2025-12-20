<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Employer>
 */
class EmployerFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'company_name' => fake()->company(),
            'description' => fake()->paragraph(),
            'industry' => fake()->randomElement(['Technology', 'Education', 'Finance', 'Healthcare']),
            'company_size' => fake()->randomElement(['1-10', '10-50', '50-100', '100+']),
            'website' => fake()->url(),
            'location' => fake()->city(),
        ];
    }
}

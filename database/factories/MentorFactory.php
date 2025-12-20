<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Mentor>
 */
class MentorFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'company' => fake()->company(),
            'position' => fake()->jobTitle(),
            'biography' => fake()->paragraph(),
            'expertise_areas' => json_encode(fake()->randomElements(['PHP', 'Laravel', 'React', 'Python', 'Data Science', 'AWS'], 3)),
            'availability' => fake()->randomElement(['Weekends', 'Evenings', 'Flexible']),
            'years_of_experience' => fake()->numberBetween(1, 15),
            'industry' => fake()->randomElement(['Software', 'Data Analysis', 'Web Development']),
        ];
    }
}

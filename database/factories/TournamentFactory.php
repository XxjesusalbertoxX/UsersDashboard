<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Tournament>
 */
class TournamentFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        $startDate = $this->faker->dateTimeBetween('now', '+1 month');
        $endDate = (clone $startDate)->modify('+7 days');

        return [
            'name' => $this->faker->word() . ' Cup',
            'description' => $this->faker->sentence(10),
            'type' => $this->faker->randomElement(['single', 'double']),
            'start_date' => $startDate->format('Y-m-d'),
            'end_date' => $endDate->format('Y-m-d'),
            'status' => $this->faker->randomElement(['upcoming', 'ongoing', 'finished']),
        ];
    }
}

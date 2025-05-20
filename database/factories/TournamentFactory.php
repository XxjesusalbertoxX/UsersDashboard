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
    $status = $this->faker->randomElement(['upcoming', 'ongoing', 'finished']);

    switch ($status) {
        case 'finished':
            // 1 a 30 días atrás
            $endDate = $this->faker->dateTimeBetween('-30 days', '-1 days');
            $startDate = (clone $endDate)->modify('-7 days');
            break;

        case 'ongoing':
            // ya empezados
            $startDate = $this->faker->dateTimeBetween('-6 days', 'now');
            $endDate = (clone $startDate)->modify('+7 days');
            break;

        case 'upcoming':
        default:
            // empezaran
            $startDate = $this->faker->dateTimeBetween('now', '+30 days');
            $endDate = (clone $startDate)->modify('+7 days');
            break;
    }

    return [
        'name' => $this->faker->word() . ' Cup',
        'description' => $this->faker->sentence(10),
        'type' => $this->faker->randomElement(['single', 'double']),
        'start_date' => $startDate->format('Y-m-d'),
        'end_date' => $endDate->format('Y-m-d'),
        'status' => $status,
    ];
}

}

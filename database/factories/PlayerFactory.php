<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Team;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Player>
 */
class PlayerFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'name' => $this->faker->firstName(),
            'lastName' => $this->faker->lastName(),
            'age' => $this->faker->numberBetween(16, 40),
            'genre' => $this->faker->randomElement(['male', 'female']),
            'id_team' => Team::inRandomOrder()->first()?->id_team ?? Team::factory(),
        ];
    }
}

<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\User;
use App\Models\Tournament;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Team>
 */
class TeamFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'id_user' => User::inRandomOrder()->first()?->id_user ?? User::factory(),
            'id_tournament' => Tournament::inRandomOrder()->first()?->id_tournament ?? Tournament::factory(),
            'name' => $this->faker->unique()->word() . ' Team',
            'description' => $this->faker->optional()->sentence(),
        ];
    }

}

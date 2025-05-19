<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\User;
use App\Models\Tournament;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Registration>
 */
class RegistrationFactory extends Factory
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
            'nickname' => $this->faker->userName(),
        ];
    }
}

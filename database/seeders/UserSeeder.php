<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::factory()->count(20)->create();

        User::factory()->create([
            'name' => 'Admin',
            'lastName' => 'Master',
            'genre' => 'male',
            'age' => 30,
            'email' => 'admin@example.com',
            'password' => bcrypt('admin123'),
            'is_admin' => true,
        ]);
    }
}

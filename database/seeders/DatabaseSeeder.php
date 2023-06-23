<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\Question;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // \App\Models\User::factory(10)->create();

        $user = \App\Models\User::factory()->create([
            'name' => 'Darlley Brito',
            'email' => 'darlley@leadszapp.com',
            'password' => bcrypt('123456789'),
        ]);

        Question::factory()->for($user, 'createdBy')->count(10)->create();
    }
}

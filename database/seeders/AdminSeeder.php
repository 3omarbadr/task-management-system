<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::factory()->create([
            'type' => User::ADMIN,
            'email' => 'admin@converted.in'
        ]);

        User::factory(99)->create([
            'type' => User::ADMIN
        ]);
    }
}

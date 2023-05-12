<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        \App\Models\User::factory()->create([
            'name' => 'azil',
            'email' => 'azil@visiglobalteknologi.co.id',
            'password' => bcrypt('12345678')
        ]);

        $this->call(ConnectionStatusSeeder::class);
    }
}

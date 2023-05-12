<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\Client;
use App\Models\Device;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

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
            'password' => bcrypt('12345678'),
        ]);

        $this->call(ConnectionStatusSeeder::class);

        if ('local' == config('app.env')) {
            $client = Client::create([
                'name' => 'bukaka',
            ]);

            $device = Device::create([
                'name' => 'bukaka point 1',
                'unique_code' => Str::random(40),
                'description' => 'bukaka point 1',
                'client_id' => $client->id,
            ]);
        }
    }
}

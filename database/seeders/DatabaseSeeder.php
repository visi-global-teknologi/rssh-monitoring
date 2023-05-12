<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\Client;
use App\Models\Device;
use Illuminate\Support\Str;
use App\Models\RsshConnection;
use Illuminate\Database\Seeder;
use App\Models\ConnectionStatus;

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
                'unique_code' => Str::random(5),
                'description' => 'bukaka point 1',
                'client_id' => $client->id,
            ]);

            RsshConnection::create([
                'server_username' => 'root',
                'server_password' => 'fJ}2nWG$yV6ocyU$',
                'server_ip' => '66.42.49.122',
                'server_port' => '3387',
                'local_port' => '3389',
                'device_id' => $device->id,
                'connection_status_id' => ConnectionStatus::where('name', 'not connected')->first()->id
            ]);
        }
    }
}

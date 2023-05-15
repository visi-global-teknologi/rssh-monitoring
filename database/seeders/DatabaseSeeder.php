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
        $user = config('rssh.seeder.user');
        $user['password'] = bcrypt('12345678');
        \App\Models\User::factory()->create($user);

        $this->call(ConnectionStatusSeeder::class);

        if ('local' == config('app.env')) {
            $client = Client::create(config('rssh.seeder.client'));
            $deviceDataDummy = config('rssh.seeder.device');
            $deviceDataDummy['unique_code'] = strtolower(Str::random(5));
            $deviceDataDummy['client_id'] = $client->id;
            $device = Device::create($deviceDataDummy);
            RsshConnection::create([
                'server_port' => '3387',
                'local_port' => '3389',
                'device_id' => $device->id,
                'connection_status_id' => ConnectionStatus::where('name', config('rssh.connection_status.disconnect'))->first()->id
            ]);
        }
    }
}

<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\Client;
use App\Models\ConnectionStatus;
use App\Models\Device;
use App\Models\RsshConnection;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $this->call(ConnectionStatusSeeder::class);
        $user = config('rssh.seeder.user');
        $user['password'] = bcrypt(config('rssh.seeder.user.password'));
        \App\Models\User::factory()->create($user);

        if ('local' == config('app.env')) {
            $client = Client::create(config('rssh.seeder.client'));
            $deviceDataDummy = config('rssh.seeder.device');
            $deviceDataDummy['unique_code'] = strtolower(Str::random(6));
            $deviceDataDummy['client_id'] = $client->id;
            $device = Device::create($deviceDataDummy);
            RsshConnection::create([
                'server_port' => '3387',
                'device_id' => $device->id,
                'connection_status_id' => ConnectionStatus::where('name', config('rssh.seeder.connection_status.disconnect'))->first()->id,
            ]);
        }
    }
}

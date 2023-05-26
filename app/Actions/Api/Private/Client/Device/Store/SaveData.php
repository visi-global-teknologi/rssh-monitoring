<?php

namespace App\Actions\Api\Private\Client\Device\Store;

use App\Models\ConnectionStatus;
use App\Models\Device;
use App\Models\RsshConnection;
use Illuminate\Http\Request;

class SaveData
{
    public static function handle(Request $request)
    {
        $device = Device::create($request->only(['unique_code', 'description', 'client_id', 'name', 'active_status']));
        RsshConnection::create([
            'server_port' => $request->server_port,
            'local_port' => config('rssh.rssh_connection.local_port'),
            'device_id' => $device->id,
            'connection_status_id' => ConnectionStatus::where('name', config('rssh.seeder.connection_status.disconnect'))->first()->id,
        ]);
    }
}

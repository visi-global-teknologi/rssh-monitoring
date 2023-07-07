<?php

namespace App\Actions\Api\Private\RsshConnection\RequestTerminate;

use App\Models\ConnectionStatus;
use App\Models\Device;
use App\Models\RsshConnection;
use App\Models\RsshLog;
use Illuminate\Http\Request;

class UpdateData
{
    public static function handle(Request $request)
    {
        $device = Device::where('id', $request->device_id)->first();

        if (config('rssh.device.status.no') == $device->active_status) {
            throw new \Exception('device status is non active');
        }

        $rsshConnection = RsshConnection::where('device_id', $request->device_id)->first();
        $connectionStatusTerminate = ConnectionStatus::where('name', config('rssh.seeder.connection_status.request_terminate'))->first();

        if (is_null($connectionStatusTerminate)) {
            throw new \Exception('status request terminate not found');
        }

        RsshConnection::where('device_id', $request->device_id)->update([
            'connection_status_id' => $connectionStatusTerminate->id,
        ]);

        RsshLog::create([
            'log' => 'request terminate connection port '.$rsshConnection->server_port,
            'rssh_connection_id' => $rsshConnection->id,
        ]);
    }
}

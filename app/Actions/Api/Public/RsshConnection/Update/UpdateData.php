<?php

namespace App\Actions\Api\Public\RsshConnection\Update;

use App\Models\ConnectionStatus;
use App\Models\Device;
use App\Models\RsshConnection;
use App\Models\RsshLog;
use Illuminate\Http\Request;

class UpdateData
{
    public static function handle(Request $request)
    {
        $device = Device::where('unique_code', $request->unique_code)->first();

        if (config('rssh.device.status.no') == $device->active_status) {
            throw new \Exception('device status is non active');
        }

        $connectionStatus = ConnectionStatus::where('name', $request->status)->first();
        $rsshConnection = RsshConnection::where('device_id', $device->id)->update([
            'connection_status_id' => $connectionStatus->id,
        ]);
        $rsshConnection = RsshConnection::where('device_id', $device->id)->first();

        RsshLog::create([
            'log' => 'success update status rssh connection',
            'rssh_connection_id' => $rsshConnection->id,
        ]);
    }
}

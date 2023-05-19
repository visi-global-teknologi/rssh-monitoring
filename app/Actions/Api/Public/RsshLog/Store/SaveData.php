<?php

namespace App\Actions\Api\Public\RsshLog\Store;

use App\Models\Device;
use App\Models\RsshConnection;
use App\Models\RsshLog;
use Illuminate\Http\Request;

class SaveData
{
    public static function handle(Request $request)
    {
        $device = Device::where('unique_code', $request->unique_code_device)->first();

        if (is_null($device)) {
            throw new \Exception('device not found');
        }

        if ('no' == $device->active_status) {
            throw new \Exception('device status is non active');
        }

        $rsshConnection = RsshConnection::where('device_id', $device->id)->first();
        RsshLog::create([
            'log' => $request->log,
            'is_error' => $request->is_error,
            'rssh_connection_id' => $rsshConnection->id,
        ]);
    }
}

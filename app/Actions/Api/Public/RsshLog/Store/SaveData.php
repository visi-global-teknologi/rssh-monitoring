<?php

namespace App\Actions\Api\Public\RsshLog\Store;

use App\Models\Device;
use App\Models\RsshLog;
use Illuminate\Http\Request;
use App\Models\RsshConnection;

class SaveData
{
    public static function handle(Request $request)
    {
        $device = Device::where('unique_code', $request->unique_code_device)->where('active_status', 'yes')->first();

        if (is_null($device))
            throw new \Exception('device status is non active');

        $rsshConnection = RsshConnection::where('device_id', $device->id)->first();
        RsshLog::create([
            'log' => $request->log,
            'is_error' => $request->is_error,
            'rssh_connection_id' => $rsshConnection->id
        ]);
    }
}

<?php

namespace App\Actions\Api\Public\RsshConnection\Update;

use App\Models\ConnectionStatus;
use App\Models\Device;
use App\Models\RsshConnection;
use Illuminate\Http\Request;

class UpdateData
{
    public static function handle(Request $request)
    {
        $device = Device::where('unique_code', $request->unique_code)->first();
        $connectionStatus = ConnectionStatus::where('name', $request->status)->first();

        RsshConnection::where('device_id', $device->id)->update([
            'connection_status_id' => $connectionStatus->id,
        ]);
    }
}

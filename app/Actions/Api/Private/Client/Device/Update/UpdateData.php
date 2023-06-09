<?php

namespace App\Actions\Api\Private\Client\Device\Update;

use App\Models\Device;
use App\Models\RsshConnection;
use Illuminate\Http\Request;

class UpdateData
{
    public static function handle(Request $request)
    {
        Device::where('id', $request->device_id)->update($request->only(['unique_code', 'description', 'name', 'active_status']));
        RsshConnection::where('device_id', $request->device_id)->update($request->only(['server_port']));
    }
}

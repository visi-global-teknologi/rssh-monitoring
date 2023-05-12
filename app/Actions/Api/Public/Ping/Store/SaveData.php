<?php

namespace App\Actions\Api\Public\Ping\Store;

use App\Models\Device;
use App\Models\PingServer;
use Illuminate\Http\Request;

class SaveData
{
    public static function handle(Request $request)
    {
        $device = Device::where('unique_code', $request->unique_code)->where('active_status', 'yes')->first();

        if (is_null($device)) {
            throw new \Exception('device status is non active');
        }

        PingServer::create([
            'date_time' => now(),
            'device_id' => $device->id,
        ]);
    }
}

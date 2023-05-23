<?php

namespace App\Actions\Api\Public\RsshConnection\ConnectionStatus;

use App\Models\Device;
use App\Models\RsshConnection;
use Illuminate\Http\Request;

class Handler
{
    public function handle(Request $request, $uniqueCodeDevice)
    {
        try {
            $device = Device::where('unique_code', $uniqueCodeDevice)->first();

            if (is_null($device)) {
                throw new \Exception('device not found');
            }

            if (config('rssh.device.status.no') == $device->active_status) {
                throw new \Exception('device status is non active');
            }

            $rsshConnection = RsshConnection::with(['connection_status'])->where('device_id', $device->id)->first();
            return response()->api(true, 200, ['connection_status' => $rsshConnection->connection_status->name], 'Successfully return data connection status', '', '');
        } catch (\Exception $e) {
            throw new \Exception($e->getMessage());
        }
    }
}

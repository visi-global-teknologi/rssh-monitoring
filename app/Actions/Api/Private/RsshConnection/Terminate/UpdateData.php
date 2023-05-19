<?php

namespace App\Actions\Api\Private\RsshConnection\Terminate;

use App\Models\ConnectionStatus;
use App\Models\RsshConnection;
use App\Models\RsshLog;
use Illuminate\Http\Request;

class UpdateData
{
    public static function handle(Request $request)
    {
        $rsshConnection = RsshConnection::where('device_id', $request->device_id)->first();
        RsshConnection::where('device_id', $request->device_id)->update([
            'connection_status_id' => ConnectionStatus::where('name', 'request terminate')->first()->id,
        ]);
        RsshLog::create([
            'log' => 'request terminate connection port '.$rsshConnection->server_port,
            'rssh_connection_id' => $rsshConnection->id,
        ]);
    }
}

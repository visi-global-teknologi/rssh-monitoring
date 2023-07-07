<?php

namespace App\Actions\Api\Private\Client\Device\Store;

use App\Models\Client;
use Illuminate\Http\Request;

class ValidateRequest
{
    public static function handle(Request $request)
    {
        $request->validate([
            'name' => 'required|unique:devices,name',
            'client_id' => 'required|exists:clients,id',
            'description' => 'nullable',
            'active_status' => 'required|in:yes,no',
            'unique_code' => 'required|unique:devices,unique_code',
            'server_port' => 'required|numeric|unique:rssh_connections,server_port|min:1000',
        ]);

        $client = Client::where('id', $request->client_id)->first();

        if (config('rssh.device.status.no') == $client->active_status) {
            throw new \Exception('Status client must be active for this action');
        }

        $listPortForbidden = config('rssh.rssh_connection.forbidden_port');

        if (count($listPortForbidden) > 0) {
            if (in_array($request->server_port, $listPortForbidden)) {
                throw new \Exception('Port is forbidden');
            }
        }
    }
}

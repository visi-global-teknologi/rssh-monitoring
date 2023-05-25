<?php

namespace App\Actions\Api\Private\Client\Device\Update;

use App\Models\Client;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class ValidateRequest
{
    public static function handle(Request $request)
    {
        $request->validate([
            'name' => [
                'required',
                Rule::unique('devices', 'name')->ignore($request->device_id, 'id'),
            ],
            'client_id' => 'required|exists:clients,id',
            'description' => 'nullable',
            'active_status' => 'required|in:yes,no',
            'unique_code' => [
                'required',
                Rule::unique('devices', 'unique_code')->ignore($request->device_id, 'id'),
            ],
        ]);

        $client = Client::where('id', $request->client_id)->first();

        if (config('rssh.device.status.no') == $client->active_status) {
            throw new Exception('Status client must be active for this action');
        }
    }
}

<?php

namespace App\Actions\Api\Private\Client\Update;

use App\Models\Client;
use App\Models\Device;
use Illuminate\Http\Request;

class UpdateData
{
    public static function handle(Request $request)
    {
        Client::where('id', $request->client_id)->update($request->only(['name', 'active_status']));
        Device::where('client_id', $request->client_id)->update(['active_status' => $request->active_status]);
    }
}

<?php

namespace App\Actions\Api\Private\Client\Device\Store;

use App\Models\Device;
use Illuminate\Http\Request;

class SaveData
{
    public static function handle(Request $request)
    {
        Device::create($request->only(['unique_code', 'description', 'client_id', 'name', 'active_status']));
    }
}

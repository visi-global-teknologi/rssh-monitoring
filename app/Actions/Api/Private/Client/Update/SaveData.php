<?php

namespace App\Actions\Api\Private\Client\Update;

use App\Models\Client;
use Illuminate\Http\Request;

class SaveData
{
    public static function handle(Request $request)
    {
        Client::where('id', $request->client_id)->update($request->only(['name', 'active_status']));
    }
}

<?php

namespace App\Actions\Api\Private\Client\Store;

use App\Models\Client;
use Illuminate\Http\Request;

class SaveData
{
    public static function handle(Request $request)
    {
        Client::create($request->only(['name']));
    }
}

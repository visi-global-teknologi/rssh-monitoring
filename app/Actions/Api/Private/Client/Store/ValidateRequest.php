<?php

namespace App\Actions\Api\Private\Client\Store;

use Illuminate\Http\Request;

class ValidateRequest
{
    public static function handle(Request $request)
    {
        $request->validate([
            'name' => 'required|unique:clients,name'
        ]);
    }
}

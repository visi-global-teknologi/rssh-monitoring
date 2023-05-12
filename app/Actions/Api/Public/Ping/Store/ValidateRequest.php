<?php

namespace App\Actions\Api\Public\Ping\Store;

use Illuminate\Http\Request;

class ValidateRequest
{
    public static function handle(Request $request)
    {
        $request->validate([
            'unique_code' => 'required|exists:devices,unique_code'
        ]);
    }
}

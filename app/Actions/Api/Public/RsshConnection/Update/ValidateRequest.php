<?php

namespace App\Actions\Api\Public\RsshConnection\Update;

use Illuminate\Http\Request;

class ValidateRequest
{
    public static function handle(Request $request)
    {
        $request->validate([
            'unique_code' => 'required|exists:devices,unique_code',
            'status' => 'required|exists:connection_statuses,name'
        ]);
    }
}

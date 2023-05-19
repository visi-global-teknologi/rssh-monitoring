<?php

namespace App\Actions\Api\Public\RsshLog\Store;

use Illuminate\Http\Request;

class ValidateRequest
{
    public static function handle(Request $request)
    {
        $request->validate([
            'unique_code_device' => 'required|exists:devices,unique_code',
            'log' => 'required',
            'is_error' => 'nullable|in:no,yes',
        ]);
    }
}

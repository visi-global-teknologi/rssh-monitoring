<?php

namespace App\Actions\Api\Private\Client\Update;

use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class ValidateRequest
{
    public static function handle(Request $request)
    {
        $request->validate([
            'client_id' => 'required:exists:clients,id',
            'active_status' => 'required|in:yes,no',
            'name' => [
                'required',
                Rule::unique('clients', 'name')->ignore($request->client_id, 'id'),
            ]
        ]);
    }
}

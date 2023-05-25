<?php

namespace App\Actions\Api\Private\Client\Device\Store;

use Illuminate\Http\Request;

class Handler
{
    public function handle(Request $request, $id)
    {
        try {
            $request->request->add([
                'client_id' => $id,
            ]);
            ValidateRequest::handle($request);
            SaveData::handle($request);
            return response()->api(true, 200, [], 'Successfully store data', '', '');
        } catch (\Exception $e) {
            throw new \Exception($e->getMessage());
        }
    }
}

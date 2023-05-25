<?php

namespace App\Actions\Api\Private\Client\Device\Update;

use Illuminate\Http\Request;

class Handler
{
    public function handle(Request $request, $id, $device)
    {
        try {
            $request->request->add([
                'client_id' => $id,
                'device_id' => $device
            ]);
            ValidateRequest::handle($request);
            UpdateData::handle($request);
            return response()->api(true, 200, [], 'Successfully update data', '', '');
        } catch (\Exception $e) {
            throw new \Exception($e->getMessage());
        }
    }
}

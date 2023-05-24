<?php

namespace App\Actions\Api\Private\Client\Update;

use Illuminate\Http\Request;

class Handler
{
    public function handle(Request $request, $id)
    {
        try {
            $request->request->add([
                'client_id' => $id
            ]);
            ValidateRequest::handle($request);
            SaveData::handle($request);
            return response()->api(true, 200, [], 'Successfully update data', '', '');
        } catch (\Exception $e) {
            throw new \Exception($e->getMessage());
        }
    }
}

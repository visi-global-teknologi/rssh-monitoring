<?php

namespace App\Actions\Api\Private\Client\Device\Store;

use DB;
use Illuminate\Http\Request;

class Handler
{
    public function handle(Request $request, $id)
    {
        DB::beginTransaction();
        try {
            $request->request->add([
                'client_id' => $id,
            ]);
            ValidateRequest::handle($request);
            SaveData::handle($request);
            DB::commit();
            return response()->api(true, 200, [], 'Successfully store data', '', '');
        } catch (\Exception $e) {
            DB::rollback();
            throw new \Exception($e->getMessage());
        }
    }
}

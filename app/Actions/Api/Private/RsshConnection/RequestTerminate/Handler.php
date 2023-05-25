<?php

namespace App\Actions\Api\Private\RsshConnection\RequestTerminate;

use DB;
use Illuminate\Http\Request;

class Handler
{
    public function handle(Request $request, $id)
    {
        DB::beginTransaction();
        try {
            $request->request->add([
                'device_id' => $id,
            ]);
            ValidateRequest::handle($request);
            UpdateData::handle($request);
            DB::commit();
            return response()->api(true, 200, [], 'Successfully send terminate request', '', '');
        } catch (\Exception $e) {
            DB::rollback();
            throw new \Exception($e->getMessage());
        }
    }
}

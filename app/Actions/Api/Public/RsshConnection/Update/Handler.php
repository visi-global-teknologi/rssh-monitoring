<?php

namespace App\Actions\Api\Public\RsshConnection\Update;

use Illuminate\Http\Request;

class Handler
{
    public function handle(Request $request, $uniqueCodeDevice)
    {
        try {
            $request->request->add([
                'unique_code' => $uniqueCodeDevice
            ]);
            ValidateRequest::handle($request);
            UpdateData::handle($request);
            return response()->api(true, 200, [], 'Successfully update rssh connection status', '', '');
        } catch (\Exception $e) {
            throw new \Exception($e->getMessage());
        }
    }
}

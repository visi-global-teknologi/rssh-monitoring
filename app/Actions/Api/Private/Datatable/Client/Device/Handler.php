<?php

namespace App\Actions\Api\Private\Datatable\Client\Device;

use App\Models\DeviceView;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;

class Handler
{
    public function handle(Request $request, $clientId)
    {
        $query = DeviceView::query()->where('client_id', $clientId)->latest();

        return DataTables::of($query)->toJson();
    }
}

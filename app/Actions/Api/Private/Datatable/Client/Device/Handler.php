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

        return DataTables::of($query)
            ->addColumn('column_action', function ($row) {
                $routeEdit = route('client.devices.edit', ['id' => $row->client_id, 'device' => $row->id]);
                return view('skote.pages.client.device.datatable.index.column_action', compact('routeEdit'))->render();
            })
            ->rawColumns(['column_action'])
            ->toJson();
    }
}

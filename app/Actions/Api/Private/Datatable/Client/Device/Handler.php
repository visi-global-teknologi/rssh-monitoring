<?php

namespace App\Actions\Api\Private\Datatable\Client\Device;

use App\Models\RsshConnectionView;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;

class Handler
{
    public function handle(Request $request, $clientId)
    {
        $query = RsshConnectionView::query()->where('client_id', $clientId);

        return DataTables::of($query)
            ->addColumn('column_action', function ($row) {
                $routeEdit = route('client.devices.edit', ['id' => $row->client_id, 'device' => $row->id]);
                return view('skote.pages.client.device.datatable.index.column_action', compact('routeEdit'))->render();
            })
            ->editColumn('active_status_html', function ($row) {
                return view('skote.pages.client.device.datatable.index.column_active_status', compact('row'))->render();
            })
            ->rawColumns(['column_action', 'active_status_html'])
            ->toJson();
    }
}

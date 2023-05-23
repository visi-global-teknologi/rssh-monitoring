<?php

namespace App\Actions\Api\Private\Datatable\PingServer;

use App\Models\PingServer as PingServerModel;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;

class Handler
{
    public function handle(Request $request)
    {
        $query = PingServerModel::query()->with(['device.client'])->latest();

        return DataTables::of($query)
            ->addColumn('created_at_human_readable_formatted', function ($row) {
                return $row->created_at->toDayDateTimeString();
            })
            ->toJson();
    }
}

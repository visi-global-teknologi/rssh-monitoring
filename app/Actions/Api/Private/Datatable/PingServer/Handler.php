<?php

namespace App\Actions\Api\Private\Datatable\PingServer;

use App\Models\PingServerView;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;

class Handler
{
    public function handle(Request $request)
    {
        $query = PingServerView::query();

        return DataTables::of($query)
            ->addColumn('updated_at_human_readable_formatted', function ($row) {
                return $row->updated_at->toDayDateTimeString();
            })
            ->toJson();
    }
}

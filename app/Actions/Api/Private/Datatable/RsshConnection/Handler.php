<?php

namespace App\Actions\Api\Private\Datatable\RsshConnection;

use App\Models\RsshLogView;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;

class Handler
{
    public function handle(Request $request)
    {
        $query = RsshLogView::query();

        return DataTables::of($query)
            ->addColumn('created_at_human_readable_formatted', function ($row) {
                return $row->created_at->toDayDateTimeString();
            })
            ->toJson();
    }
}

<?php

namespace App\Actions\Api\Private\Datatable\Device;

use App\Models\DeviceView;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;

class Handler
{
    public function handle(Request $request)
    {
        $query = DeviceView::query();

        return DataTables::of($query)
            ->addColumn('created_at_human_readable_formatted', function ($row) {
                return $row->created_at->toDayDateTimeString();
            })
            ->editColumn('active_status_html', function ($row) {
                return view('skote.pages.device.datatable.index.column_active_status', compact('row'))->render();
            })
            ->rawColumns(['active_status_html'])
            ->toJson();
    }
}

<?php

namespace App\Actions\Api\Private\Datatable\RsshLog;

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
            ->editColumn('is_error_html', function ($row) {
                return view('skote.pages.rssh-log.datatable.index.column_is_error', compact('row'))->render();
            })
            ->rawColumns(['is_error_html'])
            ->toJson();
    }
}

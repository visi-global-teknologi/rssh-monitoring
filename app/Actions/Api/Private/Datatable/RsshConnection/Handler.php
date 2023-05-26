<?php

namespace App\Actions\Api\Private\Datatable\RsshConnection;

use App\Models\RsshConnectionView;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;

class Handler
{
    public function handle(Request $request)
    {
        $query = RsshConnectionView::query();

        return DataTables::of($query)
            ->addColumn('updated_at_human_readable_formatted', function ($row) {
                return $row->updated_at->toDayDateTimeString();
            })
            ->addColumn('column_action', function ($row) {
                $showButtonRequestTerminate = false;

                if ($row->connection_status_name == config('rssh.seeder.connection_status.connected')) {
                    $showButtonRequestTerminate = true;
                }
                $routeRequestTerminate = route('api.private.rssh-connection.request-terminate', $row->id);
                return view('skote.pages.rssh-connection.datatable.index.column_action', compact('routeRequestTerminate', 'showButtonRequestTerminate'))->render();
            })
            ->rawColumns(['column_action'])
            ->toJson();
    }
}

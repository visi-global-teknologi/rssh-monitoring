<?php

namespace App\Actions\Api\Private\Datatable\Client;

use App\Models\Client as ClientModel;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;

class Handler
{
    public function handle(Request $request)
    {
        $query = ClientModel::query()->latest();

        return DataTables::of($query)
            ->addColumn('column_action', function ($row) {
                $routeEdit = route('clients.edit', ['client' => $row->id]);
                return view('skote.pages.client.datatable.index.column_action', compact('routeEdit'))->render();
            })
            ->rawColumns(['column_action'])
            ->toJson();
    }
}

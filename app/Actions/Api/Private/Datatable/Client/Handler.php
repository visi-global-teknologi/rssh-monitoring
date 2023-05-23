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

        return DataTables::of($query)->toJson();
    }
}

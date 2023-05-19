<?php

namespace App\Actions\Api\Private\Datatable\Client;

use App\Models\Client;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;

class Handler
{
    public function handle(Request $request)
    {
        $query = Client::query();

        return DataTables::of($query)->toJson();
    }
}

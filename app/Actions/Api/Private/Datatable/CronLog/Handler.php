<?php

namespace App\Actions\Api\Private\Datatable\CronLog;

use DB;
use App\Models\CronLog;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;

class Handler
{
    public function handle(Request $request)
    {
        $query = CronLog::query()->with(['rssh_connection.device.client']);

        return DataTables::of($query)->toJson();
    }
}

<?php

namespace App\Actions\Api\Private\Datatable\CronLog;

use App\Models\CronLog;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;

class Handler
{
    public function handle(Request $request)
    {
        $query = CronLog::query()->with(['rssh_connection.device.client'])->latest('created_at');

        return DataTables::of($query)->toJson();
    }
}

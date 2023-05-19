<?php

namespace App\Actions\Api\Private\Datatable\CronLog;

use App\Models\CronLog;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;

class Handler
{
    public function handle(Request $request)
    {
        // $query = CronLog::query()->latest()->with(['rssh_connection.device.client'])->groupBy('rssh_connection_id');
        $query = CronLog::query()->with(['rssh_connection.device.client' => function ($q){
            $q->orderBy('created_at', 'desc');
        }]);

        return DataTables::of($query)->toJson();
    }
}

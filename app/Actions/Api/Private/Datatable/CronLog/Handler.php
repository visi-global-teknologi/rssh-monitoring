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
        $query = CronLog::select(DB::raw('id, file_name, log, is_error, rssh_connection_id, created_at, max(created_at) as latest_created_at'))
                ->orderBy('latest_created_at', 'desc')
                ->groupBy('rssh_connection_id');

        // return DataTables::query(
        //     DB::table('cron_logs')
        //         ->orderBy('created_at', 'desc')
		// 	    ->groupBy('rssh_connection_id')
        // )
        // ->toJson();
        // $query = CronLog::query()->with(['rssh_connection.device.client'])->latest('created_at')->groupBy('rssh_connection_id');

        return DataTables::of($query)->toJson();
    }
}

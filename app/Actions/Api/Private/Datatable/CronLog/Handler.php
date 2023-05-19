<?php

namespace App\Actions\Api\Private\Datatable\CronLog;

use App\Models\CronLog;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;

class Handler
{
    public function handle(Request $request)
    {
        $query = CronLog::query()->latest();

        return DataTables::of($query)
            ->addColumn('created_at_human_formatted', function ($row) {
                return $row->created_at->toFormattedDayDateString();
            })
            ->toJson();
    }
}

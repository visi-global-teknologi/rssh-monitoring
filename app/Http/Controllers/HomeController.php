<?php

namespace App\Http\Controllers;

use App\Models\Client;
use App\Models\CronLogView;
use App\Models\Device;
use App\Models\RsshLogView;
use Carbon\Carbon;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $clientsTotal = Client::count();
        $clientsNonActiveTotal = Client::where('active_status', config('rssh.client.status.no'))->count();
        $devicesTotal = Device::count();
        $devicesNonActiveTotal = Device::where('active_status', config('rssh.device.status.no'))->count();
        $cronLogsErrorToday = CronLogView::where('created_at', Carbon::today())->count();
        $rsshLogsErrorToday = RsshLogView::where('created_at', Carbon::today())->count();

        return view('skote.pages.home', compact(
            'clientsTotal', 'clientsNonActiveTotal', 'devicesTotal',
            'devicesNonActiveTotal', 'cronLogsErrorToday', 'rsshLogsErrorToday'
        ));
    }
}

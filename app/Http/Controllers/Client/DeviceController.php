<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use App\Models\Client as ClientModel;
use App\Models\Device;
use Illuminate\Http\Request;

class DeviceController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        try {
            $currentUri = request()->segments();
            $clientId = $currentUri[1];
            $client = ClientModel::where('id', $clientId)->firstOrFail();
            $routeApiDatatable = route('api.private.datatable.client.device', $clientId);
            return view('skote.pages.client.device.index', compact('routeApiDatatable', 'clientId'));
        } catch (\Exception $e) {
            return redirect()->route('clients.index')->withErrors(['message' => $e->getMessage()]);
        }
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        try {
            $currentUri = request()->segments();
            $clientId = $currentUri[1];
            $client = ClientModel::where('id', $clientId)->firstOrFail();

            if (config('rssh.client.status.no') == $client->active_status) {
                throw new Exception('Status client must be active for this action');
            }

            return view('skote.pages.client.device.create', compact('client'));
        } catch (\Exception $e) {
            return redirect()->route('client.devices.index', $clientId)->withErrors(['message' => $e->getMessage()]);
        }
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        try {
            $currentUri = request()->segments();
            $clientId = $currentUri[1];
            $deviceId = $currentUri[3];
            $client = ClientModel::where('id', $clientId)->firstOrFail();

            if (config('rssh.client.status.no') == $client->active_status) {
                throw new Exception('Status client must be active for this action');
            }

            $device = Device::where('id', $deviceId)->firstOrFail();
            return view('skote.pages.client.device.edit', compact('client', 'device'));
        } catch (\Exception $e) {
            return redirect()->route('client.devices.index', $clientId)->withErrors(['message' => $e->getMessage()]);
        }
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}

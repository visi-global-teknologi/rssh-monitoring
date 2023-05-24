<?php

namespace App\Http\Controllers\Client;

use App\Models\Client as ClientModel;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

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
            return view('skote.pages.client.device.index', compact('routeApiDatatable'));
        } catch (\Exception $e) {
            return redirect()->route('clients.index')->withErrors(['message' => $e->getMessage()]);
        }
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
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
        //
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

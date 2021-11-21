<?php

namespace App\Http\Controllers;

use App\Http\Requests\ZoneRequest;
use App\Imports\ZonesImport;
use App\Models\User;
use App\Models\Zone;
use Illuminate\Http\Request;
use Illuminate\Contracts\View\View;
use Illuminate\Support\Facades\Gate;
use Maatwebsite\Excel\Facades\Excel;

class ZoneController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(): View
    {
        abort_if(Gate::denies('zone_access'), 403);

        $zones = Zone::with('equipments')->get();

        $data = [
            'zones' => $zones
        ];

        return view('zones.index', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(): View
    {
        abort_if(Gate::denies('zone_create'), 403);


        $data = [
        ];

        return view('zones.create', $data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param ZoneRequest $zoneRequest
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(ZoneRequest $zoneRequest)
    {
        abort_if(Gate::denies('zone_create'), 403);

        Zone::create($zoneRequest->validated());

        return redirect()->route("zones.index");
    }

    /**
     * Display the specified resource.
     *
     * @param \App\Models\Zone $zone
     * @return \Illuminate\Http\Response
     */
    public function show(Zone $zone): View
    {
        abort_if(Gate::denies('zone_show'), 403);

        $equipments = $zone->equipments;

        $data = [
            'equipments' => $equipments,
            'zone' => $zone
        ];

        return view('zones.show', $data);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param \App\Models\Zone $zone
     * @return \Illuminate\Http\Response
     */
    public function edit(Zone $zone): View
    {
        abort_if(Gate::denies('zone_edit'), 403);

        $data = [
            'zone' => $zone
        ];

        return view('zones.edit', $data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param ZoneRequest $zoneRequest
     * @param \App\Models\Zone $zone
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Throwable
     */
    public function update(ZoneRequest $zoneRequest, Zone $zone)
    {
        abort_if(Gate::denies('zone_edit'), 403);

        $zone->updateOrFail($zoneRequest->validated());

        return redirect()->route("zones.show", ['zone' => $zone]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param \App\Models\Zone $zone
     * @return \Illuminate\Http\Response
     */
    public function destroy(Zone $zone)
    {
        //
    }

    public function initializeData(Request $request)
    {

        Excel::import(new ZonesImport(), $request->file('file')->store('temp'));
        return back();

    }
}

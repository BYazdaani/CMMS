<?php

namespace App\Http\Controllers;

use App\Http\Requests\EquipmentRequest;
use App\Imports\EquipmentImport;
use App\Models\Equipment;
use App\Models\Zone;
use Illuminate\Http\Request;
use Illuminate\Contracts\View\View;
use Illuminate\Support\Facades\Gate;
use Maatwebsite\Excel\Facades\Excel;

class EquipmentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index():View
    {
        abort_if(Gate::denies('equipment_access'), 403);

        $equipments = Equipment::with('zone')->get();

        $data = [
            'equipments' => $equipments
        ];

        return view('equipments.index', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create() : View
    {
        abort_if(Gate::denies("equipment_create"),403);

        $zones = Zone::all();

        $data = [
            'zones' => $zones
        ];

        return view('equipments.create', $data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param EquipmentRequest $equipmentRequest
     * @return void
     */
    public function store(EquipmentRequest $equipmentRequest)
    {
        abort_if(Gate::denies("equipment_store"),403);

        dd($equipmentRequest->validated());
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Equipment  $equipment
     * @return \Illuminate\Http\Response
     */
    public function show(Equipment $equipment)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Equipment  $equipment
     * @return \Illuminate\Http\Response
     */
    public function edit(Equipment $equipment)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Equipment  $equipment
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Equipment $equipment)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Equipment  $equipment
     * @return \Illuminate\Http\Response
     */
    public function destroy(Equipment $equipment)
    {
        //
    }

    public function initializeData(Request $request)
    {

        Excel::import(new EquipmentImport(), $request->file('file')->store('temp'));
        return back();

    }
}

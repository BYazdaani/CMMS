<?php

namespace App\Http\Controllers;

use App\Http\Requests\EquipmentRequest;
use App\Imports\EquipmentImport;
use App\Models\Equipment;
use App\Models\Zone;
use Illuminate\Http\Request;
use Illuminate\Contracts\View\View;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Gate;
use Maatwebsite\Excel\Facades\Excel;

class EquipmentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(): View
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
    public function create(): View
    {
        abort_if(Gate::denies("equipment_create"), 403);

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
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(EquipmentRequest $equipmentRequest)
    {
        abort_if(Gate::denies("equipment_create"), 403);

        DB:: beginTransaction();

        try {

            $zone = Zone::findOrFail($equipmentRequest->zone_id);

            $equipment = $zone->equipments()->create($equipmentRequest->only("name", "code", "serial_number", "model"));

            $technical_file = $equipment->technicalFile()->create(
                $equipmentRequest->only("power", "frequency", "electric_power", "voltage", "weight", "capacity", "compressed_air_pressure", "start", "length", "width", "height",
                    "description", "special_tools", "manufacturer", "address", "phone_number", "email", "cost", "date_of_manufacture", "date_of_purchase", "installation_date", "commissioning_date")
            );

            if ($equipmentRequest->file('picture') != null) {
                $picture = $equipmentRequest->file('picture');
                $url = $picture->store('/pictures');
                $technical_file->picture = "storage/" .$url;
                $technical_file->save();
            }

            if ($equipmentRequest->file('electrical_schema') != null) {
                $electrical_schema = $equipmentRequest->file('electrical_schema');
                $url = $electrical_schema->store('/electrical_schemas');
                $technical_file->electrical_schema = "storage/" .$url;
                $technical_file->save();
            }

            if ($equipmentRequest->file('plan') != null) {
                $plan = $equipmentRequest->file('plan');
                $url = $plan->store('/plans');
                $technical_file->plan = "storage/" .$url;
                $technical_file->save();
            }

            if ($equipmentRequest->file('file') != null) {
                $file = $equipmentRequest->file('file');
                $url = $file->store('/attached_files');

                $technical_file->equipmentAttachedFile()->create([
                    "file" => "storage/" .$url
                ]);
            }


        } catch (\Exception  $e) {
            DB::rollBack();
            dd($e->getMessage());
        }

        DB::commit();
        return redirect()->route("equipments.index");
    }

    /**
     * Display the specified resource.
     *
     * @param \App\Models\Equipment $equipment
     * @return \Illuminate\Http\Response
     */
    public function show(Equipment $equipment): View
    {
        abort_if(Gate::denies("equipment_create"), 403);

        $data = [
            "equipment" => $equipment
        ];

        return view('equipments.show', $data);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param \App\Models\Equipment $equipment
     * @return \Illuminate\Http\Response
     */
    public function edit(Equipment $equipment)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\Equipment $equipment
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Equipment $equipment)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param \App\Models\Equipment $equipment
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

    /**
     * Show the form for editing the specified resource.
     *
     * @param \App\Models\Equipment $equipment
     * @return \Illuminate\Http\Response
     */
    public function print(Equipment $equipment)
    {
        //
    }
}

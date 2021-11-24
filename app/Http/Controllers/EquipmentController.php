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

            $equipment = Equipment::create($equipmentRequest->only("name", "code", "serial_number", "model", "zone_id"));

            //work with select

            if ($equipmentRequest->file('picture') != null) {
                $picture = $equipmentRequest->file('picture');
                $url = $picture->store('/pictures');
                $picture = "storage/" . $url;
            }

            if ($equipmentRequest->file('electrical_schema') != null) {
                $electrical_schema = $equipmentRequest->file('electrical_schema');
                $url = $electrical_schema->store('/electrical_schemas');
                $electrical_schema = "storage/" . $url;
            }

            if ($equipmentRequest->file('plan') != null) {
                $plan = $equipmentRequest->file('plan');
                $url = $plan->store('/plans');
                $plan = "storage/" . $url;
            }

            $technical_file = $equipment->technicalFile()->create(
                $equipmentRequest->only($picture, $electrical_schema, $plan, "power", "frequency", "electric_power", "voltage", "weight", "capacity", "compressed_air_pressure", "start", "length", "width", "height",
                    "description", "special_tools", "manufacturer", "address", "phone_number", "email", "cost", "date_of_manufacture", "date_of_purchase", "installation_date", "commissioning_date")
            );

            if ($equipmentRequest->file('file') != null) {
                $file = $equipmentRequest->file('file');
                $url = $file->store('/attached_files');

                $technical_file->equipmentAttachedFile()->create([
                    "file" => "storage/" . $url
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
    public function edit(Equipment $equipment): View
    {
        abort_if(Gate::denies("equipment_edit"), 403);

        $zones = Zone::all();

        $data = [
            "equipment" => $equipment,
            'zones' => $zones
        ];

        return view('equipments.update', $data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param EquipmentRequest $equipmentRequest
     * @param \App\Models\Equipment $equipment
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(EquipmentRequest $equipmentRequest, Equipment $equipment): \Illuminate\Http\RedirectResponse
    {
        abort_if(Gate::denies("equipment_edit"), 403);

        $equipment->updateOrFail($equipmentRequest->only("name", "code", "serial_number", "model"));

        $equipment->technicalFile->updateOrFail(
            $equipmentRequest->only("power", "frequency", "electric_power", "voltage", "weight", "capacity", "compressed_air_pressure", "start", "length", "width", "height",
                "description", "special_tools", "manufacturer", "address", "phone_number", "email", "cost", "date_of_manufacture", "date_of_purchase", "installation_date", "commissioning_date")
        );

        if ($equipmentRequest->file('picture') != null) {
            $picture = $equipmentRequest->file('picture');
            $url = $picture->store('/pictures');
            $equipment->technicalFile->picture = "storage/" . $url;
            $equipment->technicalFile->save();
        }

        if ($equipmentRequest->file('electrical_schema') != null) {
            $electrical_schema = $equipmentRequest->file('electrical_schema');
            $url = $electrical_schema->store('/electrical_schemas');
            $equipment->technicalFile->electrical_schema = "storage/" . $url;
            $equipment->technicalFile->save();
        }

        if ($equipmentRequest->file('plan') != null) {
            $plan = $equipmentRequest->file('plan');
            $url = $plan->store('/plans');
            $equipment->technicalFile->plan = "storage/" . $url;
            $equipment->technicalFile->save();
        }

        if ($equipmentRequest->file('file') != null) {
            $file = $equipmentRequest->file('file');
            $url = $file->store('/attached_files');

            if ($equipment->technicalFile->equipmentAttachedFile != null) {
                $equipment->technicalFile->equipmentAttachedFile->file = "storage/" . $url;
                $equipment->technicalFile->equipmentAttachedFile->save();
            } else {
                $equipment->technicalFile->equipmentAttachedFile()->create([
                    "file" => "storage/" . $url
                ]);
            }
        }

        $data = [
            "equipment" => $equipment
        ];

        return redirect()->route("equipments.edit", ["equipment" => $equipment]);
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

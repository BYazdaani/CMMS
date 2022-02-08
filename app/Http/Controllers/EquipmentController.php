<?php

namespace App\Http\Controllers;

use App\Http\Requests\EquipmentRequest;
use App\Imports\EquipmentImport;
use App\Models\Department;
use App\Models\Equipment;
use App\Models\sparePart;
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
        $departments = Department::all();

        $data = [
            'zones' => $zones,
            "departments" => $departments
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

            $equipment = Equipment::create($equipmentRequest->only("name", "code", "serial_number", "model", "zone_id", "department_id"));

            //work with select

            $data = $equipmentRequest->validated();

            if ($equipmentRequest->file('picture') != null) {
                $picture = $equipmentRequest->file('picture');
                $url = $picture->store('/pictures');
                $data['picture'] = "storage/" . $url;
            }

            if ($equipmentRequest->file('electrical_schema') != null) {
                $electrical_schema = $equipmentRequest->file('electrical_schema');
                $url = $electrical_schema->store('/electrical_schemas');
                $data['electrical_schema'] = "storage/" . $url;
            }

            if ($equipmentRequest->file('plan') != null) {
                $plan = $equipmentRequest->file('plan');
                $url = $plan->store('/plans');
                $data['plan'] = "storage/" . $url;
            }

            $technical_file = $equipment->technicalFile()->create(
                $data
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
        abort_if(Gate::denies("equipment_show"), 403);

        $spare_parts = sparePart::where('code','like',$equipment->name.'%')->get();

        $data = [
            "equipment" => $equipment,
            "spare_parts"=>$spare_parts
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
        $departments = Department::all();

        $data = [
            "equipment" => $equipment,
            'zones' => $zones,
            "departments" => $departments
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

        $data = $equipmentRequest->validated();

        $equipment->updateOrFail($data);

        if ($equipmentRequest->file('picture') != null) {
            $picture = $equipmentRequest->file('picture');
            $url = $picture->store('/pictures');
            $data['picture'] = "storage/" . $url;
        }

        if ($equipmentRequest->file('electrical_schema') != null) {
            $electrical_schema = $equipmentRequest->file('electrical_schema');
            $url = $electrical_schema->store('/electrical_schemas');
            $data['electrical_schema'] = "storage/" . $url;
        }

        if ($equipmentRequest->file('plan') != null) {
            $plan = $equipmentRequest->file('plan');
            $url = $plan->store('/plans');
            $data['plan'] = "storage/" . $url;
        }

        $equipment->technicalFile->updateOrFail(
            $data
        );

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
    public function print(Equipment $equipment) : View
    {
        abort_if(Gate::denies("equipment_show"), 403);

        $data = [
            "equipment" => $equipment,
        ];

        return view('equipments.print', $data);
    }
}

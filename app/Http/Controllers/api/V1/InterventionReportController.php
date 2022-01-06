<?php

namespace App\Http\Controllers\api\V1;

use App\Http\Controllers\Controller;
use App\Http\Requests\InterventionRequest;
use App\Models\InterventionReport;
use App\Models\WorkOrder;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;

class

InterventionReportController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(InterventionRequest $request)
    {
        abort_if(Gate::denies('intervention_report_create'), 403);

        $data=$request->validated();

        $interventionReport=InterventionReport::create($data);

        $workOrderLog=$interventionReport->workOrder->workOrderLogs()->create([
            'status' => $request['status']
        ]);

        return response($workOrderLog,200);

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\InterventionReport  $interventionReport
     * @return \Illuminate\Http\Response
     */
    public function show(InterventionReport $interventionReport)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\InterventionReport  $interventionReport
     * @return \Illuminate\Http\Response
     */
    public function edit(InterventionReport $interventionReport)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\InterventionReport  $interventionReport
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, InterventionReport $interventionReport)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\InterventionReport  $interventionReport
     * @return \Illuminate\Http\Response
     */
    public function destroy(InterventionReport $interventionReport)
    {
        //
    }
}

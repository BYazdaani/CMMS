<?php

namespace App\Http\Controllers;

use App\Http\Requests\WorkOrderRequest;
use App\Models\WorkOrder;
use App\Models\WorkRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Gate;

class WorkOrderController extends Controller
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
     * @param WorkOrderRequest $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(WorkOrderRequest $request)
    {
        abort_if(Gate::denies('work_order_create'), 403);

        $data = $request->validated();

        $data['date'] = now()->toDateString();
        $data['hour'] = now()->toTimeString();
        $data['admin_id'] = Auth::user()->admin->id;

        $workOrder = WorkOrder::create($data);

        $workOrder->workOrderLogs()->create([
           'status'=>"created"
        ]);

        $workRequest = WorkRequest::findOrFail($request->get('work_request_id'));

        $workRequest->status = 1;

        $workRequest->save();

        return redirect()->route('work_requests.show', ['work_request' => $request->get('work_request_id')]);

    }

    /**
     * Display the specified resource.
     *
     * @param \App\Models\WorkOrder $workOrder
     * @return \Illuminate\Http\Response
     */
    public function show(WorkOrder $workOrder)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param \App\Models\WorkOrder $workOrder
     * @return \Illuminate\Http\Response
     */
    public function edit(WorkOrder $workOrder)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\WorkOrder $workOrder
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, WorkOrder $workOrder)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param \App\Models\WorkOrder $workOrder
     * @return \Illuminate\Http\Response
     */
    public function destroy(WorkOrder $workOrder)
    {
        //
    }
}

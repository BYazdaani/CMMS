<?php

namespace App\Http\Controllers;

use App\Http\Requests\WorkOrderRequest;
use App\Models\Equipment;
use App\Models\MaintenanceTechnician;
use App\Models\WorkOrder;
use App\Models\WorkRequest;
use App\Notifications\NewWorkOrder;
use App\Notifications\NewWorkRequest;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Gate;
use App\Http\Controllers\api\V1\FCMController;

class WorkOrderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @param Request $request
     * @return View
     */
    public function index(Request $request): View
    {
        abort_if(Gate::denies('work_order_access'), 403);

        switch ($request['filter']) {
            case "only":
                $workOrders = auth()->user()->maintenanceTechnician->workOrders;
                break;
            case "all":
                $workOrders = WorkOrder::all();
        }


        $data = [
            'workOrders' => $workOrders ?? WorkRequest::all()
        ];

        return view('work_orders.index', $data);
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
            'status' => "created"
        ]);

        $workRequest = WorkRequest::findOrFail($request->get('work_request_id'));

        $workRequest->status = 1;

        $workRequest->save();

        $workOrder->maintenanceTechnician->user->notify(new NewWorkOrder($workOrder, 'Vous avez un nouveau Ordre de Travail'));

        $workRequest->user->notify((new NewWorkRequest($workRequest, 'Votre demande est en cours de traitment'))->delay(now()->addSeconds(10)));

        $fcmController = new FCMController();

        $fcmController->store(
            "Ordre de Travail", $data['description'], "order", $workOrder->maintenanceTechnician->user->device_token
        );

        return redirect()->route('work_orders.show', ['work_order' => $workOrder]);

    }

    /**
     * Display the specified resource.
     *
     * @param \App\Models\WorkOrder $workOrder
     * @return \Illuminate\Http\Response
     */
    public function show(WorkOrder $workOrder): View
    {
        abort_if(Gate::denies('work_request_show'), 403);

        $data = [
            'work_order' => $workOrder,
        ];

        return view('work_orders.show', $data);

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
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy(WorkOrder $workOrder)
    {
        abort_if(Gate::denies('work_order_delete'), 403);

        $work_request = $workOrder->workRequest->id;

        $workOrder->delete();

        return redirect()->route("work_requests.show", ['work_request' => $work_request]);

    }
}

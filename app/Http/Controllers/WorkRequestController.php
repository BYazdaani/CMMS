<?php

namespace App\Http\Controllers;

use App\Http\Requests\WorkRequestRequest;
use App\Models\Equipment;
use App\Models\MaintenanceTechnician;
use App\Models\WorkRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;
use Illuminate\Contracts\View\View;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Validator;

class WorkRequestController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return View
     */
    public function index(Request $request): View
    {
        abort_if(Gate::denies('work_request_access'), 403);

        switch ($request['filter']) {
            case "only":
                $workRequests = auth()->user()->workRequests;
                break;
            case "all":
                $workRequests = WorkRequest::all();
        }


        $data = [
            'workRequests' => $workRequests ?? $workRequests = WorkRequest::all()
        ];

        return view('work_requests.index', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(): View
    {
        abort_if(Gate::denies('work_request_create'), 403);

        if (auth()->user()->hasRole('Client')) {
            $equipments = auth()->user()->department->equipments;
        } else {
            $equipments = Equipment::all();
        }

        $priorities = [
            "Haute", "Moyenne", "Basse"
        ];

        $data = [
            'equipments' => $equipments,
            'priorities' => $priorities,
        ];


        return view('work_requests.create', $data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param WorkRequestRequest $workRequestRequest
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(WorkRequestRequest $workRequestRequest)
    {
        abort_if(Gate::denies('work_request_create'), 403);

        $data = $workRequestRequest->validated();

        $data['date'] = now()->toDateString();
        $data['hour'] = now()->toTimeString();
        $data['user_id'] = auth()->id();

        $work_request = WorkRequest::create($data);

        if (now()->gt(now()->toDateString() . ' 07:30:00') && now()->lt(now()->toDateString() . ' 17:30:00')) {
            //here the admins will make decision
        } else {
            //here the system automatically chose a user to send him work order
        }

        return redirect()->route("work_requests.show", $work_request);

    }

    /**
     * Display the specified resource.
     *
     * @param \App\Models\WorkRequest $workRequest
     * @return \Illuminate\Http\Response
     */
    public function show(WorkRequest $workRequest): View
    {
        abort_if(Gate::denies('work_request_show'), 403);

        $data = [
            'workRequest' => $workRequest
        ];

        $data['priorities'] = ["Haute", "Moyenne", "Basse"];
        $data['types'] = ['Curatif', 'Préventif'];
        $data['natures'] = ['Eléctrique', 'Mécanique', 'Pneumatique', 'Hydraulique'];
        $data['technicians'] = MaintenanceTechnician::where('status', '=', 1)->with('user')->get();

        if ($workRequest->user_id == auth()->id()) {

            if (auth()->user()->hasRole('Client')) {
                $data['equipments'] = auth()->user()->department->equipments;
            } else {
                $data['equipments'] = Equipment::all();
            }

            return view('work_requests.edit', $data);
        } else {

            return view('work_requests.show', $data);
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param \App\Models\WorkRequest $workRequest
     * @return \Illuminate\Http\Response
     */
    public function edit(WorkRequest $workRequest)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\WorkRequest $workRequest
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(WorkRequestRequest $request, WorkRequest $workRequest)
    {
        abort_if(Gate::denies('work_request_edit'), 403);

        $workRequest->updateOrFail($request->validated());

        return redirect()->route('work_requests.show', $workRequest);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\WorkRequest $workRequest
     * @return \Illuminate\Http\RedirectResponse
     */
    public function cancel(Request $request, WorkRequest $workRequest)
    {

        abort_if(Gate::denies('work_request_edit'), 403);

        $workRequest->updateOrFail(["status" => 3]);

        return redirect()->route('work_requests.show', $workRequest);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param \App\Models\WorkRequest $workRequest
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy(WorkRequest $workRequest)
    {
        abort_if(Gate::denies('work_request_delete'), 403);

        $workRequest->delete();

        return redirect()->route('work_requests.index');
    }
}

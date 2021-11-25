<?php

namespace App\Http\Controllers;

use App\Http\Requests\WorkRequestRequest;
use App\Models\Equipment;
use App\Models\WorkRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;
use Illuminate\Contracts\View\View;

class WorkRequestController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return View
     */
    public function index(): View
    {
        abort_if(Gate::denies('work_request_access'), 403);

        $workRequests = auth()->user()->workRequests;

        $data = [
            'workRequests' => $workRequests
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

        $priorities=[
          "Haute","Moyenne","Basse"
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
     * @return void
     */
    public function store(WorkRequestRequest $workRequestRequest)
    {
        abort_if(Gate::denies('work_request_create'), 403);

        $data=$workRequestRequest->validated();

        $data['date']=now()->toDateString();
        $data['hour']=now()->toTimeString();
        $data['user_id']=auth()->id();

        $work_request=WorkRequest::create($data);

        return redirect()->back();

    }

    /**
     * Display the specified resource.
     *
     * @param \App\Models\WorkRequest $workRequest
     * @return \Illuminate\Http\Response
     */
    public function show(WorkRequest $workRequest)
    {
        //
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
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, WorkRequest $workRequest)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param \App\Models\WorkRequest $workRequest
     * @return \Illuminate\Http\Response
     */
    public function destroy(WorkRequest $workRequest)
    {
        //
    }
}

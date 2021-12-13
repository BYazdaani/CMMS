<?php

namespace App\Http\Controllers;

use App\Models\WorkOrderLog;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;

class WorkOrderLogController extends Controller
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
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\WorkOrderLog  $workOrderLog
     * @return \Illuminate\Http\Response
     */
    public function show(WorkOrderLog $workOrderLog)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\WorkOrderLog  $workOrderLog
     * @return \Illuminate\Http\Response
     */
    public function edit(WorkOrderLog $workOrderLog)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\WorkOrderLog  $workOrderLog
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, WorkOrderLog $workOrderLog)
    {

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\WorkOrderLog  $workOrderLog
     * @return \Illuminate\Http\Response
     */
    public function destroy(WorkOrderLog $workOrderLog)
    {
        //
    }
}

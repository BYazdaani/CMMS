<?php

namespace App\Http\Controllers;

use App\Models\Equipment;
use App\Models\sparePart;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;
use Illuminate\Contracts\View\View;

class SparePartController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index() : View
    {
        abort_if(Gate::denies('user_create'), 403);

        $spare_parts = sparePart::all();

        $data = [
            'spare_parts' => $spare_parts
        ];

        return view('spare_parts.index',$data);
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
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\sparePart  $sparePart
     * @return \Illuminate\Http\Response
     */
    public function show(sparePart $sparePart)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\sparePart  $sparePart
     * @return \Illuminate\Http\Response
     */
    public function edit(sparePart $sparePart)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\sparePart  $sparePart
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, sparePart $sparePart)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\sparePart  $sparePart
     * @return \Illuminate\Http\Response
     */
    public function destroy(sparePart $sparePart)
    {
        //
    }
}

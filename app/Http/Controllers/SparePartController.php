<?php

namespace App\Http\Controllers;

use App\Http\Requests\SparePartRequest;
use App\Http\Requests\SparePartUpdateRequest;
use App\Models\Equipment;
use App\Models\invoice;
use App\Models\provider;
use App\Models\sparePart;
use App\Models\sparePartCategory;
use App\Models\stockSite;
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
        abort_if(Gate::denies('spare_part_access'), 403);

        $spare_parts = sparePart::all();
        $providers = provider::all();
        $sites = stockSite::all();
        $categories = sparePartCategory::all();

        $data = [
            'spare_parts' => $spare_parts,
            'providers' => $providers,
            'sites' => $sites,
            'categories' => $categories,
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
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(SparePartRequest $request)
    {
        abort_if(Gate::denies('spare_part_create'), 403);

        $data=$request->validated();

        $data['actual_stock']=$data['init_stock'];

        sparePart::create($data);

        /*$invoice = invoice::find(1);

        $invoice->spareParts()->attach(1,['quantity'=>50,'product_price'=>60]);*/

        return redirect()->route('spare_parts.index');

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
    public function edit(sparePart $sparePart) : View
    {
        abort_if(Gate::denies('spare_part_edit'), 403);

        $sites = stockSite::all();
        $categories = sparePartCategory::all();

        $data = [
            'sparePart' => $sparePart,
            'sites' => $sites,
            'categories' => $categories,
        ];

        return view('spare_parts.update',$data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\sparePart  $sparePart
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(SparePartUpdateRequest $request, sparePart $sparePart)
    {
        abort_if(Gate::denies('spare_part_edit'), 403);

        $data=$request->validated();

        $sparePart->updateOrFail($data);

        return redirect()->route("spare_parts.edit", ['spare_part' => $sparePart]);

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

<?php

namespace App\Http\Controllers;

use App\Http\Requests\SiteRequest;
use App\Models\stockSite;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;

class StockSiteController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(): View
    {
        abort_if(Gate::denies('stock_access'), 403);

        $sites = stockSite::all();

        $data = [
            'sites' => $sites
        ];

        return view('sites.index',$data);
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
    public function store(SiteRequest $request)
    {
        abort_if(Gate::denies('stock_create'), 403);

        $data=$request->validated();

        stockSite::create($data);

        return redirect()->route('stock_sites.index');

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\stockSite  $stockSite
     * @return \Illuminate\Http\Response
     */
    public function show(stockSite $stockSite)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\stockSite  $stockSite
     * @return \Illuminate\Http\Response
     */
    public function edit(stockSite $stockSite)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\stockSite  $stockSite
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, stockSite $stockSite)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\stockSite  $stockSite
     * @return \Illuminate\Http\Response
     */
    public function destroy(stockSite $stockSite)
    {
        //
    }
}

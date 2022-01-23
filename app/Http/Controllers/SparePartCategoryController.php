<?php

namespace App\Http\Controllers;

use App\Models\sparePartCategory;
use App\Models\stockSite;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Validator;

class SparePartCategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(): View
    {
        abort_if(Gate::denies('stock_access'), 403);

        $categories = sparePartCategory::all();

        $data = [
            'categories' => $categories
        ];

        return view('stock_categories.index', $data);
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
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(Request $request)
    {
        abort_if(Gate::denies('stock_create'), 403);


        $data = Validator::make($request->all(), [
            'tag'=>['required','string']
        ]);

        if ($data->fails()) {
            return redirect()->back();
        }

        sparePartCategory::create([
            'tag' => $request['tag'],
        ]);

        return redirect()->route('categories.index');
    }

    /**
     * Display the specified resource.
     *
     * @param \App\Models\sparePartCategory $sparePartCategory
     * @return \Illuminate\Http\Response
     */
    public function show(sparePartCategory $sparePartCategory)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param \App\Models\sparePartCategory $sparePartCategory
     * @return \Illuminate\Http\Response
     */
    public function edit(sparePartCategory $sparePartCategory)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\sparePartCategory $sparePartCategory
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, sparePartCategory $sparePartCategory)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param \App\Models\sparePartCategory $sparePartCategory
     * @return \Illuminate\Http\Response
     */
    public function destroy(sparePartCategory $sparePartCategory)
    {
        //
    }
}

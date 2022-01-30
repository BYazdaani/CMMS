<?php

namespace App\Http\Controllers;

use App\Models\invoice;
use App\Models\provider;
use App\Models\sparePart;
use Dotenv\Exception\ValidationException;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;

class InvoiceController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(): View
    {

        $data = [
            'providers' => provider::all(),
            'spares' => sparePart::all(),
        ];

        return view('invoices.create', $data);
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
     * @return array
     */
    public function store(Request $request)
    {
        DB::beginTransaction();

        try {

            $invoice = invoice::create([
                "admin_id" => Auth::user()->admin->id,
                "provider_id" => $request['provider'],
            ]);

            foreach ($request['spares'] as $spare) {

                $invoice->spareParts()->attach($spare['id'], ['quantity' => $spare['quantity']]);

                $sparePart = sparePart::find($spare['id']);
                $sparePart->actual_stock += $spare['quantity'];
                $sparePart->in_stock ++;
                $sparePart->save();

            }

        } catch (ValidationException $e) {
            DB::rollBack();
            Session::flash("error", $e->getMessage());
            return ['redirect' => back()];
        }

        DB::commit();
        return ['redirect' => route('invoices.index')];
    }

    /**
     * Display the specified resource.
     *
     * @param \App\Models\invoice $invoice
     * @return \Illuminate\Http\Response
     */
    public function show(invoice $invoice)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param \App\Models\invoice $invoice
     * @return \Illuminate\Http\Response
     */
    public function edit(invoice $invoice)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\invoice $invoice
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, invoice $invoice)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param \App\Models\invoice $invoice
     * @return \Illuminate\Http\Response
     */
    public function destroy(invoice $invoice)
    {
        //
    }
}

<?php

namespace App\Http\Controllers\Api\V1;

use App\Models\InvoiceProduct;
use App\Http\Controllers\Controller;
use App\Http\Requests\StoreInvoiceProductRequest;
use App\Http\Requests\UpdateInvoiceProductRequest;

class InvoiceProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreInvoiceProductRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(InvoiceProduct $invoiceProduct)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(InvoiceProduct $invoiceProduct)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateInvoiceProductRequest $request, InvoiceProduct $invoiceProduct)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(InvoiceProduct $invoiceProduct)
    {
        //
    }
}
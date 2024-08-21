<?php

namespace App\Http\Controllers\Api\V1;

use App\Models\Customer;
use App\Http\Controllers\Controller;
use App\Http\Requests\StoreCustomerRequest;
use App\Http\Requests\UpdateCustomerRequest;
use App\Http\Resources\CustomerResource;

class CustomerController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return $this->sendSuccess("Customer list", CustomerResource::collection(Customer::all()));
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
    public function store(StoreCustomerRequest $request)
    {
        try {
            $customer = Customer::create([
                'name' => $request->name,
                'email' => $request->email,
                'mobile' => $request->mobile,
                'user_id' => $this->getUserId($request),
            ]);
            return $this->sendSuccess("Customer Created", new CustomerResource($customer), 201);
        } catch (\Throwable $th) {
            return $this->sendError("Failed to Create Customer", 500, $th->getMessage());
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(Customer $customer)
    {
        try {
            return $this->sendSuccess("Customer Details", new CustomerResource($customer));
        } catch (\Throwable $th) {
            return $this->sendError("Failed to get Customer Details", 500, $th->getMessage());
        }
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Customer $customer)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateCustomerRequest $request, Customer $customer)
    {
        try {
            $customer->update([
                'name' => $request->name,
                'email' => $request->email,
                'mobile' => $request->mobile,
                'user_id' => $this->getUserId($request),
            ]);
            return $this->sendSuccess("Customer Updated", new CustomerResource($customer));
        } catch (\Throwable $th) {
            return $this->sendError("Failed to Update Customer", 500, $th->getMessage());
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Customer $customer)
    {
        try {
            $customer->delete();
            return $this->sendSuccess("Customer Deleted", []);
        } catch (\Throwable $th) {
            return $this->sendError("Failed to Delete Customer", 500, $th->getMessage());
        }
    }
}
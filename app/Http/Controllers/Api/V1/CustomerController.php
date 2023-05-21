<?php

namespace App\Http\Controllers\Api\V1;

use App\Models\Customer;
use App\Http\Requests\StoreCustomerRequest;
use App\Http\Requests\UpdateCustomerRequest;
use App\Http\Controllers\Controller;
use App\Http\Resources\v1\CustomerResource;
use App\Http\Resources\V1\CustomerCollection;
use App\Http\Controllers\Api\V1\BaseController as BaseController;
use Illuminate\Http\Request;
use Validator;
use Response;
use Illuminate\Http\JsonResponse;


class CustomerController extends BaseController
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return new CustomerCollection(Customer::all());
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
    public function store(Request $request)
    {
        $input = $request->all();

        $validator = Validator::make($input,
            [
                'name'=>'required',
                'address'=>'required'
        ]);

        if($validator->fails()){
            return $this->sendError('Validation Error.', $validator->errors());
        }

         $customer = Customer::create($input);

         return $this->sendResponse(new CustomerResource($customer), 'Customer created successfully.');

    }

    /**
     * Display the specified resource.
     */
    public function show(Customer $customer)
    {
        return new CustomerResource($customer);
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
    public function update(Request $request, Customer $customer)
    {
        $input = $request->all();

        $validator = Validator::make($input,
            [
                'name'=>'required',
                'address'=>'required'
            ]);

        if($validator->fails()){
            return $this->sendError('Validation Error.', $validator->errors());
        }

        $customer = Customer::find($customer->id);
        $customer->name= $request->name;
        $customer->address= $request->address;
        $customer->type= $request->type;
        $customer->email= $request->email;
        $customer->city= $request->city;
        $customer->state= $request->state;
        $customer->postal_code= $request->postal_code;
        $customer->save();
        return response()->json($customer, 200);

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Customer $customer)
    {
        //
    }
}

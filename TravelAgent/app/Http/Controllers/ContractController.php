<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreContractRequest;
use App\Http\Requests\UpdateContractRequest;
use App\Models\Contract;
use App\Models\User;

class ContractController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $contracts = Contract::all();

        return response($contracts);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreContractRequest $request)
    {
        Contract::create([
            'rates' => $request->rates,
            'name' => $request->name,
            'agent_id' => $request->agent_id,
            'accommodation_id' => $request->accommodation_id,
            'start_date' => $request->start_date,
            'end_date' => $request->end_date
        ]);

        return response()->json(['message' => 'success'], 200);
    }

    /**
     * Display the specified resource.
     */
    public function show(Contract $contract)
    {
        return response($contract);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateContractRequest $request, $id)
    {
        $contract = Contract::find($id);
        $contract->rates = $request->rates;
        $contract->name = $request->name;
        $contract->agent_id = $request->agent_id;
        $contract->accommodation_id = $request->accommodation_id;
        $contract->start_date = $request->start_date;
        $contract->end_date = $request->end_date;
        $contract->save();

        return response()->json(['message' => 'success'], 200);

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $contract = Contract::find($id);
        $contract->delete();

        return response()->json(['message' => 'success'], 200);
    }
}

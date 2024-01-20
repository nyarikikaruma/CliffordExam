<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreAccommodationRequest;
use App\Http\Requests\UpdateAccommodationRequest;
use App\Models\Accommodation;
use GuzzleHttp\Promise\Create;

class AccommodationController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $accommodations = Accommodation::all();
        return response($accommodations);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreAccommodationRequest $request)
    {
        Accommodation::create([
            'name' => $request->name,
            'description' => $request->description,
            'rate' => $request->rate
        ]);

        return response()->json(['message'=>'Success']);

    }

    /**
     * Display the specified resource.
     */
    public function show(Accommodation $accommodation)
    {
        return response($accommodation);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateAccommodationRequest $request, $id)
    {
        $accommodation = Accommodation::find($id);
        $accommodation->name = $request->name;
        $accommodation->description = $request->description;
        $accommodation->rate = $request->rate;
        $accommodation->save();

        return response()->json(['message' => 'success'], 200);


    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $accommodation = Accommodation::find($id);
        $accommodation->delete();
        return response()->json(['message' => 'success'], 200);
    }
}

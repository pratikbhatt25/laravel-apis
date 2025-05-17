<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\RealEstate;
use App\Http\Requests\StoreRealEstateRequest;
use App\Http\Requests\UpdateRealEstateRequest;

class RealEstateController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return RealEstate::select('id', 'name', 'real_state_type', 'city', 'country')->get();
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreRealEstateRequest $request)
    {
        $realEstate = RealEstate::create($request->validated());
        return response()->json($realEstate, 201);
    }

    /**
     * Display the specified resource.
     */
    public function show(RealEstate $realEstate)
    {
        return $realEstate;
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateRealEstateRequest $request, RealEstate $realEstate)
    {
        $realEstate->update($request->validated());
        return response()->json($realEstate->fresh(), 200);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(RealEstate $realEstate)
    {
        $realEstate->delete();
        return $realEstate;
    }
}

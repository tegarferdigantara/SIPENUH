<?php

namespace App\Http\Controllers;

use App\Models\Itinerary;
use App\Http\Requests\StoreItineraryRequest;
use App\Http\Requests\UpdateItineraryRequest;
use App\Http\Resources\ItineraryResource;
use Illuminate\Http\JsonResponse;

class ItineraryController extends Controller
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
    public function store(StoreItineraryRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Itinerary $itinerary): JsonResponse
    {
        $itinerary = $itinerary->get();

        return (ItineraryResource::collection($itinerary))->response()->setStatusCode(200);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Itinerary $itinerary)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateItineraryRequest $request, Itinerary $itinerary)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Itinerary $itinerary)
    {
        //
    }
}

<?php

namespace App\Http\Controllers;

use App\Models\Consumers;
use App\Http\Requests\StoreConsumersRequest;
use App\Http\Requests\UpdateConsumersRequest;
use App\Http\Resources\ConsumerResource;
use Illuminate\Http\JsonResponse;

class ConsumersController extends Controller
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
    public function register(StoreConsumersRequest $request): JsonResponse
    {
        $data = $request->validated();
        $user = new Consumers($data);
        $user->save();

        return (new ConsumerResource($user))->response()->setStatusCode(201);
    }

    /**
     * Display the specified resource.
     */
    public function show(Consumers $consumers)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Consumers $consumers)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateConsumersRequest $request, Consumers $consumers)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Consumers $consumers)
    {
        //
    }
}

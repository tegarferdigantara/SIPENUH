<?php

namespace App\Http\Controllers;

use App\Models\UmrahPackage;
use App\Http\Requests\StoreUmrahPackageRequest;
use App\Http\Requests\UpdateUmrahPackageRequest;
use App\Http\Resources\UmrahPackageResource;
use Illuminate\Http\JsonResponse;

class UmrahPackageController extends Controller
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
    public function store(StoreUmrahPackageRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(UmrahPackage $umrahPackage): JsonResponse
    {
        $packages = $umrahPackage->whereNotIn('status', ['CLOSED'])->get();

        // if ($packages->isEmpty()) {
        //     return response()->json('Paket Umrah Tidak Tersedia', 200);
        // }
        return (UmrahPackageResource::collection($packages))->response()->setStatusCode(200);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(UmrahPackage $umrahPackage)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateUmrahPackageRequest $request, UmrahPackage $umrahPackage)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(UmrahPackage $umrahPackage)
    {
        //
    }
}

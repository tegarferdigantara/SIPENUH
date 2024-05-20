<?php

namespace App\Http\Controllers;

use App\Models\UmrahPackages;
use App\Http\Requests\StoreUmrahPackagesRequest;
use App\Http\Requests\UpdateUmrahPackagesRequest;
use App\Http\Resources\UmrahPackageResource;
use Illuminate\Http\JsonResponse;

class UmrahPackagesController extends Controller
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
    public function store(StoreUmrahPackagesRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(UmrahPackages $umrahPackages): JsonResponse
    {
        $packages = $umrahPackages->whereNotIn('status', ['CLOSED'])->get();

        // if ($packages->isEmpty()) {
        //     return response()->json('Paket Umrah Tidak Tersedia', 200);
        // }
        return (UmrahPackageResource::collection($packages))->response()->setStatusCode(200);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(UmrahPackages $umrahPackages)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateUmrahPackagesRequest $request, UmrahPackages $umrahPackages)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(UmrahPackages $umrahPackages)
    {
        //
    }
}

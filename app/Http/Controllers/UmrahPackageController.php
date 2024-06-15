<?php

namespace App\Http\Controllers;

use App\Models\UmrahPackage;
use App\Http\Requests\StoreUmrahPackageRequest;
use App\Http\Requests\UpdateUmrahPackageRequest;
use App\Http\Resources\UmrahPackageResource;
use Illuminate\Http\Exceptions\HttpResponseException;
use Illuminate\Http\JsonResponse;

class UmrahPackageController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $packages = UmrahPackage::whereNotIn('status', ['CLOSED'])->get();


        return (UmrahPackageResource::collection($packages))->response()->setStatusCode(200);
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
    public function show(int $id, UmrahPackage $umrahPackage): JsonResponse
    {
        $package = $umrahPackage->where('id', $id)
            ->whereNotIn('status', ['CLOSED'])
            ->first();

        if (!$package) {
            throw new HttpResponseException(response()->json([
                "errors" => [
                    'message' => [
                        'Paket Umrah tidak ditemukan.'
                    ]
                ]
            ])->setStatusCode(404));
        }

        return (new UmrahPackageResource($package))->response()->setStatusCode(200);


        // If no ID is provided, return all packages

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

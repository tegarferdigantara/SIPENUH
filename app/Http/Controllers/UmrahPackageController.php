<?php

namespace App\Http\Controllers;

use App\Models\UmrahPackage;
use App\Http\Requests\StoreUmrahPackageRequest;
use App\Http\Requests\UpdateUmrahPackageRequest;
use App\Http\Resources\UmrahPackageResource;
use Carbon\Carbon;
use Illuminate\Http\Exceptions\HttpResponseException;
use Illuminate\Http\JsonResponse;

class UmrahPackageController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
    }

    public function indexApi()
    {
        $packages = UmrahPackage::whereNotIn('status', ['CLOSED'])->get();

        return (UmrahPackageResource::collection($packages))->response()->setStatusCode(200);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.pages.umrah-package-manage.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreUmrahPackageRequest $request)
    {
        $data = $request->validated();

        $package = UmrahPackage::create($data);

        return redirect()->route('admin.package.show', ['packageId' => $package->id])->with('success', 'Paket ' . $package->name . ' berhasil ditambahkan');
    }
    //Show data for Server Side Rendering
    public function show(int $packageId, UmrahPackage $umrahPackage)
    {
        $package = $umrahPackage->with(['userCreator', 'itinerary'])->findOrFail($packageId);

        $date = Carbon::parse($package->departure_date);
        $formattedDate = $date->translatedFormat('l, d F Y');

        $itineraries = $package->itinerary->sortBy('date');

        return view('admin.pages.umrah-package-manage.detail', compact('package', 'formattedDate', 'itineraries'));
    }

    //Show data for JSON Response data
    public function showApi(int $id, UmrahPackage $umrahPackage): JsonResponse
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
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(int $packageId, UmrahPackage $umrahPackage)
    {
        $package = $umrahPackage->with(['userCreator', 'itinerary'])->findOrFail($packageId);

        // Format tanggal dengan Carbon
        $date = Carbon::parse($package->departure_date);
        $formattedDate = $date->translatedFormat('l, d F Y');

        return view('admin.pages.umrah-package-manage.edit', compact('package', 'formattedDate'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(int $packageId, UpdateUmrahPackageRequest $request)
    {
        $package = UmrahPackage::findOrFail($packageId);

        $package->update($request->validated());

        return redirect()->route('admin.package.show', $packageId)
            ->with('success', "Paket {$package->name} berhasil diperbarui!");
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(int $packageId)
    {
        $package = UmrahPackage::findOrFail($packageId);

        $package->delete();

        return redirect()->route('admin.dashboard')->with('success', "Paket {$package->name} berhasil dihapus!");
    }
}

<?php

namespace App\Http\Controllers;

use App\Models\Itinerary;
use App\Http\Requests\StoreItineraryRequest;
use App\Http\Requests\UpdateItineraryRequest;
use App\Http\Resources\ItineraryResource;
use App\Models\UmrahPackage;
use Carbon\Carbon;
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
    public function create(int $packageId)
    {
        // Cari paket umrah berdasarkan packageId
        $package = UmrahPackage::findOrFail($packageId);

        $date = Carbon::parse($package->depature_date);
        $formattedDate = $date->translatedFormat('l, d F Y');

        // Itinerary diambil dari relasi langsung dari package
        $itineraries = Itinerary::where('umrah_package_id', $packageId)->orderBy('date')->get();

        return view('admin.pages.umrah-package-manage.itinerary.create', compact('package', 'formattedDate', 'itineraries'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(int $packageId, StoreItineraryRequest $request)
    {
        $package = UmrahPackage::findOrFail($packageId);

        $data = $request->validated();
        $itinerary = new Itinerary($data);
        $itinerary->umrah_package_id = $package->id;
        $itinerary->user_creator_id = auth()->user()->id;
        $itinerary->save();

        return redirect()->back()->with('success', 'Itinerary berhasil ditambah!');
    }

    /**
     * Display the specified resource.
     */
    public function show(int $umrahPackageNumber, Itinerary $itinerary): JsonResponse
    {
        $itineraries = $itinerary->where('umrah_package_id', $umrahPackageNumber)->with('umrahPackage')->get();

        return ItineraryResource::collection($itineraries)->response()->setStatusCode(200);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(int $packageId, int $itineraryId)
    {
        $itinerary = Itinerary::with('umrahPackage')
            ->where('id', $itineraryId)
            ->where('umrah_package_id', $packageId)
            ->firstOrFail();

        $package = $itinerary->umrahPackage;

        return view('admin.pages.umrah-package-manage.itinerary.edit', compact('package', 'itinerary'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(int $packageId, int $itineraryId, UpdateItineraryRequest $request, Itinerary $itinerary)
    {
        $itinerary = Itinerary::where('id', $itineraryId)
            ->where('umrah_package_id', $packageId)
            ->firstOrFail();

        $itinerary->update($request->validated());

        return redirect()->route('admin.package.show', $packageId)
            ->with('success', 'Itinerary berhasil diubah!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(int $packageId, int $itineraryId)
    {
        $itinerary = Itinerary::where('id', $itineraryId)
            ->where('umrah_package_id', $packageId)
            ->firstOrFail();

        $itinerary->delete();

        return redirect()->back()->with('success', 'Itinerary berhasil dihapus!');
    }
}

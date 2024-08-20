<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Pdf\ManifestController;
use App\Http\Controllers\Pdf\RekomController;
use App\Models\UmrahPackage;
use App\Http\Requests\StoreUmrahPackageRequest;
use App\Http\Requests\UpdateUmrahPackageRequest;
use App\Http\Resources\UmrahPackageResource;
use App\Models\Customer;
use App\Models\CustomerDocument;
use Carbon\Carbon;
use Illuminate\Http\Exceptions\HttpResponseException;
use Illuminate\Http\JsonResponse;
use ZipArchive;
use Illuminate\Support\Facades\Storage;

class UmrahPackageController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function indexApi()
    {
        $packages = UmrahPackage::whereNotIn('status', ['CLOSED'])->orderBy('created_at', 'asc')->get();

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

    public function exportUmrahData(int $umrahPackageId)
    {
        $package = UmrahPackage::findOrFail($umrahPackageId);

        $zip = new ZipArchive;
        //Inisiasi nama file zip
        $fileName = "jemaah_" . str_replace(' ', '_', mb_convert_case($package->name, MB_CASE_LOWER, 'utf-8')) . '_' . str_replace('-', '_', $package->departure_date) . "_export.zip";

        if ($zip->open(public_path($fileName), ZipArchive::CREATE) === TRUE) {
            $customers = CustomerDocument::with('customer')->whereHas('customer', function ($query) use ($umrahPackageId) {
                $query->where('umrah_package_id', $umrahPackageId);
            })->get();

            foreach ($customers as $document) {
                $folderName = $document->customer->full_name;
                $zip->addEmptyDir($folderName);

                // Tambahkan surat rekomendasi ke dalam folder (folderName)
                $rekomPath = (new RekomController())->generateRekomExport($document->customer_id);
                $zip->addFile($rekomPath, $folderName . '/Surat_Rekomendasi_' . str_replace(' ', '_', $document->customer->full_name) . '_' . str_replace(' ', '_', $package->name) . '_Keberangkatan_' . str_replace('-', '_', $package->departure_date) . '.pdf');

                // Tambahkan dokumen-dokumen ke dalam folder (folderName)
                $this->addFileToZip($zip, $document->customer_photo, $folderName . '/foto_customer.jpg');
                $this->addFileToZip($zip, $document->passport_photo, $folderName . '/foto_passport.jpg');
                $this->addFileToZip($zip, $document->id_photo, $folderName . '/foto_ktp.jpg');
                $this->addFileToZip($zip, $document->birth_certificate_photo, $folderName . '/foto_akta_kelahiran.jpg');
                $this->addFileToZip($zip, $document->family_card_photo, $folderName . '/foto_kartu_keluarga.jpg');
            }

            // Tambahkan manifest jemaah
            $manifestPath = (new ManifestController())->generatePdfManifestExport($document->customer->umrah_package_id);
            $zip->addFile($manifestPath, 'Manifest_Jemaah_' . str_replace(' ', '_', $package->name) . '_Keberangkatan_' . str_replace('-', '_', $package->departure_date) . '.pdf');

            $zip->close();
        }

        return response()->download(public_path($fileName))->deleteFileAfterSend(true);
    }


    private function addFileToZip($zip, $filePath, $zipPath)
    {
        if ($filePath && Storage::disk('public')->exists($filePath)) {
            $fullPath = storage_path('app/public/' . $filePath);
            $zip->addFile($fullPath, $zipPath);
        }
    }
}

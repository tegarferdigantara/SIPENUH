<?php

namespace App\Http\Controllers;

use App\Http\Resources\CustomerDocumentResource;
use App\Models\CustomerDocument;
use App\Http\Requests\StoreCustomerDocumentRequest;
use App\Http\Requests\UpdateCustomerDocumentRequest;
use App\Http\Requests\UpdateCustomerDocumentRequestWebView;
use App\Models\UmrahPackage;
use Illuminate\Http\Exceptions\HttpResponseException;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\Laravel\Facades\Image;

class CustomerDocumentController extends Controller
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
    public function store(StoreCustomerDocumentRequest $request): JsonResponse
    {
        $data = $request->validated();
        $customer_document = new CustomerDocument($data);
        $customer_document->save();

        return (new CustomerDocumentResource($customer_document))->response()->setStatusCode(201);
    }

    /**
     * Display the specified resource.
     */
    public function show(CustomerDocument $customerDocument)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(CustomerDocument $customerDocument)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(int $id, UpdateCustomerDocumentRequest $request, CustomerDocument $customerDocument): CustomerDocumentResource
    {
        $data = $request->validated();

        $document = $customerDocument->with('customer')->find($id);
        $package = UmrahPackage::find($document->customer->umrah_package_id);
        $customerName = $document->customer->full_name ?? 'Unknown';


        $photoFields = [
            'customer_photo',
            'passport_photo',
            'id_photo',
            'birth_certificate_photo',
            'family_card_photo',
        ];
        foreach ($photoFields as $photoField) {
            if ($request->hasFile($photoField)) {
                $photo = $request->file($photoField);
                $filename = $photoField . '_' . time() . '.' . $photo->getClientOriginalExtension(); // Nama file baru
                $path = $photo->storeAs('photos/Jamaah ' . $package->name . '/' . $customerName, $filename, 'public'); // Menyimpan dengan nama baru
                $document->$photoField = $path;
            }
        }

        if (isset($data['passport_number']) || isset($data['id_number'])) {
            if (!is_null($document->passport_number) && !is_null($document->id_number)) {
                throw new HttpResponseException(response()->json([
                    "errors" => [
                        'message' => [
                            'Anda sudah mengisi data Nomor Paspor dan Nomor NIK (KTP).'
                        ]
                    ]
                ])->setStatusCode(409));
            }

            if (is_null($document->passport_number)) {
                $document->passport_number = $data['passport_number'];
                $document->passport_number_verification = $data['passport_number_verification'];
            }
            if (is_null($document->id_number)) {
                $document->id_number = $data['id_number'];
                $document->id_number_verification = $data['id_number_verification'];
            }
        }

        $anyPhotoFilled = false;
        foreach ($photoFields as $photoField) {
            if (!is_null($document->$photoField)) {
                $anyPhotoFilled = true;
                break;
            }
        }

        if ($anyPhotoFilled && !is_null($document->id_number)) {
            DB::transaction(function () use ($package) {
                $package->decrement('quota', 1);
                $package->refresh();

                if ($package->quota == 0) {
                    $package->status = 'FULL';
                }

                $package->save();
            });
        }

        $document->save();
        return new CustomerDocumentResource($document);
    }

    public function updatePhoto(int $customerId, UpdateCustomerDocumentRequestWebView $request, CustomerDocument $customerDocument)
    {
        $document = $customerDocument->with('customer')->find($customerId);
        $package = UmrahPackage::find($document->customer->umrah_package_id);
        $customerName = $document->customer->full_name ?? 'Unknown';

        $photoFields = [
            'customer_photo',
            'passport_photo',
            'id_photo',
            'birth_certificate_photo',
            'family_card_photo',
        ];

        foreach ($photoFields as $photoField) {
            if ($request->hasFile($photoField)) {
                $photo = $request->file($photoField);
                $filename = $photoField . '_' . time() . '.' . $photo->getClientOriginalExtension();

                if ($document->$photoField) {
                    Storage::disk('public')->delete($document->$photoField);
                }

                $path = $photo->storeAs('photos/Jamaah ' . $package->name . '/' . $customerName, $filename, 'public');
                $document->$photoField = $path;
            }
        }

        $document->save();

        return redirect()->back()->with('success', 'Foto berhasil diperbarui!');
    }

    public function rotatePhoto(int $customerId, $type)
    {
        $customerDocument = CustomerDocument::where('customer_id', $customerId)->firstOrFail();

        $rotationAngle = 90;

        if ($customerDocument->$type) {
            $fullPath = storage_path('app/public/' . $customerDocument->$type);

            if (Storage::disk('public')->exists($customerDocument->$type)) {
                $image = Image::read($fullPath);
                $image->rotate($rotationAngle);

                $image->save($fullPath);
            } else {
                return redirect()->back()->with('error', 'File tidak ditemukan');
            }
        } else {
            return redirect()->back()->with('error', 'Foto tidak ditemukan pada dokumen');
        }

        // Redirect atau berikan respons sesuai kebutuhan aplikasi Anda
        return redirect()->back()->with('success', 'Foto berhasil diputar!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(CustomerDocument $customerDocument)
    {
        //
    }
}

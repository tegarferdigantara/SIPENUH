<?php

namespace App\Http\Controllers;

use App\Http\Resources\ConsumerDocumentResource;
use App\Models\ConsumerDocument;
use App\Http\Requests\StoreConsumerDocumentRequest;
use App\Http\Requests\UpdateConsumerDocumentRequest;
use App\Models\UmrahPackage;
use Illuminate\Http\Exceptions\HttpResponseException;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\DB;

class ConsumerDocumentController extends Controller
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
    public function store(StoreConsumerDocumentRequest $request): JsonResponse
    {
        $data = $request->validated();
        $consumer_document = new ConsumerDocument($data);
        $consumer_document->save();

        return (new ConsumerDocumentResource($consumer_document))->response()->setStatusCode(201);
    }

    /**
     * Display the specified resource.
     */
    public function show(ConsumerDocument $consumerDocument)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(ConsumerDocument $consumerDocument)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(int $id, UpdateConsumerDocumentRequest $request, ConsumerDocument $consumerDocument): ConsumerDocumentResource
    {
        $data = $request->validated();

        $document = $consumerDocument->with('consumer')->find($id);
        $package = UmrahPackage::find($document->consumer->umrah_package_id);
        $consumerName = $document->consumer->full_name ?? 'Unknown';


        $photoFields = [
            'consumer_photo',
            'passport_photo',
            'id_photo',
            'birth_certificate_photo',
            'family_card_photo',
        ];
        foreach ($photoFields as $photoField) {
            if ($request->hasFile($photoField)) {
                $photo = $request->file($photoField);
                $filename = $photoField . '_' . time() . '.' . $photo->getClientOriginalExtension(); // Nama file baru
                $path = $photo->storeAs('photos/Jamaah ' . $package->name . '/' . $consumerName, $filename, 'public'); // Menyimpan dengan nama baru
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
            }
            if (is_null($document->id_number)) {
                $document->id_number = $data['id_number'];
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
        return new ConsumerDocumentResource($document);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(ConsumerDocument $consumerDocument)
    {
        //
    }
}

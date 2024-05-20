<?php

namespace App\Http\Controllers;

use App\Http\Resources\ConsumerDocumentResource;
use App\Models\ConsumerDocuments;
use App\Http\Requests\StoreConsumerDocumentsRequest;
use App\Http\Requests\UpdateConsumerDocumentsRequest;
use App\Models\UmrahPackages;
use Illuminate\Http\JsonResponse;

class ConsumerDocumentsController extends Controller
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
    public function store(StoreConsumerDocumentsRequest $request): JsonResponse
    {
        $data = $request->validated();
        $consumer_document = new ConsumerDocuments($data);
        $consumer_document->save();

        return (new ConsumerDocumentResource($consumer_document))->response()->setStatusCode(201);
    }

    /**
     * Display the specified resource.
     */
    public function show(ConsumerDocuments $consumerDocuments)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(ConsumerDocuments $consumerDocuments)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(int $id, UpdateConsumerDocumentsRequest $request, ConsumerDocuments $consumerDocuments): ConsumerDocumentResource
    {
        $data = $request->validated();

        $document = $consumerDocuments->with('consumers')->find($id);
        $package = UmrahPackages::find($document->consumers->umrah_package_id);
        $consumerName = $document->consumers->full_name ?? 'Unknown';

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
        $document->save();
        return new ConsumerDocumentResource($document);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(ConsumerDocuments $consumerDocuments)
    {
        //
    }
}

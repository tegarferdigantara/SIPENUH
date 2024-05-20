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
    public function store(StoreConsumersRequest $request): JsonResponse
    {
        $data = $request->validated();
        $consumer = new Consumers($data);

        $consumer->registration_number = $this->generateRegistrationNumber($consumer);
        $consumer->save();

        return (new ConsumerResource($consumer))->response()->setStatusCode(201);
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


    private function generateRegistrationNumber($consumer)
    {
        $year = date('Y');
        $fullName = $consumer->full_name;
        $genderInitial = strtoupper(substr($consumer->gender, 0, 1));
        $motherInitial = strtoupper(substr($consumer->mother_name, 0, 2));
        $fatherInitial = strtoupper(substr($consumer->father_name, 0, 2));
        $cityInitial = strtoupper(substr($consumer->birth_place, 0, 1));
        $packageId = $consumer->umrah_package_id;
        $nameInitials = '';

        // Ambil inisial dari setiap kata dalam nama lengkap
        $nameParts = explode(" ", $fullName);
        foreach ($nameParts as $part) {
            $nameInitials .= strtoupper(substr($part, 0, 1));
        }

        // Gabungkan semua komponen ke dalam registration number
        $registrationNumber = "$year-$packageId$nameInitials$genderInitial$motherInitial$fatherInitial$cityInitial";

        return $registrationNumber;
    }
}

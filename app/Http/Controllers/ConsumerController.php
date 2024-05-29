<?php

namespace App\Http\Controllers;

use App\Models\Consumer;
use App\Http\Requests\StoreConsumerRequest;
use App\Http\Requests\UpdateConsumerRequest;
use App\Http\Resources\ConsumerResource;
use App\Models\UmrahPackage;
use Illuminate\Http\Exceptions\HttpResponseException;
use Illuminate\Http\JsonResponse;

class ConsumerController extends Controller
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
    public function store(StoreConsumerRequest $request): JsonResponse
    {
        $data = $request->validated();
        $consumer = new Consumer($data);
        $registrationNumber = $this->generateRegistrationNumber($consumer);
        $packageName = UmrahPackage::with('consumers')->find($data['umrah_package_id']);

        if (strtolower($data['gender']) == 'pria' || strtolower($data['gender']) == 'laki-laki' || strtolower($data['gender']) == 'laki laki' || strtolower($data['gender']) == 'laki') {
            $consumer->gender = 'Laki-Laki';
        } elseif (strtolower($data['gender']) == 'wanita' || strtolower($data['gender']) == 'perempuan') {
            $consumer->gender = 'Perempuan';
        } else {
            throw new HttpResponseException(response()->json([
                "errors" => [
                    'message' => [
                        'Jenis Kelamin Salah! [Pilihan: *Laki-Laki/Pria/Laki* & *Perempuan/Wanita*]'
                    ]
                ]
            ])->setStatusCode(422));
        }

        if (!$packageName) {
            throw new HttpResponseException(response()->json([
                "errors" => [
                    'message' => [
                        'Jenis Paket Umrah dengan nomor *' . $data['umrah_package_id'] . '* tidak tersedia.'
                    ]
                ]
            ])->setStatusCode(404));
        }

        if ($consumer->where('registration_number', $registrationNumber)->exists()) {
            throw new HttpResponseException(response()->json([
                "errors" => [
                    'message' => [
                        'Data yang anda isi sudah terdaftar pada paket *' . $packageName->name . '* dengan nomor paket *' . $packageName->id . '*'
                    ]
                ]
            ])->setStatusCode(409));
        }

        $consumer->registration_number = $registrationNumber;
        $consumer->save();

        return (new ConsumerResource($consumer))->response()->setStatusCode(201);
    }

    /**
     * Display the specified resource.
     */
    public function show(Consumer $consumer)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Consumer $consumer)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateConsumerRequest $request, Consumer $consumer)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Consumer $consumer)
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

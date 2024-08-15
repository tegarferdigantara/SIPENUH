<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreCustomerRequest;
use App\Http\Requests\UpdateCustomerRequest;
use App\Http\Resources\CustomerResource;
use App\Models\Customer;
use App\Models\CustomerAuditLog;
use App\Models\UmrahPackage;
use Illuminate\Http\Exceptions\HttpResponseException;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\Storage;

class CustomerController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $customers = Customer::with(['umrahPackage', 'customerDocument'])
            ->whereNotNull('umrah_package_id')
            ->orderBy('created_at')
            ->get();

        $customers = CustomerResource::collection($customers);

        return view('admin.pages.customer-manage.list', compact('customers'));
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
    public function store(StoreCustomerRequest $request): JsonResponse
    {
        $data = $request->validated();
        $customer = new Customer($data);
        $registrationNumber = $this->generateRegistrationNumber($customer);
        $packageName = UmrahPackage::with('customers')->find($data['umrah_package_id']);

        if (strtolower($data['gender']) == 'pria' || strtolower($data['gender']) == 'laki-laki' || strtolower($data['gender']) == 'laki laki' || strtolower($data['gender']) == 'laki') {
            $customer->gender = 'Laki-Laki';
        } elseif (strtolower($data['gender']) == 'wanita' || strtolower($data['gender']) == 'perempuan') {
            $customer->gender = 'Perempuan';
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

        if ($customer->where('registration_number', $registrationNumber)->exists()) {
            throw new HttpResponseException(response()->json([
                "errors" => [
                    'message' => [
                        'Data yang anda isi sudah terdaftar pada paket *' . $packageName->name . '* dengan nomor paket *' . $packageName->id . '*'
                    ]
                ]
            ])->setStatusCode(409));
        }

        if ($packageName->quota == 0) {
            throw new HttpResponseException(response()->json([
                "errors" => [
                    'message' => [
                        'Paket *' . $packageName->name . '* dengan nomor paket *' . $packageName->id . '* yang anda pilih sudah penuh.'
                    ]
                ]
            ])->setStatusCode(409));
        }


        $customer->registration_number = $registrationNumber;
        $customer->umrahPackage->decrement('quota', 1);
        $customer->save();

        return (new CustomerResource($customer))->response()->setStatusCode(201);
    }

    /**
     * Display the specified resource.
     */
    // Show Data for SSR
    public function showByPackage(int $packageId)
    {
        $umrahPackage = UmrahPackage::findOrFail($packageId);

        $customers = $umrahPackage->customers()
            ->with(['customerDocument'])
            ->get();

        $customers = CustomerResource::collection($customers);

        return view('admin.pages.customer-manage.list', compact('customers', 'umrahPackage'));
    }
    public function showCustomer(int $packageId, int $customerId)
    {
        $customer = Customer::with(['customerDocument', 'umrahPackage'])
            ->where('umrah_package_id', $packageId)
            ->findOrFail($customerId);

        return view('admin.pages.customer-manage.detail', compact('customer'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(int $packageId, int $customerId, Customer $customer)
    {
        $customer = Customer::with(['customerDocument', 'umrahPackage'])
            ->where('umrah_package_id', $packageId)
            ->findOrFail($customerId);

        $umrahPackages = UmrahPackage::where('status', ['ACTIVE'])->get();

        return view('admin.pages.customer-manage.edit', compact('customer', 'umrahPackages'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(int $packageId, int $customerId, UpdateCustomerRequest $request, Customer $customer)
    {
        $request->validated();

        $customer = Customer::findOrFail($customerId);

        $currentPackageId = $customer->umrah_package_id;

        $customer->update($request->except(['passport_number', 'id_number']));

        $customer->refresh();

        $customerDocument = $customer->customerDocument;

        if ($customerDocument) {
            $customerDocument->update($request->only(['id_number', 'passport_number']));
            $customerDocument->id_number_verification = $request['id_number'] . $request['umrah_package_id'];
            $customerDocument->passport_number_verification = $request['passport_number'] . $request['umrah_package_id'];
            $customerDocument->save();
        }

        $registrationNumber = $this->generateRegistrationNumber($customer);


        $exists = Customer::where('registration_number', $registrationNumber)
            ->where('id', '!=', $customerId)
            ->exists();

        if ($exists) {
            $customer->umrah_package_id = $currentPackageId;
            $customer->save();

            return redirect()->route('admin.customer.detail.by.package.edit', [$customer->umrah_package_id, $customerId])
                ->with('failed', 'Data Jemaah sudah berada dipaket ' . $customer->umrahPackage->name);
        }

        $customer->registration_number = $registrationNumber;

        $customer->save();

        return redirect()->route('admin.customer.detail.by.package.edit', [$customer->umrah_package_id, $customerId])
            ->with('success', 'Data Jemaah berhasil diperbarui.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroyByBot($registrationNumber, Customer $customer): JsonResponse
    {
        // Temukan entri di tabel 'customer' berdasarkan 'registration_number'
        $customerData = $customer->with('customerDocument')->where('registration_number', $registrationNumber)->first();

        if (!$customerData) {
            throw new HttpResponseException(response()->json([
                "errors" => [
                    'message' => [
                        'Nomor Registrasi yang anda kirim tidak tersedia.'
                    ]
                ]
            ])->setStatusCode(404));
        }
        CustomerAuditLog::createLog($customerData, 'deleted by bot');

        $customerData->customerDocument()->delete();

        $customerData->delete();

        return response()->json([
            'data' => true
        ])->setStatusCode(200);
    }

    public function destroyByUser($registrationNumber, Customer $customer): JsonResponse
    {
        // Temukan entri di tabel 'customer' berdasarkan 'registration_number'
        $customerData = $customer->with('customerDocument')->where('registration_number', $registrationNumber)->first();

        if (!$customerData) {
            throw new HttpResponseException(response()->json([
                "errors" => [
                    'message' => [
                        'Nomor Registrasi yang anda kirim tidak tersedia.'
                    ]
                ]
            ])->setStatusCode(404));
        }

        $packageName = UmrahPackage::with('customers')->find($customerData->umrah_package_id);

        if ($customerData->customerDocument) {
            $document = $customerData->customerDocument;

            $files = [
                'customer_photo' => $document->customer_photo,
                'passport_photo' => $document->passport_photo,
                'id_photo' => $document->id_photo,
                'birth_certificate_photo' => $document->birth_certificate_photo,
                'family_card_photo' => $document->family_card_photo
            ];

            foreach ($files as $file) {
                if ($file && Storage::disk('public')->exists($file)) {
                    Storage::disk('public')->delete($file);
                }
            }

            // Hapus entri di tabel 'customerDocument' yang terkait dengan 'customer'
            $document->delete();
        }
        CustomerAuditLog::createLog($customerData, 'deleted by user');
        // Hapus entri di tabel 'customerDocument' yang terkait dengan 'customer'
        $customerData->customerDocument()->delete();

        // Hapus entri di tabel 'customer'
        $customerData->delete();

        $packageName->increment('quota', 1);

        return response()->json([
            'data' => true
        ])->setStatusCode(200);
    }

    public function destroyByWebManage($registrationNumber, Customer $customer)
    {
        $customerData = $customer->with('customerDocument')->where('registration_number', $registrationNumber)->first();

        $tempCustomerName = $customerData->name;

        if (!$customerData) {
            return redirect()->back()->with('error', 'Data calon jemaah tidak ditemukan');
        }

        $packageName = UmrahPackage::with('customers')->find($customerData->umrah_package_id);

        if ($customerData->customerDocument) {
            $document = $customerData->customerDocument;

            $files = [
                'customer_photo' => $document->customer_photo,
                'passport_photo' => $document->passport_photo,
                'id_photo' => $document->id_photo,
                'birth_certificate_photo' => $document->birth_certificate_photo,
                'family_card_photo' => $document->family_card_photo
            ];

            foreach ($files as $file) {
                if ($file && Storage::disk('public')->exists($file)) {
                    Storage::disk('public')->delete($file);
                }
            }

            $document->delete();
        }
        CustomerAuditLog::createLog($customerData, 'deleted by ' . auth()->user()->name);
        // Hapus entri di tabel 'customerDocument' yang terkait dengan 'customer'
        $customerData->customerDocument()->delete();

        // Hapus entri di tabel 'customer'
        $customerData->delete();

        $packageName->increment('quota', 1);

        return redirect()->route('admin.customer.list.by.package', ['packageId' => $customerData->umrah_package_id])->with('success', 'Data Calon Jemaah ' . $tempCustomerName . ' berhasil dihapus.');
    }


    private function generateRegistrationNumber($customer)
    {
        $year = date('Y');
        $fullName = $customer->full_name;
        $genderInitial = strtoupper(substr($customer->gender, 0, 1));
        $motherInitial = strtoupper(substr($customer->mother_name, 0, 2));
        $fatherInitial = strtoupper(substr($customer->father_name, 0, 2));
        $cityInitial = strtoupper(substr($customer->birth_place, 0, 1));
        $packageId = $customer->umrah_package_id;
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

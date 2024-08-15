<?php

namespace App\Http\Controllers;

use App\Http\Resources\CustomerResource;
use App\Models\Customer;
use App\Models\UmrahPackage;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index(Customer $customer, UmrahPackage $umrahPackage)
    {
        $registeredJemaah = $customer->count();
        $totalActivePackage = $umrahPackage->where('status', 'ACTIVE')
            ->count();

        $customers = $customer->with(['umrahPackage', 'customerDocument'])
            ->whereNotNull('umrah_package_id')
            ->whereMonth('created_at', now()->month)
            ->whereYear('created_at', now()->year)
            ->orderBy('created_at')
            ->get();

        $customersWithoutPassport = $customer->with(['umrahPackage', 'customerDocument'])
            ->whereHas('customerDocument', function ($query) {
                $query->whereNull('passport_number');
            })
            ->orWhereDoesntHave('customerDocument')
            ->get();

        $customers = CustomerResource::collection($customers);

        return view('admin.pages.dashboard', compact('customers', 'registeredJemaah', 'totalActivePackage', 'customersWithoutPassport'));
    }
}

<?php

namespace App\Http\Controllers\Pdf;

use App\Http\Controllers\Controller;
use App\Models\Customer;
use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade\Pdf;

class RekomController extends Controller
{
    public function generateRekomByPackageId(int $packageId)
    {
        $customers = Customer::with('umrahPackage', 'customerDocument')->where('umrah_package_id', $packageId)->get();

        if ($customers->isEmpty()) {
            return redirect()->back()->with('failed', 'Tidak ada data jemaah untuk dicetak.');
        }

        $packageName = $customers->first()->umrahPackage->name; // Ambil nama paket dari customer pertama

        $pdf = Pdf::setPaper('A4')->loadView('admin.components.pdf.rekoms', compact('customers'));

        return $pdf->stream('surat-rekomendasi-umroh-' . $packageName . '.pdf');
    }

    public function generateRekomByCustomerId(int $customerId)
    {
        $customer = Customer::with(['umrahPackage', 'customerDocument'])->findOrFail($customerId);

        $packageName = $customer->first()->umrahPackage->name; // Ambil nama paket dari customer pertama

        $pdf = Pdf::setPaper('A4')->loadView('admin.components.pdf.rekom', compact('customer'));

        return $pdf->stream('surat-rekomendasi-umroh-' . $customer->fullName . '-' . $packageName . '.pdf');
    }
}

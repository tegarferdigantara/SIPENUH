<?php

namespace App\Http\Controllers\Pdf;

use App\Http\Controllers\Controller;
use App\Models\Customer;
use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade\Pdf;

class ManifestController extends Controller
{
    public function generatePdfByPackageId(int $packageId)
    {
        $customers = Customer::with(['umrahPackage', 'customerDocument'])->where('umrah_package_id', $packageId)->get();

        if ($customers->isEmpty()) {
            return redirect()->back()->with('failed', 'Tidak ada data jemaah untuk dicetak.');
        }

        $packageName = $customers->first()->umrahPackage->name; // Ambil nama paket dari customer pertama

        $pdf = Pdf::setPaper('A4', 'landscape')->loadView('admin.components.pdf.manifest', compact('customers'));

        return $pdf->stream('manifest-umroh-' . $packageName . '.pdf');
    }
}

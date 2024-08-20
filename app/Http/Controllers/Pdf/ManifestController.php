<?php

namespace App\Http\Controllers\Pdf;

use App\Http\Controllers\Controller;
use App\Models\Customer;
use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Support\Facades\File;

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

    public function generatePdfManifestExport(int $packageId)
    {
        $customers = Customer::with(['umrahPackage', 'customerDocument'])->where('umrah_package_id', $packageId)->get();

        if ($customers->isEmpty()) {
            return redirect()->back()->with('failed', 'Tidak ada data jemaah untuk dicetak.');
        }

        $packageName = str_replace(' ', '_', mb_convert_case($customers->first()->umrahPackage->name, MB_CASE_LOWER, 'utf-8')); // Ambil nama paket dari customer pertama
        $fileName = "manifest-umroh-{$packageName}-{$customers->first()->umrahPackage->departure_date}.pdf";
        $directoryPath = storage_path('app/public/temp/manifest/');

        // Pastikan direktori ada
        if (!File::exists($directoryPath)) {
            File::makeDirectory($directoryPath, 0755, true);
        }

        $filePath = $directoryPath . $fileName;

        $pdf = Pdf::setPaper('A4', 'landscape')->loadView('admin.components.pdf.manifest', compact('customers'));

        $pdf->save($filePath);

        return $filePath;
    }
}

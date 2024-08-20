<?php

namespace App\Http\Controllers\Pdf;

use App\Http\Controllers\Controller;
use App\Models\Customer;
use Illuminate\Support\Facades\File;
use Barryvdh\DomPDF\Facade\Pdf;

class RekomController extends Controller
{
    public function generateRekomByCustomerId(int $customerId)
    {
        $customer = Customer::with(['umrahPackage', 'customerDocument'])->findOrFail($customerId);

        $packageName = $customer->first()->umrahPackage->name; // Ambil nama paket dari customer pertama

        $pdf = Pdf::setPaper('A4')->loadView('admin.components.pdf.rekom', compact('customer'));

        return $pdf->stream('surat-rekomendasi-umroh-' . $customer->fullName . '-' . $packageName . '.pdf');
    }

    public function generateRekomExport(int $customerId)
    {
        $customer = Customer::with(['umrahPackage', 'customerDocument'])->findOrFail($customerId);

        $packageName = str_replace(' ', '_', mb_convert_case($customer->umrahPackage->name, MB_CASE_LOWER, 'utf-8')); // Ambil nama paket dari customer pertama
        $fileName = 'surat-rekomendasi-umroh-' . $customer->full_name . '-' . $packageName . '.pdf';
        $directoryPath = storage_path('app/public/temp/surat-rekomendasi/');

        // Pastikan direktori ada
        if (!File::exists($directoryPath)) {
            File::makeDirectory($directoryPath, 0755, true);
        }

        $filePath = $directoryPath . $fileName;

        $pdf = Pdf::setPaper('A4')->loadView('admin.components.pdf.rekom', compact('customer'));

        $pdf->save($filePath);

        return $filePath;
    }
}

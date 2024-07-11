<?php

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

function generateReferenceNumber()
{
    // Ambil tahun saat ini
    $year = date('Y');

    // Hitung jumlah surat yang sudah dikeluarkan tahun ini
    $count = DB::table('document_registries')->whereYear('created_at', $year)->count() + 1;

    // Format nomor urut menjadi 3 digit
    $number = str_pad($count, 3, '0', STR_PAD_LEFT);

    // Gabungkan semua bagian nomor referensi
    return "PTAB/{$year}/{$number}";
}

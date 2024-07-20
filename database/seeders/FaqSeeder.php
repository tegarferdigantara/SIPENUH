<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Faq;
use App\Models\User;

class FaqSeeder extends Seeder
{
    public function run()
    {
        // Pastikan ada setidaknya satu user sebagai creator
        $user = User::first();

        if (!$user) {
            $user = User::factory()->create();
        }

        $faqs = [
            [
                'question' => 'Apa syarat untuk mendaftar umroh?',
                'answer' => 'Syarat untuk mendaftar umroh meliputi:
                1. Beragama Islam
                2. Memiliki paspor dengan masa berlaku minimal 7 bulan
                3. Memiliki kartu vaksin meningitis
                4. Sehat jasmani dan rohani
                5. Bagi wanita harus didampingi mahram atau rombongan wanita minimal 2 orang
                6. Memiliki dana yang cukup untuk biaya perjalanan',
                'user_creator_id' => $user->id
            ],
            [
                'question' => 'Berapa biaya umroh?',
                'answer' => 'Biaya umroh bervariasi tergantung pada paket yang dipilih, mulai dari Rp 25 juta hingga Rp 50 juta. Silakan hubungi kami untuk informasi lebih rinci tentang paket dan harga terbaru.',
                'user_creator_id' => $user->id
            ],
            [
                'question' => 'Bagaimana cara mendaftar umroh?',
                'answer' => 'Cara mendaftar umroh:
                1. Kunjungi website resmi kami
                2. Pilih paket umroh yang diinginkan
                3. Isi formulir pendaftaran online
                4. Lakukan pembayaran DP
                5. Lengkapi dokumen yang diperlukan
                6. Tunggu konfirmasi dari kami',
                'user_creator_id' => $user->id
            ],
            [
                'question' => 'Berapa lama waktu yang dibutuhkan untuk proses pendaftaran?',
                'answer' => 'Proses pendaftaran umroh biasanya memakan waktu 1-2 minggu, tergantung pada kelengkapan dokumen yang Anda berikan.',
                'user_creator_id' => $user->id
            ],
            [
                'question' => 'Apakah ada pembatalan dan pengembalian dana?',
                'answer' => 'Ya, kami memiliki kebijakan pembatalan dan pengembalian dana. Jika pembatalan dilakukan 30 hari sebelum keberangkatan, kami akan mengembalikan 50% dari total biaya. Untuk pembatalan kurang dari 30 hari sebelum keberangkatan, mohon maaf kami tidak dapat mengembalikan dana.',
                'user_creator_id' => $user->id
            ],
        ];

        foreach ($faqs as $faq) {
            Faq::create($faq);
        }
    }
}

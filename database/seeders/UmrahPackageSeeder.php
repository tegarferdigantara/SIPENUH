<?php

namespace Database\Seeders;

use App\Models\UmrahPackage;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UmrahPackageSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $user = User::query()->limit(1)->first();
        UmrahPackage::create([
            'name' => 'Umrah Januari',
            'description' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Unde amet vero, qui ut minima quis necessitatibus ipsa illum neque quia ullam sunt dignissimos aliquam iste enim alias eveniet? Quidem, ducimus.',
            'depature_date' => Carbon::now(),
            'duration' => 14,
            'price' => 140000,
            'facility' => 'lorem',
            'destination' => 'lorem',
            'quota' => 20,
            'status' => 'ACTIVE',
            'user_creator_id' => $user->id
        ]);

        UmrahPackage::create([
            'name' => 'Umrah Februari',
            'description' => 'Deskripsi Umrah Februari Lorem ipsum dolor sit amet, consectetur adipiscing elit.',
            'depature_date' => Carbon::now()->addMonth(), // Tambah satu bulan dari sekarang
            'duration' => 12,
            'price' => 120000,
            'facility' => 'Facility Lorem ipsum dolor sit amet',
            'destination' => 'Makkah',
            'quota' => 15,
            'status' => 'ACTIVE',
            'user_creator_id' => $user->id
        ]);

        UmrahPackage::create([
            'name' => 'Umrah Maret',
            'description' => 'Deskripsi Umrah Maret Lorem ipsum dolor sit amet, consectetur adipiscing elit.',
            'depature_date' => Carbon::now()->addMonths(2), // Tambah dua bulan dari sekarang
            'duration' => 10,
            'price' => 110000,
            'facility' => 'Fasilitas Lorem ipsum dolor sit amet',
            'destination' => 'Madinah',
            'quota' => 18,
            'status' => 'ACTIVE',
            'user_creator_id' => $user->id
        ]);

        UmrahPackage::create([
            'name' => 'Umrah April',
            'description' => 'Deskripsi Umrah April Lorem ipsum dolor sit amet, consectetur adipiscing elit.',
            'depature_date' => Carbon::now()->addMonths(3), // Tambah tiga bulan dari sekarang
            'duration' => 15,
            'price' => 150000,
            'facility' => 'Fasilitas Lorem ipsum dolor sit amet',
            'destination' => 'Makkah',
            'quota' => 25,
            'status' => 'ACTIVE',
            'user_creator_id' => $user->id
        ]);

        UmrahPackage::create([
            'name' => 'Umrah Mei',
            'description' => 'Deskripsi Umrah Mei Lorem ipsum dolor sit amet, consectetur adipiscing elit.',
            'depature_date' => Carbon::now()->addMonths(4), // Tambah empat bulan dari sekarang
            'duration' => 12,
            'price' => 130000,
            'facility' => 'Fasilitas Lorem ipsum dolor sit amet',
            'destination' => 'Madinah & Makkah',
            'quota' => 20,
            'status' => 'ACTIVE',
            'user_creator_id' => $user->id
        ]);
    }
}

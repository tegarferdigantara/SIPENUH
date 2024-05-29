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
        $user_id = User::query()->limit(1)->first();
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
            'image' => 'llorem',
            'user_creator_id' => $user_id->id
        ]);
    }
}

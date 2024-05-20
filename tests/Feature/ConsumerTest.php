<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class ConsumerTest extends TestCase
{
    public function testConsumerRegisterSuccess()
    {
        $this->post('/api/register', [
            'full_name' => 'Tegar Ferdigantara',
            'whatsapp_number' => '895',
            'gender' => 'Pria',
            'birth_place' => 'Pontianak',
            'birth_date' => '9/9/2001',
            'father_name' => 'Winarto',
            'mother_name' => 'Fitri Kurniawati',
            'profession' => 'Freelancer',
            'address' => 'Jl Parit Makmur',
            'province' => 'Kalimantan Barat',
            'city' => 'Pontianak',
            'subdistrict' => 'Siantan Tengah',
            'family_number' => '899',
            'email' => 'test@gmail.com',
            'umrah_package_id' => '2',
            'registration_date' => '9/9/2024'
        ])
            ->assertStatus(201)
            ->assertJson([
                'data' => [
                    'full_name' => 'Tegar Ferdigantara',
                    'whatsapp_number' => '895',
                    'gender' => 'Pria',
                    'birth_place' => 'Pontianak',
                    'birth_date' => '9/9/2001',
                    'father_name' => 'Winarto',
                    'mother_name' => 'Fitri Kurniawati',
                    'profession' => 'Freelancer',
                    'address' => 'Jl Parit Makmur',
                    'province' => 'Kalimantan Barat',
                    'city' => 'Pontianak',
                    'subdistrict' => 'Siantan Tengah',
                    'family_number' => '899',
                    'email' => 'test@gmail.com',
                    'umrah_package_id' => '2',
                    'registration_date' => '9/9/2024'
                ],
            ]);
    }

    // public function testConsumerRegisterFail()
    // {
    //     $this->post('/api/register', [
    //         'full_name' => '',
    //         'whatsapp_number' => '895',
    //         'gender' => 'Pria',
    //         'birth_place' => 'Pontianak',
    //         'birth_date' => '9/9/2001',
    //         'father_name' => 'Winarto',
    //         'mother_name' => 'Fitri Kurniawati',
    //         'profession' => 'Freelancer',
    //         'address' => 'Jl Parit Makmur',
    //         'province' => 'Kalimantan Barat',
    //         'city' => 'Pontianak',
    //         'subdistrict' => 'Siantan Tengah',
    //         'family_number' => '899',
    //         'email' => 'test@gmail.com',
    //         'umrah_package_id' => '2',
    //         'registration_date' => '9/9/2024'
    //     ])
    //         ->assertStatus(400)
    //         ->assertJson([
    //             'errors' => [
    //                 'full_name' => ['The full name field is required.'],
    //                 'whatsapp_number' => '895',
    //                 'gender' => 'Pria',
    //                 'birth_place' => 'Pontianak',
    //                 'birth_date' => '9/9/2001',
    //                 'father_name' => 'Winarto',
    //                 'mother_name' => 'Fitri Kurniawati',
    //                 'profession' => 'Freelancer',
    //                 'address' => 'Jl Parit Makmur',
    //                 'province' => 'Kalimantan Barat',
    //                 'city' => 'Pontianak',
    //                 'subdistrict' => 'Siantan Tengah',
    //                 'family_number' => '899',
    //                 'email' => 'test@gmail.com',
    //                 'umrah_package_id' => '2',
    //                 'registration_date' => '9/9/2024'
    //             ],
    //         ]);
    // }
}

<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ProviderSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $providers = [
            ['name' => 'Ikeja Electric', 'logo_url' => 'logo1', 'description' => 'Parts of Lagos, including Ikeja and environs.'],
            ['name' => 'Eko Electricity Distribution Company', 'logo_url' => 'logo2', 'description' => 'Southern Lagos, Apapa, and parts of Ogun'],
            ['name' => 'Abuja Electricity Distribution Company ', 'logo_url' => 'logo3', 'description' => '	Abuja, Kogi, Niger, Nasarawa.'],
        ];

        foreach ($providers as $provider) {
            \App\Models\Provider::create($provider);
        }
    }
}

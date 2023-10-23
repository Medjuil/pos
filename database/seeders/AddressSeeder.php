<?php

namespace Database\Seeders;

use App\Models\Address;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class AddressSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Address::create([
            'country' => 'Philippines',
            'region' => 'Region X',
            'province_state' => 'Bukidnon',
            'municipality_city' => 'Malaybalay',
            'barangay' => 'Casisang',
            'postal_code' => '9716',
        ]);
    }
}

<?php

namespace Database\Seeders;

use App\Models\Address;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $address = Address::first();

        $users = [
            [
                'firstname' => 'Admin',
                'lastname' => 'Admin',
                'email' => 'admin@mail.com',
                'mobile_no' => '09351960974',
                'password' => Hash::make('password'),
                'active' => 'active',
                'role' => 'admin',
                'address_id' => $address->id
            ],
            [
                'firstname' => 'Cashier',
                'lastname' => 'Cashier',
                'email' => 'cashier@mail.com',
                'mobile_no' => '09351960975',
                'password' => Hash::make('password'),
                'active' => 'active',
                'role' => 'cashier',
                'address_id' => $address->id
            ],
            [
                'firstname' => 'Manager',
                'lastname' => 'Manager',
                'email' => 'manager@mail.com',
                'mobile_no' => '09351960976',
                'password' => Hash::make('password'),
                'active' => 'active',
                'role' => 'manager',
                'address_id' => $address->id
            ],
        ];

       foreach ($users as $user) {
            User::create($user);
       }
    }
}

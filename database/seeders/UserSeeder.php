<?php

namespace Database\Seeders;

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
        User::create([
            'name' => 'Admin',
            'email' => 'admin@example.com',
            'password' => Hash::make('12345678')
        ]);

        // Create POS manager user
        User::create([
            'name' => 'POS Manager',
            'email' => 'posmanager@example.com',
            'password' => Hash::make('12345678')
        ]);

        // Create cashier user
        User::create([
            'name' => 'Cashier',
            'email' => 'cashier@example.com',
            'password' => Hash::make('12345678')
        ]);
    }
}

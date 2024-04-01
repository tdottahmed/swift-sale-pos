<?php

namespace Database\Seeders;

use App\Models\ContactType;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ContactTypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $contactTypes = [
            ['title' => 'Suppliers'],
            ['title' => 'Customers'],
            ['title' => 'Both(Supplier & Customer)'],
        ];
        ContactType::insert($contactTypes);
    }
}

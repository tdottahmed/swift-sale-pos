<?php

namespace Database\Seeders;

use App\Models\BarcodeType;
use Illuminate\Database\Seeder;

class BarcodeTypeTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $barcodeTypes = [
            ['title' => 'Code 39'],
            ['title' => 'Code 39 Extended'],
            ['title' => 'Code 93'],
            ['title' => 'Code 128'],
            ['title' => 'EAN-8'],
            ['title' => 'EAN-13'],
            ['title' => 'EAN-14'],
            ['title' => 'Interleaved 2 of 5'],
            ['title' => 'UPC-A'],
            ['title' => 'UPC-E'],
        ];

        BarcodeType::insert($barcodeTypes);
    }
}

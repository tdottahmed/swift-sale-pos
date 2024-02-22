<?php

namespace Database\Seeders;

use App\Models\Unit;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UnitTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $uints = [
            ['title' => 'Pair'],
            ['title' => 'kg'],
            ['title' => 'liter'],
        ];

        Unit::insert($uints);
    }
}

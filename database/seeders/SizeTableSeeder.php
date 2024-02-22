<?php

namespace Database\Seeders;

use App\Models\Size;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class SizeTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $sizes = [
            ['title' => '39'],
            ['title' => '40'],
            ['title' => '42'],
            ['title' => '44'],
            ['title' => 'XS'],
            ['title' => 'S'],
            ['title' => 'M'],
            ['title' => 'L'],
            ['title' => 'XL'],
            ['title' => 'XXL'],
        ];
        
        Size::insert($sizes);
    }
}

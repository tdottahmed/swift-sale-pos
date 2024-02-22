<?php

namespace Database\Seeders;

use App\Models\Color;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ColorTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $colors = [
            ['title' => 'Black'],
            ['title' => 'White'],
            ['title' => 'Red'],
            ['title' => 'Green'],
            ['title' => 'Blue'],
            ['title' => 'Yellow'],
            ['title' => 'Orange'],
            ['title' => 'Purple'],
            ['title' => 'Pink'],
            ['title' => 'Brown'],
        ];
        
        Color::insert($colors);
        
    }
}

<?php

namespace Database\Seeders;

use App\Models\SubCategory;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class SubCategoryTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $subCategories = [
            ['category_id' => 1, 'title' => 'Sleeper'],
            ['category_id' => 1, 'title' => 'sports'],
            ['category_id' => 1, 'title' => 'Hill'],
            ['category_id' => 1, 'title' => 'flat'],
        
            ['category_id' => 2, 'title' => 'Sneekers'],
            ['category_id' => 2, 'title' => 'Casual'],
            ['category_id' => 2, 'title' => 'Half Show'],
        
            ['category_id' => 3, 'title' => 'Exclusive'],

        ];
        SubCategory::insert($subCategories);
    }
}

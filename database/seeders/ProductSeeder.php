<?php

namespace Database\Seeders;

use App\Models\Product;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $products = [
            ['name' => 'Laptop'],
            ['brand' => 'HP'],
            ['unit' => 'EA'],
            ['selling_price'=> 2500],
        ];

        Product::insert($products);
    }
}

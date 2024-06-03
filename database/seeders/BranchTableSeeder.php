<?php

namespace Database\Seeders;

use App\Models\Branch;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class BranchTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $branches = [
            [
                'name' => 'Dhaka',
                'location' => 'Uttara'
            ],
            [
                'name' => 'Chittagong',
                'location' => 'Agrabad'
            ],
            [
                'name' => 'Sylhet',
                'location' => 'Shahjalal Uposhohor'
            ]
        ];

        foreach ($branches as $branch) {
            Branch::create($branch);
        }
    }
}

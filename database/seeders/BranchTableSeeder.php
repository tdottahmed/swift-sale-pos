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
                'title' => 'Dhaka',
                'location' => 'Uttara'
            ],
            [
                'title' => 'Chittagong',
                'location' => 'Agrabad'
            ],
            [
                'title' => 'Sylhet',
                'location' => 'Shahjalal Uposhohor'
            ]
        ];

        foreach ($branches as $branch) {
            Branch::create($branch);
        }
    }
}

<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $this->call(UserSeeder::class);
        $this->call(CategoryTableSeeder::class);
        $this->call(BrandTableSeeder::class);
        $this->call(BarcodeTypeTableSeeder::class);
        $this->call(ColorTableSeeder::class);
        $this->call(SizeTableSeeder::class);
        $this->call(SubCategoryTableSeeder::class);
        $this->call(UnitTableSeeder::class);
        $this->call(PersonalizeSettingsTableSeeder::class);
        // \App\Models\User::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);
    }
}

<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\UserPersonalizeSettings;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class UserPersonalizeSettingsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        UserPersonalizeSettings::create([
            'user_id' => 1, 
            'background_color' => '#FFFFFF', 
            'font_family' => 'Arial',
            'theme' => 'default'
        ]);
    }
}

<?php

namespace Database\Seeders;

use App\Models\UserPersonalizeSettings;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PersonalizeSettingsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        UserPersonalizeSettings::create(
            [
                'user_id'=>1,
                'background_color'=>null,
                'font_family'=>null,
                'theme'=>'default',

            ]
            );
    }
}

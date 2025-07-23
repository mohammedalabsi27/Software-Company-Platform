<?php

namespace Database\Seeders;

use App\Models\Setting;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class SettingSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {      
            Setting::updateOrCreate(['id' => 1],
                [
                    'site_name' => 'My Programming Company',
                    'site_description' => 'We build web and mobile applications.',
                    'email' => 'info@mycompany.com',
                    'phone' => '+123456789',
                    'address' => 'Yemen',
                    'facebook' => 'https://facebook.com/mycompany',
                    'linkedin' => 'https://linkedin.com/company/mycompany',
                    'twitter' => 'https://twitter.com/mycompany',
                    'instagram' => 'https://instagram.com/mycompany',
                ]);
    }
}

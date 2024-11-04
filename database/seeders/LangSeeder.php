<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Lang;

class LangSeeder extends Seeder
{
    public function run()
    {
        // Konfiqurasiya edilmiş məlumatlar arrayi
        $languages = [
            [
                'name' => 'English',
                'code' => 'en',
                'site_code' => 'en',
                'is_main_lang' => false,
                'admin_panel_main_lang' => false,
                'status' => true,
                'order' => 2
            ],
        ];


        Lang::insert($languages);
    }
}

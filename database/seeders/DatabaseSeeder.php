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
        $this->call(AboutSeeder::class);
        $this->call(BannerSeeder::class);
        $this->call(InfoSeeder::class);
        $this->call(LangSeeder::class);
        $this->call(MenuSeeder::class);
        $this->call(TranslateSeeder::class);
        $this->call(UserSeeder::class);
        $this->call(TestimonialSeeder::class);
    }
}

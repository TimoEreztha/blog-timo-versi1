<?php

namespace Database\Seeders;

use App\Models\Config;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class ConfigSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Config::create([
            'name' => 'judul_blog',
            'value' => 'SELAMAT DATANG DI BLOG SAYA'
        ]);

        Config::create([
            'name' => 'desc_vlog',
            'value' => 'Teknologi yang digunakan adalah Laravel 11 dan bootstrap 5'
        ]);

        Config::create([
            'name' => 'footer',
            'value' => 'by timo ganteng'
        ]);

        Config::create([
            'name' => 'logo',
            'value' => 'logo.png'
        ]);
    }
}
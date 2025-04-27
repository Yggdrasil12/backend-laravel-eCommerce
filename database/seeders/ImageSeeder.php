<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ImageSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Insertar datos manualmente
        DB::table('images')->insert([
            // 'product_id','image_url'
            [
                'product_id' => '1',
                'image_url' => 'https://art.nativescript-vue.org/NativeScript-Vue-White-Green.png',
            ],
            [
                'product_id' => '2',
                'image_url' => 'https://fakeimg.pl/600x300/',
            ],
            [
                'product_id' => '3',
                'image_url' => 'https://reactjs.org/logo-og.png',
            ]
        ]);
    }
}

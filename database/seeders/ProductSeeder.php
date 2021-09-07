<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('products')->insert([
            [
                'name'=> 'Apple Iphone 12 Pro',
                'price'=> '$1000',
                'category'=> 'Smartphone',
                'description'=> 'Triple camera, 8 Gb ram, 90 Hz Refresh rate with ios 15',
                "gallery"=> 'https://assets.swappie.com/swappie-product-iphone-12-pro-max-silver.png'
            ],

            [
                'name'=> 'Sony Bravia Television',
                'price'=> '$1100',
                'category'=> 'Television',
                'description'=> 'Smart tv with 4k resulation',
                "gallery"=> 'https://www.sony-asia.com/image/f6a735c74de46f284950974417018597?fmt=pjpeg&wid=1014&hei=396&bgcolor=F1F5F9&bgc=F1F5F9'
            ],

            [
                'name'=> 'Samsung The Frame',
                'price'=> '$2000',
                'category'=> 'Television',
                'description'=> 'Smart tv with 4k resulation. Can be used as Photo Frame',
                "gallery"=> 'https://images.firstpost.com/fpimages/1200x800/fixed/jpg/2021/06/2021_TheFrame_1280.jpg'
            ],

            [
                'name'=> 'Samsung Fridge',
                'price'=> '$1200',
                'category'=> 'Refrigerator',
                'description'=> 'Size:500 litre. Twin cooling turbo boost technology.',
                "gallery"=> 'https://static-01.daraz.com.bd/p/1672334a5bf2c3d9d49eb08bb76db6ec.jpg_340x340q80.jpg_.webp'
            ]
        ]);
    }
}

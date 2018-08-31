<?php

use Illuminate\Database\Seeder;
use App\Products;
use Faker\Provider\Lorem;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // factory(Products::class, 50)->create();
        //Phones
        Products::create([
            'name' => 'iphone',
            'title' => 'Iphone',
            'price' => '1020.19',
            'category_id' => 1,
            'description' => Lorem::sentence()
        ]);
        Products::create([
            'name' => 'samsung',
            'title' => 'Samsung',
            'price' => '123.19',
            'category_id' => 1,
            'description' => Lorem::sentence()
        ]);
        Products::create([
            'name' => 'xaomi',
            'title' => 'Xaomi',
            'price' => '870.19',
            'category_id' => 1,
            'description' => Lorem::sentence()
        ]);

        //TVs
        Products::create([
            'name' => 'appletv',
            'title' => 'AppleTV',
            'price' => '1520.19',
            'category_id' => 2,
            'description' => Lorem::sentence()
        ]);
        Products::create([
            'name' => 'samsung',
            'title' => 'Samsung',
            'price' => '1323.19',
            'category_id' => 2,
            'description' => Lorem::sentence()
        ]);
        Products::create([
            'name' => 'xaomi-tv',
            'title' => 'XaomiTV',
            'price' => '870.19',
            'category_id' => 2,
            'description' => Lorem::sentence()
        ]);

        //Notebook
        Products::create([
            'name' => 'macbook',
            'title' => 'Macbook',
            'price' => '2000.19',
            'category_id' => 3,
            'description' => Lorem::sentence()
        ]);
        Products::create([
            'name' => 'acer',
            'title' => 'Acer',
            'price' => '1123.19',
            'category_id' => 3,
            'description' => Lorem::sentence()
        ]);
        Products::create([
            'name' => 'lenovo',
            'title' => 'Lenovo',
            'price' => '970.19',
            'category_id' => 3,
            'description' => Lorem::sentence()
        ]);

        //tablets
        Products::create([
            'name' => 'ipad',
            'title' => 'Ipad',
            'price' => '1000.19',
            'category_id' => 4,
            'description' => Lorem::sentence()
        ]);
        Products::create([
            'name' => 'samsung',
            'title' => 'Samsung',
            'price' => '123.19',
            'category_id' => 4,
            'description' => Lorem::sentence()
        ]);
        Products::create([
            'name' => 'lenovo',
            'title' => 'Lenovo',
            'price' => '370.19',
            'category_id' => 4,
            'description' => Lorem::sentence()
        ]);

        //Headphones
        Products::create([
            'name' => 'earpods',
            'title' => 'Earpods',
            'price' => '150.19',
            'category_id' => 5,
            'description' => Lorem::sentence()
        ]);
        Products::create([
            'name' => 'marshal',
            'title' => 'Marshal',
            'price' => '170.19',
            'category_id' => 5,
            'description' => Lorem::sentence()
        ]);
        Products::create([
            'name' => 'jbl',
            'title' => 'JBL',
            'price' => '370.19',
            'category_id' => 5,
            'description' => Lorem::sentence()
        ]);
    }
}

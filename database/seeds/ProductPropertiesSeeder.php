<?php

use Illuminate\Database\Seeder;
use App\ProductProperty;

class ProductPropertiesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(ProductProperty::class, 200)->create();
    }
}

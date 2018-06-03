<?php

use Illuminate\Database\Seeder;
use App\ProductMedia;

class ProductMediaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(ProductMedia::class, 200)->create();
    }
}

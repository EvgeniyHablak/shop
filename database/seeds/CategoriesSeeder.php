<?php

use Illuminate\Database\Seeder;
use App\Categories;

class CategoriesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Categories::create([
            'name' => 'phones',
            'title' => 'Phones'
        ]);
        Categories::create([
            'name' => 'tvs',
            'title' => 'TVs'
        ]);
        Categories::create([
            'name' => 'notebooks',
            'title' => 'Notebooks',
        ]);
        Categories::create([
            'name' => 'tablets',
            'title' => 'Tablets',
        ]);
        Categories::create([
            'name' => 'headphones',
            'title' => 'Headphones',
        ]);
    }
}

<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $this->call(ProductSeeder::class);
        $this->call(CategoriesSeeder::class);
        $this->call(UserSeeder::class);
        $this->call(CategoryPropertiesSeeder::class);
        $this->call(ProductPropertiesSeeder::class);
        $this->call(MediaSeeder::class);
        $this->call(ProductMediaSeeder::class);
    }
}

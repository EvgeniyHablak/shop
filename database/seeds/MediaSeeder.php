<?php

use Illuminate\Database\Seeder;
use App\Media;

class MediaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(Media::class, 200)->create();
    }
}

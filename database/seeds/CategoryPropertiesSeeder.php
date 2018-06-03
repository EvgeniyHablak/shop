<?php

use Illuminate\Database\Seeder;
use App\CategoryProperty;

class CategoryPropertiesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //Phones
        CategoryProperty::create([
            'category_id' => 1,
            'name' => 'ram',
            'title' => 'RAM'
        ]);
        CategoryProperty::create([
            'category_id' => 1,
            'name' => 'sim-cards-number',
            'title' => 'Number of SIM cards'
        ]);
        CategoryProperty::create([
            'category_id' => 1,
            'name' => 'os',
            'title' => 'OS'
        ]);
        CategoryProperty::create([
            'category_id' => 1,
            'name' => 'memory',
            'title' => 'Memory'
        ]);
        CategoryProperty::create([
            'category_id' => 1,
            'name' => 'processor-manufacturer',
            'title' => 'Processor manufacturer'
        ]);

        //TVs
        CategoryProperty::create([
            'category_id' => 2,
            'name' => 'screen',
            'title' => 'Screen'
        ]);
        CategoryProperty::create([
            'category_id' => 2,
            'name' => 'year',
            'title' => 'Year'
        ]);
        CategoryProperty::create([
            'category_id' => 2,
            'name' => 'size',
            'title' => 'Size'
        ]);
        CategoryProperty::create([
            'category_id' => 2,
            'name' => 'color',
            'title' => 'Color'
        ]);
        CategoryProperty::create([
            'category_id' => 2,
            'name' => 'os',
            'title' => 'OS'
        ]);

        //Notebooks
        CategoryProperty::create([
            'category_id' => 3,
            'name' => 'display-resolution',
            'title' => 'Display resolution'
        ]);
        CategoryProperty::create([
            'category_id' => 3,
            'name' => 'display-size',
            'title' => 'Diagonal display'
        ]);
        CategoryProperty::create([
            'category_id' => 3,
            'name' => 'processor',
            'title' => 'Processor'
        ]);
        CategoryProperty::create([
            'category_id' => 3,
            'name' => 'ram',
            'title' => 'RAM'
        ]);
        CategoryProperty::create([
            'category_id' => 3,
            'name' => 'memory-size',
            'title' => 'Memory Size'
        ]);
        CategoryProperty::create([
            'category_id' => 3,
            'name' => 'video-card',
            'title' => 'Video Card'
        ]);

        //Tablets
        CategoryProperty::create([
            'category_id' => 4,
            'name' => 'matrix',
            'title' => 'Matrix'
        ]);
        CategoryProperty::create([
            'category_id' => 4,
            'name' => 'ram',
            'title' => 'RAM'
        ]);
        CategoryProperty::create([
            'category_id' => 4,
            'name' => 'os',
            'title' => 'OS'
        ]);
        CategoryProperty::create([
            'category_id' => 4,
            'name' => 'memory-size',
            'title' => 'Memory size'
        ]);
        CategoryProperty::create([
            'category_id' => 4,
            'name' => 'display-size',
            'title' => 'Diagonal display'
        ]);

        //Headphones
        CategoryProperty::create([
            'category_id' => 5,
            'name' => 'type',
            'title' => 'Type'
        ]);
        CategoryProperty::create([
            'category_id' => 5,
            'name' => 'connection-type',
            'title' => 'Type of connection'
        ]);
        CategoryProperty::create([
            'category_id' => 5,
            'name' => 'noise-reduction',
            'title' => 'Noise Reduction'
        ]);
        CategoryProperty::create([
            'category_id' => 5,
            'name' => 'color',
            'title' => 'Color'
        ]);
        CategoryProperty::create([
            'category_id' => 5,
            'name' => 'cable',
            'title' => 'Cable'
        ]);
        CategoryProperty::create([
            'category_id' => 5,
            'name' => 'frequency-range',
            'title' => 'Frequency Range'
        ]);
    }
}

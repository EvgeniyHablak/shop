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
        // factory(ProductProperty::class, 200)->create();
        //1
        ProductProperty::create([
            'name' => 'ram',
            'title' => 'RAM',
            'value' => '2gb',
            'product_id' => 1
        ]);
        ProductProperty::create([
            'name' => 'sim-cards-number',
            'title' => 'Number of SIM cards',
            'value' => '2',
            'product_id' => 1
        ]);
        ProductProperty::create([
            'name' => 'os',
            'title' => 'OS',
            'value' => 'ios',
            'product_id' => 1
        ]);
        ProductProperty::create([
            'name' => 'memory',
            'title' => 'Memory',
            'value' => '64',
            'product_id' => 1
        ]);
        ProductProperty::create([
            'name' => 'processor-manufacturer',
            'title' => 'Processor manufacturer',
            'value' => 'dragon',
            'product_id' => 1
        ]);
        //2
        ProductProperty::create([
            'name' => 'ram',
            'title' => 'RAM',
            'value' => '3gb',
            'product_id' => 2
        ]);
        ProductProperty::create([
            'name' => 'sim-cards-number',
            'title' => 'Number of SIM cards',
            'value' => '1',
            'product_id' => 2
        ]);
        ProductProperty::create([
            'name' => 'os',
            'title' => 'OS',
            'value' => 'android',
            'product_id' => 2
        ]);
        ProductProperty::create([
            'name' => 'memory',
            'title' => 'Memory',
            'value' => '8',
            'product_id' => 2
        ]);
        ProductProperty::create([
            'name' => 'processor-manufacturer',
            'title' => 'Processor manufacturer',
            'value' => 'dragon',
            'product_id' => 2
        ]);
        //3
        ProductProperty::create([
            'name' => 'ram',
            'title' => 'RAM',
            'value' => '1gb',
            'product_id' => 3
        ]);
        ProductProperty::create([
            'name' => 'sim-cards-number',
            'title' => 'Number of SIM cards',
            'value' => '2',
            'product_id' => 3
        ]);
        ProductProperty::create([
            'name' => 'os',
            'title' => 'OS',
            'value' => 'ios',
            'product_id' => 3
        ]);
        ProductProperty::create([
            'name' => 'memory',
            'title' => 'Memory',
            'value' => '16',
            'product_id' => 3
        ]);
        ProductProperty::create([
            'name' => 'processor-manufacturer',
            'title' => 'Processor manufacturer',
            'value' => 'dragon',
            'product_id' => 3
        ]);
        //4
        ProductProperty::create([
            'name' => 'screen',
            'title' => 'Screen',
            'value' => 'amoled',
            'product_id' => 4
        ]);
        ProductProperty::create([
            'name' => 'year',
            'title' => 'Year',
            'value' => '2018',
            'product_id' => 4
        ]);
        ProductProperty::create([
            'name' => 'size',
            'title' => 'Size',
            'value' => '1000x3000',
            'product_id' => 4
        ]);
        ProductProperty::create([
            'name' => 'color',
            'title' => 'Color',
            'value' => 'black',
            'product_id' => 4
        ]);
        ProductProperty::create([
            'name' => 'os',
            'title' => 'OS',
            'value' => 'andriod',
            'product_id' => 4
        ]);
        //5
        ProductProperty::create([
            'name' => 'screen',
            'title' => 'Screen',
            'value' => 'notamoled',
            'product_id' => 5
        ]);
        ProductProperty::create([
            'name' => 'year',
            'title' => 'Year',
            'value' => '2014',
            'product_id' => 5
        ]);
        ProductProperty::create([
            'name' => 'size',
            'title' => 'Size',
            'value' => '1200x3000',
            'product_id' => 5
        ]);
        ProductProperty::create([
            'name' => 'color',
            'title' => 'Color',
            'value' => 'white',
            'product_id' => 5
        ]);
        ProductProperty::create([
            'name' => 'os',
            'title' => 'OS',
            'value' => 'tvos',
            'product_id' => 5
        ]);
        //6
        ProductProperty::create([
            'name' => 'screen',
            'title' => 'Screen',
            'value' => 'notaled',
            'product_id' => 6
        ]);
        ProductProperty::create([
            'name' => 'year',
            'title' => 'Year',
            'value' => '2013',
            'product_id' => 6
        ]);
        ProductProperty::create([
            'name' => 'size',
            'title' => 'Size',
            'value' => '100x300',
            'product_id' => 6
        ]);
        ProductProperty::create([
            'name' => 'color',
            'title' => 'Color',
            'value' => 'red',
            'product_id' => 6
        ]);
        ProductProperty::create([
            'name' => 'os',
            'title' => 'OS',
            'value' => 'andriodTV',
            'product_id' => 6
        ]);
        
        //7
        ProductProperty::create([
            'name' => 'display-resolution',
            'title' => 'Display resolution',
            'value' => '1800x2400',
            'product_id' => 7
        ]);
        ProductProperty::create([
            'name' => 'display-size',
            'title' => 'Diagonal display',
            'value' => '30',
            'product_id' => 7
        ]);
        ProductProperty::create([
            'name' => 'processor',
            'title' => 'Processor',
            'value' => 'intel',
            'product_id' => 7
        ]);
        ProductProperty::create([
            'name' => 'ram',
            'title' => 'RAM',
            'value' => '8',
            'product_id' => 7
        ]);
        ProductProperty::create([
            'name' => 'memory-size',
            'title' => 'Memory Size',
            'value' => '128',
            'product_id' => 7
        ]);
        ProductProperty::create([
            'name' => 'video-card',
            'title' => 'Video Card',
            'value' => 'nvidia',
            'product_id' => 7
        ]);
        //8
        ProductProperty::create([
            'name' => 'display-resolution',
            'title' => 'Display resolution',
            'value' => '1260x2200',
            'product_id' => 8
        ]);
        ProductProperty::create([
            'name' => 'display-size',
            'title' => 'Diagonal display',
            'value' => '32',
            'product_id' => 8
        ]);
        ProductProperty::create([
            'name' => 'processor',
            'title' => 'Processor',
            'value' => 'intel',
            'product_id' => 8
        ]);
        ProductProperty::create([
            'name' => 'ram',
            'title' => 'RAM',
            'value' => '4',
            'product_id' => 8
        ]);
        ProductProperty::create([
            'name' => 'memory-size',
            'title' => 'Memory Size',
            'value' => '256',
            'product_id' => 8
        ]);
        ProductProperty::create([
            'name' => 'video-card',
            'title' => 'Video Card',
            'value' => 'nvidia',
            'product_id' => 8
        ]);
        //9
        ProductProperty::create([
            'name' => 'display-resolution',
            'title' => 'Display resolution',
            'value' => '1800x3600',
            'product_id' => 9
        ]);
        ProductProperty::create([
            'name' => 'display-size',
            'title' => 'Diagonal display',
            'value' => '24',
            'product_id' => 9
        ]);
        ProductProperty::create([
            'name' => 'processor',
            'title' => 'Processor',
            'value' => 'intel',
            'product_id' => 9
        ]);
        ProductProperty::create([
            'name' => 'ram',
            'title' => 'RAM',
            'value' => '16',
            'product_id' => 9
        ]);
        ProductProperty::create([
            'name' => 'memory-size',
            'title' => 'Memory Size',
            'value' => '16',
            'product_id' => 9
        ]);
        ProductProperty::create([
            'name' => 'video-card',
            'title' => 'Video Card',
            'value' => 'nvidia',
            'product_id' => 9
        ]);
        //10
        ProductProperty::create([
            'name' => 'matrix',
            'title' => 'Matrix',
            'value' => 'amoled',
            'product_id' => 10
        ]);
        ProductProperty::create([
            'name' => 'os',
            'title' => 'OS',
            'value' => 'ios',
            'product_id' => 10
        ]);
        ProductProperty::create([
            'name' => 'display-size',
            'title' => 'Diagonal display',
            'value' => '10',
            'product_id' => 10
        ]);
        ProductProperty::create([
            'name' => 'ram',
            'title' => 'RAM',
            'value' => '2',
            'product_id' => 10
        ]);
        ProductProperty::create([
            'name' => 'memory-size',
            'title' => 'Memory Size',
            'value' => '16',
            'product_id' => 10
        ]);
        //11
        ProductProperty::create([
            'name' => 'matrix',
            'title' => 'Matrix',
            'value' => 'aawwmoled',
            'product_id' => 11
        ]);
        ProductProperty::create([
            'name' => 'os',
            'title' => 'OS',
            'value' => 'andriod',
            'product_id' => 11
        ]);
        ProductProperty::create([
            'name' => 'display-size',
            'title' => 'Diagonal display',
            'value' => '6',
            'product_id' => 11
        ]);
        ProductProperty::create([
            'name' => 'ram',
            'title' => 'RAM',
            'value' => '4',
            'product_id' => 11
        ]);
        ProductProperty::create([
            'name' => 'memory-size',
            'title' => 'Memory Size',
            'value' => '32',
            'product_id' => 11
        ]);
        //12
        ProductProperty::create([
            'name' => 'matrix',
            'title' => 'Matrix',
            'value' => 'aawmoed',
            'product_id' => 12
        ]);
        ProductProperty::create([
            'name' => 'os',
            'title' => 'OS',
            'value' => 'ios',
            'product_id' => 12
        ]);
        ProductProperty::create([
            'name' => 'display-size',
            'title' => 'Diagonal display',
            'value' => '7',
            'product_id' => 12
        ]);
        ProductProperty::create([
            'name' => 'ram',
            'title' => 'RAM',
            'value' => '2',
            'product_id' => 12
        ]);
        ProductProperty::create([
            'name' => 'memory-size',
            'title' => 'Memory Size',
            'value' => '25',
            'product_id' => 12
        ]);
        //13
        ProductProperty::create([
            'name' => 'type',
            'title' => 'Type',
            'value' => 'best',
            'product_id' => 13
        ]);
        ProductProperty::create([
            'name' => 'connection-type',
            'title' => 'Type of connection',
            'value' => 'wireless',
            'product_id' => 13
        ]);
        ProductProperty::create([
            'name' => 'noise-reduction',
            'title' => 'Noise Reduction',
            'value' => '33',
            'product_id' => 13
        ]);
        ProductProperty::create([
            'name' => 'color',
            'title' => 'Color',
            'value' => 'black',
            'product_id' => 13
        ]);
        ProductProperty::create([
            'name' => 'cable',
            'title' => 'Cable',
            'value' => 'metal',
            'product_id' => 13
        ]);
        ProductProperty::create([
            'name' => 'frequency-range',
            'title' => 'Frequency Range',
            'value' => '25cm',
            'product_id' => 13
        ]);
        //14
        ProductProperty::create([
            'name' => 'type',
            'title' => 'Type',
            'value' => 'loew',
            'product_id' => 14
        ]);
        ProductProperty::create([
            'name' => 'connection-type',
            'title' => 'Type of connection',
            'value' => 'wire',
            'product_id' => 14
        ]);
        ProductProperty::create([
            'name' => 'noise-reduction',
            'title' => 'Noise Reduction',
            'value' => '23',
            'product_id' => 14
        ]);
        ProductProperty::create([
            'name' => 'color',
            'title' => 'Color',
            'value' => 'white',
            'product_id' => 14
        ]);
        ProductProperty::create([
            'name' => 'cable',
            'title' => 'Cable',
            'value' => 'metal',
            'product_id' => 14
        ]);
        ProductProperty::create([
            'name' => 'frequency-range',
            'title' => 'Frequency Range',
            'value' => '20cm',
            'product_id' => 14
        ]);
        //15
        ProductProperty::create([
            'name' => 'type',
            'title' => 'Type',
            'value' => 'aredil',
            'product_id' => 15
        ]);
        ProductProperty::create([
            'name' => 'connection-type',
            'title' => 'Type of connection',
            'value' => 'wireless',
            'product_id' => 15
        ]);
        ProductProperty::create([
            'name' => 'noise-reduction',
            'title' => 'Noise Reduction',
            'value' => '20',
            'product_id' => 15
        ]);
        ProductProperty::create([
            'name' => 'color',
            'title' => 'Color',
            'value' => 'red',
            'product_id' => 15
        ]);
        ProductProperty::create([
            'name' => 'cable',
            'title' => 'Cable',
            'value' => 'metal',
            'product_id' => 15
        ]);
        ProductProperty::create([
            'name' => 'frequency-range',
            'title' => 'Frequency Range',
            'value' => '25cm',
            'product_id' => 15
        ]);
    }
}

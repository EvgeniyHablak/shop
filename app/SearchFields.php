<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class SearchFields extends Model
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'search_fields';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [];

    /**
     * Find products by fields that was matched for searching
     *
     * @param string $searchString
     * @return void
     */
    public static function findProducts(string $searchString = null)
    {
        if (isset($searchString)) {
            $like = '%' . $searchString . '%';
            $products = DB::table('product')
                ->addSelect('product.*')
                ->leftJoin('search_fields', 'product.id', '=', 'search_fields.product_id')
                ->where('search_fields.value', 'like', $like)
                ->groupBy('product.id')
                ->get();
        } else {
            $products = [];
        }
        return $products;
    }
}


// Product
// name  title 
// test  Test  
// test1 Test1 


// ProductProperty
// name  title  value 
// test  Test   1.2   
// test1 Test1  1.3   

//SearchFields
// name
// test 
// test1

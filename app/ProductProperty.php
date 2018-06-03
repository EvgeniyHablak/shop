<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ProductProperty extends Model
{
    protected $table = 'product_property';
    protected $fillable = [
        'name',
        'title',
        'value',
        'product_id'
    ];

}

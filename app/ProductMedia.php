<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ProductMedia extends Model
{
    /**
    * The table associated with the model.
    *
    * @var string
    */
    protected $table = 'product_media';
    public $timestamps = false;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'product_id',
        'media_id',
        'type'
    ];
}

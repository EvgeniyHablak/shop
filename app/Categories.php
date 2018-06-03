<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Categories extends Model
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'product_categories';

    protected $fillable = [
        'name',
        'title'
    ];
    public function scopeWhereName($query, $name)
    {
        return $query->where('name', $name);
    }
}

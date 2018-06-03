<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CategoryProperty extends Model
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'category_property';

    protected $fillable = [
        'category_id',
        'name',
        'title'
    ];
    /**
     * Undocumented function
     *
     * @param [type] $query
     * @param [type] $categoryId
     * @return void
     */
    public function scopeWhereCategory($query, $categoryId)
    {
        return $query->where('category_id', $categoryId);
    }
}

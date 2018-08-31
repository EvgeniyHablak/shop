<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

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
    public function products()
    {
        return $this->hasMany(Products::class);
    }
    public static function getByProductsId(array $productsId)
    {
        $categories = DB::table('product_categories')
            ->select(DB::raw('product_categories.*, COUNT(*) as productsInComparison'))
            ->leftJoin('product', 'product.category_id', '=', 'product_categories.id')
            ->whereIn('product.id', $productsId)
            ->groupBy('product_categories.id')
            ->get();
        return $categories;
    }
    public function properties()
    {
        return CategoryProperty::where('category_id', $this->id)->get();
    }
    public function propertiesRemove()
    {
        return CategoryProperty::where('category_id', $this->id)->delete();
    }
    public function property($name)
    {
        return CategoryProperty::where('category_id', $this->id)->where('name', $name)->first();
    }
}

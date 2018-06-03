<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Products extends Model
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'product';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'title',
        'price',
        'category_id',
        'description'
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

    /**
     * Undocumented function
     *
     * @return boolean
     */
    public function isFavorite()
    {
        $userId = auth()->user()->id;
        $favorite = Favorites::where('product_id', $this->id)
            ->where('user_id', $userId)
            ->exists();
        return $favorite;
    }

    /**
     * Undocumented function
     *
     * @return boolean
     */
    public function isCompared()
    {
        $userId = auth()->user()->id;
        $compare = Comparison::where('product_id', $this->id)
            ->where('user_id', $userId)
            ->exists();
        return $compare;
    }

    public function scopeByPopularity($query)
    {
        // SELECT product.*, COUNT(favorites.id) AS count
        // FROM product LEFT JOIN favorites ON product.id = favorites.product_id
        // GROUP BY product.id
        // ORDER BY count DESC
        return $query->addSelect(DB::raw('COUNT("favorites.id") as count, product.*'))
            ->leftJoin('favorites', 'product.id', '=', 'favorites.product_id')
            ->groupBy('product.id')
            ->orderByDesc('count');
    }

    public function category()
    {
        return Categories::find($this->category_id);
    }

    public function properties()
    {
        return ProductProperty::where('product_id', $this->id)->get();
    }

    public function media()
    {
        return DB::table('media')->addSelect(DB::raw('media.*'))
            ->leftJoin('product_media', 'media.id', '=', 'product_media.media_id')
            ->where('product_id', $this->id)
            ->get();
    }

    public function mainImage()
    {
        $productMedia = ProductMedia::where('product_id', $this->id)->where('type', 'main')->first();
        return Media::where('id', $productMedia->media_id)->first();
    }

    public function hasMainImage()
    {
        return ProductMedia::where('product_id', $this->id)->where('type', 'main')->exists();
    }

    public function favoriteCount()
    {
        return Favorites::where('product_id', $this->id)->count();
    }
}

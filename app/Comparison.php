<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Comparison extends Model
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'comparison';
    /**
     * Undocumented variable
     *
     * @var array
     */
    protected $fillable = [
        'product_id',
        'user_id'
    ];
    public function scopeWhereUser($query, $userId)
    {
        return $query->where('user_id', $userId);
    }
}

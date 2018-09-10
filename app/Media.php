<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Media extends Model
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'media';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'path',
        'type'
    ];
    public function isMain()
    {
        return ProductMedia::where('media_id', $this->id)->where('type', 'main')->exists();
    }
}

<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Support\Facades\DB;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    public function hasPermission(string $permissionName)
    {
        if (!UserPermissions::where('name', $permissionName)->exists()) {
            throw new \Exception('Invalid permission name');
        }
        $permission = UserPermissions::where('name', $permissionName)->first();
        return UserPermission::where('user_id', $this->id)->where('permission_id', $permission->id)->exists();
    }
    public function getFavoriteProducts()
    {
        return Products::join('favorites', 'product.id', '=', 'favorites.product_id')
            ->select('product.*')
            ->where('favorites.user_id', $this->id)
            ->get();
    }
    public function getProductsInComparison()
    {
        return Products::join('comparison', 'product.id', '=', 'comparison.product_id')
            ->select('product.*')
            ->where('comparison.user_id', $this->id)
            ->get();
    }
}

<?php

use Illuminate\Database\Seeder;
use App\User;
use App\UserPermission;
use App\UserPermissions;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::create([
            'name' => 'jheka524',
            'email' => 'jheka524@gmail.com',
            'password' => Hash::make('1q2w3e')
        ]);
        UserPermission::create([
            'permission_id' => '1',
            'user_id' => '1',
        ]);
        UserPermissions::create([
            'name' => 'admin',
            'title' => 'Admin'
        ]);
        UserPermissions::create([
            'name' => 'manager',
            'title' => 'Manager'
        ]);
    }
}

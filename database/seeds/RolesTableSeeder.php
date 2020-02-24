<?php

use Illuminate\Database\Seeder;

class RolesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $roles = [
            ['id' => 1, 'name' => 'user',   'code' => 'user', ],
            ['id' => 2, 'name' => 'moder',  'code' => 'moderator',],
            ['id' => 3, 'name' => 'admin',  'code' => 'admin',],
        ];

        $role_user = [];

        \App\Role::insert($roles);
    }
}

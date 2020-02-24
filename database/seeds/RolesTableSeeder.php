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
            ['id' => 1, 'name' => 'user',   'slug' => 'user', ],
            ['id' => 2, 'name' => 'moder',  'slug' => 'moderator',],
            ['id' => 3, 'name' => 'admin',  'slug' => 'admin',],
        ];

        $role_user = [];

        \App\Role::insert($roles);
    }
}

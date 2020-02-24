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
            ['id' => 1, 'name' => 'user',   'slug' => 'user'],
            ['id' => 2, 'name' => 'moder',  'slug' => 'moderator'],
            ['id' => 3, 'name' => 'admin',  'slug' => 'admin'],
        ];

        $roles_users = [
            ['role_id' => 1, 'user_id' => 1, ],
            ['role_id' => 2, 'user_id' => 1, ],
            ['role_id' => 3, 'user_id' => 3, ],
            ['role_id' => 2, 'user_id' => 2, ],
        ];

        \App\Role::insert($roles);
        \Illuminate\Support\Facades\DB::table('role_user')->insert($roles_users);
    }
}

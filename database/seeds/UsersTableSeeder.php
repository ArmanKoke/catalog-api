<?php

use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $users = [
            ['id' => 1, 'name' => 'Arman', 'email' => 'asd@asd.asd', 'password' => Hash::make('password')],
            ['id' => 2, 'name' => 'Mod',   'email' => 'mod@asd.asd', 'password' => Hash::make('password')],
            ['id' => 3, 'name' => 'Adm',   'email' => 'adm@asd.asd', 'password' => Hash::make('password')],
        ];

        //for convenience put tokens insert here
        $tokens = [
            ['iat' => 10, 'aud' => 'asd@asd.asd', 'sub' => 'test'],
            ['iat' => \Carbon\Carbon::now()->format('YmdHis'), 'aud' => 'mod@asd.asd', 'sub' => 'moder'],
            ['iat' => \Carbon\Carbon::now()->format('YmdHis'), 'aud' => 'adm@asd.asd', 'sub' => 'admin'],
        ];

        \App\User::insert($users);
        \App\Token::insert($tokens);
    }
}

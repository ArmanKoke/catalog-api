<?php

use Illuminate\Database\Seeder;

class CategoriesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $categories = [
            ['id' => 1, 'name' => 'games', ],
            ['id' => 2, 'name' => 'books', ],
            ['id' => 3, 'name' => 'phones',],
        ];

        \App\Category::insert($categories);
    }
}

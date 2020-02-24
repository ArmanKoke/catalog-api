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
            ['id' => 1, 'name' => 'games',  'slug' => 'games', ],
            ['id' => 2, 'name' => 'books',  'slug' => 'books', ],
            ['id' => 3, 'name' => 'phones', 'slug' => 'phones',],
        ];

        \App\Category::insert($categories);
    }
}

<?php

use Illuminate\Database\Seeder;

class ItemsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $items = [
            ['id' => 1, 'name' => 'rdr2',       'price' => 1200,    'weight' => 110,    'color' => ''],
            ['id' => 2, 'name' => 'pixel 2',    'price' => 110000,  'weight' => 280,    'color' => 'black'],
            ['id' => 3, 'name' => 'potter',     'price' => 5600,    'weight' => 430,    'color' => ''],
            ['id' => 4, 'name' => 'hobbits',    'price' => 6500,    'weight' => 760,    'color' => ''],
        ];

        //for convenience put tokens insert here
        $categories_items = [
            ['category_id' => 1, 'item_id' => 1, ],
            ['category_id' => 3, 'item_id' => 2, ],
            ['category_id' => 2, 'item_id' => 3, ],
            ['category_id' => 2, 'item_id' => 4, ],
        ];

        \App\Item::insert($items);
        \Illuminate\Support\Facades\DB::table('category_item')->insert($categories_items);
    }
}

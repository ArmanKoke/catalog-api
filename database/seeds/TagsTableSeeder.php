<?php

use Illuminate\Database\Seeder;

class TagsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $tags = [
            ['id' => 1, 'name' => 'game',        'slug' => 'game', ],
            ['id' => 2, 'name' => 'joy',         'slug' => 'joy',],
            ['id' => 3, 'name' => 'having fun',  'slug' => 'having_fun',],
        ];

        $item_tag = [
            ['item_id'=>1,  'tag_id'=>1],
            ['item_id'=>1,  'tag_id'=>2],
            ['item_id'=>1,  'tag_id'=>3],
            ['item_id'=>2,  'tag_id'=>3],
        ];

        $category_tag = [
            ['category_id'=>3,  'tag_id'=>1],
            ['category_id'=>3,  'tag_id'=>2],
            ['category_id'=>3,  'tag_id'=>3],
            ['category_id'=>2,  'tag_id'=>3],
        ];

        \App\Tag::insert($tags);
        \Illuminate\Support\Facades\DB::table('item_tag')->insert($item_tag);
        \Illuminate\Support\Facades\DB::table('category_tag')->insert($category_tag);
    }
}

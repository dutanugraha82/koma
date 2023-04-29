<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $category = [
            ['name' => 'place'],
            ['name'=> 'culinary'],
            ['name'=> 'people'],
            ['name'=> 'art'],
            ['name'=> 'culture'],
            ['name'=> 'fashion'],
            ['name'=> 'roots'],
            ['name'=> 'article'],
        ];

        foreach ($category as $item) {
            DB::table('category')->insert([
                'name' => $item
            ]);
        }
        
    }
}

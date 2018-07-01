<?php

use Illuminate\Database\Seeder;
use App\Models\ItemCategory;

class ItemCategoriesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        DB::statement('SET FOREIGN_KEY_CHECKS=0;');
        ItemCategory::truncate();
        DB::statement('SET FOREIGN_KEY_CHECKS=1;');

        factory(\App\Models\ItemCategory::class, 20)->create();
    }
}

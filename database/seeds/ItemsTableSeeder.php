<?php

use Illuminate\Database\Seeder;
use App\Models\Item;
use App\Models\ItemCategory;
use App\Models\ServiceCategory;
use Faker\Factory as Faker;

class ItemsTableSeeder extends Seeder
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
        Item::truncate();
        DB::statement('SET FOREIGN_KEY_CHECKS=1;');
        
        $faker = Faker::create();    
        $itemCategories = ItemCategory::pluck('id')->all();
        $serviceCategories = ServiceCategory::pluck('id')->all();

        for ($i=0; $i < 21; $i++) { 
     
        	factory(\App\Models\Item::class)->create([
        		'item_category_id' => $faker->randomElement($itemCategories),
                'service_category_id' => $faker->randomElement($serviceCategories),
        	]);
        }  
    }
}

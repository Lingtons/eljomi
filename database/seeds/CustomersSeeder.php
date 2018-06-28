<?php

use Illuminate\Database\Seeder;
use App\Models\Customer;
use Faker\Factory as Faker;
use App\Models\Type;

class CustomersSeeder extends Seeder
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
        Customer::truncate();
        DB::statement('SET FOREIGN_KEY_CHECKS=1;');

        $faker = Faker::create();

        $type = Type::pluck('id')->all();
        
        for ($i=0; $i < 21; $i++) { 
     
        	factory(\App\Models\Customer::class)
        			->create(['type_id' => $faker->randomElement($type),
        				'created_at' => \Carbon\Carbon::now(),
                		'updated_at' => \Carbon\Carbon::now(),
        				]);
        }        
    }
}

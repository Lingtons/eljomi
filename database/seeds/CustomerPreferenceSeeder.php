<?php

use Illuminate\Database\Seeder;
use App\Models\Preference;
use App\Models\Customer;
use Faker\Factory as Faker;

class CustomerPreferenceSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        $faker = Faker::create();

        $customers = Customer::pluck('id')->all();
        $preferences = Preference::pluck('id')->all();

        for($i=1; $i <= 20; $i++) {

            DB::table('customer_preference')->insert([
                'customer_id' => $faker->randomElement($customers),
                'preference_id' => $faker->randomElement($preferences),
                'value' => $faker->word,
                'created_at' => \Carbon\Carbon::now(),
                'updated_at' => \Carbon\Carbon::now(),
            ]);
        }
    }
}

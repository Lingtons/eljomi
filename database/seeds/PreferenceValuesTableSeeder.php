<?php

use Illuminate\Database\Seeder;
use Faker\Factory as Faker;
use App\Models\Preference;
class PreferenceValuesTableSeeder extends Seeder
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

        $preference_ids = Preference::pluck('id')->all();

        for($i=1; $i <= 20; $i++) {
            factory(\App\Models\PreferenceValue::class)->create([
        		'preference_id' => $faker->randomElement($preference_ids),
        	]);
        }
    }
}

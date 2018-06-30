<?php

use Illuminate\Database\Seeder;
use App\Models\Preference;

class PreferencesSeeder extends Seeder
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
        Preference::truncate();
        DB::statement('SET FOREIGN_KEY_CHECKS=1;');
        factory(\App\Models\Preference::class, 20)->create();
    }
}

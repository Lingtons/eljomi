<?php

use Illuminate\Database\Seeder;
use App\Models\ExpenseCategory;

class ExpenseCategoriesTableSeeder extends Seeder
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
        ExpenseCategory::truncate();
        DB::statement('SET FOREIGN_KEY_CHECKS=1;');

        factory(\App\Models\ExpenseCategory::class, 20)->create();
    }
}

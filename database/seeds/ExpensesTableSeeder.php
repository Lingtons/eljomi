<?php

use Illuminate\Database\Seeder;
use Faker\Factory as Faker;
use App\Models\ExpenseCategory;

class ExpensesTableSeeder extends Seeder
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

        $expense_category_ids = ExpenseCategory::pluck('id')->all();

        for($i=1; $i <= 20; $i++) {
            factory(\App\Models\Expense::class)->create([
        		'expense_category_id' => $faker->randomElement($expense_category_ids),
        	]);
        }
    }
}

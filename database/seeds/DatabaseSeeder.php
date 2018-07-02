<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $this->call(UsersTableSeeder::class);
        $this->call(PreferencesSeeder::class);
        $this->call(CustomersSeeder::class);
        $this->call(CustomerPreferenceSeeder::class);
        $this->call(ItemCategoriesTableSeeder::class);
        $this->call(ServiceCategoriesTableSeeder::class);
        $this->call(ItemsTableSeeder::class);
        $this->call(ExpenseCategoriesTableSeeder::class);
        $this->call(ExpensesTableSeeder::class);
        $this->call(PreferenceValuesTableSeeder::class);
    }
    
}

<?php

use Illuminate\Database\Seeder;

class ExpenseCategoriesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('expense_categories')->insert([
            ['name' => '食費' ],
            ['name' => '光熱費' ],
            ['name' => '住居費' ],
            ['name' => '交通費' ],
            ['name' => '日用品' ],
            ['name' => '衣服' ],
            ['name' => '美容' ],
            ['name' => '交際費' ],
            ['name' => '税金' ],
        ]);
    }
}

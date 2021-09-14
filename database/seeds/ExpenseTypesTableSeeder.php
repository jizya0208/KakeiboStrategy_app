<?php

use Illuminate\Database\Seeder;

class ExpenseTypesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('expense_types')->insert([
            ['name' => '消費' ],
            ['name' => '浪費' ],
            ['name' => '投資' ],
        ]);
    }
}

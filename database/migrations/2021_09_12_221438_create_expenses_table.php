<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateExpensesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('expenses', function (Blueprint $table) {
            $table->bigIncrements('id');
    	    $table->unsignedBigInteger('user_id');
			$table->unsignedBigInteger('expense_type_id');
			$table->unsignedBigInteger('expense_category_id');
			$table->date('date');
			$table->integer('amount');
			$table->integer('return');
		    $table->string('summary', 100);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('expenses');
    }
}

<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

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
            $table->id('expense_id');
            $table->string('expense_bill')->nullable();
            $table->integer('expense_price');
            $table->string('nepali_date');
            $table->string('expense_vendor')->nullable();
            $table->unsignedBigInteger('expense_category_id');
            $table->longText('expense_remark')->nullable();

            $table->foreign('expense_category_id')->references('expense_category_id')->on('categories_expense')->onDelete('cascade');
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

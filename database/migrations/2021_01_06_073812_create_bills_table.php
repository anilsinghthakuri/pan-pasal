<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBillsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('bills', function (Blueprint $table) {
            $table->id('bill_id');
            $table->unsignedBigInteger('table_id')->nullable();
            $table->integer('bill_total_amount');
            $table->string('nepali_date');
            $table->unsignedBigInteger('payment_method_id')->nullable();
            $table->unsignedBigInteger('customer_id')->nullable()->nullable();

            $table->foreign('table_id')->references('table_id')->on('tables')->onDelete('set null');
            $table->foreign('payment_method_id')->references('payment_method_id')->on('payment_methods')->onDelete('set null');
            $table->foreign('customer_id')->references('customer_id')->on('customers')->onDelete('set null');
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
        Schema::dropIfExists('bills');
    }
}

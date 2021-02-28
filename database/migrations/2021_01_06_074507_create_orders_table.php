<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOrdersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('orders', function (Blueprint $table) {
            $table->id('order_id');
            $table->unsignedBigInteger('product_id')->nullable();
            $table->unsignedBigInteger('table_id')->nullable();
            $table->boolean('bill_status')->default(0);
            $table->string('nepali_date');
            $table->integer('order_quantity');
            $table->integer('order_subprice');
            $table->unsignedBigInteger('bill_id')->nullable();

            $table->foreign('product_id')->references('product_id')->on('products')->onDelete('set null');
            $table->foreign('table_id')->references('table_id')->on('tables')->onDelete('set null');
            $table->foreign('bill_id')->references('bill_id')->on('bills')->onDelete('set null');
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
        Schema::dropIfExists('orders');
    }
}

<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePurchasesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('purchases', function (Blueprint $table) {
            $table->id('purchase_id');
            $table->string('purchase_bill')->nullable();
            $table->integer('purchase_price');
            $table->string('purchase_vendor')->nullable();
            $table->unsignedBigInteger('purchase_category_id');
            $table->longText('purchase_remark')->nullable();

            $table->foreign('purchase_category_id')->references('purchase_category_id')->on('categories_purchase')->onDelete('cascade');
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
        Schema::dropIfExists('purchases');
    }
}

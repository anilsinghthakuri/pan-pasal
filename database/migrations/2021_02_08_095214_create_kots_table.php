<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateKotsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('kots', function (Blueprint $table) {
            $table->id('kot_id');
            $table->unsignedBigInteger('product_id')->nullable();
            $table->unsignedBigInteger('table_id')->nullable();
            $table->boolean('status')->default(0);

            $table->foreign('product_id')->references('product_id')->on('products')->onDelete('set null');
            $table->foreign('table_id')->references('table_id')->on('tables')->onDelete('set null');
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
        Schema::dropIfExists('kots');
    }
}

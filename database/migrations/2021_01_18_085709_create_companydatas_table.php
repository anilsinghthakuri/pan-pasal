<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCompanydatasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('companydatas', function (Blueprint $table) {
            $table->id('company_id');
            $table->string('company_name');
            $table->string('company_address');
            $table->string('company_number');
            $table->string('company_logo')->nullable();
            $table->string('company_currency');
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
        Schema::dropIfExists('companydatas');
    }
}

<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('orders', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->string('costumer_uniq_key')->index();
            $table->string('status')->default('processing');
            $table->float('total');
            $table->string('first_name');
            $table->string('last_name');
            $table->string('country');
            $table->string('region');
            $table->string('city');
            $table->string('street');
            $table->string('apartment');
            $table->string('phone');
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
};

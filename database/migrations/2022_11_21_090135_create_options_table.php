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
        Schema::create('options', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->string('name')->index();
            $table->string('slug')->unique()->index();
            $table->string('value')->index();
            $table->string('type')->index();
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('options');
    }
};

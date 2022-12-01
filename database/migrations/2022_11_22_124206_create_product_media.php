<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('product_media', function (Blueprint $table) {
            $table->id();
            $table->string('product_id')->index();
            $table->string('product_type');
            $table->unsignedBigInteger('media_id')->index();
            $table->timestamps();

            $table->foreign('product_id')
                ->references('id')
                ->on('products')
                ->cascadeOnDelete()
                ->cascadeOnUpdate();

            $table->foreign('media_id')
                ->references('id')
                ->on('media')
                ->cascadeOnDelete()
                ->cascadeOnUpdate();
        });
    }

    public function down()
    {
        Schema::dropIfExists('product_media');
    }
};

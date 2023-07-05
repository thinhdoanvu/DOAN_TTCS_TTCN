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
        Schema::create('products', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->string('image_path');
            $table->string('image_name');
            $table->integer('amount');
            $table->bigInteger('price');
            $table->bigInteger('price_discount')->nullable();
            $table->string('description');
            $table->boolean('status');
            $table->integer('id_unit')->nullable();
            $table->integer('id_trademark')->nullable();
            $table->integer('id_cate')->nullable();
            $table->integer('id_suppli')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('products');
    }
};

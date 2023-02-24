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
            $table->bigIncrements('id');
            $table->string('name');
            $table->text('description');
            $table->longText('content');
            $table->integer('price');
            $table->integer('price_sale');
            $table->string('color');
            $table->string('size');
            $table->integer('qty');
            $table->string('image');
            $table->BigInteger('menu_id')->unsigned();
            $table->foreign('menu_id')->references('id')->on('menus')->cascadeOnDelete();
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
        Schema::dropIfExists('product');
    }
};

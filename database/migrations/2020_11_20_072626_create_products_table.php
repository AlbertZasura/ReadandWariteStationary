<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProductsTable extends Migration
{
     /**
     * method dibawah berfungsi untuk membuat table dalam database
     */
    public function up()
    {
        Schema::create('products', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->integer('type_id')->unsigned();
            $table->integer('stock');
            $table->integer('price');
            $table->string('description');
            $table->string('image');
            $table->timestamps();
            $table->timestamp('deleted_at')->nullable();
            $table->foreign('type_id')->references('id')->on('product_types')->onDelete('cascade');;
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
}

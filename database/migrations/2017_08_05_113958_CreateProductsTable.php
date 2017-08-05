<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProductsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('products', function(Blueprint $table){
            $table->increments('id')->unsigned();
            $table->integer('category_id')->unsigned();
            $table->foreign('category_id')->references('id')->on('categories')->onDelete('restrict');
            $table->string('title');
            $table->string('model')->nullable();
            $table->string('img_url')->nullable();
            $table->text('desc')->nullable();
            $table->integer('price')->default(0)->unsigned();
            $table->enum('status', ['NOT_AVAILABLE', 'AVAILABLE', 'COMMING_SOON'])
                ->default('AVAILABLE');
            $table->integer('quantity')->default(0)->unsigned();
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
        Schema::dropIfExists('products');
    }
}

<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePhotosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('photos', function (Blueprint $table) {
            $table->id();
            $table->string('path',255);
            $table->string('original_name',255);
            $table->bigInteger('product_id')->unsigned();
            $table->tinyInteger('user_id'); //should change to product_id
            $table->foreign('product_id')->references('id')->on('products')
                                        ->onDelete('cascade')->onUpdate('cascade');
            //create relation with slide and banner and ads
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
        Schema::dropIfExists('photos');
    }
}

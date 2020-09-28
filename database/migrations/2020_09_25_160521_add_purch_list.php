<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddPurchList extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('purchlists', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('factor_number')->unsigned();
            $table->bigInteger('product_id');
            $table->bigInteger('count');
            $table->bigInteger('price');
            $table->foreign('factor_number')->references('id')->on('userlists')
                ->onDelete('cascade')->onUpdate('cascade');
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
        Schema::dropIfExists('purchlists');
    }
}

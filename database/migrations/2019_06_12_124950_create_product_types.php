<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProductTypes extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('producttypes', function (Blueprint $table) {
            $table->bigIncrements('producttype_id');
            $table->string('producttype_name');

            $table->bigInteger('producttype_sub_id')->unsigned()->nullable();
                // $table->foreign('product_type_sub_id')
                // ->references('product_type_id')
                // ->on('product_type_subs');

            $table->tinyInteger("active")->default(1)->nullable();
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
        Schema::dropIfExists('producttypes');
    }
}

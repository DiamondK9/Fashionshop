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
        Schema::create('product_types', function (Blueprint $table) {
            $table->bigIncrements('product_type_id');
            $table->string('product_type_name');

            $table->bigInteger('product_type_sub_id')->unsigned()->nullable();
                // $table->foreign('product_type_sub_id')
                // ->references('product_type_id')
                // ->on('product_type_subs');

            $table->tinyInteger("active")->default(0)->nullable();
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
        Schema::dropIfExists('product_types');
    }
}

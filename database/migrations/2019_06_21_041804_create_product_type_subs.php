<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProductTypeSubs extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('product_type_subs', function (Blueprint $table) {
            $table->bigIncrements('product_type_sub_id');

            $table->bigInteger('product_type_id')->unsigned()->nullable();
                // $table->foreign('product_type_id')
                // ->references('product_type_id')
                // ->on('product_types');

            $table->string('product_type_sub_name');
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
        Schema::dropIfExists('product_type_subs');
    }
}

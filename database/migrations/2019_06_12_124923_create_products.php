<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProducts extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::enableForeignKeyConstraints();

        Schema::create('products', function (Blueprint $table) {
            $table->bigIncrements('product_id');

            //loại product_type_id và producer_id cần phải giống với primary key ở hai bảng product_types và producers là BigINT cùng Unsigned
            //Khai báo tạo cột trước rồi mới khai báo tạo foreign key
            $table->bigInteger('product_type_id')->unsigned()->nullable();
                // $table->foreign('product_type_id')
                //     ->references('product_type_id')
                //     ->on('product_types')
                //     ->ondelete('cascade');

            $table->bigInteger('producer_id')->unsigned()->nullable();
                // $table->foreign('producer_id')
                //     ->references('producer_id')
                //     ->on('producers')
                //     ->ondelete('cascade');
            //thứ tự tạo các cột không quan trọng, ở đây mình chỉ muốn để các cột ID và primary, foreign key ở cùng nhau thôi.

            $table->string('product_code')->default(0)->nullable();  
            $table->string('product_name');
            $table->string('product_image')->nullable();
            $table->integer('product_quantity')->default(0)->nullable();
            $table->integer('product_price')->default(0)->nullable();            
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
